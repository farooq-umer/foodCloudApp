<?php

namespace App\Http\Controllers;

use App\AddQuestions;
use Illuminate\Http\Request;
use App\Form;
use DB;

class AddQuestionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = DB::table('tbl_forms')
            ->join('tbl_form_types', 'tbl_forms.form_type_id', '=', 'tbl_form_types.form_type_id')
            ->select('tbl_forms.*', 'tbl_form_types.form_type_name')
            ->get();
        //dd($forms);

        return view('dashboard.addQuestions.showFormsToAddQuestions', ['forms' => $forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($form_id)
    {
        $formQTypes = DB::table('tbl_form_question_types')->orderBy('form_question_type_id', 'desc')->get();
        $form = Form::findOrFail($form_id);
        //dd($formQTypes);

        return view('dashboard.addQuestions.addQuestionsToQuestionnaire', compact('formQTypes', 'form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //$fqt = request('form_question_type_id'); dd($fqt);
        //$f = request('form_id'); dd($f);
        //$is = request('is_mandatory'); dd($is);
        //$q = request('form_question'); dd($q);
        // $a = request('is_answer'); dd($a);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AddQuestions  $addQuestions
     * @return \Illuminate\Http\Response
     */
    public function show(AddQuestions $addQuestions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AddQuestions  $addQuestions
     * @return \Illuminate\Http\Response
     */
    public function edit(AddQuestions $addQuestions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AddQuestions  $addQuestions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddQuestions $addQuestions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AddQuestions  $addQuestions
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddQuestions $addQuestions)
    {
        //
    }
}
