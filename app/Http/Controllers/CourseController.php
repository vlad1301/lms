<?php

namespace App\Http\Controllers;

use App\Course;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*        $courses=Course::with('user')->where('is_published', '1')->get();*/

        $user=Auth::user();
        $courses=Course::whereHas('user', function (Builder $query) use ($user) {
            $query->whereIn('name',$user);
        })->where('is_published', '1')->get();

        $user_admin=Auth::user()->role()->where('name', 'admin')->exists();
        if($user_admin){
            $courses=Course::with('user')->get();
            return view('course.admin_index', compact('courses', 'user_admin'));
        }else{
            return view('course.index', compact('courses', 'user_admin'));
        }
       /* dd($user);*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::whereHas('role', function (Builder $query) {
            $query->where('name','teacher');
        })->get();

        return view('course.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $course=new Course();
        $course->title=$request['title'];
        $course->user_id=$request['teacher'];
        $course->description=$request['description'];
        $course->price=$request['price'];
        $course->start_date=$request['start_date'];
        $course->is_published=$request['published'];
        $course->addMediaFromRequest('course_photo')->toMediaCollection('course_images');
        $course->save();
        return redirect()->route('courses.index');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::whereHas('role', function (Builder $query) {
            $query->where('name','teacher');
        })->get();
        $course=Course::findOrFail($id);
        return view('course.edit', compact('course', 'users'));
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

        $course=Course::findOrfail($id);
        $course->title=$request['title'];
        /*$course->user_id=$request['teacher'];*/
        $course->description=$request['description'];
        $course->price=$request['price'];
        $course->start_date=$request['start_date'];
        $course->is_published=$request['published'];
        /*$course->addMediaFromRequest('course_photo')->toMediaCollection('course_images');*/
        $course->save();
        return redirect()->route('courses.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success','Course deleted successfully');
    }

    public function trashed(){
        $courses=Course::onlyTrashed()->get();
        return view('course.trashed_courses', compact('courses'));
    }

    public function restore($id){
        Course::withTrashed()->where('id', $id)->restore();
        return redirect()->route('courses.index')
            ->with('success','Course restored successfully');
    }
    public function forceDelete($id){
        Course::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('courses.index')
            ->with('success','Course deleted successfully');
    }


}
