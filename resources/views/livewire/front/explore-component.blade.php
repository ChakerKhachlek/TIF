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


    </div>
