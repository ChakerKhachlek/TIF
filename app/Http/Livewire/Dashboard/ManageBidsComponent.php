<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use App\Models\Bid;
use App\Models\Tif;
use Livewire\Component;
use App\Exports\BidsExport;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;

class ManageBidsComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';



    public $name,$email,$phone,$bid_price,$display;

    public $tifs;

    public $selected_id,$selectedBid;


    public $filterTif;

    public $dataToExport;

    public $createMode = true;
    public $updateMode = false;


    public function updatingFilterTif(){
        $this->resetPage();

    }
    public function mount(){
    $this->tifs=Tif::where('status','=','On auction')->get();
    }

    public function resetInput(){

        $this->email='';
        $this->name='';
        $this->phone='';
        $this->bid_price=null;
        }

    public function render()
    {
        if (empty($this->filterTif)) {
            $this->dataToExport=Bid::orderBy('bid_price','DESC');
            $data=$this->dataToExport->paginate(10);
            $this->dataToExport=$this->dataToExport->get();

        }else{
            $this->dataToExport=Bid::where('tif_id','=',$this->filterTif)->orderBy('bid_price','DESC');
            $data=$this->dataToExport->paginate(10);
            $this->dataToExport=$this->dataToExport->get();
        }

        return view('livewire.dashboard.manage-bids-component',['data'=>$data]);
    }

    public function store(){
        $this->success=false;
        $now=Carbon::now();
        $tif=Tif::find($this->filterTif);
        $bidding_end_date =  Carbon::createFromFormat('Y-m-d H', $tif->auction_end_date->format('Y-m-d').' '.$tif->auction_end_date_time);

        $this->validate([
        'name'=>"required",
        'email'=>"required|email",
        'phone' => [
            'required',
            'regex:/^[0-9]{8}$/'
        ],
        'bid_price'=>'required|integer'
    ]);



    if($now->gt($bidding_end_date)){
        $this->emit('time-passed','Sorry, the auction is the closed !');
        throw ValidationException::withMessages(['' => 'Sorry, the auction is closed.']);

    }else{
        $tif->bids()->create([
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'bid_price'=>$this->bid_price
        ]);
        $this->resetInput();
        $this->success=true;
    }



    $this->success = 'Bid created we will contact you to confirm !';
    $this->emit('bid-created','Bid created successfully !');


    }

     // Edit method
 public function edit($id)
 {
     $record = Bid::findOrFail($id);
     $this->selected_id = $id;
     $this->name = $record->name;
     $this->email = $record->email;
     $this->phone = $record->phone;
     $this->bid_price = $record->bid_price;
     $this->updateMode = true;
 }

   // Update method
   public function update()
   {
        $this->validate([
            'name'=>"required",
            'email'=>"required|email",
            'phone' => [
                'required',
                'regex:/^[0-9]{8}$/'
            ],
            'bid_price'=>'required|integer'
        ]);
       if ($this->selected_id) {
           $record = Bid::find($this->selected_id);
           $record->update([
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'bid_price'=>$this->bid_price
           ]);
           $this->resetInput();
           $this->updateMode = false;
       }
       $this->emit('bid-updated','Tif updated successfully !');
   }

   public function deleteBidMode($id){
    $this->selectedBid=$id;
}

// Destroy method
public function deleteBid()
{


    if ($this->selectedBid) {
        $record = Bid::find($this->selectedBid);
        $record->delete();

    }
// Update create mode variables switchers
$this->createMode = true;
$this->updateMode = false;
$this->resetInput();
    $this->emit('bid-deleted','Tif deleted successfully !');
}

public function export(){

    $data=$this->dataToExport;
   $pdf = PDF::loadView('PDF.bid-export', compact('data'))->output();

return response()->streamDownload(
fn () => print($pdf),
'bids.pdf'
);

}

public function exportExcel(){

    return Excel::download(new BidsExport, 'bids.xlsx');

}

public function confirmBid( $id ){
$bid=Bid::find($id);
$bid->update([
    'display'=>true
]);

$bid->tif()->update([
'auction_top_biding_price'=>$bid->bid_price
]);
$this->emit('bid-confirmed','Bid confirmed successfully !');
}

public function clearBids(){
    if($this->filterTif){
        $record=Tif::find($this->filterTif);
        foreach($record->bids()->get() as $bid){
            $bid=Bid::find($bid->id);
            $bid->delete();
        }
        // Update create mode variables switchers
        $this->createMode = true;
        $this->updateMode = false;
        $this->resetInput();
            $this->emit('bids-cleared','Bids cleared successfully !');
    }else{
        $this->emit('bids-clear-error','No tif selected !');
    }

}
}
