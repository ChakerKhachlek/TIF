<div wire:ignore.self class="modal fade" id="scrollableModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scrollableModalLabel" style="background-size: cover; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" "="" style="background-size: cover;">
      <div class="modal-content" style="background-size: cover;">
        <div class="modal-header" style="background-size: cover;">
          <h5 class="modal-title" id="scrollableModalLabel">Buy</h5>
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
     <row class="text-center ">
        <h5 class="mt-2"> {{  $tif->price }} DT</h5>
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
                                Your demand has been submitted successfully, we will contact you to confirm.
                            </div>
                        </div>
                    @endif

    <row>
    <div class="field-set mt-4">
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
        <div class="field-set mt-2">
            <input type="text" name="facebook_link" id="facebook_link" wire:model.lazy="facebook_link" class="form-control" placeholder="Your Facebook" />
        </div>
        </row>


</div>
</div>
<div class="modal-footer" style="background-size: cover;">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <div wire:loading wire:target="buy">
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

  <button type="button" class="btn btn-main" wire:click="buy">Buy </button>
</div>

@push('scripts')
<script>


Livewire.on('buy-passes', event => {
    $("#scrollableModal").modal('hide');
            $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
    toastr.success(event);
});

</script>
@endpush

</div>
</div>
</div>
