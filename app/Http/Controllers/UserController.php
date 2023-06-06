<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function logout(Request $request){
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/')->with('success','Bye We hope to see you again!');
   } 
  
public function create(){
    return view('users.register');
   }
   public function store(Request $request){
    $formFields = $request->validate([
        'name' => 'required|min:6|alpha_num|unique:users,name',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed'
    ]);
    $formFields['password']=bcrypt($formFields['password']);
        
   $user= User::create($formFields);

     return view('users.login');
   }

   public function login(){
    return view('users.login');
   }
   
   public function authenticate(Request $request){
    $formFields = $request->validate([
       
        'email'=>'required',
        'password'=>'required'
      
       
    ]);
    if(auth()->attempt($formFields)){
        if(auth()->user()->role=='admin'){
            return redirect()->route('admin.admin');
        }elseif(auth()->user()->role=='user'){
            return redirect()->route('user.user');
        }else{
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken(); 
         
            abort('403','Sorry You are Deactivated');
           
        }
        return back()->with('error','Incorrect Email or Password');       
     }
   
}
public function manageusers(){
    return view('admin.manageusers',[
        'users'=> User::latest()->filter()->simplePaginate(3)
            
       
    ]);
}
public function deactivateUser(User $user,Request $request){
 
    if($user->role=='user'||$user->role=='deactivated'){
        $user->update([
            'role'=>$request->role,
            'status'=>$request->status,
            'name'=>$request->name,
            'email'=>$request->email,
            'created_at'=>$request->created_at,   
        ]);
        if($user->role=='deactivated'){
        return redirect('/usertable')->with('success','The user has been Deactivated');

    }else{
        return redirect('/usertable')->with('success','The user has been Activated');
    }
    }
        
}
public function deleteUser(User $user){
 
    if($user->role=='user'){
        $user->delete();
        return redirect('/usertable')->with('success','The user has been deleted');
    }else{
        abort(403,'Invalid Action');
    }
   
   

}
}