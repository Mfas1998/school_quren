<center><h1>The Episades</h1></center>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
<form action="{{route('quran.store')}}" method="post">
@csrf
<br>
<label for='exampleInputEmaill'>اسم الحلقه</label><br>
    <input type="text" name="name"><br>

<label for='exampleInputEmaill'>اسم </label><br>
                <select class="form-control"name='teacher_id'>
                    @foreach($teacher as $type_user)
                        <option value="{{$type_user->id}}"{{$post->teacher_id == $type_user->id ? 'selected':''}}>{{$type_user->name}}</option>
                    @endforeach
                </select></div> <br>
<label for='exampleInputEmaill'>الفتراة</label><br>
    <input type="text" name="period"><br>
<label for='exampleInputEmaill'>الجنس</label><br>
<select class="form-control"name='gender_id'>
    @foreach($gender as $type_user)
        <option value="{{$type_user->id}}">{{$type_user->name}}</option>
    @endforeach
</select>
    {{--  <input type="text" name="gender"><br>  --}}

<label for='exampleInputEmaill'>نظام الحلقة</label><br>
    <select class="form-control"name='system_episoded_id'>
        @foreach($system_episodes as $type_user)
            <option value="{{$type_user->id}}"{{$post->system_episoded_id == $type_user->id ? 'selected':''}}>{{$type_user->name}}</option>
        @endforeach
    </select> </div><br>


    <button type="submit">Insert</button>

</form>
</center>
</body>
</html>
