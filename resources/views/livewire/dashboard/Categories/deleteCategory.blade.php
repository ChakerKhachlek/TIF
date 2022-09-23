<div>
    <div wire:ignore.self  class="modal fade " id="deleteCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteCategoryModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="align-items-center d-flex">
                    <h5 class="modal-title" id="deleteCategoryModal">Delete Category</h5>

                    <div class="pl-3" wire:loading wire:target="deleteCategoryMode" >
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
                        You want to delete this category ?
                    </div>





                </div>
                <div class="modal-footer ">


                    <div class="px-2" wire:loading wire:target="deleteCategory" >
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

                    <button type="button" class="btn btn-danger " wire:click="deleteCategory()">Delete</button>


                </div>

            </div>
        </div>
    </div>


  </div>
