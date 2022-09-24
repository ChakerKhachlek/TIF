@extends('front.layouts.layout')
@section('content')
   <!-- content begin -->
   <div class="no-bottom no-top" id="content">
    <div id="top"></div>
    <section id="section-hero" class="no-bottom" aria-label="section">
        <div class="d-carousel">
            <div id="item-carousel-big" class="owl-carousel wow fadeIn">
                @foreach($styles as $style)
                <div class="nft_pic">
                    <a href="dark-item-details.html">
                        <span class="nft_pic_info">
                            <span class="nft_pic_title">{{ $style->name}}</span>

                        </span>
                    </a>
                    <div class="nft_pic_wrap">
                        <img src="{{url('storage/styles_images/'.$style->style_img_link) }}" class="lazy img-fluid" alt="">
                    </div>
                </div>
                @endforeach


            </div>
                <div class="d-arrow-left"><i class="fa fa-angle-left"></i></div>
                <div class="d-arrow-right"><i class="fa fa-angle-right"></i></div>
        </div>
    </section>

    <section id="section-text" style="background-size: cover;">
        <div class="container" style="background-size: cover;">
            <div class="row" style="background-size: cover;">
                <div class="col-lg-12" style="background-size: cover;">
                    <div class="text-center" style="background-size: cover;">
                        <h2>Imagine, Create and Admire</h2>
                        <div class="small-border bg-color-2" style="background-size: cover;"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-sm-30" style="background-size: cover;">
                    <div class="feature-box f-boxed style-3" style="background-size: cover;">
                        <i class="wow fadeInUp bg-color-2 i-boxed icon_wallet animated" style="visibility: visible; animation-name: fadeInUp;"></i>
                        <div class="text" style="background-size: cover;">
                            <h4 class="wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Imagine your TIF</h4>
                            <p class="wow fadeInUp animated" data-wow-delay=".25s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">Have you ever dreamed, imagined or had a memory of a place, person or anything you can imagine.</p>
                        </div>
                        <i class="wm icon_wallet"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-sm-30" style="background-size: cover;">
                    <div class="feature-box f-boxed style-3" style="background-size: cover;">
                        <i class="wow fadeInUp bg-color-2 i-boxed icon_cloud-upload_alt animated" style="visibility: visible; animation-name: fadeInUp;"></i>
                        <div class="text" style="background-size: cover;">
                            <h4 class="wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Speak your mind</h4>
                            <p class="wow fadeInUp animated" data-wow-delay=".25s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">Tell us what you have in your mind and we will create you TIF : A real wallframe with a reference code that is being uploaded to our website for others to admire.</p>
                        </div>
                        <i class="wm icon_cloud-upload_alt"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-sm-30" style="background-size: cover;">
                    <div class="feature-box f-boxed style-3" style="background-size: cover;">
                        <i class="wow fadeInUp bg-color-2 i-boxed icon_tags_alt animated" style="visibility: visible; animation-name: fadeInUp;"></i>
                        <div class="text" style="background-size: cover;">
                            <h4 class="wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Buy a TIF</h4>
                            <p class="wow fadeInUp animated" data-wow-delay=".25s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">You can find a lot of available TIF's imagined and created by our imagineers team.</p>
                        </div>
                        <i class="wm icon_tags_alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-collections" class="pt30">
        <div class="container">

                    <div class="spacer-single"></div>

                    <div class="row wow fadeIn">
                        <div class="col-lg-12">
                            <div class="text-center" style="background-size: cover;">
                                <h2>News Tif's</h2>
                                <div class="small-border bg-color-2" style="background-size: cover;"></div>
                            </div>
                        </div>
                        @foreach($latest_tifs as $tif)
                        <!-- nft item begin -->
                        <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="nft__item style-2">
                                @if($tif->status=="On auction")
                                <div class="de_countdown bg-color-secondary text-white" data-year="{{ $tif->auction_end_date->format('Y') }}" data-month="{{ $tif->auction_end_date->format('m') }}" data-day="{{ $tif->auction_end_date->format('d') }}" data-hour="{{ $tif->auction_end_date_time }}"></div>

                                @endif
                                <div class="author_list_pp">
                                    <a href="dark-author.html">
                                        <img class="lazy" src="{{url('storage/owners_images/'.$tif->owner->owner_img_link) }}" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    <a href="dark-item-details.html">
                                        <img src="{{url('storage/tifs_images/'.$tif->tif_img_url) }}" class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="dark-item-details.html">
                                        <h4>{{ $tif->title }}</h4>
                                    </a>
                                    <div class="nft__item_price">
                                        @if($tif->status=="On auction") Minimum Price :@endif {{ $tif->price }} <span>Dinars</span>
                                    </div>

                                    @if($tif->status=="On auction")
                                    <div class="nft__item_action">
                                        <a href="#">Place a bid</a>
                                    </div>
                                     @elseif($tif->status=="Buyed")
                                     <div class="nft__item_action">
                                        <a href="#">Owned</a>
                                    </div>
                                   @else
                                   <div class="nft__item_action">
                                    <a href="#">Buy now</a>
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

                    <div class="spacer-single"></div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center" style="background-size: cover;">
                                <h2>Hot Categories</h2>
                                <div class="small-border bg-color-2" style="background-size: cover;"></div>
                            </div>
                        </div>
                        <div id="collection-carousel-alt" class="owl-carousel wow fadeIn">

                            @foreach ($categories as $category)
                            <div class="nft_coll style-2">
                                <div class="nft_wrap">
                                    <a href="dark-collection.html"><img src="{{url('storage/categories_images/'.$category->category_img_link) }}" class="lazy img-fluid" alt=""></a>
                                </div>

                                <div class="nft_coll_info mt-3">
                                    <a href="dark-collection.html"><h4>{{ $category->name }}</h4></a>

                                </div>
                            </div>
                            @endforeach




                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center" style="background-size: cover;">
                                    <h2>Top Owners</h2>
                                    <div class="small-border bg-color-2" style="background-size: cover;"></div>
                                </div>
                            </div>
                            <div class="col-md-12 wow fadeIn">
                                <ol class="author_list">
                                    @foreach($top_owners as $owner)
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{url('storage/owners_images/'.$owner->owner_img_link) }}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">{{ $owner->name }}</a>

                                        </div>
                                    </li>
                                    @endforeach

                                </ol>
                            </div>
                        </div>
                </div>
    </section>

</div>
<!-- content close -->

@endsection
