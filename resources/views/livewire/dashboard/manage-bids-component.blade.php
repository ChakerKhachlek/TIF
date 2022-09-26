<div>
    <div class="container-fluid justify-content-center text-center text-white">

        @include('livewire.dashboard.Bids.deleteBid')


        {{-- create and update displaying area Livewire--}}
        @if($updateMode)
            <div class="d-flex justify-content-center">

                @include('livewire.dashboard.Bids.updateBid')

            </div>
        @elseif($createMode)
            <div class="d-flex justify-content-center">
                @include('livewire.dashboard.Bids.createBid')
            </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger mt-2">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Sorry!</strong> invalid input.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        {{--  Technologies list   --}}
        <div class="row d-flex justify-content-center py-3">
            <div class="col-md-4" >
                <select name="filter_tif" wire:model="filter_tif" class="border shadow p-2 bg-white">
                   <option value="">Filter by tif</option>
                   {{-- selesting series Livewire--}}
                            @foreach($tifs as $tif)
                              <option value="{{$tif->id}}">{{ $tif->title }}{{ $tif->reference }}</option>
                            @endforeach

               </select>
               <div wire:loading wire:target="updatingFilterTif" class="pt-2">
                <div class="la-line-spin-clockwise-fade-rotating la-light la-md ">
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
           </div>
            <div class="col-md-4">
                <div class="h3 text-white">Bids List ({{$data->count()}})</div>
            </div>
            <div class="col-md-2">
                <button class="btn-sm btn-success" wire:click="export()">Export current data to PDF</button>
                <div wire:loading wire:target="export" class="pt-2">
                    <div class="la-line-spin-clockwise-fade-rotating la-light la-md ">
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
            </div>

            <div class="col-md-2">
                <button class="btn-sm btn-success" wire:click="exportExcel()">Export all to Excel</button>
                <div wire:loading wire:target="exportExcel" class="pt-2">
                    <div class="la-line-spin-clockwise-fade-rotating la-light la-md ">
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
            </div>

        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-condensed ">
                    <tr>
                        <td>ID</td>
                        <td>DISPLAY</td>
                        <td>NAME</td>
                        <td>EMAIL</td>
                        <td>PHONE</td>
                        <td>BID</td>
                        <td>AUCTION TOP BIDING PRICE</td>
                        <td>Auction End Date</td>
                        <td>Auction End Date Time</td>
                        <td>CREATED AT</td>

                        <td>UPDATED AT</td>
                        <td>TIF IMG</td>
                        <td>TIF REFERENCE</td>
                        <td>TIF STATUS</td>
                        <td>TIF TITLE</td>




                        <td>Edit/Del</td>
                    </tr>

                    {{-- $data represents tifs Livewire--}}
                    @foreach($data as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>
                                @if($row->display)
                                {{$row->display}} (Confirmed)
                                @else
                                {{$row->display}} (Pending)
                                <button type="button"  class="btn btn-success btn-sm " wire:click="confirmBid({{ $row->id }})" >Confirm

                                </button>
                                @endif
                            </td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->bid_price}} DT</td>
                            <td> @if($row->tif->auction_top_biding_price) {{$row->tif->auction_top_biding_price}} DT @else Empty @endif </td>

                            <td> @if($row->tif->auction_end_date) {{$row->tif->auction_end_date}} @else Empty @endif </td>
                            <td> @if($row->tif->auction_end_date_time) {{$row->tif->auction_end_date_time}} Hours @else Empty @endif </td>
                            <td>{{$row->created_at}}</td>
                            <td>{{$row->updated_at}}</td>
                            <td><img src="{{url('storage/tifs_images/'.$row->tif->tif_img_url) }}" height="80px" width="80px"></img></td>

                            <td>{{$row->tif->reference}}</td>
                            <td>{{$row->tif->status}}</td>
                            <td>{{$row->tif->title}}</td>




                            <td width="100">
                                {{-- tif edit and destroy methods Livewire--}}
                                ID : {{$row->id}} </br>
                                <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon" wire:click="edit({{$row->id}})" >
                                    <i class="tim-icons icon-settings"></i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon"  wire:click="deleteBidMode('{{ $row->id }}' )"
                                    data-toggle="modal" data-target="#deleteBidModal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <row class="d-flex justify-content-center">
            {{ $data->links() }}
        </row>

    </div>

    @push('scripts')
    <script type="text/javascript">
    Livewire.on('bid-created', event => {
        toastr.success(event);
    });
    Livewire.on('bid-updated', event => {
        toastr.success(event);
    });

    Livewire.on('bid-deleted', event => {
        $("#deleteBidModal").modal('hide');
            $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
        toastr.success(event);
    });
    Livewire.on('bid-confirmed', event => {
        toastr.success(event);
    });


    Livewire.on('time-passed', event => {

        toastr.warning(event);
    });
    </script>
    @endpush
    </div>


