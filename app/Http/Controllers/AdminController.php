<?php

namespace App\Http\Controllers;




namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        /* $request->user()->authorizeRoles(['admin']);
        return view('admin.index'); */
        $users = User::all();
        return view('admin.dashboard', compact('users'));


    }





    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);

        $user=User::find($id);
        $user->update([  'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password)


        ]);

        $user
            ->roles()
            ->attach(Roles::where('rol', $request->role)->first());

        return redirect()->route('admin.index');
    }


    public function destroy(Request $request,  $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.index');
    }

}
//

//}