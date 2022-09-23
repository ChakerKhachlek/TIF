
<div>
    <div class="row">
        <div class="col-md-12">
        <div class="h3 text-white">Create Owner</div>
        </div>
    </div>
    <div class="row">
    <div class="col col-md-12">

        <div class="form-group">
            <label for="name">Name (Required)</label>
            {{-- Name Model Livewire--}}
            <input wire:model.lazy="name" type="text" id="name" class="form-control input-sm" >
         </div>

        <div class="form-group">
            <label for="email">Email</label>
            {{-- Name Model Livewire--}}
            <input wire:model.lazy="email" type="text" id="name" class="form-control input-sm" >
         </div>


        <div class="form-group">
            <label for="phone">Phone (Required)</label>
            {{-- Name Model Livewire--}}
            <input wire:model.lazy="phone" type="text" id="name" class="form-control input-sm" >
         </div>

         <label for="owner_img" class="form-label">Image (Required)</label>
         <input wire:model.lazy="owner_img" type="file" id="owner_img" class="form-control mb-2" accept="image/*">

         <div wire:loading wire:target="owner_img">
            <div class="la-line-spin-clockwise-fade-rotating la-light la-md my-3">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
         @if ($owner_img)
         Photo Preview:
         <img src="{{ $owner_img->temporaryUrl() }}"  height="80px" width="80px" class=" mb-3">
     @endif




                {{-- store method Livewire--}}
                <div class="row d-flex justify-content-center">
                <div wire:loading wire:target="store">
                    <div class="la-line-spin-clockwise-fade-rotating la-light la-md my-3">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
                <button wire:click="store()" class="btn btn-success">Add</button>


                {{-- owner storing Livewire--}}




    </div>

    </div>

</div>
