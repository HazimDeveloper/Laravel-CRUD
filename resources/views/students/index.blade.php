<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
   <h2>Student Management System</h2>                 
                </div>
                <div class="pull-right mb-2">
                    <a href="{{ route('students.create') }}" class="btn btn-success">Create Student</a>
    
                </div>
            </div>
        </div>
        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Student Name</th>
            <th scope="col">Student Email</th>
            <th scope="col">Student Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
             <tr>
            <th scope="row">{{ $student->id }}</th>
            <td>{{ $student->name}}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->address}}</td>
            <td>
               <form action="{{ route('students.destroy',$student->id) }}" method="post">
                <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger">Delete</button>   
        </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {!! $students->links() !!}
    </div>
</body>
</html>