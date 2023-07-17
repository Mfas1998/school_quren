<h1>The Teacher</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head><br>
<body>
<form action="{{route('parent.store')}}" method="post">
@csrf
          <label>أسم المستخدم</label><br>
    <input type="text" name="name"><br>
    <label>الجنس</label><br>
    <input type="text" name="gender"><br>
    <br><br><label>الوضيفة</label><br>
    <input type="text" name="job"><br>
    <br><br><label>صلة الرحم</label><br>
    <input type="text" name="link_kinship"><br>
    <label>حالة الاب</label><br>
    <input type="text" name="social_status"><br>
    <br>
    {{--  <input type="text" name="users_id"><br>  --}}

<div class='form-group'>
     <label for='exampleInputEmaill'>المسخدم</label>
    <select class="form-control"name='users_id'>
   @foreach($userss as $type_user)
     <option value="{{$type_user->id}}">{{$type_user->name}}</option>
  @endforeach
    </select></div><br>

 {{--  <label for='exampleInputEmaill'>الرقم الهوية</label><br>  --}}
    {{--  <input type="text" name="Number_identity"><br>  --}}
{{--  <div class='form-group'>  --}}
    {{--  <label for='exampleInputEmaill'>الجنس</label>  --}}
    {{--  <select class="form-control"name='sex_id'>  --}}

   {{--  @foreach($type as $type_user)  --}}
  {{--  <option value="{{$type_user->id}}">{{$type_user->type}}</option>  --}}
 {{--  @endforeach  --}}
{{--  </select> </div><br>  --}}
{{--  <div class='form-group'>  --}}
    {{--  <label for='exampleInputEmaill'>الجنسيه</label>  --}}
    {{--  <select class="form-control"name='sexual_id'>  --}}
   {{--  @foreach($types as $type_user)  --}}
{{--  <option value="{{$type_user->id}}">{{$type_user->name_sexual}}</option>  --}}
 {{--  @endforeach  --}}
{{--  </select> </div><br>  --}}


    <button type="submit">Insert</button>

</form>
</body>
</html>

