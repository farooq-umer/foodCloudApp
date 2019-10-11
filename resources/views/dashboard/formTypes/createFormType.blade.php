@extends('layouts.baseLayout')

@section('title', 'Create From Types')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <button id="btn-create-new-form" data-href="{{ route('create_form_type') }}" class="btn btn-primary mr-2" onclick="createNewFormType()"> New <i class="material-icons">control_point</i></button>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>Create New Questionnaire Type</b></h4>
                    <p class="card-category">Questionnaire Type Code <b><i>Must</i></b> be Unique</p>
                </div>
                <div class="card-body">
                    <form method="post" id="create_new_form_on_submit">
                    <div class="table-responsive">
                        <table class="table table-main" id="createNewFormTableMain">
                            <thead class=" text-primary">
                            <th>
                                <strong>Questionnaire Type Name</strong>
                            </th>
                            <th>
                                <strong>Questionnaire Type Code</strong>
                            </th>
                            <th></th>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td>
                                    @csrf
                                    <input type="submit" name="save" id="btn-save-submit" data-href="{{ route('create_form_type') }}" class="btn btn-primary" value="Save" />
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
