
@extends('admin.layout.master')
@section('content')
<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: My-Task:: Tickets</title>
    <link rel="icon" href="{{asset('/favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{asset('/assets/css/dataTables.bootstrap5.min.css')}}">
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('/assets/css/my-task.style.min.css')}}">
</head>
<body>
        <!-- Body: Body -->
        <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Table Teacher</h3>
                            <div class="col-auto d-flex w-sm-100">
                                <a href="{{route('teacher.insert')}}"><button type="button" class="btn btn-dark btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i>Add Teacher</button></a>
                            </div>
                        </div>
                    </div>
                </div> <!--Row end-->
                <div class="row clearfix g-3">
                  <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table  id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Work</th>
                                            <th>Salary</th>
                                            <th>Teaching</th>
                                            <th>Center</th>
                                            <th>Address</th>
                                            <th>Identity</th>
                                            <th>Number</th>
                                            <th>Gender</th>
                                            <th>Nationality</th>
                                            <th>Date_birth</th>
                                            <th>qualification</th>
                                            {{--  <th>email</th>
                                            <th>phone</th>
                                            <th>password</th>
                                            <th>job</th>  --}}
                                            <th>Pro_e</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{$post->id}}</td>
                                                <td>{{$post->name}}</td>
                                                <td>{{$post->work}}</td>
                                                <td>{{$post->salary}}</td>
                                                <td>{{$post->teaching_years}}</td>
                                                <td>{{$post->center_they_work}}</td>
                                                <td>{{$post->address}}</td>
                                                <td>{{$post->identity->type_identity}}</td>
                                                <td>{{$post->number_identity}}</td>
                                                <td>{{$post->gender->name}}</td>
                                                <td>{{$post->nationality->name}}</td>
                                                <td>{{$post->birth_date}}</td>
                                                <td>{{$post->Qualification_study->name}}</td>
                                                {{--  <td>{{$post->email}}</td>
                                                <td>{{$post->phone}}</td>
                                                <td>{{$post->password}}</td>
                                                <td>{{$post->job->job_id}}</td>  --}}
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">

                                                        {{--  <a href"{{route('teacher.edit',$post->id)}}"> <button type="button" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></button></a>  --}}
                                                        <a class="btn btn-outline-secondary" href="{{route('teacher.edit',$post->id)}}",  style="background: red ,"><i class="icofont-edit text-success"></i></a>
                                                        <a href="{{route('teacher.destroy',$post->id)}}"><button type="button" class="btn btn-outline-secondary"><i class="icofont-ui-delete text-danger"></i></button></a>
                                                      </div>
                                             </td>
                                         </tr>

                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                  </div>
                </div><!-- Row End -->
            </div>
        </div>
<!-- Jquery Core Js -->
<script src="{{asset('/assets/bundles/libscripts.bundle.js')}}"></script>
<!-- Plugin Js-->
<script src="{{asset('/assets/bundles/dataTables.bundle.js')}}"></script>
</body>
</html>
<head>

@endsection
