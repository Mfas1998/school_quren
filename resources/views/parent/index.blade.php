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
                <th>Gender</th>
                <th>Phone</th>
                <th>Job</th>
                <th>link_kinship</th>
                <th>Social_status</th>
                <th>Pro</th>
               @foreach ($posts as $post)
               <tr>
                 <td>{{$post->id}}</td>
                 <td>{{$post->name}}</td>
                 <td>{{$post->gender}}</td>
                 {{--  <td>{{$post->identity->type_identity}}</td>
                 <td>{{$post->Number_identity}}</td>
                 <td>{{$post->sex->type}}</td>
                 <td>{{$post->sexual->name_sexual}}</td>  --}}
                  <td>{{$post->job}}</td>
                 <td>{{$post->link_kinship}}</td>
                 <td>{{$post->social_status}}</td>
                 <td>{{$post->userss->name}}</td>


                   <td>
                       <a class="btn btn-primary", href="{{route('parent.edit',$post->id)}}" ,  style="background: red ,">Edit</a>
                       <a href="{{route('parent.destroy',$post->id)}}">Delete</a>

                   </td>
               </tr>

               @endforeach
          </table>
          <a href="{{route('parent.insert')}}">insert</a><br>
          <a href="{{route('parent.delete.all.Truncate')}}">Delete  Truncate</a>
          <a href="{{route('parent.delete.all.Truncate')}}">Delete  Truncate</a>
</body>
</html>
