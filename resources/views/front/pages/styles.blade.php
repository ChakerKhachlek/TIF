@extends('front.layouts.layout')
@section('content')



<section id="subheader" class="text-light" data-bgimage="url({{ asset('front/images/background/subheader-dark.jpg') }}) top">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center">
                    <h1>Styles</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

@livewire('front.styles-component',['selected_id'=>$selected_id])


@endsection
