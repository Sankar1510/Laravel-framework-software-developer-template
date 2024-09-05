<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $heading1='Software ';
        $heading2='Developers';
        return view('welcome',compact('heading1','heading2'));
    }
    public function addUser(Request $req){
        $input=$req->all();
        // dd( $input);
        $imagepath="uploads/userimage";
        if($req->hasFile('image')){
            $img=$req->file('image');
            $ext='png';
            $filename=rand(1000,10000);
            $file=$filename.'.'.$ext;
            $img->move($imagepath,$file);
            $filepath=$imagepath.'/'.$file;
            $image=$filepath;
        }
        $user= new Data;
        $user-> first=$input['first'];
        $user-> last=$input['last'];
        $user-> email=$input['email'];
        $user-> mobile=$input['mobile'];
        // $user-> password=$input['password'];
        $user->password = Hash::make($input['password']);
        $user-> mob=$input['mob'];         
        // $user->mob = isset($input['mob']) ? $input['mob'] : null;  // Corrected key check
        $user-> course=$input['course'];
        $user-> image=$image;
        $user->save();
        return redirect()->route('add.page')->with('message',"successfully submitted");
    }
    public function listuser()
    {
        // Fetch all users from the User model
        $users = Data::all();
        
        // Return the 'list' view with the users data
        return view('list', compact('users'));
    }

    // Method to show a single user
    public function show($id)
    {
        // dd($id);
        // Fetch the user with the given ID or fail if not found
         $user = Data::find($id);
        // dd($user);
        // Return the 'view' view with the user data
        return view('view',compact('user'));
    }
    public function edituser($id)
    {
        // Fetch the user with the given ID or fail if not found
         $user = Data::find($id);
        
        // Return the 'view' view with the user data
        return view('edit',compact('user'));
    }
    public function updateuser(Request $req){
    //  dd($req->all());
    $input=$req->all();
    $imagepath="uploads/userimage";
    if($req->hasFile('image')){
        $img=$req->file('image');
        $ext='png';
        $filename=rand(1000,10000);
        $file=$filename.'.'.$ext;
        $img->move($imagepath,$file);
        $filepath=$imagepath.'/'.$file;
        $profile=$filepath;
    }
    $user= Data::find($input['id']);
    // dd($user);
    $user-> first=$input['first'];
    $user-> last=$input['last'];
    $user-> email=$input['email'];
    $user-> mobile=$input['mobile'];
    $user-> mob=$input['mob'];  
    $user-> course=$input['course'];
    $user-> image=$profile;
     // Update the image only if a new one was uploaded
     
    $user->update();
    return redirect()->route('list.user')->with('message',"successfully updated");

    }
    public function deleteuser($id){
        $user = Data::find($id);
        // dd($user);
        $user->delete();
        return redirect()->route('list.user')->with('message',"successfully Deleted");

    }
    public function changestatus(Request $req){
    //  dd($req->all());

    $input=$req->all();
    $user= Data::find($input['id']);
    // dd($user);
    if ( $user ) {
        $user->status = $input['oldstatus'] === 'active' ? 'inactive' : 'active';
        $user->save();

        // Corrected response
        return response()->json([
            'status' => $user->status === 'active' ? 1 : 2,
            'message' => 'Status has been updated'
        ]);
        
    }

    }
    
}
