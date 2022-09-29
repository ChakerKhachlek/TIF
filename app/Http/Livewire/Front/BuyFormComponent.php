<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class BuyFormComponent extends Component
{

    public $tif;
    public $name,$email,$phone,$facebook_link;
    public $success;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone'=>'required|regex:/^[0-9]{8}$/',
        'facebook_link' => 'required|url|regex:/http(?:s):\/\/(?:www\.)facebook\.com\/.+/i',
    ];

    public function render()
    {
        return view('livewire.front.buy-form-component');
    }

    public function resetInput(){

        $this->email='';
        $this->name='';
        $this->phone='';
        $this->facebook_link='';
        }

        public function buy(){
            $this->success=null;
            $this->validate();

    try{ Mail::send('emails.buy-demand',
        array(
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'facebook' => $this->facebook_link,
            'tif_id'=>$this->tif->id,
            'tif_reference'=>$this->tif->reference,
            'tif_status'=>$this->tif->status,
            'tif_title'=>$this->tif->title,
            'tif_price'=>$this->tif->price,
        ),

        function($message){
            $message->from('imagination.factory.2022@gmail.com');
            $message->to('imagination.factory.2022@gmail.com', 'Imagination Factory')->subject('Buying demand !');
        }
    );
    $this->emit('buy-passes','We have receive your request !');
    $this->success = 'We have received your request !';
    $this->resetInput();

    }catch(\Exception $e){
        throw ValidationException::withMessages(['' => 'Error sending demand, contact us through our facebook page.']);
    }



        }
}
