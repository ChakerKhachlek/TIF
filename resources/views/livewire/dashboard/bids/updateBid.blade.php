<div >
<div class="row">
    <div class="col-md-10">
        <div class="h3 text-white">Update Bid</div>
    </div>
    <div class="col-md-2">
        <button wire:click="createMode()" class="btn btn-xs btn-primary">Create New</button>
    </div>

</div>
    <div class="row py-3">
        <div class="col-md-12">

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
                <input wire:model.lazy="bid_price" type="number" id="bid_price" class="form-control input-sm"  min="1" >
             </div>


                        {{-- store method Livewire--}}
                        <div class="row d-flex justify-content-center">
                        <div wire:loading wire:target="update">
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


                        {{-- owner storing Livewire--}}

    <button wire:click="update()" class="btn btn-default">Update</button>
    {{-- owner updating Livewire--}}



        </div>

    </div>



</div>
