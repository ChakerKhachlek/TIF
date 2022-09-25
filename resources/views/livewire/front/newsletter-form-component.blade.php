<div class="widget">
    <h5>Newsletter</h5>
    <p>Signup for our newsletter to get the latest news in your inbox.</p>
    <div  class="row form-dark" id="form_subscribe" method="post" name="form_subscribe">
        <div class="col text-center">

            <input class="form-control" id="email" name="email" wire:model.lazy="email" placeholder="enter your email" type="text" /> <div href="#" id="btn-subscribe" wire:click="saveEmail"><i class="arrow_right bg-color-secondary"></i></d>
            <div wire:loading wire:target="saveEmail">
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
            <div class="clearfix"></div>

        </div>

    </div> <div class="spacer-10"></div>
    @if (count($errors) > 0)
                <div class="row">
                <div class="alert alert-danger" role="alert" style="background-size: cover;">

                    <strong>Sorry!</strong><br><br>

                        @foreach ($errors->all() as $error)
                           {{ $error }}
                        @endforeach



            </div>
        </div>
            @endif
    <small>Your email is safe with us. We don't spam.</small>

    @push('scripts')
        <script>
            Livewire.on('email-added', event => {
    toastr.success(event);
});
        </script>
    @endpush
</div>
