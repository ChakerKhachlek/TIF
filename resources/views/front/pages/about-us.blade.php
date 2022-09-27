@extends('front.layouts.layout')
@section('content')
 <!-- section begin -->
 <section id="subheader" class="text-light" data-bgimage="url({{ asset('front/images/background/subheader-dark.jpg') }}) top">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center">
                    <h1>About Us</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
<!-- section close -->
 <!-- section begin -->
 <section id="section-hero" aria-label="section" class="text-light overflow-hidden" >

    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="text_top">
                   <p class="lead">Have you ever dreamed or fantasized a commodity, a moment, a desire or even a story, fantasized about something that you wanted to picture and hold as a reality in your hands ?
                    </br></br>What if we tell you that we care about your fascinations and that we are able to make it real.
                </br></br> All you have to do is to describe what you saw or want to have and we will translate it on wallframe for you.
            </br></br>  An exceptional and unique piece of art that we create and carefully concept, guaranteeing your solitary ownership towards it that will be manifested on our website for others to catch sight.
        </br></br>   Do not hesitate on making your dreams come true.
                    </br></br> Contact us we will illustrate your dream for you with love Imagination Factory</p>
                    <div class="spacer-20"></div>
                    <a href="{{ route('home') }}" class="btn-main">Explore</a>&nbsp;&nbsp;
                    <a href="http://m.me/ImaginationFactoryTunisia" class="btn-main btn-white" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Have a conversation with an imagineer">Create</a>

                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</section>
<!-- section close -->
@endsection
