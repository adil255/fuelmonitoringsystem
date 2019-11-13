@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'fms_log',
    'activePage' => 'user',
    'activeNav' => 'sidebar_u',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Fuel Monitoring Logs') }}</h3>
                            </div>

                            <div class="col-4 text-right">
                                <a href="{{ route('log') }}" class="btn btn-primary btn-round">{{ __('Back') }}</a>
                            </div>

    
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="row">
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
              <table id="curr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>{{ __('Fuel Monitoring Name') }}</th>
                    <th>{{ __('Current Door Status') }}</th>
                    <th>{{ __('Current Fuel Level') }}</th>
                  </tr>
                </thead>

                <tfoot>
                  <tr>
                    <th>{{ __('Fuel Monitoring Name') }}</th>
                    <th>{{ __('Current Door Status') }}</th>
                    <th>{{ __('Current Fuel Level') }}</th>
                  </tr>
                </tfoot>
              
                <tbody>
                  <tr>
                    <td>{{$fms->name}}</td>
                    @if($fms->status == 1)
                            <td> Door Open </td>
                       @else
                            <td>Door Close</td>
                        @endif
                    <!-- <td>{{$fms->status}}</td> -->
                    <td>{{$fms->fillLevel}}</td>
                  </tr>
                </tbody>
              </table>
          </div>
          <!-- end content-->
        </div>

    <div class="row">
      <div class="col-md-6">
        
            <div class="row">
                <div class="col-md-12" align="center">
                    <button onclick="myFunction()" class="btn btn-primary" style="border-radius:10px">Door Status Log</button>
                </div>
            </div>

           
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              
            </table>
          </div>
          <!-- end content-->
        
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->

      <div class="col-md-6">
        
            <div class="row">
                <div class="col-md-12" align="center">
                    <button onclick="myFun()" class="btn btn-primary" style="border-radius:10px">Fuel FillLevel Log</button>
                </div>
            </div>

           
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              
            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      
    </div>

    


    <div class="row" id="door_log" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Door Status Log
                    </h4>
                </div>
              </div>
              <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Door Status') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('T0') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Door Status') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('T0') }}</th>
                </tr>
              </tfoot>
              
              <tbody>
             <!-- Wrtie Something -->
                @foreach($status_logs as $sl)
                    <tr align="center">
                        <td> {{$fms->name}} </td>
                        @if($sl->status == 1)
                            <td> Door Open </td>
                       @else
                            <td>Door Close</td>
                        @endif
                        <td> {{$sl->created_at}}</td>
                        <td> {{$sl->updated_at}}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
            </div>
          </div>
        </div>
      </div>
      <!-- start chart -->

    <div class="content">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card card-chart">
            <div class="card-header">
              <h4 class="card-title">Door Open</h4>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="barChartSimpleGradientsNumbers"></canvas>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
              </div>
            </div>
          </div>
        </div>



      <div class="col-lg-4" style="display:none">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">Global Sales</h5>
            <h4 class="card-title">Shipped Products</h4>
            <div class="dropdown">
              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item text-danger" href="#">Remove Data</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="lineChartExample"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div>

      
      <div class="col-lg-4 col-md-6" style="display:none">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">2018 Sales</h5>
            <h4 class="card-title">All products</h4>
            <div class="dropdown">
              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item text-danger" href="#">Remove Data</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
  </div>

      <!-- end chart -->
    </div>

    <div class="row" id="fuel_log" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Fuel FillLevel Log
                    </h4>
                </div>
              </div>
              <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Fuel Level') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Fuel Level') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </tfoot>
                
              <tbody>
             <!-- Write Something -->
                  @foreach($fill_level_logs as $fl)
                    <tr align="center">
                        <td> {{$fms->name}} </td>
                        @if($fl->fillLevel >= 90)
                            <td> Full ({{$fl->fillLevel}}) </td>
                        @else
                            <td>({{$fl->fillLevel}})</td>
                        @endif
                        <td> {{$fl->created_at}}</td>
                        <td> {{$fl->updated_at}}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Line Chart -->
      <div class="panel-header panel-header-lg">
        <canvas id="bigDashboardChart"></canvas>
      </div>
      
  <!-- end chart -->
    </div>
    
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

            var pusher = new Pusher('cb63405c99491817179a', {
              cluster: 'ap1',
              forceTLS: true
            });

            var channel = pusher.subscribe('{{$user->id}}-channel');
            channel.bind('notification', function(data) {
                
              color = 'primary';

                  $.notify({
                      icon: "now-ui-icons ui-1_bell-53",
                      message: data
                  }, {
                      type: color,
                      timer: 8000,
                      placement: {
                          from: 'bottom',
                          align: 'right'
                      }
                  });
            });

            channel.bind('update-fillLevel', function(data) {
              //alert(JSON.stringify(data));
            });

            channel.bind('update-status', function(data) {
             //alert(JSON.stringify(data));
            });
            
    </script>
    

@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts({!! json_encode($avgFillLevel) !!}, {!! json_encode($dateLabels) !!} , {!! json_encode($statusCount) !!} );

    });

    function myFunction() {
  var x = document.getElementById("door_log");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFun() {
  var x = document.getElementById("fuel_log");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

    </script>
@endpush