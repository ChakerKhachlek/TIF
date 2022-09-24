
<div>
    <div class="row">
        <div class="col-md-12">
        <div class="h3 text-white">Create Style</div>
        </div>
    </div>
    <div class="row">
    <div class="col col-md-12">

        <div class="form-group">
            <label for="name">Name (Required)</label>
            {{-- Name Model Livewire--}}
            <input wire:model.lazy="name" type="text" id="name" class="form-control input-sm" >
         </div>


         <label for="style_img" class="form-label">Image (Required)</label>
         <input wire:model.lazy="style_img" type="file" id="style_img" class="form-control mb-2" accept="image/*">
         <div wire:loading wire:target="style_img">
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
         @if ($style_img)
         Photo Preview:
         <img src="{{ $style_img->temporaryUrl() }}"  height="80px" width="80px" class=" mb-3">
     @endif



        <div class="form-group">
            <label for="display_order">Display Order (Required)</label>
            <input wire:model.lazy="display_order" type="number" id="display_order" class="form-control input-sm"  min="1">
           </div>
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


                {{-- category storing Livewire--}}




    </div>

    </div>

</div>
