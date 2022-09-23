<div>
    <div class="container-fluid justify-content-center text-center text-white">

        @include('livewire.dashboard.Tifs.deleteTif')

        @if (count($errors) > 0)
            <div class="alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Sorry!</strong> invalid input.<br><br>
                <ul style="list-style-type:none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- create and update displaying area Livewire--}}
        @if($updateMode)
            <div class="d-flex justify-content-center">

                @include('livewire.dashboard.Tifs.updateTif')

            </div>
        @elseif($createMode)
            <div class="d-flex justify-content-center">
                @include('livewire.dashboard.Tifs.createTif')
            </div>
        @endif

        {{--  Technologies list   --}}
        <div class="row d-flex justify-content-center py-3">
            <div class="col-md-4">
                <div class="h3 text-white">Tifs List ({{$data->count()}})</div>
            </div>
            <div class="col-md-2">
                <div class="btn-sm btn-success" wire:click="export()">Export to PDF</div>
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





        </div>
        <div class="row d-flex justify-content-center pb-3">
            <div class="col-md-3">
                <input wire:model.debounce.500ms="search" type="text" id="search" class="form-control input-sm" placeholder="Search by title,reference,status" >
                <div wire:loading wire:target="search" class="pt-2">
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
                        <td>TITLE</td>
                        <td>REFERENCE</td>
                        <td>IMAGE</td>
                        <td>DESCRIPTION</td>
                        <td>PRICE</td>
                        <td>STATUS</td>
                        <td>REALISAITON DATE</td>
                        <td>AUCTION START DATE</td>
                        <td>AUCTION DURATION</td>
                        <td>AUCTION TOP BIDING PRICE</td>


                        <td></td>
                    </tr>

                    {{-- $data represents tifs Livewire--}}
                    @foreach($data as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->reference}}</td>
                            <td><img src="{{url('storage/tifs_images/'.$row->tif_img_url) }}" height="80px" width="80px"></img></td>

                            <td>{{$row->description}}</td>
                            <td>{{$row->price}} DT</td>
                            <td>{{$row->status}}</td>
                            <td>{{$row->realisation_date}}</td>
                            <td> @if($row->auction_start_date) {{$row->auction_start_date}} @else Empty @endif </td>
                            <td> @if($row->auction_duration) {{$row->auction_duration}} Hours @else Empty @endif </td>
                            <td> @if($row->auction_top_biding_price) {{$row->auction_top_biding_price}} DT @else Empty @endif </td>


                            <td width="100">
                                {{-- tif edit and destroy methods Livewire--}}

                                <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon" wire:click="edit({{$row->id}})" >
                                    <i class="tim-icons icon-settings"></i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon"  wire:click="deleteTifMode('{{ $row->id }}' )"
                                    data-toggle="modal" data-target="#deleteTifModal">
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
    Livewire.on('tif-created', event => {
        toastr.success(event);
    });
    Livewire.on('tif-updated', event => {
        toastr.success(event);
    });

    Livewire.on('tif-deleted', event => {
        $("#deleteTifModal").modal('hide');
            $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
        toastr.success(event);
    });
    </script>
    @endpush
    </div>


