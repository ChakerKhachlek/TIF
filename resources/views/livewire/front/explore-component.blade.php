<div >
        <div class="no-bottom " >
            <div class="row mt-5 text-center align-items-center">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                <div wire:loading wire:target="search"  >
                    <div style="color: #f4696b" class="la-square-jelly-box la-2x">
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
                <div class="col-md-4"></div>
             </div>
			<section >
                <div class="container">
                    <div class="row  ">
                        <div class="col-md-12">

                            <div class="items_filter">
                                <div  class="row form-dark" id="form_quick_search"  name="form_quick_search">
                                    <div class="col text-center">
                                        <input  wire:model.debounce.500ms="search" class="form-control" id="name_1" name="name_1" placeholder="reference, title, owner, style, category..." type="text" /> <a href="#" id="btn-submit" ><i class="fa fa-search " style="background-color:#F44336"></i></a>

                                        <div class="clearfix"></div>
                                    </div>

                                </div>



                                <div id="items_type"  class="dropdown">


                                    <a  href="#" class="btn-selector">{{ $statusfilter }}</a>
                                    <ul>
                                        <li wire:click="filterAll"><span>All</span></li>
                                        <li wire:click="filterAvailable"><span>Available</span></li>
                                        <li wire:click="filterOnAuction"><span>On auction</span></li>
                                        <li wire:click="filterBuyed"><span>Buyed</span></li>
                                    </ul>
                                </div>





                            </div>
                        </div>





                        @if($data->count() > 0)

                        @foreach($data as $tif)
                        <!-- nft item begin -->
                        <div class="col-md-3 col-sm-6 col-xs-12" wire:key="tif-{{ $tif->id }}">
                            <div class="nft__item style2">
                                <div class="author_list_pp">
                                    <a href="{{ route('owner.show',[$tif->owner->id, $tif->owner->name])}}">
                                        <img class="lazy" src="{{url('storage/owners_images/'.$tif->owner->owner_img_link) }}" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    <a href="{{ route('tif.show',[$tif->id, $tif->slug])}}">
                                        <img src="{{url('storage/tifs_images/'.$tif->tif_img_url) }}" class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="{{ route('tif.show',[$tif->id, $tif->slug])}}">
                                        <h4>{{ $tif->title }}</h4>
                                    </a>

                                    @if($tif->status=="On auction")
                                    <div class="nft__item_price">
                                        Minimum Price : {{ $tif->price }} <span>Dinars</span>
                                   </div>
                                   @else
                                    <div class="nft__item_price">
                                        {{ $tif->price }} <span>Dinars</span>
                                    </div>
                                    @endif

                                    @if($tif->status=="On auction")
                                    <div class="nft__item_action">
                                        <a href="{{ route('tif.show',[$tif->id, $tif->slug])}}">Bid <span> ( Current {{ $tif->auction_top_biding_price }} DT )</span></a>
                                    </div>
                                     @elseif($tif->status=="Buyed")
                                     <div class="nft__item_action">
                                        <a href="{{ route('tif.show',[$tif->id, $tif->slug])}}">Owned</a>
                                    </div>
                                   @else
                                   <div class="nft__item_action">
                                    <a href="{{ route('tif.show',[$tif->id, $tif->slug])}}">Buy now</a>
                                </div>
                                    @endif



                                    <div class="nft__item_like">
                                       <i class="fa fa-eye"></i><span>{{ $tif->views }}</span>
                                    </div>
                                    <span class="text-white">Reference : {{ $tif->reference }}</span>
                                </div>
                            </div>
                        </div>




                    @endforeach

               </div>
               <div class="row d-flex  ">
                <div class="col-lg-6 pagination justify-content-center">
                    <div class=" " style="background-size: cover;">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
            @else
                No results !
            @endif

                </div>
            </section>

        </div>

        @push('styles')
<style>
    .la-square-jelly-box,
.la-square-jelly-box > div {
    position: relative;
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
}
.la-square-jelly-box {
    display: block;
    font-size: 0;
    color: #fff;
}
.la-square-jelly-box.la-dark {
    color: #333;
}
.la-square-jelly-box > div {
    display: inline-block;
    float: none;
    background-color: currentColor;
    border: 0 solid currentColor;
}
.la-square-jelly-box {
    width: 32px;
    height: 32px;
}
.la-square-jelly-box > div:nth-child(1),
.la-square-jelly-box > div:nth-child(2) {
    position: absolute;
    left: 0;
    width: 100%;
}
.la-square-jelly-box > div:nth-child(1) {
    top: -25%;
    z-index: 1;
    height: 100%;
    border-radius: 10%;
    -webkit-animation: square-jelly-box-animate .6s -.1s linear infinite;
       -moz-animation: square-jelly-box-animate .6s -.1s linear infinite;
         -o-animation: square-jelly-box-animate .6s -.1s linear infinite;
            animation: square-jelly-box-animate .6s -.1s linear infinite;
}
.la-square-jelly-box > div:nth-child(2) {
    bottom: -9%;
    height: 10%;
    background: #000;
    border-radius: 50%;
    opacity: .2;
    -webkit-animation: square-jelly-box-shadow .6s -.1s linear infinite;
       -moz-animation: square-jelly-box-shadow .6s -.1s linear infinite;
         -o-animation: square-jelly-box-shadow .6s -.1s linear infinite;
            animation: square-jelly-box-shadow .6s -.1s linear infinite;
}
.la-square-jelly-box.la-sm {
    width: 16px;
    height: 16px;
}
.la-square-jelly-box.la-2x {
    width: 64px;
    height: 64px;
}
.la-square-jelly-box.la-3x {
    width: 96px;
    height: 96px;
}
/*
 * Animations
 */
@-webkit-keyframes square-jelly-box-animate {
    17% {
        border-bottom-right-radius: 10%;
    }
    25% {
        -webkit-transform: translateY(25%) rotate(22.5deg);
                transform: translateY(25%) rotate(22.5deg);
    }
    50% {
        border-bottom-right-radius: 100%;
        -webkit-transform: translateY(50%) scale(1, .9) rotate(45deg);
                transform: translateY(50%) scale(1, .9) rotate(45deg);
    }
    75% {
        -webkit-transform: translateY(25%) rotate(67.5deg);
                transform: translateY(25%) rotate(67.5deg);
    }
    100% {
        -webkit-transform: translateY(0) rotate(90deg);
                transform: translateY(0) rotate(90deg);
    }
}
@-moz-keyframes square-jelly-box-animate {
    17% {
        border-bottom-right-radius: 10%;
    }
    25% {
        -moz-transform: translateY(25%) rotate(22.5deg);
             transform: translateY(25%) rotate(22.5deg);
    }
    50% {
        border-bottom-right-radius: 100%;
        -moz-transform: translateY(50%) scale(1, .9) rotate(45deg);
             transform: translateY(50%) scale(1, .9) rotate(45deg);
    }
    75% {
        -moz-transform: translateY(25%) rotate(67.5deg);
             transform: translateY(25%) rotate(67.5deg);
    }
    100% {
        -moz-transform: translateY(0) rotate(90deg);
             transform: translateY(0) rotate(90deg);
    }
}
@-o-keyframes square-jelly-box-animate {
    17% {
        border-bottom-right-radius: 10%;
    }
    25% {
        -o-transform: translateY(25%) rotate(22.5deg);
           transform: translateY(25%) rotate(22.5deg);
    }
    50% {
        border-bottom-right-radius: 100%;
        -o-transform: translateY(50%) scale(1, .9) rotate(45deg);
           transform: translateY(50%) scale(1, .9) rotate(45deg);
    }
    75% {
        -o-transform: translateY(25%) rotate(67.5deg);
           transform: translateY(25%) rotate(67.5deg);
    }
    100% {
        -o-transform: translateY(0) rotate(90deg);
           transform: translateY(0) rotate(90deg);
    }
}
@keyframes square-jelly-box-animate {
    17% {
        border-bottom-right-radius: 10%;
    }
    25% {
        -webkit-transform: translateY(25%) rotate(22.5deg);
           -moz-transform: translateY(25%) rotate(22.5deg);
             -o-transform: translateY(25%) rotate(22.5deg);
                transform: translateY(25%) rotate(22.5deg);
    }
    50% {
        border-bottom-right-radius: 100%;
        -webkit-transform: translateY(50%) scale(1, .9) rotate(45deg);
           -moz-transform: translateY(50%) scale(1, .9) rotate(45deg);
             -o-transform: translateY(50%) scale(1, .9) rotate(45deg);
                transform: translateY(50%) scale(1, .9) rotate(45deg);
    }
    75% {
        -webkit-transform: translateY(25%) rotate(67.5deg);
           -moz-transform: translateY(25%) rotate(67.5deg);
             -o-transform: translateY(25%) rotate(67.5deg);
                transform: translateY(25%) rotate(67.5deg);
    }
    100% {
        -webkit-transform: translateY(0) rotate(90deg);
           -moz-transform: translateY(0) rotate(90deg);
             -o-transform: translateY(0) rotate(90deg);
                transform: translateY(0) rotate(90deg);
    }
}
@-webkit-keyframes square-jelly-box-shadow {
    50% {
        -webkit-transform: scale(1.25, 1);
                transform: scale(1.25, 1);
    }
}
@-moz-keyframes square-jelly-box-shadow {
    50% {
        -moz-transform: scale(1.25, 1);
             transform: scale(1.25, 1);
    }
}
@-o-keyframes square-jelly-box-shadow {
    50% {
        -o-transform: scale(1.25, 1);
           transform: scale(1.25, 1);
    }
}
@keyframes square-jelly-box-shadow {
    50% {
        -webkit-transform: scale(1.25, 1);
           -moz-transform: scale(1.25, 1);
             -o-transform: scale(1.25, 1);
                transform: scale(1.25, 1);
    }
}
</style>
        @endpush
    </div>
