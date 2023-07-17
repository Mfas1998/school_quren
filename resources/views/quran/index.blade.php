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
                <th>ID</th>
                <th>Name</th>
                <th>teacher</th>

                <th>period</th>

                <th>Gender</th>
                <th>system</th>
                <th>Pro</th>

                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->teachers->name}}</td>
                    <td>{{$post->period}}</td>
                    <td>{{$post->gender}}</td>
                    <td>{{$post->system_episod->name}}</td>

                    <td>
                        <a class="btn btn-primary", href="{{route('quran.edit',$post->id)}}",  style="background: red ,">Edit</a>
                        <a href="{{route('quran.destroy',$post->id)}}">Delete</a>

                   </td>
               </tr>

               @endforeach
          </table>
          <a href="{{route('quran.episades')}}">insert</a><br>
          <a href="{{route('quran.delete.all.Truncate')}}">Delete  Truncate</a>
</body>
</html>
