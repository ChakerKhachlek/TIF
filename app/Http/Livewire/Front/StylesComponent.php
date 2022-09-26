<?php

namespace App\Http\Livewire\Front;

use App\Models\Style;
use Livewire\Component;
use Livewire\WithPagination;

class StylesComponent extends Component
{

    use WithPagination;


    protected $paginationTheme = 'bootstrap';

    public $selectedId;
    public $selectedStyle;

    public function updatingSelectedId(){
        $this->resetPage();
    }

    public function mount($selected_id){
        $this->selectedId=$selected_id;

    }
    public function render()
    {
        $this->selectedStyle=Style::findOrFail($this->selectedId);
        $tifs= $this->selectedStyle->tifs()->orderBy('created_at','DESC')->paginate(12);
        return view('livewire.front.styles-component',['tifs'=>$tifs]);
    }
}
