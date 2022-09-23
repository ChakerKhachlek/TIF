
<div>
    <div class="row">
        <div class="col-md-12">
        <div class="h3 text-white">Create Tif</div>
        </div>
    </div>
    <div class="row">
    <div class="col col-md-12">

        <div class="form-group">
        <select name="selected_owner" wire:model.lazy="selected_owner" class="border shadow p-2 bg-white">
            <option value="">Choose the owner</option>
            {{-- selesting series Livewire--}}
            @foreach($owners as $owner)
                <option value={{$owner->id}}>{{ $owner->name }}</option>
            @endforeach
        </select>
        <a href="{{route('owners-management')}}">New</a>
    </div>


        <div class="form-group">
            <label for="name">Title (Required)</label>
            {{-- Name Model Livewire--}}
            <input wire:model.lazy="title" type="text" id="title" class="form-control input-sm" >
         </div>

        <div class="form-group">
            <label for="reference">Reference (Requires 8 characters : Digits and UpperCases)</label>
            {{-- Name Model Livewire--}}
            <input wire:model.lazy="reference" type="text" id="reference" class="form-control input-sm" >
            <div class="btn btn-sm btn-primary" wire:click="generateReference()" > Generate</div>
         </div>

         <label for="tif_img" class="form-label">Image (Required)</label>
         <input wire:model.lazy="tif_img" type="file" id="tif_img" class="form-control mb-2" accept="image/*">

         <div wire:loading wire:target="tif_img">
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
         @if ($tif_img)
         Photo Preview:
         <img src="{{ $tif_img->temporaryUrl() }}"  height="80px" width="80px" class=" mb-3">
     @endif

        <div class="form-group">
            <label for="description">Description </label>
            {{-- Name Model Livewire--}}
            <textarea rows="3" wire:model.lazy="description" type="text" id="description" class="form-control input-sm" ></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price (Required)</label>
            {{-- Name Model Livewire--}}
            <input wire:model.lazy="price" type="number" id="price" class="form-control input-sm"  min="1" >
         </div>

         <div class="form-group">
            <label for="realisation_date">Realisation Date (Required)</label>
            <input wire:model.lazy="realisation_date" type="date" name="realisation_date" />
            <i class="far fa-calendar-alt"></i>
         </div>

         <div class="form-group">
         <select name="status" wire:model="status" class="border shadow p-2 bg-white">
            <option value="">Choose the status</option>
            {{-- selesting series Livewire--}}

                <option value="Available">Available</option>
                <option value="Buyed">Buyed</option>
                <option value="On auction">On auction</option>

        </select>
    </div>

        @if ($this->status=="On auction")
        <div class="form-group">
            <label for="auction_start_date">Auction start date </label>
            <input wire:model="auction_start_date" type="date" name="auction_start_date" />
            <i class="far fa-calendar-alt"></i>
         </div>

         <div class="form-group">
            <label for="auction_duration">Auction Duration </label>
            <input wire:model="auction_duration" type="number" name="auction_duration" min="1" step="1"/>
            <i class="far fa-clock"></i> Hours
         </div>
         <div class="form-group">
            <label for="auction_top_biding_price">Auction Top Biding Price </label>
            <input wire:model="auction_top_biding_price" type="number" name="auction_top_biding_price" /> DT
         </div>
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
