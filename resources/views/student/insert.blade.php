<center><h1>The student</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('student.store')}}" method="post">
@csrf
<label for='exampleInputEmaill'>الاسم اطالب</label><br>
    <input type="text" name="name"><br>
<label for='exampleInputEmaill'>العنوان</label><br>
    <input type="text" name="address"><br>
    <label for='exampleInputEmaill'>المدرسه</label><br>
    <input type="text" name="school"><br>
    <label for='exampleInputEmaill'>نوع الهوية</label><br>
    <select class="form-control"name='identity_id'><br>
    @foreach($identity as $type_user)
        <option value="{{$type_user->id}}">{{$type_user->type_identity}}</option>
    @endforeach
    </select></div><br>
    <label for='exampleInputEmaill'>الرقم الهوية</label><br>
    <input type="text" name="number_identity"><br>
    <label for='exampleInputEmaill'>الجنس</label><br>
    <input type="text" name="gender"><br>
    <label for='exampleInputEmaill'>الجنسيه</label><br>
    <select class="form-control"name='nationality_id'>
   @foreach($nationality as $type_user)
<option value="{{$type_user->id}}">{{$type_user->name}}</option>
 @endforeach
</select> </div><br>
<label for='exampleInputEmaill'>اولياء الامر </label><br>
    <select class="form-control"name='guardian_id'>
   @foreach($guardian as $type_user)
<option value="{{$type_user->id}}">{{$type_user->name}}</option>
 @endforeach
</select> </div><br>
<label for='exampleInputEmaill'>الحفظ السابق </label><br>
    <input type="text" name="previous_save"><br>
    <label for='exampleInputEmaill'> التاريخ الإالتحاق في المركز</label><br>
    <input type="date" name="date_Join"><br>
    <label for='exampleInputEmaill'>اسم الحلقه</label><br>
    <select class="form-control"name='quran_episodes_id'>
    @foreach($Qualification_study as $type_user)
    <option value="{{$type_user->id}}">{{$type_user->name}}</option>
    @endforeach
</select> </div><br>
<label for='exampleInputEmaill'>المستخدم</label><br>
    <select class="form-control"name='users_id'><br>
    @foreach($User as $type_user)
    <option value="{{$type_user->id}}">{{$type_user->name}}</option>
    @endforeach
</select> </div><br>

      {{--  <input type="file" id="file" style='display:none;'>  --}}
      <div>
        <label for="exampleInputEmail1" > اختيار صورة للمنتج</label><br>
        <input type="file"  name='image' id="file" style='display:none;'><br>
        @error('image')
<small class="form-text ">{{ $message }}</small>
        @enderror
      </div>

    <label for='exampleInputEmaill'>التاريخ الميلاد</label><br>
    <input type="date" name="birth_date"><br>


    <button type="submit">Insert</button>

</form>
</body>
</html>
</center>
