<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title></title>
    <style>
        table, th, td {

  border: 1px solid black;
  border-collapse: collapse;
  padding: 3px;
  max-width: 80px;
word-wrap: break-word;
}

    </style>
  </head>
  <body style="align-content: center;">
    <h1>Tifs List</h1>
    <table width="100%" >
<thead>

    <th width="5%">ID</th>
    <th  width="10%">TITLE</th>
    <th width="5%">REFERENCE</th>
    <th width="5%">OWNER</th>
    <th width="5%">STYLE</th>
    <th width="20%">IMAGE</th>
    <th width="5%">PRICE</th>
    <th width="20%">Rea/Cre/Upd Dates</th>
    <th>Categories</th>
    <th width="10%">STATUS</th>




    </thead>
    <tbody>
        {{-- $data represents categories Livewire--}}
        @foreach($data as $row)
            <tr style="text-align: center;
            vertical-align: middle;">
                <td>{{$row->id}}</td>
                <td>{{$row->title}}</td>
                <td width="5%">{{$row->reference}}</td>
                <th width="5%">{{ $row->owner->name }}</th>
                <th width="5%">{{ $row->style->name }}</th>
                <td><img src="{{public_path('storage/tifs_images/'.$row->tif_img_url) }}" height="80px" width="80px"></img></td>
                <td>{{$row->price}} DT</td>
                <td>{{$row->realisation_date}}</br>{{$row->created_at}}</br>{{$row->updated_at}}</td>
                <td>
                    @foreach($row->categories()->get() as $category)
                    {{ $category->name }},
                    @endforeach
                </td>
                <td>{{$row->status}}</td>



            </tr>
        @endforeach
    </tbody>
    </table>
  </body>
</html>
