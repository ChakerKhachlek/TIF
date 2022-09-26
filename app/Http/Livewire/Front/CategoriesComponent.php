<?php

namespace App\Http\Livewire\Front;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesComponent extends Component
{
    use WithPagination;


    protected $paginationTheme = 'bootstrap';

    public $selectedId;
    public $selectedCategory;
    public $categories;

    public function updatingSelectedId(){
        $this->resetPage();
    }

    public function mount($selected_id){
        $this->selectedId=$selected_id;
        $this->categories=Category::all()->sortBy('name');


    }



    public function render()
    {
        $this->selectedCategory=Category::findOrFail($this->selectedId);
        $tifs= $this->selectedCategory->tifs()->orderBy('created_at','DESC')->paginate(1);
        return view('livewire.front.categories-component',["tifs"=>$tifs]);
    }
}
