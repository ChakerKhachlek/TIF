<?php

namespace App\Http\Livewire\Front;

use App\Models\Newsletter;
use Livewire\Component;

class NewsletterFormComponent extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.front.newsletter-form-component');
    }

    public function saveEmail(){
        $this->validate([
            'email'=>'required|email'
        ]);
        $record=Newsletter::where('email','=',$this->email)->get();
        if($record->count() >0){

        }else{
            Newsletter::create([
                'email'=>$this->email
            ]);
        }

        $this->email='';
        $this->emit('email-added','You are subscribed to our newsletter !');
    }
}
