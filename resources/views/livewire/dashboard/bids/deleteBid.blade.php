<div>
    <div wire:ignore.self  class="modal fade " id="deleteBidModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteBidModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="align-items-center d-flex">
                    <h5 class="modal-title" id="deleteBidModal">Delete Bid</h5>

                    <div class="pl-3" wire:loading wire:target="deleteBidMode" >
                        <div class="la-line-scale la-dark la-sm">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body pt-3 ">

                    <div class="row justify-content-center">
                        @if (session()->has('pmessage'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                {{ session('pmessage') }}
                            </div>
                         @endif
                    </div>

                    <div class="row justify-content-center text-dark">
                        You want to delete this bid ?
                    </div>





                </div>
                <div class="modal-footer ">


                    <div class="px-2" wire:loading wire:target="deleteBid" >
                        <div class="la-line-spin-clockwise-fade-rotating la-dark ">
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

                    <button type="button" class="btn btn-danger " wire:click="deleteBid()">Delete</button>


                </div>

            </div>
        </div>
    </div>
    <div wire:ignore.self  class="modal fade " id="clearBidModal" tabindex="-1" role="dialog"
    aria-labelledby="clearBidModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="align-items-center d-flex">
                <h5 class="modal-title" id="clearBidModal">Clear tif bids ?</h5>


            </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body pt-3 ">

                <div class="row justify-content-center">
                    @if (session()->has('pmessage'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            {{ session('pmessage') }}
                        </div>
                     @endif
                </div>

                <div class="row justify-content-center text-dark">
                    You want to delete this tif bids history ?
                </div>





            </div>
            <div class="modal-footer ">


                <div class="px-2" wire:loading wire:target="clearBids" >
                    <div class="la-line-spin-clockwise-fade-rotating la-dark ">
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

                <button type="button" class="btn btn-danger " wire:click="clearBids()">Delete</button>


            </div>

        </div>
    </div>
</div>


  </div>
