
@extends('front-layout.inc.layout')
@section('content')



<style>
    h1,h4{
        font-family: 'Poppins', sans-serif;
    }
    a i{
font-size: 4rem;
color: #2f3640;
cursor: pointer;
    }
    .no-user{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }

    .no-user button{
        position: absolute;
        top: 85%;
        left: 50%;
        transform: translate(-50%,-50%);
    }

    .visitor-det{
        border-right: 1px solid #e2e2e2;
    }

    @media only screen and (max-width: 600px) {
        .visitor-det{
            border:none;
  }
}

</style>


<div class="container-fluid">
    @if(isset($visitor))
    @foreach ($visitor as $vis)


    <div class="visitor-heading text-center my-4">
        <div class="row"></div>
        <img src="{{ asset("images/logo.png") }}" width="100px" height="auto" alt="">
        <h1>Visitor Information</h1>
    </div>

    <div class="container">
        <div class="success-message custom-toast alert alert-success py-2">
            <div class="row">
                <div class="col-11">Visitor found successfully !</div>
                       <div class="col-1 text-bold"><i class="fa-sharp fa-solid fa-xmark"></i></div>
                </div>
            </div>
    </div>

<div class="row gap-4 px-5">
    {{-- <h1>Visitor Information</h1> --}}
    <div class="col-lg-6 pe-lg-5 pe-md-0 visitor-det mt-5">
        <div class="row gap-2  ps-4">
         <div class="col-lg-2 col-md-4 align-item-center col-md-4">

@if(isset($vis->image))
                <div class="user-image">
                    <img style="display:flex;justify-content:center;" src="{{ asset("assets/admin/$vis->image") }}" class="rounded-circle" width="100px" height="100px" alt="">
                </div>
@else
<div class="user-image">
    <img style="display:flex;justify-content:center;" src="{{ asset("images/avatar.jpg") }}" class="rounded-circle" width="100px" height="100px" alt="">
</div>
@endif



            </div>

            <div class="col-lg-4 col-md-12"> <h3 class="mt-2 text-capitalize"  >{{ $vis->name }}</h3>
            <p>@if($vis->role=="currentstudent")Current Student of NCA
                @elseif($vis->role=="exstudent")Ex Student of NCA
                @elseif ($vis->role=="guest")Guest
                @else Vendor
                @endif</p> </div>
            <div class="col-2">
                @if($vis->status=="satisfied")
            <span class="text-success display-5"><i class="bi bi-patch-check-fill"></i></span>
            @else
            <span class="text-danger display-5"><i class="fa-solid fa-ban"></i></span>
            @endif
            </div>
        </div>


        <div class="visitor-profile px-lg-5 px-md-0 mt-5">





            <div class="row mt-5">



                {{-- Name Section --}}
                <div class="col mt-3">


                    <label for="">Fahter Name <span class="stec text-danger">*</span></label>
                    <input type="text" class="form-control" readonly name="" value="{{ $vis->name }}" id="">
                </div>

                <div class="col mt-3">
                    <label for="">Fahter Name <span class="stec text-danger">*</span></label>
                    <input type="text" class="form-control" readonly name="" value="{{ $vis->fathername }}" id="">
                </div>
            </div>

            <div class="row mt-3">
                <label for="">CNIC Number <span class="stec text-danger">*</span></label>
                <div class="col">
                    <input type="text" class="form-control" readonly name="" value="{{ $vis->cnic }}" id="">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <label for="">Visitor Role <span class="stec text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize" name="" id="role" data-role={{$vis->role}} readonly value=" @if($vis->role=="currentstudent")Current Student
                    @elseif($vis->role=="exstudent")Ex Student
                    @elseif ($vis->role=="guest")Guest
                    @else Vendor
                    @endif" id="">
                </div>
            </div>

            <div class="row mt-3">
                @isset($vis->yearofadmission)


                <div class="col">
                    <label for="">Admission Year <span class="stec text-danger">*</span></label>
                    <input type="text" class="form-control" name="" readonly value="{{ $vis->yearofadmission }}" id="">
                </div>

                <div class="col">
                    <label for="">Year of Graduation <span class="stec text-danger">*</span></label>

@if($vis->yearofgraduation==0)<input type="text" class="form-control" name="" readonly value="Present" id=""> @else <input type="text" class="form-control" name="" readonly  value="{{ $vis->yearofgraduation }}" id=""> @endif
                </div>
                @endisset
                <div class="col">
                    <label for="">Decipline Status <span class="stec text-danger">*</span></label>
                    <input type="text" class="form-control" name="" readonly value="{{ $vis->status}}" id="">
                </div>

                <div class="col">
                    <label for="">Number of Visits <span class="stec text-danger">*</span></label>
                    <input type="text" class="form-control fw-bold" name="" readonly value="#{{ $num}}" id="">
                </div>
            </div>
            </div>

    </div>



    <div class="col ps-lg-5 ps-ms-0 col-lg-4 col-md-12 mt-5">
        <h4 class="card-title mt-5 pt-5">Enter Visitor Purpose</h4>
            <form action="{{url('uservisitsave') }}" method="POST">
@csrf()
<input type="hidden" name="user_cnic" value="{{ $vis->cnic }}" id="">

        <div class="purpose-text ">
            <label class="mt-5" for="">Visitor Purpose <span class="stec text-danger">*</span></label>
            <select name="purpose" id="purpose" class="form form-select" id="">
                @foreach ($pur as $pur2)
                <option class="{{$pur2->class}}" value="{{ $pur2->id }}">{{ $pur2->pname }}</option>

                @endforeach
            </select>
           </div>


<label class="mt-3" for="">Visited Department <span class="stec text-danger">*</span></label>
<select name="department" id="" class="form form-select">
    @foreach ($department as $dep)
    <option value="{{ $dep->id }}">{{ $dep->dname }}</option>
    @endforeach
</select>
<button type="submit" class="btn btn-success mt-4">Confirm Visit</button>
  </form>
  <a href="{{ url('/') }}"><button class="btn btn-outline-primary mt-4">  Back to home</button></a>  </div>
</div>
@endforeach
@endif


@if( isset($norecord))

<div class="visitor-heading text-center my-4">
    <img src="{{ asset("images/logo.png") }}" width="100px" height="auto" alt="">
    <h1>Visitor Information</h1>
</div>
<div class="container">
   <div class="create-visitor my-5">


    <div class="success-message custom-toast alert alert-danger py-2">
        <div class="row">
            <div class="col-11">No visitor found create a new one !</div>
                   <div class="col-1 text-bold"><i class="fa-sharp fa-solid fa-xmark"></i></div>
            </div>
        </div>




        <div class="card body ">
            <div class="card-title h5 border border-bottom-1 card-body bg bg-light">
                Add Visitor Form
            </div>

    <form action="{{ url('newvisitor') }}"  class="p-5" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="enter-visitor-form">

        <div class="row">


            <div class="col"> <label for="cnic">Enter Visitor Name:</label> <div class="input-field form-control"> <span class="far fa-user p-2"></span> <input required style="border:none;outline:none"  type="text" name="name" placeholder="Enter Full Name" required> </div></div>

             <div class="col"><label for="cnic">Enter Visitor / Student Father Name:</label> <div class=" input-field form-control"> <span class="far fa-user p-2"></span> <input style="border:none;outline:none"  required type="text" name="fathername" placeholder="Enter Father Name" required> </div></div>
        </div>

        <div class="row mt-3">

              <div class="col-lg-4 col-sm-12"> <label for="cnic">Enter Visitor CNIC No:</label> <div class="input-field form-control"> <span class="fa fa-address-card p-2"></span> <input required style="border:none;outline:none"  type="text" data-inputmask="'mask': '99999-9999999-9'" class="cnic"  placeholder="00000-0000000-0" value="{{$cnic}}"  name="cnic" required="" > </div></div>
             <div class="col col-lg-4 role col-sm-12">
                <label for="">Role <i class="bi bi-gear"></i></label>
        <select required name="role" id="" class="form form-select">
            <option name="exstudent" value="exstudent">Ex-Student (NCA)</option>
            <option name="currentstudent" value="currentstudent">Current Student</option>
            <option name="guest" value="guest">Guest</option>
            <option name="vendor" value="vendor">Vendor</option>
        </select>
            </div>


            <div class="col col-lg-4 role col-sm-12">
                <label for="">Campus <i class=" fa fa-building-columns"></i></label>
        <select required name="campus" id="" class="form form-select">
            <option name="campus" value="main-campus">NCA Main Lahore Campus</option>
        </select>
            </div>
        </div>
        <div class="row my-3">






        </div>

        <div class="row mt-2 student-section">

            <div class="col">
                <label for="">Admission Year <i class="bi bi-box-arrow-in-right"></i></label>
        <input type="text" name="admission_year" placeholder="eg: 2021" class="form form-control" id="">
            </div>

            <div class="col">
                <label for="">Year of Graduation <i class="fa fa-graduation-cap"></i></label>
             <input type="text" name="graduation_year" value="" id="g-year" placeholder="eg: 2025" class="form form-control" id="">
            </div>

            <div class="col">
                <label for="">Decipline Status</label>
                <select name="status" class="form form-select" id="">

                    <option value="satisfied" class="text-success">Satisfied</option>
                    <option value="blacklist" class="text-danger text-bold">Blacklist</option>
                </select>
             </div>
        </div>








            <div class="row mt-5 bg bg-light py-3 ">
                <label for="">Visitor Image <span class="text-danger">*</span></label>
                <div class="col-md-6 mt-2">
                    <div id="my_camera"></div>
                    <br/>
                    <input type=button class="btn btn-danger" value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="image" class="image-tag" required>
                </div>
                <div class="col-md-6">
                    <div id="results">Your captured image will appear here...</div>
                </div>
                <div class="col-md-12 text-center">
                    <br/>

                </div>
            </div>



    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach( '#my_camera' );

        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }
    </script>
    </div>


<div class="row">
    <div class="col"> <label class="mt-4" for="">Enter Visitor Purpose  <span class="text-danger">*</span> </label>


        <select name="purpose" class="form form-select" id="">
        @foreach ($pur as $pur)
        <option class="{{$pur->class}}" value="{{ $pur->id }}">{{ $pur->pname }}</option>

        @endforeach
    </select></div>



    <div class="col"> <label class="mt-4" for="">Department to visit  <span class="text-danger">*</span> </label>
        <select name="department" class="form form-select" id="">

            @foreach ($department as $dep)
            <option value="{{ $dep->id }}">{{ $dep->dname }}</option>
            @endforeach




        </select></div>


        <div class="col"> <label class="mt-4" for="">Other Person with users  <span class="text-danger">*</span> </label>
        <select name="department" class="form form-select" id="">


            <option value="1">1 person</option>
            <option value="1">2 person</option>
            <option value="1">3 person</option>
            <option value="1">4 person</option>
            <option value="1">5 person</option>
            <option value="1">6 person</option>
            <option value="1">7 person</option>
            <option value="1">8 person</option>






        </select></div>
</div>

<div class="purpose-section">


    <button type="submit" class="btn btn-success  mt-4">Add Record</button>
</div>
</div>
{{-- END VISITOR ADD FORM --}}


            </form>
        </div>



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



    </div>
</div>



@endif


@if(Session::has('error3')){
   <script>
 alertify.set('notifier', 'position', 'top-right');
alertify.error('User is already in NCA');
    </script>
}

@endif



<script>
  $('.fa-xmark').click(()=>{
            $('.custom-toast').hide();
        })
</script>






{{-- FOR PURPOSE ACCORDING TO ROLE --}}


<script>
$(".role").change(function() {

var firstVal = $("option:selected", this).val();
if(firstVal=="currentstudent"){
   $('.exstudent').hide();
}
else if(firstVal=="exstudent"){
    $('.exstudent').show();
}
else if(firstVal=="guest" || firstVal=="vendor")
{
    $('.exstudent').hide()
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





</div>



{{-- For Student Found Successfully --}}
<script>
    $(document).ready(()=>{
        var conceptName = $('#role').data('role');
       if(conceptName=="exstudent"){
        $('.exstudent').show();
        $('.vendor').hide();
        $('.guest').hide();
       }else if(conceptName=="vendor")
       {
        $('.exstudent').hide();
        $('.vendor').show();
        $('.guest').hide();
       }else if(conceptName=="guest")
       {
        $('.exstudent').hide();
        $('.vendor').hide();
        $('.guest').show();
       }else{
        $('.vendor').show();
        $('.guest').show();
        $('.exstudent').show();

       }
    })
</script>
{{-- END STUDENT FOUND CODE FOR THE PURPOSE --}}


@endsection
