@extends('adminlayout.adminlayout')
@section('content')



@if(Session::has('success'))
<script>
    alertify.set('notifier','position', 'top-right');
      alertify.success('Data Added Successfully');
</script>
@endif



<div class="card-title">
  Current Guest in NCA
</div>
<div class="card card-body py-4">
   <table class="table mt-5"  id="myTable" class="display">
    <thead>
   <tr>
    <th>ID</th>
    <th>Name</th>
    <th>CNIC</th>
    <th>Role</th>
    <th>Department</th>
    <th>Enterence Date</th>
    <th>Outgoing Date</th>
    <th>Action</th>
</tr>
    </thead>

<tbody>
    @foreach ($visit as $vis )


    <tr>
        <td>#{{ $vis->id }}</td>
        <td>{{ $vis->name }}</td>
        <td>{{ $vis->user_cnic }}</td>
        <td>@if($vis->role=="currentstudent")Current Student
            @elseif($vis->role=="exstudent")Ex Student
            @elseif ($vis->role=="guest")Guest
            @else Vendor
            @endif</td>
        <td>{{ $vis->dname }}</td>
        <td>{{ $vis->created_at }}</td>
        <td> <b> Still in NCA</b></td>
    <td><button class="btn btn-danger"><a class="text-white" href="{{ route('visitorexit',['id'=>$vis->id]) }}"><i class="fa-solid fa-right-from-bracket"></i> Exit</button> </a> </td>






    </tr>
     @endforeach
</tbody>


</table>
</div>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>


@endsection
