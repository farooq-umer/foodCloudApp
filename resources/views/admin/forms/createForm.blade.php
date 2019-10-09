@extends('layouts.baseLayout')

@section('title', 'Create From')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
{{--            <button id="btn-create-new-form" data-href="{{ route('create_form') }}" class="btn btn-primary mr-2" onclick="createNewForm()"> New <i class="material-icons">control_point</i></button>--}}
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Create New Questionnaire</h4>
                    <p class="card-category"> </p>
                </div>
                <div class="card-body">
                    <form method="post" id="create_new_form_on_submit">
                        <div class="table-responsive">
                            <table class="table table-main" id="createNewFormTableMain">
                                <thead class=" text-primary">
                                <th>
                                    <strong>Name</strong>
                                </th>
                                <th>
                                    <strong>Description</strong>
                                </th>
                                <th>
                                    <strong>Questionnaire Type</strong>
                                </th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="text" placeholder="Enter Name" name="form_name" required class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" placeholder="Enter Description" name="form_description" required class="form-control">
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="form_type_id" class="form-control">
                                                <option value="select">Select Type</option>
                                                @foreach($formTypes as $formType)
                                                    <option value="{{ $formType->form_type_id }}">{{ $formType->form_type_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3" align="right">&nbsp;</td>
                                    <td>
                                        @csrf
                                        <input id="btn-create-new-form" type="submit" name="save" data-href="{{ route('create_form') }}" class="btn btn-primary" value="Save" />
                                        {{-- id="btn-save-submit" --}}
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
