<div >
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="text-light" data-bgimage="url({{ asset('front/images/background/subheader-dark.jpg') }}) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h1>Contact Us</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
    </section>
    <!-- section close -->


    <section aria-label="section">
        <div class="container">
                <div class="row">

                    <div class="col-lg-8 mb-sm-30">
                    <h3>Do you have any question?</h3>

                    <div  class="form-border" >
                        <div class="field-set">
                            <input type="text" name="name" id="name" wire:model.lazy="name" class="form-control" placeholder="Your Name" />
                        </div>

                        <div class="field-set">
                            <input type="text" name="email" id="email" wire:model.lazy="email" class="form-control" placeholder="Your Email" />
                        </div>

                        <div class="field-set">
                            <input type="text" name="phone" id="phone" wire:model.lazy="phone" class="form-control" placeholder="Your Phone" />
                        </div>

                        <div class="field-set">
                            <textarea name="message" id="message" wire:model.lazy="comment" class="form-control" placeholder="Your Message"></textarea>
                        </div>

                        <div class="spacer-half"></div>
                         {{-- store method Livewire--}}
                <div class="row d-flex justify-content-center">
                    <div wire:loading wire:target="sendEmail">
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

                @if (count($errors) > 0)
                <div class="row">
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

                        <div >
                            <button  wire:click="sendEmail" class="btn btn-main" >Send</button>
                        </div>
                        @if (!empty($success))
                        <div class="d-flex justify-content-center ">
                            <div class="alert alert-success" role="alert" style="background-size: cover;">

                                Your message has been sent successfully.
                            </div>
                        </div>
                    @endif


                    </div>
                </div>

                <div class="col-lg-4">


                    <div class="padding40 bg-color text-light box-rounded">
                        <h3>Info</h3>
                        <address class="s1">
                            <span><i class="fa fa-facebook fa-lg"></i><a href="https://www.facebook.com/ImaginationFactoryTunisia">Facebook</a></span>
                            <span><i class="fa fa-map-marker fa-lg"></i>Carthage, Tunisia</span>
                            <span><i class="fa fa-phone fa-lg"></i>+56 130 418</span>
                            <span><i class="fa fa-envelope-o fa-lg"></i><button onclick="copy()" class="btn btn-sm btn-main">Copy</button></span>

                        </address>
                    </div>

                </div>

                </div>
            </div>

    </section>
    @push('scripts')
    <script>

function copy() {


  navigator.clipboard.writeText("imagination.factory.2022@gmail.com");


  toastr.success("Copied the email");
}

    </script>
    @endpush
</div>

