<!DOCTYPE html>
<center><h1>Table Teacher</h1>
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
                <th>Qualification</th>
                <th>Work</th>
                <th>Salary</th>
                <th>Teaching_years</th>
                <th>Center_they_work</th>
                <th>Address</th>
                <th>Identity_id</th>
             <th>Number_identity</th>
             <th>Gender</th>
                <th>Nationality_id</th>
                <th>Date_birth</th>
                 <th>qualification_study_id</th>
              <th>User_id</th>
                <th>Pro_e_trache</th>
               @foreach ($posts as $post)
               <tr>
                 <td>{{$post->id}}</td>
                 <td>{{$post->name}}</td>
                 <td>{{$post->qualification}}</td>
                 <td>{{$post->work}}</td>
                 <td>{{$post->salary}}</td>
                 <td>{{$post->teaching_years}}</td>
                 <td>{{$post->center_they_work}}</td>

                 <td>{{$post->address}}</td>
                 <td>{{$post->identity->type_identity}}</td>
                 <td>{{$post->number_identity}}</td>
                 <td>{{$post->gender}}</td>
                 <td>{{$post->nationality->name}}</td>
                 <td>{{$post->birth_date}}</td>
                 <td>{{$post->Qualification_study->name}}</td>
                  <td>{{$post->userss->name}}</td>

                   <td>
                       <a class="btn btn-primary", href="{{route('teacher.edit',$post->id)}}",  style="background: red ,">Edit</a>
                       <a href="{{route('teacher.destroy',$post->id)}}">Delete</a>

                   </td>
               </tr>

               @endforeach
          </table>
          <a href="{{route('teacher.insert')}}">insert</a><br>
          <a href="{{route('teacher.delete.all.Truncate')}}">Delete  Truncate</a>
</body>
</html>
</center>
