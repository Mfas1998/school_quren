
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
    <!-- Add Tickit-->
        <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="modal-header"><h5 class="modal-title  fw-bold" > Add Teacher</h5>
                    {{--  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  --}}
                </div>
                <div class="row clearfix g-3">
                <div class="col-sm-12">
                <div class="card mb-3">
                <div class="card-body">
            <form action="{{route('teacher.store')}}" method="post">
                @csrf
                    <div class="row g-3 mb-5"><div class="col"> <label for="depone" class="form-label">اسم الأستاذ</label> <input type="text" name="name" class="form-control"></div>
                            <div class="col"><label for="depone" class="form-label">العمل</label><input type="text" name="work" class="form-control"></div>
                                <div class="col"><label for="depone" class="form-label">الراتب</label><input type="text" name="salary" class="form-control"> </div>
                                <div class="col "><label for="depone" class="form-label">سنوات التدريس</label> <input type="date" name="teaching_years" class="form-control"></div></div>
                    <div class="row g-3 mb-5"><div class="col"><label for="depone" class="form-label">المركز الذي عمل فيه  </label><input type="text" name="center_they_work" class="form-control"></div>
                        <div class="col "><label for="depone" class="form-label">العنوان </label><input type="text" name="address" class="form-control"></div>
                        <div class="col"><label for='exampleInputEmaill' class="form-label">نوع الهوية</label><select class="form-control form-select"name='identity_id'>
                            @foreach($identity as $type_user)<option value="{{$type_user->id}}">{{$type_user->type_identity}}</option>
                            @endforeach  </select></div>
                            <div class="col "><label for="depone" class="form-label">الرقم الهوية</label><input type="text" name="number_identity" placeholder="" class="form-control"></div></div>
                    <div class="row g-3 mb-5"><div class="col"><label for='exampleInputEmaill' class="form-label">الجنس</label><select class="form-control form-select" name='gender_id'>
                        @foreach($gender as $type_gender) <option value="{{$type_gender->id}}">{{$type_gender->name}}</option>
                        @endforeach</select> </div>
                        <div class="col "><label for='exampleInputEmaill' class="form-label">الجنسيه</label><select class="form-control form-select" name='nationality_id'>
                        @foreach($nationality as $type_gender) <option value="{{$type_gender->id}}">{{$type_gender->name}}</option>
                        @endforeach</select></div>
                        <div class="col"><label for="depone" class="form-label"> تاريخ  الميلاد </label><input type="date" name="birth_date" class="form-control"></div>
                        <div class="col "><label for='exampleInputEmaill' class="form-label">الموهل الدراسي</label><select class="form-control form-select" name='qualification_study_id'>
                                            @foreach($Qualification_study as $type_gender) <option value="{{$type_gender->id}}">{{$type_gender->name}}</option>
                                            @endforeach</select></div></div>
                    <div class="row g-3 mb-5"><div class="col"><label for="depone" class="form-label">الايميل </label><input type="email" name="email" class="form-control"></div>
                        <div class="col "><label for="depone" class="form-label">رقم الجوال </label><input type="text" name="phone" class="form-control"></div>
                        <div class="col"><label for="depone" class="form-label">كلمة السر </label><input type="text" name="password" class="form-control"></div>

                        <div class="col "><label for='exampleInputEmaill' class="form-label">الوظيفة </label><select class="form-control form-select" name='job_id'>
                                            @foreach($job as $type_gender) <option value="{{$type_gender->id}}">{{$type_gender->name}}</option>
                                            @endforeach</select></div></div>
  <div class=" mb-3"><div class="col "><label for="depone" class="form-label">تأكيد كلمة ألسر</label><input type="text" name="password2" placeholder="" class="form-control"></div></div>
                    <div class="modal-footer"><button type="submit" class="btn btn-secondary">Insert</button><button type="button" class="btn btn-primary">Create</button></div>
            </form>
                </div> </div></div></div><!-- Row End --> </div></div>

<!-- Jquery Core Js -->
<script src="{{asset('/assets/bundles/libscripts.bundle.js')}}"></script>
<!-- Plugin Js-->
<script src="{{asset('/assets/bundles/dataTables.bundle.js')}}"></script>
</body>
</html>
<head>
@endsection



