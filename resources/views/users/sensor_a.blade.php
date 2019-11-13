@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'sensor',
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
                                <h3 class="mb-0">{{ __('Add Fuel Monitoring Sensor') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('log') }}" class="btn btn-primary btn-round">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    @include('alerts.messages')
    <div class="row">
      <div class="col-md-12">
        


           
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
    </div>
    <div class="row" id="ad_sensor">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Add Fuel Monitoring
                    </h4>
                </div>
              </div>
              <form action="{{route('create')}}" method="POST">
              @csrf 
              <div class="row" align="center">
                <div class="col-md-12">
                    <label>Name:</label>
                    <input type="text" name="name" value="" placeholder="Enter Sensor" />
                </div>

                <!-- <div class="col-md-12">
                    <label>Status:</label>
                    <select name="status">
                        <option value="" >0</option>
                        <option value="" >1</option>
                    </select>
                </div>
              
              
                <div class="col-md-12">
                    <label>Level:</label>
                    <input type="double" name="level" value="" placeholder="00.00 %" />
                </div> -->

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="border-radius:10px">Create</button>
                </div>

              </div>
              </form>


              @if($success != null)
              <p>238974ywfv78</p>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{$success}}
                </div>
                @endif

            </div>

          </div>
        </div>
      </div>
    </div>

    

    </div>

    <script>
    function myFunction() {
  var x = document.getElementById("ad_sensor");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


    
  </script>


@endsection