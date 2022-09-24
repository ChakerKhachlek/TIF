<div >
<div class="row">
    <div class="col-md-10">
        <div class="h3 text-white">Update Owner</div>
    </div>
    <div class="col-md-2">
        <button wire:click="createMode()" class="btn btn-xs btn-primary">Create New</button>
    </div>

</div>
    <div class="row py-3">
        <div class="col-md-12">

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
                    <input wire:model.lazy="title" type="text" id="title" class="form-control input-sm" maxlength="24">
                 </div>

                <div class="form-group">
                    <label for="reference">Reference (Requires 8 characters : Digits and UpperCases)</label>
                    {{-- Name Model Livewire--}}
                    <input wire:model.lazy="reference" type="text" id="reference" class="form-control input-sm" >
                    <div class="row d-flex justify-content-center">
                        <div wire:loading wire:target="generateReference">
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
                 @if (!is_string($tif_img))
                 Photo Preview:
                 <img src="{{ $tif_img->temporaryUrl() }}"  height="80px" width="80px" class=" mb-3">
             @endif

                <div class="form-group">
                    <label for="description">Description </label>
                    {{-- Name Model Livewire--}}
                    <textarea rows="3" wire:model.lazy="description" type="text" id="description" class="form-control input-sm" ></textarea>
                </div>

                <h1 class="text-white">Categories</h1>
                <div class="row my-3">
                    @foreach($categories as $category)
                    <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="{{ $category->id }}" wire:model.lazy="selectedCategories">
                        <label class="form-check-label" for="{{ $category->id }}">
                        {{ $category->name }}
                        </label>
                    </div>
                </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="price">Price (Required)</label>
                    {{-- Name Model Livewire--}}
                    <input wire:model.lazy="price" type="number" id="price" class="form-control input-sm"  min="1" >
                 </div>

                 <div class="form-group">
                    <label for="views_initial_count">Initial views count</label>
                    <input wire:model.lazy="views_initial_count"  type="number" name="views_initial_count" min="1" step="1"/>
                    <i class="far fa-eye"></i>
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
                    <label for="auction_end_date">Auction End Date </label>
                    <input wire:model="auction_end_date" type="date" name="auction_end_date" />
                    <i class="far fa-calendar-alt"></i>
                 </div>

                 <div class="form-group">
                    <label for="auction_end_date_time">Auction End Date Time </label>
                    <input wire:model="auction_end_date_time" type="number" name="auction_end_date_time" min="0" max="24" step="1"/>
                    <i class="far fa-clock"></i> 0-24 Hours
                 </div>
                 <div class="form-group">
                    <label for="auction_top_biding_price">Auction Top Biding Price </label>
                    <input wire:model="auction_top_biding_price" type="number" name="auction_top_biding_price" /> DT
                 </div>
                @endif








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
