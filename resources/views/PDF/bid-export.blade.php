<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title></title>
    <style>
        table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 1px;
  max-width: 80px;
word-wrap: break-word;
}
    </style>
  </head>
  <body style="align-content: center;">
    <h1>Bids List</h1>
    <table >
<thead>

    <th width="5%">ID</th>
    <th width="10%">DISPLAY</th>
    <th  width="5%">NAME</th>
    <th  width="5%">EMAIL</th>
    <th  width="5%">PHONE</th>
    <th  width="5%">BID</th>
    <th  width="10%">CREATED AT</th>
    <th  width="5%">TIF REFERENCE</th>
    <th  width="10%">TIF TITLE</th>
    <th  width="5%">Top bid</th>
    <th  width="10%">End Date</th>
    <th  width="10%">End Time</th>


    </thead>
    <tbody>
        {{-- $data represents categories Livewire--}}
        @foreach($data as $row)
            <tr style="text-align: center;
            vertical-align: middle;">
                 <td width="5%">{{$row->id}}</td>
                 <td>
                    @if($row->display)
                    {{$row->display}} (Confirmed)
                    @else
                    {{$row->display}} (Pending)
                    @endif

                </td>
                 <td width="5%">{{$row->name}}</td>
                 <td>{{$row->email}}</td>
                 <td width="5%">{{$row->phone}}</td>
                 <td width="5%">{{$row->bid_price}} DT</td>
                 <td>{{$row->created_at}}</td>
                 <td width="5%">{{$row->tif->reference}}</td>
                 <td>{{$row->tif->title}}</td>
                 <td width="5%"> @if($row->tif->auction_top_biding_price) {{$row->tif->auction_top_biding_price}} DT @else Empty @endif </td>
                 <td> @if($row->tif->auction_end_date) {{$row->tif->auction_end_date}} @else Empty @endif </td>
                 <td> @if($row->tif->auction_end_date_time) {{$row->tif->auction_end_date_time}} Hours @else Empty @endif </td>



            </tr>
        @endforeach
    </tbody>
    </table>
  </body>
</html>
