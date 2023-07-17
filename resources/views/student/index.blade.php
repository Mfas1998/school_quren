 <center><h1>table Student</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="1">

            <thead>
            <tr>
                <th>id</th>
                <th>Name_student</th>
                <th>Address</th>
                <th> School</th>
                <th> identtity</th>
                <th> Number_identity</th>
                <th> Gender</th>
                <th> nationality</th>
                <th>Guardian</th>
                <th> Previous_save</th>
                <th>parents_id Date_Join_Episode</th>
                <th> quran_episodes</th>
                <th>User</th>
                <th> Image</th>
                <th> Date_birth</th>
                <th>quran_episodes</th>

            </tr>
</thead>
                @foreach ($student as $post)
               <tr>
                 <td>{{$post->id}}</td>
                 <td>{{$post->name}}</td>
                 <td>{{$post->address}}</td>
                 <td>{{$post->school}}</td>
                 <td>{{$post->identity->type_identity}}</td>
                 <td>{{$post->number_identity}}</td>
                 <td>{{$post->gender}}</td>
                 <td>{{$post->nationality->name}}</td>
                 <td>{{$post->guardi->name}}</td>
                 <td>{{$post->previous_save}}</td>
                 <td>{{$post->date_Join}}</td>
                 <td>{{$post->quran_episod->name}}</td>
                 {{--  <td>{{$post->userss->name}}</td>  --}}
                 <td><img src="{{$post->image}}" width="80" height="70"></td>
                 <td>{{$post->birth_date}}</td>

                <td>
                    <a class="btn btn-primary", href="{{route('student.edit',$post->id)}}",  style="background: red ,">Edit</a>
                    <a class="btn btn-primary", href="{{route('student.edit',$post->id)}}",  style="background: red ,">Edit</a>
                </td>
                </tr>

               @endforeach
          </table>
          <a href="{{route('student.insert')}}">insert</a><br>
          <a href="{{route('student.delete.all.Truncate')}}">Delete  Truncate</a>
</body>
</html>
</center>
