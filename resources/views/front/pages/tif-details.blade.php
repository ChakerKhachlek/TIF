@extends('front.layouts.layout')
@section('content')
<!-- content begin -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>


    <section aria-label="section" class="mt90 sm-mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="{{url('storage/tifs_images/'.$tif->tif_img_url) }}" class="img-fluid img-rounded mb-sm-30" alt="">
                </div>
                <div class="col-md-6">
                    <div class="item_info">
                        @if($tif->status=="On auction")
                        Auctions ends in <div class="de_countdown" data-year="{{ $tif->auction_end_date->format('Y') }}" data-month="{{ $tif->auction_end_date->format('m') }}" data-day="{{ $tif->auction_end_date->format('d') }}" data-hour="{{ $tif->auction_end_date_time }}"></div>
                        @endif
                        <h2>{{ $tif->title }}</h2>
                        <div class="item_info_counts">
                            <div class="item_info_type"><i class="fa fa-image"></i>{{ $tif->style->name }}</div>
                            <div class="item_info_views"><i class="fa fa-eye"></i>{{ $tif->views }}</div>

                        </div>
                        @if(!empty($tif->description))
                        <p>{{ $tif->description }}</p>
                        @endif


                        <h6>Owner</h6>
                        <div class="item_author">
                            <div class="author_list_pp">
                                <a href="{{ route('owner.show',[$tif->owner->id, $tif->owner->name])}}">
                                    <img class="lazy" src="{{url('storage/owners_images/'.$tif->owner->owner_img_link) }}" alt="">
                                    <i class="fa fa-check"></i>
                                </a>
                            </div>
                            <div class="author_list_info">
                                <a href="{{ route('owner.show',[$tif->owner->id, $tif->owner->name])}}">{{ $tif->owner->name }}</a>
                            </div>
                        </div>

                        <div class="spacer-40"></div>

                        <div class="de_tab tab_simple">

                        <ul class="de_nav">
                            @foreach($tif->categories as $category)
                            <li ><span><a href="#" class="text-white">{{ $category->name }} </a></span></li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="spacer-40"></div>


                    @if($tif->status=="On auction")
                    <a class="btn-main" href="#">Place a bid <span> ( Current {{ $tif->auction_top_biding_price }} DT )</span></a>
                     @elseif($tif->status=="Buyed")
                     <a class="btn-main" href="#">Owned</a>
                   @else
                   <a class="btn-main" href="#">Buy now <span>{{ $tif->price }} DT</span></a>

                    @endif

                    <div class="spacer-40"></div>
                    <h5>Created at {{ $tif->realisation_date->format('d') }} day of {{ $tif->realisation_date->format('F') }} in the year {{ $tif->realisation_date->format('Y') }}</h5>
                    <div class="spacer-40"></div>
                    <h6 >Reference : {{ $tif->reference }}</h6>

                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
<!-- content close -->


@endsection
