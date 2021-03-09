<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('changePassword');
    }

//    public function edit(){
//        $usuario = User::find(Auth::User()->id);
//        if(empty($usuario)){
//            Flash::error('mensaje error');
//            return redirect()->back();
//        }
//        return view('editarperfil')->with('usuario', $usuario);
//    }
//
//    public function update(Request $request){
//        $usuario = User::find(Auth::User()->id);
//        if(empty($usuario)){
//            Flash::error('mensaje error');
//            return redirect()->back();
//        }
//        $usuario->fill($request->all());
//        $usuario->save();
//        Flash::success('Perfil actualizado con éxito.');
//        return redirect(route('home'));
//    }


    public function myprofile (){

        $user=Auth::user();

        return view('profiles/myprofile')->with('user', $user);;


    }


    public function changename  (Request $request){

        /** @var User $user */
        $user=Auth::user();
        if(($name = $request->post('name'))!= null){

            $user->name=$name;
            $user->save();
        }

        return view('profiles/changename')->with('user', $user);;


    }


    public function changeemail  (Request $request){

        /** @var User $user */
        $user=Auth::user();
        if(($email = $request->post('email'))!= null){

            $user->email=$email;
            $user->save();
        }

        return view('profiles/changeemail')->with('user', $user);


    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updatepassword(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                'current_password' => ['required', new MatchOldPassword()],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            auth()->user()->update(['password' => Hash::make($request->new_password)]);

            dd('Password change successfully.');
        }

        return view('profiles/updatepassword');

    }


}



