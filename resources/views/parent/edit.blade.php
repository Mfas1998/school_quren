<h1>The update</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('parent.update',$post->id)}}" method="post">
    {{--  @method('PUT')  --}}
@csrf
<label>أسم المستخدم</label><br>
    <input type="text" name="name" value="{{$post->name}}"><br>
    <label>الجنس</label><br>
    <input type="text" name="gender" value="{{$post->gender}}"><br>
    <br><br><label>الوضيفة</label><br>
    <input type="text" name="job" value="{{$post->job}}"><br>
    <br><br><label>صلة الرحم</label><br>
    <input type="text" name="link_kinship" value="{{$post->link_kinship}}"><br>
    <label>حالة الاب</label><br>
    <input type="text" name="social_status" value="$post->social_status"><br>
    <br>
    {{--  <input type="text" name="users_id"><br>  --}}

<div class='form-group'>
     <label for='exampleInputEmaill'>المسخدم</label>
    <select class="form-control"name='users_id'>
   @foreach($userss as $type_user)
     <option value="{{$type_user->id}}"{{$post->users_id == $type_user->id ? 'selected':' '}}>{{ $type_user->name }}</option>
  @endforeach
    </select>
</div><br>
 <button type="submit">updaterInsert</button>


</form>
</body>
</html>
