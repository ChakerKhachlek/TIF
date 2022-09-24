@extends('front.layouts.layout')
@section('content')
  <!-- content begin -->
  <div class="no-bottom no-top" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="profile_banner" aria-label="section" class="text-light" data-bgimage="url({{ asset('cover.png') }}) top">

    </section>
    <!-- section close -->


    <section aria-label="section" class="d_coll no-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class="d_profile">
                            <div class="profile_avatar">
                                <div class="d_profile_img">
                                    <img src="{{url('storage/owners_images/'.$owner->owner_img_link) }}" alt="">
                                    <i class="fa fa-check"></i>
                                </div>

                                <div class="profile_name">
                                    <h4>
                                        {{ $owner->name }}
                                        <div class="clearfix"></div>


                                    </h4>
                                </div>
                            </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="de_tab tab_simple">

                        <div class="row">
                            @foreach($owner->tifs as $tif)
                            <!-- nft item begin -->
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="nft__item">
                                    @if($tif->status=="On auction")
                                    <div class="de_countdown" data-year="{{ $tif->auction_end_date->format('Y') }}" data-month="{{ $tif->auction_end_date->format('m') }}" data-day="{{ $tif->auction_end_date->format('d') }}" data-hour="{{ $tif->auction_end_date_time }}"></div>
                                    @endif
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
                                        <div class="nft__item_price">
                                            @if($tif->status=="On auction") Minimum Price :@endif {{ $tif->price }} <span>Dinars</span>
                                        </div>
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

                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
<!-- content close -->

@endsection
