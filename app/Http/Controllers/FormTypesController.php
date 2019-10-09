<?php

namespace App\Http\Controllers;

use App\FormType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use DB;
use Session;

class FormTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$id = auth()->id(); $u = auth()->user(); $g = auth()->guest();
        //dd($id,$u,$g);

        //$formTypes = FormType::all()->sortKeysDesc(); //dd($formTypes);
        $formTypes = DB::table('tbl_form_types')->orderBy('form_type_id', 'desc')->get();

        return view('admin.forms.formTypes.showFormTypes', ['formTypes' => $formTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.formTypes.createFormType');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Log::debug($request);

        //retrieve all of the input data as an array
        //$allArr = $request->all();
        //Log::debug(print_r($allArr, true));

        //$name = $request->input('name');
        //$uri = $request->path();

        // Without Query String...
        //$url = $request->url();

        // With Query String...
        //$url = $request->fullUrl();

        if ($request->isMethod('POST')) {

            $validatedData = $request->validate([
                'form_type_name.*' => 'required|string|distinct|min:6|regex:/^[A-Za-z0-9 _.-]*$/',
                'form_type_code.*' => 'required|string|distinct|min:3|regex:/^[A-Za-z0-9 _.-]*$/'
            ]);

            try {
                $formType = new FormType();
                $formType->form_type_name = request('form_type_name.0');
                $formType->form_type_code = request('form_type_code.0');
                $formType->save();

                // Each array represents a row to be inserted into the table
//                $id = DB::table('tbl_form_types')->insertGetId(
//                    ['form_type_name' => request('form_type_name.0'),
//                        'form_type_code' => request('form_type_code.0')
//                    ]
//                );

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

        //https://laravel.com/docs/5.7/requests

        //The is method allows you to verify that the incoming request path matches a given pattern.
        // You may use the * character as a wildcard when utilizing this method:
        //if ($request->is('admin/*')) { }

//        if($request->ajax())
//        {
//            $first_name = $request->first_name;
//            $last_name = $request->last_name;
//            for($count = 0; $count < count($first_name); $count++)
//            {
//                $data = array(
//                    'first_name' => $first_name[$count],
//                    'last_name'  => $last_name[$count]
//                );
//                $insert_data[] = $data;
//            }
//
//            FormType::insert($insert_data);
//            return response()->json([
//                'success'  => 'Data Added successfully.'
//            ]);
//        }
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
    public function edit(Request $request, $form_type_id)
    {
        //$formType = DB::table('tbl_form_types')->where('form_type_id', $form_type_id);
        $formType = FormType::findOrFail($form_type_id);
        //dd($formType);

        return view('admin.forms.formTypes.editFormType', ['formType' => $formType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormType  $formType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormType $formType, $form_type_id)
    {
        //$allArr = $request->all(); //dd($allArr);
        //$id = $request->input('form_type_id'); //dd($id);
        //Log::debug(print_r($allArr, true));

        if ($request->isMethod('PATCH')) {

            $validatedData = $request->validate([
                'form_type_name' => 'required|string|distinct|min:6|regex:/^[A-Za-z0-9 _.-]*$/',
                'form_type_code' => 'required|string|distinct|min:3|regex:/^[A-Za-z0-9 _.-]*$/'
            ]);

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

//                $formType = FormType::findOrFail($form_type_id);
//                $formType->update($request->all());

//                $formType = FormType::findOrFail($form_type_id);
//                $formType->form_type_name = request('form_type_name');
//                $formType->form_type_code = request('form_type_code');
//                $formType->save();

                return redirect()->route('show_form_types')->with('success',"Questionnaire type {$form_type_name} Updated successfully!");

            } catch(QueryException $ex) {

                return response()->json([
                    'error'  => $ex->getMessage()
                ]);
                //Session::flash('error', $ex->getMessage());
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
//              $formTypeDeleted = FormType::findOrFail($form_type_id)->delete();

                return redirect()->route('show_form_types')->with('warning','Questionnaire type DELETED successfully!');
                //return back()->with('success','Questionnaire type DELETED successfully!');

            } catch (QueryException $ex) {

                return response()->json([
                    'error'  => $ex->getMessage()
                ]);
                //Session::flash('error', $ex->getMessage());
            }
        }
    }
}
