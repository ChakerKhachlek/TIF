<?php

namespace App\Http\Livewire\Front;

use App\Models\Tif;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class MuseumComponent extends Component
{

   use WithPagination;


   protected $paginationTheme = 'bootstrap';

    public $statusfilter=["All","Available","On auctio","Buyed"];
    public $categories;
    public $selectedCategoryId;
    public $selectedCategoryName="All";

    public $search;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount(){
        $this->categories=Category::all();
        $this->statusfilter="All";
       
    }
    public function updatingSearch()
    {
   
        $this->resetPage();
    }


    public function render()
    {  
        
        if($this->statusfilter=="All"){
            $data=Tif::where('title', 'like', '%'.$this->search.'%')->orWhere('reference', 'like', '%'.$this->search.'%')
            ->orWhereHas('categories', function ($query){
                $query->where('name', 'like', '%'.$this->search.'%');
            }) ->orWhereHas('owner', function ($query){
                $query->where('name', 'like', '%'.$this->search.'%');
            }) ->orWhereHas('style', function ($query){
                $query->where('name', 'like', '%'.$this->search.'%');
            })->orderBy('created_at','DESC')->paginate(12);
        }
        else if($this->statusfilter=="Available"){
          
            $data=Tif::where('status', '=', "Available")
            ->where(function($query) 
            { 
                $query->where('title', 'like', '%'.$this->search.'%')
                ->orWhere('reference', 'like', '%'.$this->search.'%')
                ->orWhereHas('owner', function ($query){
                    $query->where('name', 'like', '%'.$this->search.'%');
                }) ->orWhereHas('style', function ($query){
                    $query->where('name', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('categories', function ($query){
                    $query->where('name', 'like', '%'.$this->search.'%');
                });
            })
                ->orderBy('created_at','DESC')
                ->paginate(12);
        }else if($this->statusfilter=="On auction"){

            $data=Tif::where('status', '=', "On auction") ->where(function($query)
            { 
                $query->where('title', 'like', '%'.$this->search.'%')
                ->orWhere('reference', 'like', '%'.$this->search.'%')
                ->orWhereHas('owner', function ($query){
                    $query->where('name', 'like', '%'.$this->search.'%');
                }) ->orWhereHas('style', function ($query){
                    $query->where('name', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('categories', function ($query){
                    $query->where('name', 'like', '%'.$this->search.'%');
                });
            })
                ->orderBy('created_at','DESC')
                ->paginate(12);
              }else if($this->statusfilter=="Buyed"){

            $data=Tif::where('status', '=', "Buyed") ->where(function($query)
            { 
                $query->where('title', 'like', '%'.$this->search.'%')
                ->orWhere('reference', 'like', '%'.$this->search.'%')
                ->orWhereHas('owner', function ($query){
                    $query->where('name', 'like', '%'.$this->search.'%');
                }) ->orWhereHas('style', function ($query){
                    $query->where('name', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('categories', function ($query){
                    $query->where('name', 'like', '%'.$this->search.'%');
                });
            })
                ->orderBy('created_at','DESC')
                ->paginate(12);  }


        return view('livewire.front.museum-component',['data'=>$data]);
    }

 

    public function filterCategory($id,$name){
        $this->resetPage();
        $this->selectedCategoryId=$id;
        $this->selectedCategoryName=$name;
    }

    public function filterAll(){
        $this->resetPage();
        $this->statusfilter="All";
        
    }

    public function filterAvailable(){
        $this->resetPage();
        $this->statusfilter="Available";
    }

    public function filterOnAuction(){
        $this->resetPage();
        $this->statusfilter="On auction";
    }

    public function filterBuyed(){
        $this->resetPage();
        $this->statusfilter="Buyed";
    }
}
