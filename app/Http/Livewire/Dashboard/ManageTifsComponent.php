<?php

namespace App\Http\Livewire\Dashboard;


use Carbon\Carbon;
use App\Models\Tif;
use App\Models\Owner;
use Livewire\Component;
use App\Models\Category;
use App\Exports\TifsExport;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;

class ManageTifsComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public $title,$reference,$views_initial_count,$description,$price,$status,$realisation_date,$auction_start_date,$auction_duration,$auction_top_biding_price;
    public $selected_id,$selectedTif;
    public $tif_img;

    public $owners,$categories;
    public $selected_owner;

    public $filter_owner;

    public $selectedCategories=[];
     // Update create mode variables switchers
     public $createMode = true;
     public $updateMode = false;

     public $dataToExport;

    public function mount(){
        $mytime = Carbon::now()->format('Y-m-d');
        $this->realisation_date=$mytime;
        $this->auction_start_date=$mytime;

        $this->owners=Owner::all();
        $this->categories=Category::all();

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterOwner()
    {
        $this->resetPage();
    }


    public function render()
    {

        if (empty($this->filter_owner)) {
            $this->dataToExport=Tif::where('title', 'like', '%'.$this->search.'%')->orWhere('reference', 'like', '%'.$this->search.'%')->orWhere('status', 'like', '%'.$this->search.'%')->orWhere('realisation_date', 'like', '%'.$this->search.'%')->orderBy('created_at','DESC');
            $data=$this->dataToExport->paginate(10);

            $this->dataToExport=$this->dataToExport->get();

        }else{
            $this->search=null;
            $this->dataToExport=Owner::find($this->filter_owner)->tifs()->orderBy('created_at','DESC');
            $data=$this->dataToExport->paginate(10);
            $this->dataToExport=$this->dataToExport->get();
        }



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
         $this->selectedCategories=null;
         $this->description=null;
         $this->price=null;
         $this->status=null;
         $this->auction_duration=null;
         $this->auction_top_biding_price=null;
         $this->tif_img=null;
         $this->selected_id=null;
         $this->selectedTif=null;
         $this->selected_owner=null;
         $this->filter_owner=null;
         $this->views_initial_count=null;
         $this->search=null;
         $this->views_initial_count=null;

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
         'views_initial_count'=>'required|integer',
         'status' => 'required',
         'realisation_date' => 'required',
         'tif_img' => 'required|image|max:10000',

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


     $tif=Tif::create([
         'title' => $this->title,
         'reference' => $this->reference,
         'description'=>$this->description,
         'price'=>$this->price,
         'status'=>$this->status,
         'realisation_date'=>$this->realisation_date,
         'auction_start_date'=>$this->auction_start_date,
         'auction_duration'=>$this->auction_duration,
         'auction_top_biding_price'=>$this->auction_top_biding_price,
         'views'=>$this->views_initial_count,
         'tif_img_url' => $filename,
         'owner_id'=>$this->selected_owner

     ]);

     $tif->categories()->sync($this->selectedCategories);
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

     $this->selectedCategories=$record->categories()->get()->pluck('id')->toArray();
     $this->views_initial_count=$record->views;
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
                'views_initial_count'=>'required|integer',
                'realisation_date' => 'required',

                'tif_img' => 'required|image|max:10000',

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
                'views'=>$this->views_initial_count,
                'tif_img_url' => $filename,
                'owner_id'=>$this->selected_owner

               ]);
               $record->categories()->sync($this->selectedCategories);
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
                'views_initial_count'=>'required|integer',
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
                'views'=>$this->views_initial_count,
                'owner_id'=>$this->selected_owner
               ]);
               $record->categories()->sync($this->selectedCategories);
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


        if ($this->selectedTif) {
            $record = Tif::find($this->selectedTif);
            $image_path =public_path()."/storage/tifs_images/".$record->tif_img_url ;  // Value is not URL but directory file path
            if(file_exists($image_path)) {

                unlink($image_path);
            }

            $record->delete();

        }
// Update create mode variables switchers
$this->createMode = true;
$this->updateMode = false;
$this->resetInput();
        $this->emit('tif-deleted','Tif deleted successfully !');
    }

    public function export(){

        $data=$this->dataToExport;
       $pdf = PDF::loadView('PDF.tif-export', compact('data'))->output();

return response()->streamDownload(
    fn () => print($pdf),
    'tifs.pdf'
    );

    }

    public function exportExcel(){

        return Excel::download(new TifsExport, 'tifs.xlsx');

    }

}
