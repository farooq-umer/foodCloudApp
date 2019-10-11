<?php

namespace App\Http\Controllers;

use App\QuestionTypes;
use Illuminate\Http\Request;
use DB;

class QuestionTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $QTypes = DB::table('tbl_form_question_types')->orderBy('form_question_type_id', 'desc')->get();

        return view('dashboard.questionTypes.showQuestionTypes', ['QTypes' => $QTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionTypes  $questionTypes
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionTypes $questionTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionTypes  $questionTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionTypes $questionTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionTypes  $questionTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionTypes $questionTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionTypes  $questionTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionTypes $questionTypes)
    {
        //
    }
}
