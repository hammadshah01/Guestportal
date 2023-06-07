@extends('adminlayout.adminlayout')
@section('content')
@if(Session::has('success'))

<script>
    alertify.set('notifier','position', 'top-right');
      alertify.success('Data Added Successfully');
</script>

@endif
@if (Session::has('error'))
<script>
    alertify.set('notifier','position', 'top-right');
    alertify.error('Something went wrong');
</script>
@endif

<div class="card-title">Upload Excel File</div>
<div class="demo-import">
    <a href="{{ asset("assets/excel/visitors.csv") }}" download="visitor">
    <button class="btn btn-primary">
        Download Demo File <i class="bi bi-file-earmark-ruled"></i>
    </button>
</a>
</div>

<div class="card body p-5 ">

<center>
            <img src="{{ asset('images/excel.png') }}" width="100px" height="auto" alt="">
</center>
 <br>
<h4 for="" >Upload Excel File:</h4>
<p style="font-size:11px ;color:#34495e">Note: CSV,TSV,XLS or XLSX is recomended</p>
<form action="{{ url('excel-input') }}" method="POST" enctype="multipart/form-data">
    @csrf()

<input type="file" name="file" class="form-control" required>

<button type="submit" class="btn btn-success mt-4 col-lg-2 col-md-12">Upload File</button>
    </form>
</div>
@if(session::has('successc'))
<script>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('cache clear successfully');
</script>

@endif

@endsection
