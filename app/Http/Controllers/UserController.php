<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=User::with('role')->get();

       /* $mediaItems = $users->getMedia('images');
        dd($mediaItems);*/
       /* $users->getMedia('images')->first();*/
        return view('user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::get();
        return view('user.create', compact('roles'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User();
        $user->name=($request['name']);
        $user->email=($request['email']);
        $password=bcrypt($request['password']);
        $user->password=$password;
        $user->role_id=$request['role'];

        $user_photo=$request['photo'];
        if ($request->hasFile('photo')) {
            $user->addMediaFromRequest('photo')->toMediaCollection('images');

        }



        $user->save();


        return redirect()->route('users.index');





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        $photo=$user->getMedia();
        dd($photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
       return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->role_id=$request['role'];
        if ($request->hasFile('photo'))
        {
            $user->addMediaFromRequest('photo')->toMediaCollection('images');
        }
        $user->save();
        /*$roles=$request['role'];
        $user->role()->attach($roles);*/
       /* $roles=$request['role'];
        $user->role()->attach($roles);*/
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       /* $user=User::findOrFail($id);
        dd($user);
        $user->destroy();
        return redirect('users.index');*/

        $user->delete();

        return redirect()->route('users.index')
            ->with('success','User deleted successfully');

    }

    public function trashed(){
        $users=User::onlyTrashed()->get();
        return view('user.trashed_users', compact('users'));
    }

    public function restore($id)
    {
        /* $course=Course::findOrFail($id);*/
        /* dd($course);
         $course->restore();
         */
        User::withTrashed()->where('id', $id)->restore();
        return redirect()->route('users.index')
            ->with('success', 'User restored successfully');
    }
}
