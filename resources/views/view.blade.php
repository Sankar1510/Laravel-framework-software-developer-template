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

</head>
<body>
<div class="view">
 <h2>List</h2>
<h4>First Name</h4>
<p>{{ $user->first }}</p>

<h4>Last Name</h4>
<p>{{ $user->last }}</p>

<h4>Email</h4>
<p>{{ $user->email }}</p>

<h4>Mobile</h4>
<p>{{ $user->mobile }}</p>

<h4>Radio</h4>
<p>{{ $user->mob }}</p>

<h4>Select</h4>
<p>{{ $user->course }}</p>

@if($user->image)
<h4>Image</h4>
<img src="{{url($user->image)}}" alt="" width="400" height="200" style="object-fit: contain;">
@endif

</div>

    
</body>
</html>