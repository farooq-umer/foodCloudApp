<?php

namespace App\Http\Controllers;

use App\FormType;
use Illuminate\Http\Request;

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

        $formTypes = FormType::all()->sortKeysDesc(); //dd($formTypes);

        return view('admin/forms/formTypes/showFormTypes', ['formTypes' => $formTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/forms/formTypes/createFormType');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json([
            'success'  => 'Data Added successfully.'
        ]);

//        if($request->ajax())
//        {
//            $rules = array(
//                'first_name.*'  => 'required',
//                'last_name.*'  => 'required'
//            );
//            $error = Validator::make($request->all(), $rules);
//            if($error->fails())
//            {
//                return response()->json([
//                    'error'  => $error->errors()->all()
//                ]);
//            }
//
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
    public function edit(FormType $formType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormType  $formType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormType $formType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormType  $formType
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormType $formType)
    {
        //
    }
}
