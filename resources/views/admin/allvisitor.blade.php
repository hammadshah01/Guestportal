@extends('adminlayout.adminlayout')
@section('content')

<style>
    .user-profile{
width: 40px;
height: 40px;
border-radius: 100%
    }
    .status{
        background-color: rgb(191, 230, 219);
        padding: 5px 30px;
        border-radius: 5px;
        color: #2D9478;
        font-size: 12px;
        font-weight: 600;
    }

    .blacklist{
        background-color: rgb(238, 111, 111);
        padding: 5px 30px;
        border-radius: 5px;
        color: #ecd5d5;
        font-size: 12px;
        font-weight: 600;
    }
</style>


    <h1 class="card-title">All registered Visitors</h1>


    <div class="visitor-all card card-body">
        <br>
        <table class="table mt-5" id="myTable" class="display">
            <thead>
                <tr>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Father</th>
                    <th>CNIC</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Registered</th>
                    <th>Admission Year</th>
                    <th>Graduation Year</th>
                    <th >Action</th>


                </tr>
            </thead>

            <tbody>
@foreach ($visitor as $vis )
 <tr>
@if(isset($vis->image))
<td><img class="user-profile" src="{{asset('assets/admin')}}/{{$vis->image}}" class="rounded-circle" alt=""></td>
@else

<td><img class="user-profile" src="{{asset('images/avatar2.jpg')}}" class="rounded-circle" alt=""></td>
@endif
<td>{{$vis->name}}</td>
<td>{{$vis->fathername}}</td>
<td>{{$vis->cnic}}</td>
<td class="text-capitalize">{{$vis->role}}</td>
<td><span class=" @if($vis->status=="satisfied") status @else blacklist @endif  text-capitalize" class="btn btn-success"> {{$vis->status}}</span></td>
<td>{{$vis->created_at->diffForHumans()}}</td>



@if($vis->yearofadmission==null)
<td>--</td>
@else
<td>{{$vis->yearofadmission}}</td>
@endif


@if($vis->yearofgraduation=="0")
<td>Current Student</td>
@elseif($vis->yearofgraduation==null)
<td>--</td>
@else
<td>{{$vis->yearofgraduation}}</td>
@endif

<td>  <a href="{{url('edit-visitor')}}/{{$vis->id}}"><i class="btn btn-success text-white opacity-75 bi bi-pencil"></i></a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a  onclick="return confirm('Are you sure?')" href="{{url('visitor-delete')}}/{{$vis->id}}"> <i class="btn btn-danger opacity-75 text-white bi bi-trash"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a  href="{{url('user-details')}}/{{$vis->id}}"> <i class="btn btn-info opacity-75 text-white bi bi-eye-fill"></i> </a></td>

</tr>
@endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

@if(Session::has('successc'))
<script>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('cache clear successfully');
</script>
@endif
@if(Session::has('success'))
<script>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('Visitor Deleted Successfully');
</script>
@endif
@endsection
