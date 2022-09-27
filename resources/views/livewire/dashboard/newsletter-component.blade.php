<div>
    <div class="container-fluid justify-content-center text-center text-white">

        {{--  Technologies list   --}}
        <div class="row d-flex justify-content-center py-3">
            <div class="col-md-4">
                <div class="h3 text-white">Newsletter subscribers List ({{$data->count()}})</div>
            </div>
            <div class="col-md-4">
                <div class="btn-sm btn-success" wire:click="export()">Export all to PDF</div>
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
            <div class="col-md-4">
                <div class="btn-sm btn-success" wire:click="exportExcel()">Export all to Excel</div>
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
                        <td>EMAIL</td>
                        <td>CREATED AT</td>
                        <td>Edit/Del</td>
                    </tr>

                    {{-- $data represents owners Livewire--}}
                    @foreach($data as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->created_at}}</td>
                            <td width="100">
                                {{-- category edit and destroy methods Livewire--}}
                                ID : {{$row->id}}</br>

                                <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon"  wire:click="deleteNewsMode('{{ $row->id }}' )"
                                    data-toggle="modal" data-target="#deleteNewsModal">
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
    <div wire:ignore.self  class="modal fade " id="deleteNewsModal" tabindex="-1" role="dialog"
    aria-labelledby="deleteNewsModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="align-items-center d-flex">
                <h5 class="modal-title" id="deleteNewsModal">Delete Registred Email</h5>

                <div class="pl-3" wire:loading wire:target="deleteNewsMode" >
                    <div class="la-line-scale la-dark la-sm">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body pt-3 ">

                <div class="row justify-content-center">
                    @if (session()->has('pmessage'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            {{ session('pmessage') }}
                        </div>
                     @endif
                </div>

                <div class="row justify-content-center text-dark">
                    You want to delete this registred email ?
                </div>





            </div>
            <div class="modal-footer ">


                <div class="px-2" wire:loading wire:target="deleteNews" >
                    <div class="la-line-spin-clockwise-fade-rotating la-dark ">
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

                <button type="button" class="btn btn-danger " wire:click="deleteNews()">Delete</button>


            </div>

        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">

Livewire.on('news-deleted', event => {
    $("#deleteNewsModal").modal('hide');
        $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
    toastr.success(event);
});
</script>
@endpush
    </div>


