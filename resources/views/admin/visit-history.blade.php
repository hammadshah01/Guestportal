@extends('adminlayout.adminlayout')
@section('content')

<style>
    .status{
        background-color: rgb(191, 230, 219);
        padding: 5px 30px;
        border-radius: 5px;
        color: #2D9478;
        font-size: 12px;
        font-weight: 600;
    }
</style>

<div class="card-title">
    Guest Visiting Record
</div>
<div class="card card-body py-4">
   <table class="table mt-5"  id="myTable" class="display">
    <thead>
   <tr>
    <th>Name</th>
    <th>CNIC</th>
    <th>Role</th>
    <th>Department</th>
    <th>Enterence Date</th>
    <th>Outgoing Date</th>
    <th>Status</th>
    <th>Details</th>

</tr>
    </thead>

<tbody>
    @foreach ($visit as $vis )


    <tr>
        <td>{{ $vis->name }}</td>
        <td>{{ $vis->user_cnic }}</td>
        <td>@if($vis->role=="currentstudent")Current Student
            @elseif($vis->role=="exstudent")Ex Student
            @elseif ($vis->role=="guest")Guest
            @else Vendor
            @endif</td>
        <td>{{ $vis->dname }}</td>
        <td>{{ $vis->created_at }}</td>
        <td>{{ $vis->out }}</td>
        <td><span class="status" class="btn btn-success"> Visited</span></td>
        <td>  <a href="{{ url('uservisitdetail') }}/{{ $vis->id}}/{{ $vis->user_cnic }}"> <button class="btn btn-success"><i class="fa-solid fa-eye"></i></button></a></td>






    </tr>
     @endforeach
</tbody>


</table>
</div>
<script>
$(document).ready( function () {
    $('#myTable').DataTable({
        "order": [[0, "desc"]]
    });
} );
</script>
@if(Session::has('successc'))
<script>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('cache clear successfully');
</script>

@endif

@endsection
