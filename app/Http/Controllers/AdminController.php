<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Voiture;
use App\Models\Category;
use App\Models\UserVoiture;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{

    
    function index(){
        return view('admin/adminlogin'); 
    }
 
    public function login(Request $request){
        
        $password = $request->input('password');
        $user = User::where(
            'email', $request->input('email'))->first();
        
        if($user || Hash::check($password, $user->password)){
            $users =User::all();
            $voitures = Voiture::all();
            $categories = Category::all();
            $user_voitures = UserVoiture::all();
            return view('admin.index',compact('voitures', 'categories', 'user_voitures', 'users') );
            
        }
        else{
            return  view('adminlogin')->with('message', 'Les informations entrees ne corespondent pas.');

        }
        
    }
    public function restitution(Request $request){
        
        UserVoiture::where('voiture_id', $request->input('id'))->update([
            'restituer' =>$request->input('restituer') ]);
           
        return redirect('/admin');   
     }

    
    
 
}

