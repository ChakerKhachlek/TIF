<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Tif;
use App\Models\Style;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\StylesExport;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;

class ManageStylesComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public  $name, $style_img,$display_order,$selected_id,$selectedStyle;

    // Update create mode variables switchers
    public $createMode = true;
    public $updateMode = false;
    public $display_order_count;

    public function mount(){
        $this->display_order_count=Style::all()->count()+1;
        $this->display_order=$this->display_order_count;
    }

    public function render()
    {

        $data=Style::where('name', 'like', '%'.$this->search.'%')->orderBy('display_order')->paginate(10);
        return view('livewire.dashboard.manage-styles-component',['data'=>$data]);
    }

    // Reseting inputs
    private function resetInput()
    {
        $this->name = null;
        $this->style_img=null;
        $this->display_order=$this->display_order_count;
    }

    // Creation mode on
    public function createMode()
    {
        $this->updateMode = false;
        $this->createMode = true;
        $this->resetInput();
    }

    // Storing method
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:styles',
            'style_img' => 'required|image|max:8192',
            'display_order'=>'required|numeric|unique:styles|gt:0',
        ]);



        $filename= date('YmdHi').$this->style_img->getClientOriginalName();
        $this->style_img->storeAs('/public/styles_images', $filename);


        Style::create([
            'name' => $this->name,
            'style_img_link' => $filename,
            'display_order'=> $this->display_order,
            'views'=>0
        ]);
        $this->display_order_count++;
        $this->resetInput();
        $this->emit('style-created','Style created successfully !');
    }

    // Edit method
    public function edit($id)
    {
        $record = Style::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->style_img=$record->style_img_link;
        $this->display_order=$record->display_order;
        $this->updateMode = true;
    }

    // Update method
    public function update()
    {

        if ($this->selected_id) {
            $record = Style::find($this->selected_id);
            if(!is_string($this->style_img)){
                $this->validate([
                    'name'  => [
                        'required',
                        Rule::unique('styles')->ignore($record->id),
                     ] ,
                    'style_img' => 'required|image|max:8192',
                    'display_order'=>[
                        'required',
                        'numeric',
                        'gt:0',
                        Rule::unique('styles')->ignore($this->selected_id),
                ],

                ]);
                $filename= date('YmdHi').$this->style_img->getClientOriginalName();
                $this->style_img->storeAs('/public/styles_images', $filename);

                $image_path =public_path()."/storage/styles_images/".$record->style_img_link ;  // Value is not URL but directory file path
                if(file_exists($image_path)) {

                    unlink($image_path);
                }
                $record->update([
                    'name' => $this->name,
                    'style_img_link' => $filename,
                    'display_order'=>$this->display_order,
                ]);
            }else{
                $this->validate([
                    'name' => [
                        'required',
                        Rule::unique('styles')->ignore($record->id),
                     ] ,
                    'display_order'=>[
                        'required',
                        'numeric',
                        'gt:0',
                        Rule::unique('styles')->ignore($this->selected_id),
                ],

                ]);
                $record->update([
                    'name' => $this->name,
                    'display_order'=>$this->display_order,
                ]);
            }



            $this->resetInput();
            $this->updateMode = false;
        }
        $this->emit('style-updated','Style updated successfully !');
    }

    public function deleteStyleMode($id){
        $this->selectedStyle=$id;
    }
    // Destroy method
    public function deleteStyle()
    {

        if ($this->selectedStyle) {
            $record = Style::find($this->selectedStyle);
            $image_path =public_path()."/storage/styles_images/".$record->style_img_link ;  // Value is not URL but directory file path
            if(file_exists($image_path)) {

                unlink($image_path);
            }
            foreach($record->tifs()->get() as $tif){
                $tif=Tif::find($tif->id);
                $tif->delete();
            }
            $record->delete();

        }
        $this->createMode = true;
        $this->updateMode = false;
        $this->display_order_count--;
        $this->resetInput();
        $this->emit('style-deleted','Style deleted successfully !');
    }

    public function export(){

        $data=Style::all()->sortBy('display_order');
       $pdf = PDF::loadView('PDF.style-export', compact('data'))->output();

return response()->streamDownload(
    fn () => print($pdf),
    'styles.pdf'
    );

    }

    public function exportExcel(){

        return Excel::download(new StylesExport, 'styles.xlsx');

    }


    public function updatingSearch()
    {
        $this->resetPage();
    }
}
