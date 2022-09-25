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
  max-width: 80px;
word-wrap: break-word;
}
    </style>
  </head>
  <body style="align-content: center;">
    <h1>Newsletetr subsribers List</h1>
    <table >
<thead>

            <th>ID</th>
            <th>EMAIL</th>
            <th>CREATED AT</th>



    </thead>
    <tbody>
        {{-- $data represents categories Livewire--}}
        @foreach($data as $row)
            <tr style="text-align: center;
            vertical-align: middle;">
                <td>{{$row->id}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->created_at}}</td>

            </tr>
        @endforeach
    </tbody>
    </table>
  </body>
</html>
