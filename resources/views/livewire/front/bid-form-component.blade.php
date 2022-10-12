<div>

    <div>
        <div wire:poll.3000ms>
            <button class="btn-main" href="#"  data-bs-toggle="modal" data-bs-target="#scrollableModal">Place a bid <span> ( Current {{ $tif->auction_top_biding_price }} DT )</span></button>


    </div>

    <div class="row mt-5 ">
        <h3>Bidding history</h3>
    </div>
    <div class="row ">
        <div class="col-md-2">
            <div class="lds-ripple"><div></div><div></div></div>

        </div>

        <div class="col-md-10">
        <table class="table responsive text-white table-borderless">
<thead>
    <th >Name</th>
    <th>Bid</th>
    <th>Placed at</th>
</thead>
<tbody>
    @foreach($confirmedBids as $bid)
    <tr>
    <td>{{ $bid->name }}</td>
    <td>{{ $bid->bid_price }} DT</td>
    <td>{{ $bid->created_at->format('H:i:s d M Y') }}</td>
</tr>
    @endforeach

</tbody>

        </table>

        </div>
    </div>



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
        <img class="lazy img-fluid" src="{{url('storage/tifs_images/'.$tif->tif_img_url) }}" alt="">
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

    <div class="row mt-2" >
    <div class="field-set mt-2">
        <input type="text" name="name" id="name" wire:model.lazy="name" class="form-control" placeholder="Your Name" />
    </div>
    </div>

    <div class="row mt-2" >
    <div class="field-set mt-2">
        <input type="text" name="email" id="email" wire:model.lazy="email" class="form-control" placeholder="Your Email" />
    </div>
    </div>

    <div class="row mt-2" >
    <div class="field-set mt-2">
        <input type="text" name="phone" id="phone" wire:model.lazy="phone" class="form-control" placeholder="Your Phone" />
    </div>
    </div>

    <div class="row mt-2" >
    <div class="field-set my-2">
        <input wire:model.lazy="bid_price" type="number" id="bid_price" class="form-control input-sm"  placeholder=" {{ $tif->auction_top_biding_price+1 }}" min="{{ $tif->auction_top_biding_price+1 }}" >
    </div>
    </div>
    <div class="row mt-2" >
<div class="col-md-2"><div class="lds-ripple"><div></div><div></div></div></div>
<div class="col-md-1"></div>
<div class="col-md-8 my-auto"> <h4 class="align-middle">Current bid : {{ $tif->auction_top_biding_price }} Dt</p></div>
    </div>


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
@push('styles')
<style>
.lds-ripple {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
  }
  .lds-ripple div {
    position: absolute;
    border: 4px solid #fff;
    opacity: 1;
    border-radius: 50%;
    animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
  }
  .lds-ripple div:nth-child(2) {
    animation-delay: -0.5s;
  }
  @keyframes lds-ripple {
    0% {
      top: 36px;
      left: 36px;
      width: 0;
      height: 0;
      opacity: 0;
    }
    4.9% {
      top: 36px;
      left: 36px;
      width: 0;
      height: 0;
      opacity: 0;
    }
    5% {
      top: 36px;
      left: 36px;
      width: 0;
      height: 0;
      opacity: 1;
    }
    100% {
      top: 0px;
      left: 0px;
      width: 72px;
      height: 72px;
      opacity: 0;
    }
  }
</style>
@endpush
</div>
</div>
</div>

</div>
</div>
