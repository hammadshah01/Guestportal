@extends('front-layout.inc.layout')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');

        body {
            font-family: 'Roboto', sans-serif;
        }

        i {
            margin-right: 10px;
        }

        #capture-btn {
            padding: 10px 40px;
            border: 2px solid #495057;
            background-color: #fff;
            border-radius: 10px
        }

        /*------------------------*/
        input:focus,
        button:focus,
        .form-control:focus {
            outline: none;
            box-shadow: none;
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: #fff;
        }

        /*----------step-wizard------------*/
        .d-flex {
            display: flex;
        }

        .justify-content-center {
            justify-content: center;
        }

        .align-items-center {
            align-items: center;
        }

        /*---------signup-step-------------*/
        .bg-color {
            background-color: #333;
        }

        .signup-step-container {
            padding: 150px 0px;
            padding-bottom: 60px;
        }




        .wizard .nav-tabs {
            position: relative;
            margin-bottom: 0;
            border-bottom-color: transparent;
        }

        .wizard>div.wizard-inner {
            position: relative;
            margin-bottom: 50px;
            text-align: center;
        }

        .connecting-line {
            height: 2px;
            background: #e0e0e0;
            position: absolute;
            width: 75%;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 15px;
            z-index: 1;
        }

        .wizard .nav-tabs>li.active>a,
        .wizard .nav-tabs>li.active>a:hover,
        .wizard .nav-tabs>li.active>a:focus {
            color: #555555;
            cursor: default;
            border: 0;
            border-bottom-color: transparent;
        }

        span.round-tab {
            width: 30px;
            height: 30px;
            line-height: 30px;
            display: inline-block;
            border-radius: 50%;
            background: #fff;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 16px;
            color: #0e214b;
            font-weight: 500;
            border: 1px solid #ddd;
        }

        span.round-tab i {
            color: #555555;
        }

        .wizard li.active span.round-tab {
            background: #0db02b;
            color: #fff;
            border-color: #0db02b;
        }

        .wizard li.active span.round-tab i {
            color: #5bc0de;
        }

        .wizard .nav-tabs>li.active>a i {
            color: #0db02b;
        }

        .wizard .nav-tabs>li {
            width: 25%;
        }

        .wizard li:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 0;
            margin: 0 auto;
            bottom: 0px;
            border: 5px solid transparent;
            border-bottom-color: red;
            transition: 0.1s ease-in-out;
        }



        .wizard .nav-tabs>li a {
            width: 30px;
            height: 30px;
            margin: 20px auto;
            border-radius: 100%;
            padding: 0;
            background-color: transparent;
            position: relative;
            top: 0;
        }

        .wizard .nav-tabs>li a i {
            position: absolute;
            top: -15px;
            font-style: normal;
            font-weight: 400;
            white-space: nowrap;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12px;
            font-weight: 700;
            color: #000;
        }

        .wizard .nav-tabs>li a:hover {
            background: transparent;
        }

        .wizard .tab-pane {
            position: relative;
            padding-top: 20px;
        }


        .wizard h3 {
            margin-top: 0;
        }

        .prev-step,
        .next-step {
            font-size: 13px;
            padding: 8px 24px;
            border: none;
            border-radius: 4px;
            margin-top: 30px;
        }


        .prev-step{
            background-color: #34495e;
            color: #fff
        }

        .next-step {
            background-color: #0db02b;
            color: #fff
        }

        .skip-btn {
            background-color: #34495e;
            color: #fff
        }

        .step-head {
            font-size: 20px;
            text-align: center;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .term-check {
            font-size: 14px;
            font-weight: 400;
        }

        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
            height: 40px;
            margin-bottom: 0;
        }

        .custom-file-input {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 40px;
            margin: 0;
            opacity: 0;
        }

        .custom-file-label {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            height: 40px;
            padding: .375rem .75rem;
            font-weight: 400;
            line-height: 2;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }

        .custom-file-label::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 3;
            display: block;
            height: 38px;
            padding: .375rem .75rem;
            line-height: 2;
            color: #495057;
            content: "Browse";
            background-color: #e9ecef;
            border-left: inherit;
            border-radius: 0 .25rem .25rem 0;
        }

        .footer-link {
            margin-top: 30px;
        }

        .all-info-container {}

        .list-content {
            margin-bottom: 10px;
        }

        .list-content a {
            padding: 10px 15px;
            width: 100%;
            display: inline-block;
            background-color: #34495e;
            position: relative;
            color: #fff;
            font-weight: 400;
            border-radius: 4px;
        }

        .list-content a[aria-expanded="true"] i {
            transform: rotate(180deg);
        }

        .list-content a i {
            text-align: right;
            position: absolute;
            top: 15px;
            right: 10px;
            transition: 0.5s;
        }

        .form-control[disabled],
        .form-control[readonly],
        fieldset[disabled] .form-control {
            background-color: #fdfdfd;
        }

        .list-box {
            padding: 10px;
        }

        .signup-logo-header .logo_area {
            width: 200px;
        }

        .signup-logo-header .nav>li {
            padding: 0;
        }

        .signup-logo-header .header-flex {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .list-inline li {
            display: inline-block;
        }

        .pull-right {
            float: right;
        }

        /*-----------custom-checkbox-----------*/
        /*----------Custom-Checkbox---------*/
        input[type="checkbox"] {
            position: relative;
            display: inline-block;
            margin-right: 5px;
        }

        input[type="checkbox"]::before,
        input[type="checkbox"]::after {
            position: absolute;
            content: "";
            display: inline-block;
        }

        input[type="checkbox"]::before {
            height: 16px;
            width: 16px;
            border: 1px solid #999;
            left: 0px;
            top: 0px;
            background-color: #fff;
            border-radius: 2px;
        }

        input[type="checkbox"]::after {
            height: 5px;
            width: 9px;
            left: 4px;
            top: 4px;
        }

        input[type="checkbox"]:checked::after {
            content: "";
            border-left: 1px solid #fff;
            border-bottom: 1px solid #fff;
            transform: rotate(-45deg);
        }

        input[type="checkbox"]:checked::before {
            background-color: #18ba60;
            border-color: #18ba60;
        }






        @media (max-width: 767px) {
            .sign-content h3 {
                font-size: 40px;
            }

            .wizard .nav-tabs>li a i {
                display: none;
            }

            .signup-logo-header .navbar-toggle {
                margin: 0;
                margin-top: 8px;
            }

            .signup-logo-header .logo_area {
                margin-top: 0;
            }

            .signup-logo-header .header-flex {
                display: block;
            }
        }
    </style>






<a href="{{ url('/') }}" class="text-white">
    <div id="close-btn" class="float-end pt-4 me-5">
        <i class="bi bi-x-square-fill"></i>
    </div>
</a>

<div class="visitor-heading text-center my-4">
    <div class="row"></div>
    <center> <img src="{{ asset("images/logo.png") }}" width="100px" class="ms-3" height="auto" alt=""></center>

</div>


    <section class="signup-step-container">

        <div class="container-fluid px-5">

            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                        aria-expanded="true"><span class="round-tab">1 </span> <i>Step 1</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                        aria-expanded="false"><span class="round-tab">2</span> <i>Step 2</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span
                                            class="round-tab">3</span> <i>Step 3</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span
                                            class="round-tab">4</span> <i>Step 4</i></a>
                                </li>
                            </ul>
                        </div>

                        <form role="form" action="{{ url('newvisitor') }}"  method="POST" class="login-box">
                            @csrf
                            <div class="tab-content" id="main_form">
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <h4 class="text-center">Step 1</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Full Name <span class="fw-bold text-danger">*</span></label>
                                                <input required class="form-control" type="text" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>father Name <span class="fw-bold text-danger">*</span></label>
                                                <input class="form-control" type="text" name="fathername" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CNIC <span class="fw-bold text-danger">*</span></label>
                                                <input class="form-control" type="text"
                                                    data-inputmask="'mask': '99999-9999999-9'" class="cnic"
                                                    placeholder="00000-0000000-0" name="cnic" value="{{$cnic}}"
                                                    required="">
                                            </div>
                                        </div>


                                        <script>
                                            $(":input").inputmask();
                                        </script>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Visitor Role <span class="fw-bold text-danger">*</span></label>
                                                <select required name="role" id=""  class="user-role form form-select">
                                                    <option name="exstudent" value="exstudent">Ex-Student (NCA)</option>
                                                    <option name="currentstudent" value="currentstudent">Current Student
                                                    </option>
                                                    <option name="guest" value="guest">Guest</option>
                                                    <option name="vendor" value="vendor">Vendor</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn next-step text-white">Continue to
                                                next step</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <h4 class="text-center">Step 2</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Campus <span class="fw-bold text-danger">*</span></label>
                                                <select required name="campus" id="" class="form form-select">
                                                    <option name="campus" value="main-campus">NCA Main Lahore Campus
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Decipline Status <span class="fw-bold text-danger">*</span></label>
                                                <select name="status" class="form form-select" id="">

                                                    <option value="satisfied">Satisfied</option>
                                                    <option value="blacklist">Blacklist</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="student-section">Admission Year <span class="fw-bold text-danger">*</span></label>
                                                <input type="text" name="admission_year" placeholder="eg: 2021"
                                                    class="student-section form form-control" id="">
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="student-section">Graduation Year <span class="fw-bold text-danger">*</span></label>
                                                <input type="text" name="graduation_year" value=""
                                                    id="g-year" placeholder="eg: 2025" class="student-section form form-control"
                                                    id="">
                                            </div>
                                        </div>

                                        <div class="col"> <label class="mt-2" for="">Other Person with users  <span class="text-danger fw-bold">*</span> </label>
                                            <select name="person" class="person form form-select" id="">


                                                <option value="1">Only Single Person</option>
                                                <option value="2">2 person</option>
                                                <option value="3">3 person</option>
                                                <option value="4">4 person</option>







                                            </select></div>


  </div>

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button>
                                        </li> --}}
                                        <li><button type="button"
                                                class="default-btn next-step text-white">Continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <h4 class="text-center">Step 3</h4>
                                    <label for="">Visit Profile Image (Person 1) <span
                                            class="fw-bold text-danger">*</span></label>
                                    <div class="row py-3 ">
                                        <div class="col-lg-6 col-md-12 mt-2">
                                            <div id="my_camera"></div>
                                            <br />
                                            <button type="button" id="capture-btn" onclick="take_snapshot()"><i
                                                    class="fa fa-camera"></i> Capture Image </button>
                                            <input type="hidden" name="image" class="image-tag" required>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div id="results">Your captured image will appear here...</div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <br />

                                        </div>
                                    </div>
                                    <div class="all-info-container">
                                        <div class="list-content lt-1">
                                            <a href="#listone" data-toggle="collapse" aria-expanded="false"
                                                aria-controls="listone">Person 2 <i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listone">
                                                <div class="list-box">
                                                    <div class="row">
                                                        <label for="">Person 2 Profile image <span
                                                                class="text-danger">*</span></label>
                                                                <div class="col-lg-6 col-md-12 mt-2">
                                                            <div class="w-25" id="my_camera2"></div>
                                                            <br />
                                                            <button type="button" id="capture-btn"
                                                                onclick="take_snapshot2()"><i class="fa fa-camera"></i>
                                                                Capture Image </button>
                                                            <input type="hidden" name="image2" class="image-tag2"
                                                                required>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 mt-2">
                                                            <div id="results2">Your captured image will appear here...
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <br />

                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Full Name <span class="fw-bold text-danger">*</span>
                                                                </label>
                                                                <input class="form-control" type="text"
                                                                    name="name2">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">


                                                            <div class="form-group">
                                                                <label>CNIC (optional)<span class="fw-bold text-danger">
                                                                        *</span> </label>
                                                                <input class="form-control" type="text" name="cnic2"
                                                                    data-inputmask="'mask': '99999-9999999-9'"
                                                                    class="cnic" placeholder="00000-0000000-0">
                                                            </div>
                                                            <script>
                                                                $(':input').inputmask();
                                                            </script>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content lt-2">
                                            <a href="#listtwo" data-toggle="collapse" aria-expanded="false"
                                                aria-controls="listtwo">Person 3 <i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listtwo">
                                                <div class="list-box">
                                                    <div class="row">
                                                        <label for="">Person 3 Profile Image <span
                                                                class="text-danger">*</span></label>
                                                                <div class="col-lg-6 col-md-12 mt-2">
                                                            <div class="w-25" id="my_camera3"></div>
                                                            <br />
                                                            <button type="button" id="capture-btn"
                                                                onclick="take_snapshot3()"><i class="fa fa-camera"></i>
                                                                Capture Image </button>
                                                            <input type="hidden" name="image3" class="image-tag3"
                                                                required>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 mt-2">
                                                            <div id="results3">Your captured image will appear here...
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <br />

                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Full Name <span class="fw-bold text-danger">*</span>
                                                                </label>
                                                                <input class="form-control" type="text" name="name3"
                                                                    placeholder="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">


                                                            <div class="form-group">
                                                                <label>CNIC (optional)<span class="fw-bold text-danger">
                                                                        *</span> </label>
                                                                <input class="form-control" type="text" name="cnic3"
                                                                    data-inputmask="'mask': '99999-9999999-9'"
                                                                    class="cnic" placeholder="00000-0000000-0">
                                                            </div>
                                                            <script>
                                                                $(':input').inputmask();
                                                            </script>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content lt-3">
                                            <a href="#listthree" data-toggle="collapse" aria-expanded="false"
                                                aria-controls="listthree">Person 4 <i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listthree">
                                                <div class="list-box">
                                                    <div class="row">
                                                        <label for="">Person 3 Profile Image <span
                                                                class="text-danger">*</span></label>
                                                                <div class="col-lg-6 col-md-12 mt-2">
                                                            <div class="w-25" id="my_camera4"></div>
                                                            <br />
                                                            <button type="button" id="capture-btn"
                                                                onclick="take_snapshot4()"><i class="fa fa-camera"></i>
                                                                Capture Image </button>
                                                            <input type="hidden" name="image4" class="image-tag4"
                                                                required>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 mt-2">
                                                            <div id="results4">Your captured image will appear here...
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <br />

                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Full Name <span class="fw-bold text-danger">*</span>
                                                                </label>
                                                                <input class="form-control" type="text" name="name4"
                                                                    placeholder="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">


                                                            <div class="form-group">
                                                                <label>CNIC (optional)<span class="fw-bold text-danger">
                                                                        *</span> </label>
                                                                <input class="form-control" type="text" name="cnic4"
                                                                    data-inputmask="'mask': '99999-9999999-9'"
                                                                    class="cnic" placeholder="00000-0000000-0">
                                                            </div>
                                                            <script>
                                                                $(':input').inputmask();
                                                            </script>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <script language="JavaScript">
                                        Webcam.set({
                                            width: 490,
                                            height: 350,
                                            image_format: 'jpeg',
                                            jpeg_quality: 90
                                        });

                                        Webcam.attach('#my_camera');

                                        function take_snapshot() {
                                            Webcam.snap(function(data_uri) {
                                                $(".image-tag").val(data_uri);
                                                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                                            });
                                        }
                                    </script>



                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button>
                                        </li> --}}
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <h4 class="text-center">Step 4</h4>

<div class="row">
    <div class="col"> <label class="mt-4" for="">Enter Visitor Purpose  <span class="text-danger">*</span> </label>


        <select name="purpose" class="form form-select" id="">
        @foreach ($pur as $pur)
        <option class="{{$pur->class}}" value="{{ $pur->id }}">{{ $pur->pname }}</option>
        @endforeach
    </select>
</div>


    <div class="col"> <label class="mt-4" for="">Department to visit  <span class="text-danger">*</span> </label>
        <select name="department" class="form form-select" id="">

            @foreach ($department as $dep)
            <option value="{{ $dep->id }}">{{ $dep->dname }}</option>
            @endforeach
        </select>
    </div>
</div>

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="submit" class="default-btn next-step">Finish</button></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>



    <script>
        // ------------step-wizard------------
        $(document).ready(function() {

            $('.nav-tabs > li a[title]').tooltip();
            //Wizard
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {

                var target = $(e.target);

                if (target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".next-step").click(function(e) {
                var active = $('.wizard .nav-tabs li.active');
                active.next().removeClass('disabled');
                nextTab(active);

            });
            $(".prev-step").click(function(e) {

                var active = $('.wizard .nav-tabs li.active');
                prevTab(active);
            });
        });

        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }

        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }
        $('.nav-tabs').on('click', 'li', function() {
            $('.nav-tabs li.active').removeClass('active');
            $(this).addClass('active');
        });
    </script>


    {{-- SCRIPT FOR PERSON 2 --}}
    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera2');
        function take_snapshot2() {
            Webcam.snap(function(data_uri) {
                $(".image-tag2").val(data_uri);
                document.getElementById('results2').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>

    {{-- SCRIPT FOR PERSON 3 --}}
    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera3');

        function take_snapshot3() {
            Webcam.snap(function(data_uri) {
                $(".image-tag3").val(data_uri);
                document.getElementById('results3').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>

    {{-- SCRIPT FOR PERSON 4 --}}
    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera4');

        function take_snapshot4() {
            Webcam.snap(function(data_uri) {
                $(".image-tag4").val(data_uri);
                document.getElementById('results4').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>

<script>
    $(".user-role").change(function() {
    var firstVal=$("option:selected", this).val();
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


{{-- FOR PURPOSE ACCORDING TO ROLE --}}


<script>
$('.person').change(function(){
    var perVal = $("option:selected", this).val();

    if(perVal=='1'){
        $('.lt-1').hide();
        $('.lt-2').hide();
        $('.lt-3').hide();
    }else if(perVal=='2')
    {   $('.lt-1').show();
        $('.lt-2').hide();
        $('.lt-3').hide();
    }else if(perVal=='3'){
        $('.lt-1').show();
        $('.lt-2').show();
        $('.lt-3').hide();
    }else if(perVal=='4'){
        $('.lt-1').show();
        $('.lt-2').show();
        $('.lt-3').show();
    }
})
</script>


<script>
    $(".user-role").change(function() {

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



<script>
$(document).ready(function(){
  var perVal=  $('.person').val();
  if(perVal=='1'){
        $('.lt-1').hide();
        $('.lt-2').hide();
        $('.lt-3').hide();
    }else if(perVal=='2')
    {   $('.lt-1').show();
        $('.lt-2').hide();
        $('.lt-3').hide();
    }else if(perVal=='3'){
        $('.lt-1').show();
        $('.lt-2').show();
        $('.lt-3').hide();
    }else if(perVal=='4'){
        $('.lt-1').show();
        $('.lt-2').show();
        $('.lt-3').show();
    }
})
</script>


@endsection
