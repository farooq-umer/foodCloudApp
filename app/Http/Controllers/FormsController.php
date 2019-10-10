<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;
use Session;

class FormsController extends Controller
{
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

        return view('admin.pages.showForms', ['forms' => $forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formTypes = DB::table('tbl_form_types')->orderBy('form_type_id', 'desc')->get();

        return view('admin.pages.createForm', compact('formTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {

            $validatedData = $request->validate([
                'form_name' => 'required|string|distinct|min:6|regex:/^[A-Za-z0-9 _.-]*$/',
                'form_description' => 'string|max:255|regex:/^[A-Za-z0-9 _.-]*$/',
                'form_type_id' => 'required|integer'
            ]);

            try {
                $id = DB::table('tbl_forms')->insertGetId(
                    [
                        'form_name' => request('form_name'),
                        'form_description' => request('form_description'),
                        'form_type_id' => request('form_type_id')
                    ]
                );

                return response()->json([
                    'success'  => 'New Questionnaire Created Successfully.'
                ]);
            }
            catch(QueryException $ex) {

                return response()->json([
                    'error'  => $ex->getMessage()
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit($form_id)
    {
        $formArr = DB::table('tbl_forms')
            ->where('form_id', $form_id)
            ->join('tbl_form_types', 'tbl_forms.form_type_id', '=', 'tbl_form_types.form_type_id')
            ->select('tbl_forms.*', 'tbl_form_types.form_type_name')
            ->get();

        return view('admin.pages.editForm', compact('formArr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $form_id
     * @return void
     */
    public function update($form_id)
    {
        dd($form_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  $form_id)
    {
        if ($request->isMethod('DELETE')) {
            try {

                DB::table('tbl_forms')->where('form_id', $form_id)->delete();

                return redirect()->route('show_forms')->with('warning',"Questionnaire with ID: {$form_id} DELETED successfully!");

            } catch (QueryException $ex) {

                return response()->json([
                    'error'  => $ex->getMessage()
                ]);
            }
        }
    }
}
