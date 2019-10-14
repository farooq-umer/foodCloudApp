<?php

namespace App\Http\Controllers;

use App\Models\FormType;
use App\Http\Requests\StoreFormTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Session;
use DB;

class FormTypesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except(['function_name','function_name']);
        //$this->middleware('auth')->only('function_name');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formTypes = DB::table('tbl_form_types')->orderBy('form_type_id', 'desc')->get();

        return view('dashboard.formTypes.showFormTypes', ['formTypes' => $formTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.formTypes.createFormType');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFormTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormTypeRequest $request)
    {
        if ($request->isMethod('POST')) {
            try {
                $formType = new FormType();
                $formType->form_type_name = request('form_type_name.0');
                $formType->form_type_code = request('form_type_code.0');
                $formType->save();

                return response()->json([
                    'success'  => 'Form Type Created.'
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
     * @param  \App\FormType  $formType
     * @return \Illuminate\Http\Response
     */
    public function show(FormType $formType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormType  $formType
     * @return \Illuminate\Http\Response
     */
    public function edit($form_type_id)
    {
        $formType = FormType::findOrFail($form_type_id);

        return view('dashboard.formTypes.editFormType', ['formType' => $formType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreFormTypeRequest $request
     * @param FormType $formType
     * @param $form_type_id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFormTypeRequest $request, FormType $formType, $form_type_id)
    {
        if ($request->isMethod('PATCH')) {

            $form_type_name = request('form_type_name');
            $form_type_code = request('form_type_code');
            try {
                DB::table('tbl_form_types')
                    ->where('form_type_id', $form_type_id)
                    ->update(
                        [
                            'form_type_name' => $form_type_name,
                            'form_type_code' => $form_type_code
                        ]
                    );

                return redirect()->route('show_form_types')->with('success',"Questionnaire type {$form_type_name} Updated successfully!");

            } catch(QueryException $ex) {

                return response()->json([
                    'error'  => $ex->getMessage()
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $form_type_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $form_type_id)
    {
        if ($request->isMethod('DELETE')) {
            try {
                DB::table('tbl_form_types')->where('form_type_id', $form_type_id)->delete();

                return redirect()->route('show_form_types')->with('warning',"Questionnaire type with with ID: {$form_type_id} DELETED successfully!");

            } catch (QueryException $ex) {

                return response()->json([
                    'error'  => $ex->getMessage()
                ]);
            }
        }
    }
}
