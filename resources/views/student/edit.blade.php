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
<form action="{{route('student.update',$post->id)}}" method="post">
    <!-- {{-- @method('PUT') --}} -->
@csrf
<label for='exampleInputEmaill'>الاسم اطالب</label>
    <input type="text" name="Name_student"value="{{$post->Name_student}}">><br>

    <label for='exampleInputEmaill'>التاريخ الميلاد</label>
    <input type="date" name="Date_birth"value="{{$post->Date_birth}}"><br>
    <label for='exampleInputEmaill'>العنوان</label>
    <input type="text" name="Address"value="{{$post->Address}}"><br>
    <label for='exampleInputEmaill'> الفصل</label>
    <input type="text" name="Chapret"value="{{$post->Chapret}}"><br>
    <label for='exampleInputEmaill'>المدرسه</label>
    <input type="text" name="School"value="{{$post->School}}"><br>

    <label for='exampleInputEmaill'>نوع الهوية</label>
    <select class="form-control"name='identtity_id'>

   @foreach($identity as $type_user)
     <option value="{{$type_user->id}}"{{$post ->identtity_id == $type_user->id ? 'selected':''}}>{{$type_user->type_identity}}</option>
  @endforeach
    </select>
</div>
<br> <label for='exampleInputEmaill'>الرقم الهوية</label>
    <input type="text" name="Number_identity" value="{{$post->Number_identity}}"><br>
    //

    <label for='exampleInputEmaill'>الجنس</label>
    <select class="form-control"name='sex_id'>

   @foreach($sex as $type_user)
<option value="{{$type_user->id}}"{{$post->sex_id == $type_user->id ? 'selected':''}}>{{$type_user->type}}</option>
 @endforeach
</select> </div><br>
    <label for='exampleInputEmaill'>الجنسيه</label>
    <select class="form-control"name='sexual_id'>
   @foreach($sexual as $type_user)
<option value="{{$type_user->id}}"{{$post->sexual_id == $type_user ->id ? 'selected':''}}>{{$type_user->name_sexual}}</option>
 @endforeach
</select> </div><br>
<label for='exampleInputEmaill'>اسم الاب </label>
    <select class="form-control"name='parents_id'>
   @foreach($parents as $type_user)
<option value="{{$type_user->id}}"{{$post->parents_id == $type_user ->id ? 'selected':''}}>{{$type_user->Name_parents}}</option>
 @endforeach
</select> </div><br>

    <
<label for='exampleInputEmaill'>الحفظ السابق </label>
    <input type="text" name="Previous_save"value="{{$post->Previous_save}}"><br>
    <label for='exampleInputEmaill'>الحفظ الاحق </label>
    <input type="text" name="Current_save"value="{{$post->Current_save}}">><br>
    <label for='exampleInputEmaill'> التاريخ الإالتحاق في المركز</label>
    <input type="date" name="Date_Join_Episode"value="{{$post->Date_Join_Episode}}"><br>

<label for='exampleInputEmaill'>اسم الحلقه</label>
        <select class="form-control"name='quran_episodes_id'>
   @foreach($quran_episades as $type_user)
<option value="{{$type_user->id}}"{{$post->quran_episodes_id == $type_user ->id ? 'selected':''}}>{{$type_user->name_episodes}}</option>
 @endforeach
</select> </div><br>

    <button type="submit">Insert</button>

</form>
</body>
</html>
