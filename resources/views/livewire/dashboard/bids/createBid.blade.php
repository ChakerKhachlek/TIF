
<div>
    <div class="row">
        <div class="col-md-12">
        <div class="h3 text-white">Create Bid</div>
        </div>
    </div>
    <div class="row">
    <div class="col col-md-12">




        <div class="form-group">
            <label for="name">Name (Required)</label>
            {{-- Name Model Livewire--}}
            <input wire:model.lazy="name" type="text" id="name" class="form-control input-sm" maxlength="24">
         </div>

         <div class="form-group">
            <label for="email">Email (Required)</label>
            {{-- Name Model Livewire--}}
            <input wire:model.lazy="email" type="text" id="email" class="form-control input-sm" maxlength="24">
         </div>
         <div class="form-group">
            <label for="email">Phone (Required)</label>
            {{-- Name Model Livewire--}}
            <input wire:model.lazy="phone" type="text" id="phone" class="form-control input-sm" maxlength="24">
         </div>

        <div class="form-group">
            <label for="bid_price">Bid DT (Required)</label>
            {{-- Name Model Livewire--}}
            <input wire:model.lazy="bid_price" type="number" id="bid" class="form-control input-sm"  min="1" >
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


                {{-- owner storing Livewire--}}




    </div>

    </div>

</div>
