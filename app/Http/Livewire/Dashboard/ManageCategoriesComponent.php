<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Category;

use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;


class ManageCategoriesComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public  $name, $category_img,$display_order,$selected_id,$selectedCategory;

    // Update create mode variables switchers
    public $createMode = true;
    public $updateMode = false;
    public $display_order_count;

    public function mount(){
        $this->display_order_count=Category::all()->count()+1;
        $this->display_order=$this->display_order_count;
    }
    public function render()
    {

        $data=Category::where('name', 'like', '%'.$this->search.'%')->orderBy('display_order')->paginate(10);

        return view('livewire.dashboard.manage-categories-component',['data'=>$data]);
    }

    // Reseting inputs
    private function resetInput()
    {
        $this->name = null;
        $this->category_img=null;
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
            'name' => 'required|unique:categories',
            'category_img' => 'required|image|max:8192',
            'display_order'=>'required|numeric|unique:categories|gt:0',
        ]);



        $filename= date('YmdHi').$this->category_img->getClientOriginalName();
        $this->category_img->storeAs('/public/categories_images', $filename);


        Category::create([
            'name' => $this->name,
            'category_img_link' => $filename,
            'display_order'=> $this->display_order,
            'views'=>0
        ]);
        $this->display_order_count++;
        $this->resetInput();
        $this->emit('catergory-created','Category created successfully !');
    }

    // Edit method
    public function edit($id)
    {
        $record = Category::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->category_img=$record->category_img_link;
        $this->display_order=$record->display_order;
        $this->updateMode = true;
    }

    // Update method
    public function update()
    {

        if ($this->selected_id) {
            $record = Category::find($this->selected_id);
            if(!is_string($this->category_img)){
                $this->validate([
                    'name'  => [
                        'required',
                        Rule::unique('categories')->ignore($record->id),
                     ] ,
                    'category_img' => 'required|image|max:2048',
                    'display_order'=>[
                        'required',
                        'numeric',
                        'gt:0',
                        Rule::unique('categories')->ignore($this->selected_id),
                ],

                ]);
                $filename= date('YmdHi').$this->category_img->getClientOriginalName();
                $this->category_img->storeAs('/public/categories_images', $filename);

                $image_path =public_path()."/storage/categories_images/".$record->category_img_link ;  // Value is not URL but directory file path
                if(file_exists($image_path)) {

                    unlink($image_path);
                }
                $record->update([
                    'name' => $this->name,
                    'category_img_link' => $filename,
                    'display_order'=>$this->display_order,
                ]);
            }else{
                $this->validate([
                    'name'  => [
                        'required',
                        Rule::unique('categories')->ignore($record->id),
                     ] ,
                    'display_order'=>[
                        'required',
                        'numeric',
                        'gt:0',
                        Rule::unique('categories')->ignore($this->selected_id),
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
        $this->emit('catergory-updated','Category updated successfully !');
    }

    public function deleteCategoryMode($id){
        $this->selectedCategory=$id;
    }
    // Destroy method
    public function deleteCategory()
    {

        if ($this->selectedCategory) {
            $record = Category::find($this->selectedCategory);
            $image_path =public_path()."/storage/categories_images/".$record->category_img_link ;  // Value is not URL but directory file path
            if(file_exists($image_path)) {

                unlink($image_path);
            }
            $record->tifs()->detach();
            $record->delete();

        }
        $this->createMode = true;
        $this->updateMode = false;
        $this->display_order_count--;
        $this->resetInput();
        $this->emit('catergory-deleted','Category deleted successfully !');
    }

    public function export(){

        $data=Category::all()->sortBy('display_order');
       $pdf = PDF::loadView('PDF.category-export', compact('data'))->output();

return response()->streamDownload(
    fn () => print($pdf),
    'categories.pdf'
    );

    }

    public function exportExcel(){

        return Excel::download(new CategoriesExport, 'categories.xlsx');

    }


    public function updatingSearch()
    {
        $this->resetPage();
    }
}
