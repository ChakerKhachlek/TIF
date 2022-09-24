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
                    </tr>

                    {{-- $data represents owners Livewire--}}
                    @foreach($data as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->created_at}}</td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <row class="d-flex justify-content-center">
            {{ $data->links() }}
        </row>

    </div>

    </div>


