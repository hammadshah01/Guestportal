@extends('adminlayout.adminlayout')
@section('content')
<style>
    input{ border: none;
       outline:none;
       width:"95%"}
       label{
           margin-top: 1.5rem;
           font-family: 'poppins';
           font-size: 0.9rem
       }
   </style>

       <div class="card-title">
      Edit Visitor
   </div>
   <div class="row">
       <div class="col-9"></div>
       <div class="col-lg-2 col-md-4 my-2 ms-auto"> <a href="{{ url('all-visitors') }}"><button class="btn btn-primary float-left"><i class=" mt-3 bi bi-skip-backward-fill"></i>&nbsp; Go Back</button></a> </div>
   </div>


   <div class="card body p-5 ">
@foreach ($visitor as $vis)


       <form action="{{ url('visitoreditsave') }}" method="POST" enctype="multipart/form-data">
           @csrf


   <div class="row">
       <div class="col"> <label for="cnic">Enter Visitor Name:</label> <div class="input-field form-control"> <span class="far fa-user p-2"></span> <input class="w-75" required  type="text" name="name" placeholder="Enter Full Name" value="{{$vis->name}}" required> </div></div>
        <div class="col"><label for="cnic">Enter Visitor / Student Father Name:</label> <div class=" input-field form-control"> <span class="far fa-user p-2"></span> <input class="w-75" required value="{{$vis->fathername}}" type="text" name="fathername" placeholder="Enter Father Name" required> </div></div>
   </div>
<input type="hidden" name="userid" value="{{$vis->id}}" id="">
   <div class="row mt-3">

         <div class="col"> <label for="cnic">Enter Visitor CNIC No:</label> <div class="input-field form-control"> <span class="fa fa-address-card p-2"></span> <input required type="text" value="{{$vis->cnic}}" data-inputmask="'mask': '99999-9999999-9'" class="cnic w-75"  placeholder="00000-0000000-0"  name="cnic" required="" > </div></div>

       <div class="col col-lg-4 role col-sm-12">
           <label for="">Role <i class="bi bi-gear"></i></label>
   <select required name="role" id=""  class="role form form-select">
       <option @if($vis->role=='exstudent') selected @endif name="exstudent" value="exstudent">Ex-Student (NCA)</option>
       <option   @if($vis->role=='currentstudent') selected @endif name="currentstudent" value="currentstudent">Current Student</option>
       <option  @if($vis->role=='guest') selected @endif name="guest" value="guest">Guest</option>
       <option   @if($vis->role=='vendor') selected @endif   name="vendor" value="vendor">Vendor</option>
   </select>
       </div>


       <div class="col col-lg-4  col-sm-12">
           <label for="">Campus <i class="bi bi-gear"></i></label>
   <select required name="campus" id="" class="form form-select">
       <option name="exstudent" value="exstudent">NCA Lahore main campus</option>

   </select>
       </div>
   </div>



   <div class="row mt-2 student-section">

       <div class="col">
           <label for="">Admission Year <i class="bi bi-box-arrow-in-right"></i></label>
   <input type="text" name="admission_year" placeholder="eg: 2021" @if(isset($vis->yearofadmission)) VALUE="{{$vis->yearofadmission}}" @endif class="form form-control" id="">
       </div>

       <div class="col">
           <label for="">Year of Graduation <i class="fa fa-graduation-cap"></i></label>
        <input type="text" name="graduation_year" id="g-year"   @if(isset($vis->yearofgraduation)) value="{{$vis->yearofgraduation}}" @endif  placeholder="eg: 2025" class="form form-control" id="">
       </div>

       <div class="col">
           <label for="">Decipline Status</label>
           <select name="status" class="form form-select" id="">

               <option value="satisfied"  @if($vis->status=="satisfied") selected @endif class="text-success">Satisfied</option>
               <option value="blacklist"    @if($vis->status=="blacklist") selected @endif   class="text-danger text-bold">Blacklist</option>
           </select>
        </div>
   </div>


   <label for="" >Upload Image:</label>
   <input type="file" name="visitor-img" class="form-control ">


   <button class="btn btn-success mt-4">Add Record</button>
       </form>
       @endforeach
   </div>




   @if(Session::has('success'))
   <script>
       alertify.set('notifier', 'position', 'top-right');
       alertify.success('Visitor Data Edit Successfully');
   </script>
   @endif

<script>
    $(document).ready(()=>{
var i=$('.role :selected').val();
if(i=="guest" || i=="vendor"){
    $('.student-section').hide();
}else{
    $('.student-section').show();
   }

    });

</script>





    <script>
       $(":input").inputmask();
      </script>



   <script>
   $(".role").change(function() {

   var firstVal = $("option:selected", this).val();
   if(firstVal=="currentstudent"){
       $('#g-year').val("Present");
       $('.student-section').show();
   }
   else if(firstVal=="exstudent"){
       $('#g-year').val(null);
       $('.student-section').show();
   }

   else if(firstVal=="guest" || firstVal=="vendor"){
   $('.student-section').hide()
   }else{
       $('.student-section').show();
   }
   });
   </script>

@endsection
