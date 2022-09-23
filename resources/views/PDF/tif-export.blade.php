<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title></title>
    <style>
        table, th, td {

  border: 1px solid black;
  border-collapse: collapse;
  padding: 5px;
}

    </style>
  </head>
  <body style="align-content: center;">
    <h1>Owner List</h1>
    <table width="100%" >
<thead>

    <th width="5%">ID</th>
    <th  width="10%">TITLE</th>
    <th width="10%">REFERENCE</th>
    <th width="10%">OWNER</th>
    <th width="20%">IMAGE</th>
    <th width="5%">PRICE</th>
    <th width="10%">STATUS</th>
    <th width="10%">REALISAITON DATE</th>



    </thead>
    <tbody>
        {{-- $data represents categories Livewire--}}
        @foreach($data as $row)
            <tr style="text-align: center;
            vertical-align: middle;">
                <td>{{$row->id}}</td>
                <td>{{$row->title}}</td>
                <td>{{$row->reference}}</td>
                <th width="10%">{{ $row->owner->name }}</th>
                <td><img src="{{public_path('storage/tifs_images/'.$row->tif_img_url) }}" height="100px" width="100px"></img></td>
                <td>{{$row->price}} DT</td>
                <td>{{$row->status}}</td>
                <td>{{$row->realisation_date}}</td>


            </tr>
        @endforeach
    </tbody>
    </table>
  </body>
</html>
