<?php

namespace App\Http\Livewire\Dashboard;


use Carbon\Carbon;
use App\Models\Tif;
use App\Models\Owner;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
class ManageTifsComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public $title,$reference,$description,$price,$status,$realisation_date,$auction_start_date,$auction_duration,$auction_top_biding_price;
    public $selected_id,$selectedTif;
    public $tif_img;

    public $owners,$categories;
    public $selected_owner;
     // Update create mode variables switchers
     public $createMode = true;
     public $updateMode = false;

    public function mount(){
        $mytime = Carbon::now()->format('Y-m-d');
        $this->realisation_date=$mytime;
        $this->auction_start_date=$mytime;

        $this->owners=Owner::all();
        $this->categories=Category::all();
    }
    public function render()
    {
        $data=Tif::where('title', 'like', '%'.$this->search.'%')->orWhere('reference', 'like', '%'.$this->search.'%')->orWhere('status', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.dashboard.manage-tifs-component',['data'=>$data]);
    }

     // Reseting inputs
     private function resetInput()
     {
        $mytime = Carbon::now()->format('Y-m-d');
        $this->auction_start_date=$mytime;
        $this->realisation_date=$mytime;

         $this->title = null;
         $this->reference=null;
         $this->description=null;
         $this->price=null;
         $this->status=null;
         $this->auction_duration=null;
         $this->auction_top_biding_price=null;
         $this->tif_img=null;
         $this->selected_id=null;
         $this->selectedTif=null;
         $this->selected_owner=null;

     }

      // Creation mode on
    public function createMode()
    {
        $this->updateMode = false;
        $this->createMode = true;
        $this->resetInput();
    }

    public function generateReference(){
         // String of all alphanumeric character
         $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $this->reference=substr(str_shuffle($str_result),
            0, 8);
    }

 // Storing method
 public function store()
 {
     $this->validate([
         'selected_owner'=>'required',
         'title' => 'required',
         'reference' => 'required|unique:tifs|regex:/^[A-Z0-9]{8}$/',
         'price' => 'required|numeric|gt:0',
         'status' => 'required',
         'realisation_date' => 'required',
         'tif_img' => 'required|image|max:1024',

     ]);

     if($this->status=="On auction"){
        $this->validate([
            'auction_start_date' => 'required',
            'auction_duration' => 'required|integer',
            'auction_top_biding_price' => 'required',

        ]);
     }else{
        $this->auction_duration=null;
        $this->auction_top_biding_price=null;
        $this->auction_start_date=null;
    }


     $filename= date('YmdHi').$this->tif_img->getClientOriginalName();
     $this->tif_img->storeAs('/public/tifs_images', $filename);


     Tif::create([
         'title' => $this->title,
         'reference' => $this->reference,
         'description'=>$this->description,
         'price'=>$this->price,
         'status'=>$this->status,
         'realisation_date'=>$this->realisation_date,
         'auction_start_date'=>$this->auction_start_date,
         'auction_duration'=>$this->auction_duration,
         'auction_top_biding_price'=>$this->auction_top_biding_price,
         'tif_img_url' => $filename,
         'owner_id'=>$this->selected_owner

     ]);

     $this->resetInput();
     $this->emit('tif-created','Tif created successfully !');
 }

 // Edit method
 public function edit($id)
 {
     $record = Tif::findOrFail($id);
     $this->selected_id = $id;
     $this->title = $record->title;
     $this->reference = $record->reference;
     $this->description = $record->description;
     $this->price = $record->price;
     $this->status = $record->status;

     $this->realisation_date=$record->realisation_date;
     if($record->auction_start_date){
        $this->auction_start_date=$record->auction_start_date;
     }else{
        $mytime = Carbon::now()->format('Y-m-d');
        $this->auction_start_date=$mytime;
     }

     $this->auction_duration=$record->auction_duration;
     $this->auction_top_biding_price=$record->auction_top_biding_price;
     $this->tif_img=$record->tif_img_url;
     $this->selected_owner=$record->owner->id;
     $this->updateMode = true;
 }

   // Update method
   public function update()
   {

       if ($this->selected_id) {
           $record = Tif::find($this->selected_id);
           if(!is_string($this->tif_img)){
            $this->validate([
                'selected_owner'=>'required',
                'title' => 'required',
                'reference' =>[
                    'required',
                    'regex:/^[A-Z0-9]{8}$/',
                    Rule::unique('tifs')->ignore($record->id),
            ] ,
                'price' => 'required|numeric|gt:0',
                'status' => 'required',
                'realisation_date' => 'required',
                'tif_img' => 'required|image|max:1024',

            ]);

            if($this->status=="On auction"){
               $this->validate([
                   'auction_start_date' => 'required',
                   'auction_duration' => 'required|integer',
                   'auction_top_biding_price' => 'required',

               ]);
            }else{
                $this->auction_duration=null;
                $this->auction_top_biding_price=null;
                $this->auction_start_date=null;
            }
               $filename= date('YmdHi').$this->tif_img->getClientOriginalName();
               $this->tif_img->storeAs('/public/tifs_images', $filename);

               $image_path =public_path()."/storage/tifs_images/".$record->tif_img_url ;  // Value is not URL but directory file path
               if(file_exists($image_path)) {

                   unlink($image_path);
               }
               $record->update([
                'title' => $this->title,
                'reference' => $this->reference,
                'description'=>$this->description,
                'price'=>$this->price,
                'status'=>$this->status,
                'realisation_date'=>$this->realisation_date,
                'auction_start_date'=>$this->auction_start_date,
                'auction_duration'=>$this->auction_duration,
                'auction_top_biding_price'=>$this->auction_top_biding_price,
                'tif_img_url' => $filename,
                'owner_id'=>$this->selected_owner

               ]);
           }else{
            $this->validate([
                'selected_owner'=>'required',
                'title' => 'required',
                'reference' => [
                    'required',
                    'regex:/^[A-Z0-9]{8}$/',
                    Rule::unique('tifs')->ignore($record->id),
                 ] ,
                'price' => 'required|numeric|gt:0',
                'status' => 'required',
                'realisation_date' => 'required',
            ]);

            if($this->status=="On auction"){
               $this->validate([
                   'auction_start_date' => 'required',
                   'auction_duration' => 'required|integer',
                   'auction_top_biding_price' => 'required',

               ]);
            }else{
                $this->auction_duration=null;
                $this->auction_top_biding_price=null;
                $this->auction_start_date=null;
            }

               $record->update([
                'title' => $this->title,
                'reference' => $this->reference,
                'description'=>$this->description,
                'price'=>$this->price,
                'status'=>$this->status,
                'realisation_date'=>$this->realisation_date,
                'auction_start_date'=>$this->auction_start_date,
                'auction_duration'=>$this->auction_duration,
                'auction_top_biding_price'=>$this->auction_top_biding_price,
                'owner_id'=>$this->selected_owner
               ]);
           }



           $this->resetInput();
           $this->updateMode = false;
       }
       $this->emit('tif-updated','Tif updated successfully !');
   }

 public function deleteTifMode($id){
    $this->selectedTif=$id;
}

    // Destroy method
    public function deleteTif()
    {
         // Update create mode variables switchers
     $this->createMode = false;
     $this->updateMode = false;
     $this->resetInput();
        if ($this->selectedTif) {
            $record = Tif::find($this->selectedTif);
            $image_path =public_path()."/storage/tifs_images/".$record->tif_img_url ;  // Value is not URL but directory file path
            if(file_exists($image_path)) {

                unlink($image_path);
            }
            $record->delete();

        }

        $this->emit('tif-deleted','Tif deleted successfully !');
    }

    public function export(){

        $data=Tif::all()->sortBy('realisation_date');
       $pdf = PDF::loadView('PDF.tif-export', compact('data'))->output();

return response()->streamDownload(
    fn () => print($pdf),
    'tifs.pdf'
    );

    }

}
