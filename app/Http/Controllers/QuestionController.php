<?php

namespace App\Http\Controllers;

use App\Model\Question;
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
        $Questions = Question::latest()->get();

        if($Questions != null){
            return response()->json(['message' => 'True','Questions'=>$Questions]);
         }else{
            return response()->json(['message'=>'No Questions Found']);
         }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //auth()->user()->question()->create($request-all());
        Question::create($request->all());
        return response()->json("Created Successfully", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return $question;
    }

    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Question  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $questions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json("Deleted", 200);
    }
}
