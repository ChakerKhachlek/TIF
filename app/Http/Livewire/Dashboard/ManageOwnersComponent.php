<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Owner;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;

class ManageOwnersComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $name, $email, $phone,$owner_img,$selected_id,$selectedOwner;

    // Update create mode variables switchers
    public $createMode = true;
    public $updateMode = false;


    public function render()
    {

        $data=Owner::where('name', 'like', '%'.$this->search.'%')->orWhere('phone', 'like', '%'.$this->search.'%')->orWhere('email', 'like', '%'.$this->search.'%')->paginate(10);

        return view('livewire.dashboard.manage-owners-component',['data'=>$data]);
    }

    // Reseting inputs
    private function resetInput()
    {
        $this->name = null;
        $this->email=null;
        $this->phone=null;
        $this->owner_img=null;
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
            'name' => 'required|unique:owners',
            'phone' => 'required|unique:owners|regex:/^[0-9]{8}$/',
            'owner_img' => 'required|image|max:1024',

        ]);



        $filename= date('YmdHi').$this->owner_img->getClientOriginalName();
        $this->owner_img->storeAs('/public/owners_images', $filename);


        Owner::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone'=>$this->phone,
            'owner_img_link' => $filename,

        ]);

        $this->resetInput();
        $this->emit('owner-created','Owner created successfully !');
    }

    // Edit method
    public function edit($id)
    {
        $record = Owner::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->phone = $record->phone;
        $this->owner_img=$record->owner_img_link;
        $this->updateMode = true;
    }

    // Update method
    public function update()
    {

        if ($this->selected_id) {
            $record = Owner::find($this->selected_id);
            if(!is_string($this->owner_img)){
                $this->validate([
                    'name' => 'required|unique:owners',
                    'phone' => [
                        'required',
                        'regex:/[0-9]{8}/',
                        Rule::unique('owners')->ignore($record->id),
                    ],
                    'owner_img' => 'required|image|max:1024',


                ]);
                $filename= date('YmdHi').$this->owner_img->getClientOriginalName();
                $this->owner_img->storeAs('/public/owners_images', $filename);

                $image_path =public_path()."/storage/owners_images/".$record->owner_img_link ;  // Value is not URL but directory file path
                if(file_exists($image_path)) {

                    unlink($image_path);
                }
                $record->update([
                    'name' => $this->name,
                    'email'=>$this->email,
                    'phone'=>$this->phone,
                    'owner_img_link' => $filename,

                ]);
            }else{
                $this->validate([
                    'name' => 'required',
                    'phone' => [
                        'required',
                        'regex:/[0-9]{8}/',
                        Rule::unique('owners')->ignore($record->id),
                    ],


                ]);
                $record->update([
                    'name' => $this->name,
                    'phone'=>$this->phone,
                    'email'=>$this->email,
                ]);
            }



            $this->resetInput();
            $this->updateMode = false;
        }
        $this->emit('owner-updated','Owner updated successfully !');
    }

    public function deleteOwnerMode($id){
        $this->selectedOwner=$id;
    }
    // Destroy method
    public function deleteOwner()
    {
          // Update create mode variables switchers
     $this->createMode = false;
     $this->updateMode = false;
     $this->resetInput();
        if ($this->selectedOwner) {
            $record = Owner::find($this->selectedOwner);
            $image_path =public_path()."/storage/owners_images/".$record->owner_img_link ;  // Value is not URL but directory file path
            if(file_exists($image_path)) {

                unlink($image_path);
            }
            $record->delete();

        }
        $this->resetInput();
        $this->emit('owner-deleted','Owner deleted successfully !');
    }

    public function export(){

        $data=Owner::all()->sortBy('display_order');
       $pdf = PDF::loadView('PDF.owner-export', compact('data'))->output();

return response()->streamDownload(
    fn () => print($pdf),
    'owners.pdf'
    );

    }
}
