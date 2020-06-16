<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lessons=new Lesson();
        if($request->input('course_id')){
            $lessons=$lessons->where('course_id', $request->input('course_id'))->get();

        }else{
            $user=Auth::id();

            $lessons=Lesson::whereHas('course', function (Builder $query) use ($user) {
                $query->where('user_id',$user);
            })->orderByDesc('course_id')->get();
        }


        return view('lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user=Auth::user();
        $courses=Course::whereHas('user', function (Builder $query) use ($user) {
            $query->whereIn('name',$user);
        })->get();
        /*dd($courses);*/
        return view('lesson.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lesson=new Lesson();
        $lesson->title=$request['title'];
        $lesson->course_id=$request['course_id'];
        $lesson->short_text=$request['short_text'];
        $lesson->position=Lesson::where('course_id', $request['course_id'])->max('position') + 1;
        $lesson->is_published=$request['is_published'];
       /* $lesson->addMediaFromRequest('lesson_photo')->toMediaCollection('lesson_images');*/
        $lesson->save();
        return redirect()->route('lessons.index', ['course_id'=>$request['course_id']]);
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
     /*   $lessons=Lesson::whereHas('role', function (Builder $query) {
            $query->where('name','teacher');
        })->get();*/
        $lesson=Lesson::findOrFail($id);
        return view('lesson.edit', compact('lesson'));
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
        $lesson=Lesson::findOrfail($id);
        $lesson->title=$request['title'];
        $lesson->short_text=$request['short_text'];
        $lesson->position=$request['position'];
        $lesson->is_published=$request['is_published'];
        /* $lesson->addMediaFromRequest('lesson_photo')->toMediaCollection('lesson_images');*/
        $lesson->save();
        return redirect()->route('lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lessons.index')
            ->with('success','Lesson deleted successfully');
    }

    public function trashed(){
        $lessons=Lesson::onlyTrashed()->get();
        return view('lesson.trashed_lessons', compact('lessons'));
    }

    public function restore($id){
        Lesson::withTrashed()->where('id', $id)->restore();
        return redirect()->route('lessons.index')
            ->with('success','Lesson restored successfully');
    }
    public function forceDelete($id){
        Lesson::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('lessons.index')
            ->with('success','Lesson deleted successfully');
    }

    function courses( Request $request )
    {
        $query=$request->get('query');
        $course=Course::where('title','LIKE',"%{$query}%")->get();
        $output = '<ul class="dropdown-menu1" style="display:block; position:relative">';
        foreach($course as $row)
        {
            $output .= '
       <li><a href="#">'.$row->title.'</a></li>
       ';
        }
        $output .= '</ul>';
        echo $output;
    }

    function lessons( Request $request )
    {
        $query1=$request->get('query1');
/*        $lessons=Lesson::where('title','LIKE',"%{$query1}%")->get();*/
/*        $course=Course::where('title','LIKE',"%{$query1}%")->get('id');*/
        $lessons=Lesson::where('title','LIKE',"%{$query1}%")->get();
/*        $lessons=Lesson::where('course_id',$course)->get();*/

        $output1 = '<ul class="dropdown-menu2" style="display:block; position:relative">';
        foreach($lessons as $row)
        {
            $output1 .= '
       <li><a href="#">'.$row->title.'</a></li>
       ';
        }
        $output1 .= '</ul>';
        echo $output1;
    }
       /* $this->validate( $request, [ 'id' => 'required|exists:courses,id' ] );
        $lessons = Lesson::where('course_id', $request->get('id') )->get();
        $output = [];
        foreach( $lessons as $lesson )
        {
            $output[$lesson->id] = $lesson->title;

        }
        return $output;*/
        /*$msg = "This is a simple message.";
        return response()->json(array('msg'=> $output), 200);*/



}
