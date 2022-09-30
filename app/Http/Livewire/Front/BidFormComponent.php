<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class BidFormComponent extends Component
{
    public $tif;
    public $name,$email,$phone,$bid_price,$display;
    public $success;
    public $confirmedBids;


    public function mount(){

    }
    public function render()
    {
        $this->confirmedBids=$this->tif->bids()->where('display','=','1')->latest()->limit(3)->get();

        return view('livewire.front.bid-form-component');
    }

    public function resetInput(){

    $this->email='';
    $this->name='';
    $this->phone='';
    $this->bid_price=null;
    }
    public function placeBid(){
        $this->success=false;
        $now=Carbon::now();
        $bidding_end_date =  Carbon::createFromFormat('Y-m-d H', $this->tif->auction_end_date->format('Y-m-d').' '.$this->tif->auction_end_date_time);

        $this->validate([
        'name'=>"required",
        'email'=>"required|email",
        'phone' => [
            'required',
            'regex:/^[0-9]{8}$/'
        ],
        'bid_price'=>'required|integer'
    ]);

    if($this->bid_price <= $this->tif->auction_top_biding_price){
        throw ValidationException::withMessages(['bid_price' => 'The bid you place must be superior than the highest bidding price']);
    }

    if($now->gt($bidding_end_date)){
        $this->emit('time-passed','Sorry, the auction is the closed !');
        throw ValidationException::withMessages(['' => 'Sorry, the auction is closed.']);

    }else{
        $this->tif->bids()->create([
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'bid_price'=>$this->bid_price
        ]);
        $this->resetInput();
        $this->success=true;
    }



    $this->success = 'Bid created we will contact you to confirm !';
    $this->emit('bid-placed','Bid created we will contact you to confirm !');


    }
}
