<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
   <div class="container mt-4">
       <table class="table">
           <thead>
               <tr>
                   <th scope="col">#</th>
                   <th scope="col">First Name</th>
                   <th scope="col">Last Name</th>
                   <th scope="col">Email</th>
                   <th scope="col">Mobile</th>
                   <th scope="col">Status</th>
                   <th scope="col">Action</th>
               </tr>
           </thead>
           <tbody>
           @php
             $id = 1;  
           @endphp
               @foreach($users as $user)
               <tr>
                   <!-- <th scope="row">{{ $user->id }}</th> -->
                   <th scope="row">{{ $id }}</th> <!-- Display custom $id -->
                   <td>{{ $user->first }}</td>
                   <td>{{ $user->last }}</td>
                   <td>{{ $user->email }}</td>
                   <td>{{ $user->mobile }}</td>
                   <td>
                       @if($user->status === 'active')
                           <button class="btn btn-success" id="statusid{{$user->id}}" onclick="changestatus('{{$user->id}}','{{$user->status}}')">Active</button>
                       @else
                           <button class="btn btn-warning" id="statusid{{$user->id}}" onclick="changestatus('{{$user->id}}','{{$user->status}}')">Inactive</button>
                       @endif
                   </td>
                   <td>
                       <a href="{{ route('user.view', $user->id) }}" class="btn btn-info">View</a>
                       <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">Edit</a>
                       <!-- <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger">Delete</a>  
                                        -->
                       <button onclick="deleteuser('{{$user->id}}')" class="btn btn-danger">Delete</button>
                   </td>
               </tr>
               @php
                  $id++; 
               @endphp
               @endforeach
           </tbody>
       </table>
   </div>
</body>
</html>
<!-- Load the latest version of jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Load the latest version of jQuery Validation plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/additional-methods.min.js"></script>
 

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteuser(id){
  Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href="{{url('delete')}}/"+id;
  }
});
}
function changestatus(id,status){
    console.log(status);
  Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
     $.ajax({
      // url: "http://127.0.0.1:8000/status",
        type:"post",
        url:"{{route('change.user.status')}}",
        data:{id:id,oldstatus:status},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:
            function(data){
              if(data.status == 1){
             Swal.fire({
            title: "Success",
            text: "User Status Changed Successfully",
            icon: "success" // Correct case for icon
          });
          $('#statusid' + id)
         .removeClass('btn-warning')
         .addClass('btn-success')
         .text('Active') // Corrected 'test' to 'text'
         .attr('onclick', 'changestatus(' + id + ', "active")'); // Added correct parameters for the onclick function

        } else if(data.status == 2){
          Swal.fire({
            title: "Success",
            text: "User Status Changed Successfully",
            icon: "success" // Correct case for icon
          });
          $('#statusid' + id)
         .removeClass('btn-success')
         .addClass('btn-warning')
         .text('Inactive') // Corrected 'test' to 'text'
         .attr('onclick', 'changestatus(' + id + ', "inactive")'); // Added correct parameters for the onclick function

        } else{
          Swal.fire({
            title: "Error",
            text: "data-message",
            icon: "success" // Correct case for icon
          })
        }
        },
      
        
        error:{}
     })
  }
});
}

</script>
