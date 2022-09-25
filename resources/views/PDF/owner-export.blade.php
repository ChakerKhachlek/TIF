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
  max-width: 80px;
word-wrap: break-word;
}
    </style>
  </head>
  <body style="align-content: center;" >
    <h1>Owners List</h1>
    <table width="100%">
<thead>

            <th width="5%">ID</th>
            <th width="20%">NAME</th>
            <th width="20%">EMAIL</th>
            <th width="10%">PHONE</th>
            <th width="20%">IMAGE</th>
            <th width="25%">CREATED AT</th>

    </thead>
    <tbody>
        {{-- $data represents categories Livewire--}}
        @foreach($data as $row)
            <tr style="text-align: center;
            vertical-align: middle;">
                <td >{{$row->id}}</td>
                <td >{{$row->name}}</td>
                <td >{{$row->email}}</td>
                <td >{{$row->phone}}</td>
                <td><img src="{{public_path('storage/owners_images/'.$row->owner_img_link) }}" height="80px" width="80px"></img></td>
                <td>{{$row->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
  </body>
</html>
