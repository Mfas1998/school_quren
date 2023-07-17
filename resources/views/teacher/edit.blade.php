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
<form action="{{route('teacher.update',$post->id)}}" method="post">
    <!-- {{-- @method('PUT') --}} -->
@csrf
<label for='exampleInputEmaill'>اسم الأستاذ </label><br>
    <input type="text" name="name" value="{{$post->name}}"><br>
    <label for='exampleInputEmaill'>الموهلات  </label><br>
    <input type="text" name="qualification" value="{{$post->qualification}}"><br>
    <label for='exampleInputEmaill'>العمل </label><br>
    <input type="text" name="work" value="{{$post->work}}"><br>
    <label for='exampleInputEmaill'>الراتب </label><br>
    <input type="text" name="salary" value="{{$post->salary}}"><br>
    <label for='exampleInputEmaill'>سنوات التدريس </label><br>
    <input type="text" name="teaching_years" value="{{$post->teaching_years}}"><br>
    <label for='exampleInputEmaill'>المركز الذي عمل فيه </label><br>
    <input type="text" name="center_they_work" value="{{$post->center_they_work}}"><br>
    <label for='exampleInputEmaill'>العنوان </label><br>
    <input type="text" name="address" value="{{$post->address}}"><br>
    {{--  <label for='exampleInputEmaill'>اسم الهوية </label><br>
    <input type="date" name="number_identity"><br>  --}}


     <label for='exampleInputEmaill'>نوع الهوية</label><br>
    <select class="form-control"name='identity_id'>
            @foreach($identity as $type_user)
                <option value="{{$type_user->id}}"{{$post->identity_id == $type_user->id ? 'selected':''}}>{{$type_user->type_identity}}</option>
            @endforeach
    </select></div><br>

    <label for='exampleInputEmaill'>الرقم الهوية</label><br>
        <input type="text" name="number_identity" value="{{$post->number_identity}}"><br>
    <label for='exampleInputEmaill'>الجنس </label><br>
            <input type="text" name="gender" value="{{$post->gender}}"><br>


    <label for='exampleInputEmaill'>الجنسيه</label><br>
        <select class="form-control"name='nationality_id'>
                    @foreach($nationality as $type_user)
                    <option value="{{$type_user->id}}"{{$post->nationality_id == $type_user->id ? 'selected':''}}>{{$type_user->name}}</option>
                    @endforeach
        </select> </div><br>

    <label for='exampleInputEmaill'> تاريخ  الميلاد   </label><br>
        <input type="text" name="birth_date" value="{{$post->birth_date}}"><br>
    <label for='exampleInputEmaill'>الموهل الدراسي </label><br>
            <select class="form-control"name='qualification_study_id'>
                    @foreach($Qualification_study as $type_user)
                        <option value="{{$type_user->id}}"{{$post->qualification_study_id == $type_user->id ? 'selected':''}}>{{$type_user->name}}</option>
                     @endforeach
            </select> </div><br>
    <label for='exampleInputEmaill'> المستخدم </label><br>
            <select class="form-control"name='users_id'>
                    @foreach($userss as $type_user)
                      <option value="{{$type_user->id}}"{{$post->users_id == $type_user->id ? 'selected':''}}>{{$type_user->name}}</option>
                    @endforeach
            </select> </div><br>

    <button type="submit">Insert</button>

</form>
</body>
</html>
