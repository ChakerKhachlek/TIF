<div>

<section id="section-collections">
    <div class="container">


                <div class="row ">
                    <div class="col-lg-12">
                        <div class="text-center" style="background-size: cover;">
                            <h2>{{ $selectedCategory->name }} Category</h2>
                            <div class="small-border bg-color-2" style="background-size: cover;"></div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    @if($tifs->count() > 0)
                    @foreach($tifs as $tif)
                    <!-- nft item begin -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="nft__item style-2">

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
                                    {{ $tif->price }} <span>Dinars</span>
                                </div>


                                 @if($tif->status=="Buyed")
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
                    {{ $tifs->links() }}
                </div>
            </div>
        </div>
            @else
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    No results !
                </div>
                </div>

            @endif
        </div>
</section>


</div>
