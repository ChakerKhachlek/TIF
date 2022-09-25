<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ContactUsComponent extends Component
{
    public function render()
    {
        return view('livewire.front.contact-us-component');
    }
    public $name,$email,$phone,$comment;

    public $success;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone'=>'required|min:2',
        'comment' => 'required|min:2',
    ];
    private function clearFields()
    {

        $this->name = '';
        $this->email = '';
        $this->phone='';
        $this->comment = '';


    }

    public function sendEmail(){
        $this->success=null;
        $this->validate();

try{ Mail::send('emails.contact-form',
    array(
        'name' => $this->name,
        'email' => $this->email,
        'phone' => $this->phone,
        'comment' => $this->comment,
    ),

    function($message){
        $message->from('imagination.factory.2022@gmail.com');
        $message->to('imagination.factory.2022@gmail.com', 'Imagination Factory')->subject('Contact Form Message');
    }
);
$this->success = 'Thank you for reaching out to us!';
$this->clearFields();

}catch(\Exception $e){
    throw ValidationException::withMessages(['' => 'Error sending email, contact us through our facebook page.']);
}



    }
}
