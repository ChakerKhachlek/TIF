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

    <section id="section-collections" class="pt30">
        <div class="container">

                    <div class="spacer-single"></div>

                    <div class="row wow fadeIn">
                        <div class="col-lg-12">
                            <h2 class="style-2">New Items</h2>
                        </div>

                        <!-- nft item begin -->
                        <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="nft__item style-2">
                                <div class="de_countdown bg-color-secondary text-white" data-year="2021" data-month="8" data-day="16" data-hour="8"></div>
                                <div class="author_list_pp">
                                    <a href="dark-author.html">
                                        <img class="lazy" src="{{asset('front/images/author/author-1.jpg')}}" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    <a href="dark-item-details.html">
                                        <img src="{{asset('front/images/items-alt/static-1.jpg')}}" class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="dark-item-details.html">
                                        <h4>Sunny Day</h4>
                                    </a>
                                    <div class="nft__item_price">
                                        0.08 ETH<span>1/20</span>
                                    </div>
                                    <div class="nft__item_action">
                                        <a href="#">Place a bid</a>
                                    </div>
                                    <div class="nft__item_like">
                                        <i class="fa fa-heart"></i><span>50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- nft item begin -->
                        <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="nft__item style-2">
                                <div class="author_list_pp">
                                    <a href="dark-author.html">
                                        <img class="lazy" src="{{asset('front/images/author/author-10.jpg')}}" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    <a href="dark-item-details.html">
                                        <img src="{{asset('front/images/items-alt/static-2.jpg')}}" class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="dark-item-details.html">
                                        <h4>Blue Planet</h4>
                                    </a>
                                    <div class="nft__item_price">
                                        0.06 ETH<span>1/22</span>
                                    </div>
                                    <div class="nft__item_action">
                                        <a href="#">Place a bid</a>
                                    </div>
                                    <div class="nft__item_like">
                                        <i class="fa fa-heart"></i><span>80</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- nft item begin -->
                        <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="nft__item style-2">
                                <div class="de_countdown bg-color-secondary text-white" data-year="2021" data-month="9" data-day="14" data-hour="8"></div>
                                <div class="author_list_pp">
                                    <a href="dark-author.html">
                                        <img class="lazy" src="{{asset('front/images/author/author-11.jpg')}}" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    <a href="dark-item-details.html">
                                        <img src="{{asset('front/images/items-alt/static-3.jpg')}}" class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="dark-item-details.html">
                                        <h4>Finally Free</h4>
                                    </a>
                                    <div class="nft__item_price">
                                        0.05 ETH<span>1/11</span>
                                    </div>
                                    <div class="nft__item_action">
                                        <a href="#">Place a bid</a>
                                    </div>
                                    <div class="nft__item_like">
                                        <i class="fa fa-heart"></i><span>97</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- nft item begin -->
                        <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="nft__item style-2">
                                <div class="author_list_pp">
                                    <a href="dark-author.html">
                                        <img class="lazy" src="{{asset('front/images/author/author-12.jpg')}}" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    <a href="dark-item-details.html">
                                        <img src="{{asset('front/images/items-alt/static-4.jpg')}}" class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="dark-item-details.html">
                                        <h4>Work From Home</h4>
                                    </a>
                                    <div class="nft__item_price">
                                        0.02 ETH<span>1/15</span>
                                    </div>
                                    <div class="nft__item_action">
                                        <a href="#">Place a bid</a>
                                    </div>
                                    <div class="nft__item_like">
                                        <i class="fa fa-heart"></i><span>73</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- nft item begin -->
                        <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="nft__item style-2">
                                <div class="author_list_pp">
                                    <a href="dark-author.html">
                                        <img class="lazy" src="{{asset('front/images/author/author-9.jpg')}}" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    <a href="dark-item-details.html">
                                        <img src="{{asset('front/images/items/anim-4.webp')}}" class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="dark-item-details.html">
                                        <h4>The Truth</h4>
                                    </a>
                                    <div class="nft__item_price">
                                        0.06 ETH<span>1/20</span>
                                    </div>
                                    <div class="nft__item_action">
                                        <a href="#">Place a bid</a>
                                    </div>
                                    <div class="nft__item_like">
                                        <i class="fa fa-heart"></i><span>26</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- nft item begin -->
                        <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="nft__item style-2">
                                <div class="de_countdown bg-color-secondary text-white" data-year="2021" data-month="9" data-day="30" data-hour="8"></div>
                                <div class="author_list_pp">
                                    <a href="dark-author.html">
                                        <img class="lazy" src="{{asset('front/images/author/author-2.jpg')}}" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    <a href="dark-item-details.html">
                                        <img src="{{asset('front/images/items-alt/static-5.jpg')}}" class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="dark-item-details.html">
                                        <h4>Running Puppets</h4>
                                    </a>
                                    <div class="nft__item_price">
                                        0.03 ETH<span>1/24</span>
                                    </div>
                                    <div class="nft__item_action">
                                        <a href="#">Place a bid</a>
                                    </div>
                                    <div class="nft__item_like">
                                        <i class="fa fa-heart"></i><span>45</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- nft item begin -->
                        <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="nft__item style-2">
                                <div class="author_list_pp">
                                    <a href="dark-author.html">
                                        <img class="lazy" src="{{asset('front/images/author/author-3.jpg')}}" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    <a href="dark-item-details.html">
                                        <img src="{{asset('front/images/items-alt/static-6.jpg')}}" class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="dark-item-details.html">
                                        <h4>Green Frogman</h4>
                                    </a>
                                    <div class="nft__item_price">
                                        0.09 ETH<span>1/25</span>
                                    </div>
                                    <div class="nft__item_action">
                                        <a href="#">Place a bid</a>
                                    </div>
                                    <div class="nft__item_like">
                                        <i class="fa fa-heart"></i><span>76</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- nft item begin -->
                        <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="nft__item style-2">
                                <div class="de_countdown bg-color-secondary text-white" data-year="2021" data-month="9" data-day="29" data-hour="8"></div>
                                <div class="author_list_pp">
                                    <a href="dark-author.html">
                                        <img class="lazy" src="{{asset('front/images/author/author-4.jpg')}}" alt="">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                                <div class="nft__item_wrap">
                                    <a href="dark-item-details.html">
                                        <img src="{{asset('front/images/items/anim-5.webp')}}" class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info">
                                    <a href="dark-item-details.html">
                                        <h4>Loop Donut</h4>
                                    </a>
                                    <div class="nft__item_price">
                                        0.09 ETH<span>1/14</span>
                                    </div>
                                    <div class="nft__item_action">
                                        <a href="#">Place a bid</a>
                                    </div>
                                    <div class="nft__item_like">
                                        <i class="fa fa-heart"></i><span>94</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="spacer-single"></div>

                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="style-2">Hot Collections</h2>
                        </div>
                        <div id="collection-carousel-alt" class="owl-carousel wow fadeIn">

                                <div class="nft_coll style-2">
                                    <div class="nft_wrap">
                                        <a href="dark-collection.html"><img src="{{asset('front/images/collections/coll-1.jpg')}}" class="lazy img-fluid" alt=""></a>
                                    </div>
                                    <div class="nft_coll_pp">
                                        <a href="dark-collection.html"><img class="lazy" src="{{asset('front/images/author/author-1.jpg')}}" alt=""></a>
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="nft_coll_info">
                                        <a href="dark-collection.html"><h4>Abstraction</h4></a>
                                        <span>ERC-192</span>
                                    </div>
                                </div>

                                <div class="nft_coll style-2">
                                    <div class="nft_wrap">
                                        <a href="dark-collection.html"><img src="{{asset('front/images/collections/coll-2.jpg')}}" class="lazy img-fluid" alt=""></a>
                                    </div>
                                    <div class="nft_coll_pp">
                                        <a href="dark-collection.html"><img class="lazy" src="{{asset('front/images/author/author-2.jpg')}}" alt=""></a>
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="nft_coll_info">
                                        <a href="dark-collection.html"><h4>Patternlicious</h4></a>
                                        <span>ERC-61</span>
                                    </div>
                                </div>

                                <div class="nft_coll style-2">
                                    <div class="nft_wrap">
                                        <a href="dark-collection.html"><img src="{{asset('front/images/collections/coll-3.jpg')}}" class="lazy img-fluid" alt=""></a>
                                    </div>
                                    <div class="nft_coll_pp">
                                        <a href="dark-collection.html"><img class="lazy" src="{{asset('front/images/author/author-3.jpg')}}" alt=""></a>
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="nft_coll_info">
                                        <a href="dark-collection.html"><h4>Skecthify</h4></a>
                                        <span>ERC-126</span>
                                    </div>
                                </div>

                                <div class="nft_coll style-2">
                                    <div class="nft_wrap">
                                        <a href="dark-collection.html"><img src="{{asset('front/images/collections/coll-4.jpg')}}" class="lazy img-fluid" alt=""></a>
                                    </div>
                                    <div class="nft_coll_pp">
                                        <a href="dark-collection.html"><img class="lazy" src="{{asset('front/images/author/author-4.jpg')}}" alt=""></a>
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="nft_coll_info">
                                        <a href="dark-collection.html"><h4>Cartoonism</h4></a>
                                        <span>ERC-73</span>
                                    </div>
                                </div>

                                <div class="nft_coll style-2">
                                    <div class="nft_wrap">
                                        <a href="dark-collection.html"><img src="{{asset('front/images/collections/coll-5.jpg')}}" class="lazy img-fluid" alt=""></a>
                                    </div>
                                    <div class="nft_coll_pp">
                                        <a href="dark-collection.html"><img class="lazy" src="{{asset('front/images/author/author-5.jpg')}}" alt=""></a>
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="nft_coll_info">
                                        <a href="dark-collection.html"><h4>Virtuland</h4></a>
                                        <span>ERC-85</span>
                                    </div>
                                </div>

                                <div class="nft_coll style-2">
                                    <div class="nft_wrap">
                                        <a href="dark-collection.html"><img src="{{asset('front/images/collections/coll-6.jpg')}}" class="lazy img-fluid" alt=""></a>
                                    </div>
                                    <div class="nft_coll_pp">
                                        <a href="dark-collection.html"><img class="lazy" src="{{asset('front/images/author/author-6.jpg')}}" alt=""></a>
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="nft_coll_info">
                                        <a href="dark-collection.html"><h4>Papercut</h4></a>
                                        <span>ERC-42</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="style-2">Top Sellers</h2>
                            </div>
                            <div class="col-md-12 wow fadeIn">
                                <ol class="author_list">
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-1.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Monica Lucas</a>
                                            <span>3.2 ETH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-2.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Mamie Barnett</a>
                                            <span>2.8 ETH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-3.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Nicholas Daniels</a>
                                            <span>2.5 ETH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-4.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Lori Hart</a>
                                            <span>2.2 ETH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-5.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Jimmy Wright</a>
                                            <span>1.9 ETH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-6.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Karla Sharp</a>
                                            <span>1.6 ETH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-7.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Gayle Hicks</a>
                                            <span>1.5 ETH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-8.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Claude Banks</a>
                                            <span>1.3 ETH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-9.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Franklin Greer</a>
                                            <span>0.9 ETH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-10.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Stacy Long</a>
                                            <span>0.8 ETH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-11.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Ida Chapman</a>
                                            <span>0.6 ETH</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="author_list_pp">
                                            <a href="dark-author.html">
                                                <img class="lazy" src="{{asset('front/images/author/author-12.jpg')}}" alt="">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="author_list_info">
                                            <a href="dark-author.html">Fred Ryan</a>
                                            <span>0.5 eth</span>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                </div>
    </section>

</div>
<!-- content close -->

@endsection
