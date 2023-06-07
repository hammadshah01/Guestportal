@extends('adminlayout.adminlayout')
@section('content')



    <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">

              <!-- Sales Card -->
              <div class="col-xxl-4 col-lg-4 col-md-6">
                <div class="card info-card sales-card">



                  <div class="card-body">
                    <h5 class="card-title">Today <span>| Visits</span></h5>

                    <div class="d-flex align-items-center">
                        <div style="width: 60px;height:60px ; background:#F6F6FE; color:#4154F1" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i style="font-size: 29px" class="bi bi-people "></i>
                      </div>
                      <div class="ps-3">
                        <h4 class="ms-3 card-title" style="font-size:28px">{{$daily}}</h4>
                        <span class="text-muted small pt-2 ps-1">number of visitor visited today </span>

                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Sales Card -->

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-lg-4 col-md-6">
                <div class="card info-card revenue-card">


                  <div class="card-body">
                    <h5 class="card-title">Total <span>| Visitors</span></h5>

                    <div class="d-flex align-items-center">
                        <div style="width: 60px;height:60px ; background:rgb(224,248,233); color:#2ECA6A" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i style="font-size: 29px" class="bi bi-people "></i>
                      </div>
                      <div class="ps-3">
                        <h5 class="ms-3 card-title" style="font-size:28px">{{$visitor}}</h5>
                     <span class="text-muted small pt-2 ps-1">total Visitor registered in portal</span>

                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Revenue Card -->

              <!-- Customers Card -->
              <div class="col-xxl-4 col-lg-4  col-md-6">

                <div class="card info-card customers-card">



                  <div class="card-body">
                    <h5 class="card-title">Banned <span>| Visitors</span></h5>

                    <div class="d-flex justfy-content-between align-items-center">
                      <div style="width: 60px;height:60px ; border-radius:100%; background:#FFECDF; color:rgb(255,119,47)" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i style="font-size: 25px" class="bi bi-slash-circle "></i>
                      </div>
                      <div class="ps-3">
                        <h5 class="ms-3 card-title" style="font-size:28px">{{$banned}}</h5>
                        <span class="text-muted small pt-2 ps-1">visitors are banned yet</span>

                      </div>
                    </div>

                  </div>
                </div>

              </div><!-- End Customers Card -->





            </div>
          </div><!-- End Left side columns -->


        </div>
      </section>



{{--
<div class=" card-title">Search Visitor</div>
<div class="card card-body">
    <form action="{{ url('result') }}" method="POST" class="p-5">
        @csrf
       <label for="cnic">Enter Visitor CNIC No:</label>
    <input type="text" class="form-control"  data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"  name="cnic" required="" >
<button class="btn btn-success mt-3" type="submit">Search</button>

    </form>
</div> --}}





{{-- Graph code start below --}}
<div class="row">

<div class="col-lg-8 col-md-12">
    <div class="col-12">
        <div class="card">


          <div class="card-body">
            <h5 class="card-title">Reports <span>/Today</span></h5>

            <!-- Line Chart -->
            <div id="reportsChart"></div>

            <script>



                var t1={{$t1}};
                var t2={{$t2}};
                var t3={{$t3}};
                var t4={{$t4}};
                var t5={{$t5}};
                var t6={{$t6}};
                var t7={{$t7}};

                var d1={{$d1}};
                var d2={{$d2}};
                var d3={{$d3}};
                var d4={{$d4}};
                var d5={{$d5}};
                var d6={{$d6}};
                var d7={{$d7}};

                var c1={{$c1}};
                var c2={{$c2}};
                var c3={{$c3}};
                var c4={{$c4}};
                var c5={{$c5}};
                var c6={{$c6}};
                var c7={{$c7}};




              document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#reportsChart"), {
                  series: [{
                    name: 'Ex Student',
                    data: [t1, t2, t3, t4, t5, t6, t7],
                  }, {
                    name: 'Guest',
                    data: [d1, d2, d3, d4, d5, d6, d7],
                  }, {
                    name: 'Vendor',
                    data: [c1, c2, c3, c4, c5, c6, c7],
                  }],
                  chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                      show: false
                    },
                  },
                  markers: {
                    size: 4
                  },
                  colors: ['#4154f1', '#2eca6a', '#ff771d'],
                  fill: {
                    type: "gradient",
                    gradient: {
                      shadeIntensity: 1,
                      opacityFrom: 0.3,
                      opacityTo: 0.4,
                      stops: [0, 90, 100]
                    }
                  },
                  dataLabels: {
                    enabled: false
                  },
                  stroke: {
                    curve: 'smooth',
                    width: 2
                  },
                  xaxis: {
                    type: 'datetime',
                    categories: ["2023-05-23T00:00:00.000Z", "2023-05-23T01:30:00.000Z", "2023-05-23T02:30:00.000Z", "2023-05-23T03:30:00.000Z", "2023-05-23T04:30:00.000Z", "2023-05-23T05:30:00.000Z", "2023-05-23T06:30:00.000Z"]
                  },
                  tooltip: {
                    x: {
                      format: 'dd/MM/yy HH:mm'
                    },
                  }
                }).render();
              });
            </script>
            <!-- End Line Chart -->

          </div>

        </div>
      </div><!-- End Reports -->

</div>
<div class="col-lg-4 col-md-12">
    <div class="card">
        <div class="filter">

        </div>

        <div class="card-body pb-0">
          <h5 class="card-title">Visitor Graph <span>| Overall</span></h5>

          <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

          <script>
            var cstudent={{$cstudent}};
            var banned={{$banned}}
            var exstudent={{$exstudent}}
            var vendor={{$vendor}}
            var guest={{$guest}}
            var vendor={{$vendor}}
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#trafficChart")).setOption({
                tooltip: {
                  trigger: 'item'
                },
                legend: {
                  top: '5%',
                  left: 'center'
                },
                series: [{
                  name: 'Visitor Graph',
                  type: 'pie',
                  radius: ['40%', '70%'],
                  avoidLabelOverlap: false,
                  label: {
                    show: false,
                    position: 'center'
                  },
                  emphasis: {
                    label: {
                      show: true,
                      fontSize: '18',
                      fontWeight: 'bold'
                    }
                  },
                  labelLine: {
                    show: false
                  },
                  data: [
                    {
                      value: exstudent,
                      name: 'Ex Student'
                    },{
                      value: guest,
                      name: 'Guest'
                    },{
                      value: vendor,
                      name: 'Vendor'
                    },

                    {
                      value: banned,
                      name: 'Banned'
                    },
                    {
                      value: cstudent,
                      name: 'Current Student'
                    }
                  ]
                }]
              });
            });
          </script>

        </div>
      </div><!-- End Website Traffic -->
</div>
</div>



@if(Session::has('successc'))
<script>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('cache clear successfully');
</script>

@endif

<script>
    $(":input").inputmask();
   </script>
@endsection
