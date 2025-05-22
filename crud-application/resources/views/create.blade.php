
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">CRUD App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="/"> Go Back Home</a>
        </li>
        
        </ul>
</div>
</div>
  </nav>
   
  <div class="head_edit">
    <h2>Add Employee</h2>
</div>
  <div class="inputform">
    <div class="p-4">
    <form method="POST" action="{{route('store')}}" enctype = "multipart/form-data">
        @csrf
    <label for="name" class="form-label" >Name:</label><br>
        <input type="text" class="form-control" name="name" value="{{old('name')}}">
        @error('name')
        <p>The name file is required</p>
        @enderror

        
        <label for="email" class="form-label">Email address:</label>
         <input type="email" name="email" id="email"
         class="form-control @error('email') is-invalid @enderror"
         value="{{ old('email') }}">
       
  @error('email')
    <div class="invalid-feedback">
    <p>The valid email is required</p>
    </div>
  @enderror

        <label for="description" class="form-label">Department:</label><br>
        <input type="text" class="form-control" name="description" value = "{{old('description')}}" >
        @error('description')
        <p>The description file is required</p>
        @enderror

        <label for="image" class="form-label">Image:</label><br>
        <input type="file"  name="image" id="">
        @error('image')
        <p>The image file is required</p>
        @enderror

        <div>
        <input class="btn btn-success" type="submit" value="Submit">
        </div>
    </form>
  </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>