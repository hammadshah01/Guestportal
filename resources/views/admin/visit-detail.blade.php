@extends('adminlayout.adminlayout')
@section('content')
    <style>
        .person-img img {
            width: 150px;
            height: 150px;
        }
        tr td {
            margin-left: 2rem
        }
    </style>


    @foreach ($visdet as $vis)
        <section class="card card-body mt-4 p-5">
            <div class="person-detail">
                 <div class="container">
                    <div class="row">
                        <div class="col">
                            @if (isset($vis->image))
                                <div class="person-img">
                                    <img src="{{ asset("assets/admin/$vis->image") }}" class="img-thumbnail">
                                </div>
                            @else
                                <div class="person-img">
                                    <img src="{{ asset('images/avatar.jpg') }}" class="img-thumbnail" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="col mt-5">
                            <h1>{{ $vis->name }}</h1>
                            <span>(@if ($vis->role == 'currentstudent')
                                    Current Student of NCA
                                @elseif($vis->role == 'exstudent')
                                    Ex Student of NCA
                                @elseif ($vis->role == 'guest')
                                    Guest
                                @else
                                    Vendor
                                @endif)</span>

                        </div>
                    </div>
                </div>

                <br>
                <div class="profile-section container">
                    <h3 style="font-family: 'Segoe ui';color:#c0392b" class="mt-5">Profile :</h3>

                    <table class="table mt-2">
                        <tbody>


                            <tr>
                                <th>Name</th>
                                <td>{{ $vis->name }}</td>
                            </tr>
                            <tr>
                                <th>Father Name</th>
                                <td>{{ $vis->fathername }}</td>
                            </tr>

                            <tr>
                                <th>Role</th>
                                <td>
                                    @if ($vis->role == 'currentstudent')
                                        Current Student of NCA
                                    @elseif($vis->role == 'exstudent')
                                        Ex Student of NCA
                                    @elseif ($vis->role == 'guest')
                                        Guest
                                    @else
                                        Vendor
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>No of Visits</th>
                                <td>{{ $vis->fathername }}</td>
                            </tr>

                            <tr>
                                <th>CNIC</th>
                                <td>{{ $vis->user_cnic }}</td>
                            </tr>
                            @isset($vis->yearofadmission)
                                <tr>
                                    <th>Year Of Admission</th>
                                    <td>{{ $vis->yearofadmission }}</td>
                                </tr>
                                <tr>
                                    <th>Year of Graduation</th>
                                    @if ($vis->yearofgraduation == '0')
                                        <td>Currently Study in NCA</td>
                                    @else
                                        <td>{{ $vis->yearofgraduation }}</td>
                                    @endif
                                </tr>
                            @endisset
                            <tr>
                                <th>Decipline Status</th>
                                <td>{{ $vis->status }}</td>
                            </tr>
                            <br>
                        </tbody>
                    </table>
                </div>
                <div class="profile-section container">
                    <h3 style="font-family: 'Segoe ui'; color:#c0392b" class="mt-5">Visit Information :</h3>

                    <table class="table mt-4 p-3">
                        <tbody>
                            <tr>
                                <th>Visited Department</th>
                                <td>{{ $vis->dname }}</td>
                            </tr>

                            <tr>
                                <th>Purpose</th>
                                <td>To visit {{ $vis->pname }}</td>
                            </tr>

                            <tr>
                                <th>Enterence Time</th>
                                <td>{{ $vis->created_at }}</td>
                            </tr>

                            <tr>
                                <th>Outgoing Time</th>
                                <td>{{ $vis->out }}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            </div>
            </div>
    @endforeach





    @foreach($allies as $aly)
    <div class="container">
        <h3 style="font-family: 'Segoe ui';color:#c0392b" class="mt-5">Other Person with Visitor :</h3>
<div class="row gap-1">
    <div class="col-4"><div class="card card-body" >
        <img src="{{ asset("assets/admin/$aly->image") }}" class="card-img-top w-100 mt-3" >
        <div class="card-title">Name: {{$aly->name}}
        </div>
        @isset($aly->cnic)
        <span class="card-description">CNIC: {{$aly->cnic}}</span>
        @endisset
     </div>
    </div>
</div>



    </div>



@endforeach


    @if (Session::has('successc'))
        <script>
            alertify.set('notifier', 'position', 'top-right');
            alertify.success('cache clear successfully');
        </script>
    @endif
    </section>
@endsection
