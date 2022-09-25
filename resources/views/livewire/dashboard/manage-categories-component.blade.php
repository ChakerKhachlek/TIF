<div>
<div class="container-fluid justify-content-center text-center text-white">

    @include('livewire.dashboard.Categories.deleteCategory')


    {{-- create and update displaying area Livewire--}}
    @if($updateMode)
        <div class="d-flex justify-content-center">

            @include('livewire.dashboard.Categories.updateCategory')

        </div>
    @elseif($createMode)
        <div class="d-flex justify-content-center">
            @include('livewire.dashboard.Categories.createCategory')
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
    <div class="row d-flex justify-content-center pt-4">
        <div class="col-md-4">
            <div class="h3 text-white">Categories List ({{$data->count()}})</div>
        </div>

        <div class="col-md-4">
            <button class="btn-sm btn-success" wire:click="export()">Export all to PDF</button>
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
    <div class="row d-flex justify-content-center pb-3">
        <div class="col-md-3">
            <input wire:model.debounce.500ms="search" type="text" id="search" class="form-control input-sm" placeholder="Search by name" >
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
                    <td>NAME</td>
                    <td>IMAGE</td>
                    <td>DISPLAY ORDER</td>
                    <td>VIEWS</td>
                    <td>CREATED AT</td>
                    <td>UPDATED AT</td>
                    <td></td>
                </tr>

                {{-- $data represents categories Livewire--}}
                @foreach($data as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td><img src="{{url('storage/categories_images/'.$row->category_img_link) }}" height="80px" width="80px"></img></td>
                        <td>{{$row->display_order}}</td>
                        <td>{{$row->views}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{{$row->updated_at}}</td>
                        <td width="100">
                            {{-- category edit and destroy methods Livewire--}}

                            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon" wire:click="edit({{$row->id}})" >
                                <i class="tim-icons icon-settings"></i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon"  wire:click="deleteCategoryMode('{{ $row->id }}' )"
                                data-toggle="modal" data-target="#deleteCategoryModal">
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
Livewire.on('catergory-created', event => {
    toastr.success(event);
});
Livewire.on('catergory-updated', event => {
    toastr.success(event);
});

Livewire.on('catergory-deleted', event => {
    $("#deleteCategoryModal").modal('hide');
        $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
    toastr.success(event);
});
</script>
@endpush
</div>


