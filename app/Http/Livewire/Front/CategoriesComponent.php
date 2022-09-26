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

    public function updatingSelectedId(){
        $this->resetPage();
    }

    public function mount($selected_id){
        $this->selectedId=$selected_id;

    }



    public function render()
    {
        $this->selectedCategory=Category::findOrFail($this->selectedId);
        $tifs= $this->selectedCategory->tifs()->orderBy('created_at','DESC')->paginate(12);
        return view('livewire.front.categories-component',["tifs"=>$tifs]);
    }
}
