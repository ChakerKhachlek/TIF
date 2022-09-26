@extends('dashboard.layouts.layout')
@section('content')


        <div class="container-fluid justify-content-center text-center text-white">
            <div class="row justify-content-center p-3 text-center">
                <h4 class="text-white text-center bg-dark p-2">Welcome to the Imagination Factory Dashboard</h4>
            </div>
        <div class="row justify-content-center ">
            <div class="col-lg-4 col-md-6 wow fadeInRight mb30" data-wow-delay="0s">
                <div class="de_count">

                    <h5 class="id-color">Total Tif's</h5>
                    <h3><span>{{ $tifsCount }}</span></h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInRight mb30" data-wow-delay=".25s">
                <div class="de_count">

                    <h5 class="id-color">Total Categories</h5>
                    <h3><span>{{ $categoriesCount }}</span></h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInRight mb30" data-wow-delay=".4s">
                <div class="de_count">

                    <h5 class="id-color">Total Styles</h5>
                    <h3><span>{{ $stylesCount }}</span></h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInRight mb30" data-wow-delay=".6s">
                <div class="de_count">

                    <h5 class="id-color">Total Owners</h5>
                    <h3><span>{{ $ownersCount }}</span></h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInRight mb30" data-wow-delay=".8s">
                <div class="de_count">

                    <h5 class="id-color">Total Bids</h5>
                    <h3><span>{{ $bidsCount }}</span></h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInRight mb30" data-wow-delay="1s">
                <div class="de_count">

                    <h5 class="id-color">Registred Newsletters</h5>
                    <h3><span>{{ $newslettersCount }}</span></h3>
                </div>
            </div>
        </div>
        <div class="row my-3 justify-content-center">
        <div class="col-6 text-white">
            <canvas id="tifsDiagramme" width="300" height="300"></canvas>

        </div>
        <div class="col-6" >

            <canvas id="stylesDiagramme" width="300" height="300"></canvas>
        </div>
        </div>

        <div class="row my-3 justify-content-center">
            <div class="col-3 text-white">
            </div>
            <div class="col-6" >

                <canvas id="categoriesTifsDiagram" width="300" height="300"></canvas>
            </div>
            <div class="col-3 text-white">
            </div>
            </div>


        <div class="row my-3 justify-content-center">
            <div class="col-6 text-white">
                <canvas id="addedTifsWeekDiagram" width="300" height="300"></canvas>

            </div>
            <div class="col-6" >

                <canvas id="selledTifsWeekDiagram" width="300" height="300"></canvas>
            </div>
            </div>

    </div>

    </div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
      // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        <!--Tifs Diagramme-->
        let ctx1 = document.getElementById('tifsDiagramme').getContext('2d');

        let TifsDiagrammeChart = new Chart(ctx1, {
          type:'doughnut', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
          data:{
            labels:['On Auction', 'Available', 'Owned'],
            datasets:[{
              label:'Population',
              data:[
                {{$tifs->where('status','On auction')->count()}},
                {{$tifs->where('status','Available')->count()}},
                {{$tifs->where('status','Buyed')->count()}},

              ],
              //backgroundColor:'green',
              backgroundColor:[
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
              ]
            }]
          },
          options:{
            title:{
              display:true,
              text:'Tif\'s statuses ',
              fontSize:20,
              fontColor:'white'
            },
            legend:{
              display:true,
              position:'bottom',
              labels:{
                fontColor:'white'
              }
            },
            layout:{
              padding:{
                left:0,
                right:0,
                bottom:0,
                top:0
              }
            },
            tooltips:{
              enabled:true
            },
            responsive: true,
            maintainAspectRatio: false,
          }
        }) ;

        <!--categories Diagramme-->
        let ctxc = document.getElementById('categoriesTifsDiagram').getContext('2d');

        let CategoriesTifsDiagram = new Chart(ctxc, {
          type:'doughnut', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
          data:{
            labels:[
                @foreach($categories as $category)
                 '{{ $category->name }}',
                @endforeach
            ],
            datasets:[{
              label:'',
              data:[
                @foreach($categoriesTifsCounts as $categoriesTifsCount)
                {{$categoriesTifsCount}},
                @endforeach
              ],
              //backgroundColor:'green',
              backgroundColor:[
                @foreach($randomCategoriesColors as $key=>$Color)
            '{{$Color}}' ,
            @endforeach
              ]
            }]
          },
          options:{
            title:{
              display:true,
              text:'Tif\'s per category ',
              fontSize:20,
              fontColor:'white'
            },
            legend:{
              display:true,
              position:'bottom',
              labels:{
                fontColor:'white'
              }
            },
            layout:{
              padding:{
                left:0,
                right:0,
                bottom:0,
                top:0
              }
            },
            tooltips:{
              enabled:true
            },
            responsive: true,
            maintainAspectRatio: false,
          }
        }) ;

        <!--styles Diagramme-->
        let ctx2 = document.getElementById('stylesDiagramme').getContext('2d');

        let StylesDiagrammeChart = new Chart(ctx2, {
          type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
          data:{
            labels:[  @foreach($styles as $style)
                    '{{$style->name}}',
                    @endforeach
          ],
            datasets:[{
              label:'Population',
              data:[
                @foreach($stylesTifsCounts as $key=>$Occu)
                    {{$Occu}},
                    @endforeach

              ],
              //backgroundColor:'green',
              backgroundColor:[
                @foreach($randomStylesColors as $key=>$Color)
            '{{$Color}}' ,
            @endforeach
              ]
            }]
          },
          options:{
            title:{
              display:true,
              text:'Tif\'s per style ',
              fontSize:20,
              fontColor:'white'
            },
            legend:{
              display:true,
              position:'bottom',
              labels:{
                fontColor:'white'
              }
            },
            layout:{
              padding:{
                left:0,
                right:0,
                bottom:0,
                top:0
              }
            },
            tooltips:{
              enabled:true
            },
            responsive: true,
            maintainAspectRatio: false,
          }
        }) ;


        <!--week added Diagramme-->
        let ctx3 = document.getElementById('addedTifsWeekDiagram').getContext('2d');

        let AddedTifsWeekDiagram = new Chart(ctx3, {
          type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
          data:{
            labels:[  @foreach($thisWeekDays as $key=>$day)
                    '{{$day->format("D")}}',
                    @endforeach
          ],
            datasets:[{
              label:'Created',
              data:[
                @foreach($weekTifsCount as $key=>$Occu)
                    {{$Occu}},
                    @endforeach

              ],
              //backgroundColor:'green',
              backgroundColor:[
                @foreach($randomWeekColors as $key=>$Color)
            '{{$Color}}' ,
            @endforeach
              ]
            }]
          },
          options:{
            title:{
              display:true,
              text:'Added tifs this week',
              fontSize:20,
              fontColor:'white'
            },
            legend:{
              display:true,
              position:'bottom',
              labels:{
                fontColor:'white'
              }
            },
            layout:{
              padding:{
                left:0,
                right:0,
                bottom:0,
                top:0
              }
            },
            tooltips:{
              enabled:true
            },
            responsive: true,
            maintainAspectRatio: false,
          }
        }) ;

        <!--week selled Diagramme-->
        let ctx4 = document.getElementById('selledTifsWeekDiagram').getContext('2d');

        let SelledTifsWeekDiagram = new Chart(ctx4, {
          type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
          data:{
            labels:[  @foreach($thisWeekDays as $key=>$day)
                    '{{$day->format("D")}}',
                    @endforeach
          ],
            datasets:[{
              label:'Selled',
              data:[
                @foreach($weekTifsSelledCount as $key=>$Occu)
                    {{$Occu}},
                    @endforeach

              ],
              //backgroundColor:'green',
              backgroundColor:[
                @foreach($randomWeekColors as $key=>$Color)
            '{{$Color}}' ,
            @endforeach
              ]
            }]
          },
          options:{
            title:{
              display:true,
              text:'Selled tifs this week',
              fontSize:20,
              fontColor:'white'
            },
            legend:{
              display:true,
              position:'bottom',
              labels:{
                fontColor:'white'
              }
            },
            layout:{
              padding:{
                left:0,
                right:0,
                bottom:0,
                top:0
              }
            },
            tooltips:{
              enabled:true
            },
            responsive: true,
            maintainAspectRatio: false,
          }
        }) ;
</script>
@endpush

@endsection
