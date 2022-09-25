<div wire:ignore.self class="modal fade" id="scrollableModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scrollableModalLabel" style="background-size: cover; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" "="" style="background-size: cover;">
      <div class="modal-content" style="background-size: cover;">
        <div class="modal-header" style="background-size: cover;">
          <h5 class="modal-title" id="scrollableModalLabel">Place a bid</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    <div class="modal-body" style="background-size: cover;">
        <div class="container">
    <row class="text-center">
        <h2>{{ $tif->title }} ({{ $tif->reference }})</h2>

    </row>
    <row>
        <img class="lazy img-fluid" src="{{url('storage/owners_images/'.$tif->owner->owner_img_link) }}" alt="">
    </row>

    @if (count($errors) > 0)
    <div class="row mt-3">
    <div class="alert alert-danger" role="alert" style="background-size: cover;">


        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Sorry!</strong><br><br>
        <ul style="list-style-type:none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        </div>
        @endif

        @if (!empty($success))
                        <div class="row mt-3 justify-content-center ">
                            <div class="alert alert-success" role="alert" style="background-size: cover;">
                                Your bid has been submitted successfully, we will contact you to confirm.
                            </div>
                        </div>
                    @endif

    <row>
    <div class="field-set mt-2">
        <input type="text" name="name" id="name" wire:model.lazy="name" class="form-control" placeholder="Your Name" />
    </div>
    </row>

    <row>
    <div class="field-set mt-2">
        <input type="text" name="email" id="email" wire:model.lazy="email" class="form-control" placeholder="Your Email" />
    </div>
    </row>

    <row>
    <div class="field-set mt-2">
        <input type="text" name="phone" id="phone" wire:model.lazy="phone" class="form-control" placeholder="Your Phone" />
    </div>
    </row>

    <row>
    <div class="field-set my-2">
        <input wire:model.lazy="bid_price" type="number" id="bid_price" class="form-control input-sm"  placeholder=" {{ $tif->auction_top_biding_price+1 }}" min="{{ $tif->auction_top_biding_price+1 }}" >
    </div>
    </row>
        <h4>Current bid : {{ $tif->auction_top_biding_price }} Dt</p>

</div>
</div>
<div class="modal-footer" style="background-size: cover;">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <div wire:loading wire:target="placeBid">
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

  <button type="button" class="btn btn-main" wire:click="placeBid">Bid</button>
</div>

@push('scripts')
<script>


Livewire.on('bid-placed', event => {
    toastr.success(event);
});

Livewire.on('time-passed', event => {
    toastr.warning(event);
});


</script>
@endpush

</div>
</div>
</div>
