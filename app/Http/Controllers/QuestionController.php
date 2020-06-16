<?php

namespace App\Http\Controllers;

use App\Question;
use App\Question_option;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::get();
        /* $mediaItems = $users->getMedia('images');
         dd($mediaItems);*/
        /* $users->getMedia('images')->first();*/
       /* $mediaItems = $questions->getMedia('question_images');*/
        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question=Question::create($request->all());


        for($q=0;$q<4;$q++){
            $option_text=$request->input('option_text' . $q, '');
            $iscorrect=$request->input('checkbox' . $q, '0');
            $question_id=$question->id;
            $question_options=new Question_option();
            $question_options->question_id=$question_id;
            $question_options->option_text=$option_text;
            $question_options->is_correct=$iscorrect;
            $question_options->save();
        }
        return redirect('/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions=Question::findOrFail($id);
        /* $mediaItems = $users->getMedia('images');
         dd($mediaItems);*/
        /* $users->getMedia('images')->first();*/
        $mediaItems = $questions->getMedia('question_images');
/*        dd($mediaItems);*/
        return view('question.show', compact('questions','mediaItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
