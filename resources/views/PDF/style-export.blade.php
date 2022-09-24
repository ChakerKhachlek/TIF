<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title></title>
    <style>
        table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 15px;
}
    </style>
  </head>
  <body style="align-content: center;">
    <h1>Styles List</h1>
    <table >
<thead>

            <th>ID</th>
            <th>NAME</th>
            <th>IMAGE</th>
            <th>DISPLAY ORDER</th>
            <th>CREATED AT</th>

    </thead>
    <tbody>
        {{-- $data represents style Livewire--}}
        @foreach($data as $row)
            <tr style="text-align: center;
            vertical-align: middle;">
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td><img src="{{public_path('storage/styles_images/'.$row->style_img_link) }}" height="100px" width="100px"></img></td>
                <td>{{$row->display_order}}</td>
                <td>{{$row->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
  </body>
</html>
