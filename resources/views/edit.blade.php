<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('/CSS/form.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<style>
    .error{
        color:red;
    }
    </style>
</head>
<body>
    <h3>Update Here</h3>
<form action="{{ route('user.update') }}" method="POST" id="formsv"  enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <div class="mb-3">
    <label for="first" class="form-label">First Name</label>
    <input type="text" class="form-control" id="first" placeholder="First Name" name="first" value="{{ $user->first}}">
</div>

<div class="mb-3">
    <label for="last" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="last" placeholder="Last Name" name="last" value="{{ $user->last }}">
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="{{ $user->email}}">
</div>

<div class="mb-3">
    <label for="mobile" class="form-label">Mobile No</label>
    <input type="tel" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="{{ $user->mobile ?? '' }}">
</div>

<div class="mb-3">
    <label class="form-label">Preferred Technology</label><br>
    <input type="radio" id="html" name="mob" value="HTML" {{ $user->mob === 'HTML' ? 'checked' : '' }}>
    <label for="html">HTML</label>

    <input type="radio" id="css" name="mob" value="CSS" {{ $user->mob === 'CSS' ? 'checked' : '' }}>
    <label for="css">CSS</label>

    <input type="radio" id="javascript" name="mob" value="JavaScript" {{ $user->mob === 'JavaScript' ? 'checked' : '' }}>
    <label for="javascript">JavaScript</label>
</div>

<div class="mb-3">
    <label for="course" class="form-label">Course</label>
    <select name="course" id="course" class="form-control">
        <option value="js" {{ $user->course === 'js' ? 'selected' : '' }}>JS</option>
        <option value="reactjs" {{ $user->course === 'reactjs' ? 'selected' : '' }}>Reactjs</option>
        <option value="nodejs" {{ $user->course === 'nodejs' ? 'selected' : '' }}>Nodejs</option>
        <option value="php" {{ $user->course === 'php' ? 'selected' : '' }}>PHP</option>
    </select>
</div>
<div class="mb-3">
        <label >Image</label>
        <input type="file" name="image" accept="image/*" onchange="loadFile(event)"/>
        @if($user->image)
        <img id="output" src="{{url($user->image)}}" width="400" height="200" style="object-fit: contain;"/>
        @else
        <img id="output"/>
        @endif
    </div>


    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Submit">
    </div>
</form>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" ></script>
<script src="webpack.mix.js" ></script>  
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>  
<script>
    $(document).ready(function () {
        $("#formsv").validate({
            rules: {
                first: "required", 
                last: "required", 
                email: {
                    required: true,
                    email: true
                }, 
                password: {
                    required: true,
                    minlength: 8
                }, 
                mobile: {
                    required: true,
                    digits: true,
                    minlength: 10
                }, 
                mob: "required",
                course: "required",
            },
            messages: {
                first: {
                    required: "Please enter a First Name"
                },
                last: {
                    required: "Please enter a Last Name"
                },
                email: {
                    required: "Please enter an email",
                    email: "Please enter a valid email"
                },
                password: {
                    required: "Please enter a password",
                    minlength: "Your password must consist of at least 8 characters"
                },
                mobile: {
                    required: "Please enter a mobile number",
                    minlength: "Your mobile number must consist of at least 10 digits",
                    digits: "Please enter only digits for your mobile number"
                },
                mob: {
                    required: "Please select an option"
                },
                course: {
                    required: "Please select a course"
                }
            }
        });
    });
</script>
