@extends('layouts.baseLayout')

@section('title', 'Edit From Types')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>Edit Questionnaire Type</b></h4>
                    <p class="card-category">You <b><i>Must</i></b> be 100% Sure before Editing any Questionnaire Type</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update_form_type', $formType->form_type_id) }}">
                        {{ method_field('PATCH') }}
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="bmd-label-floating">ID</label>
                                    <input type="text" disabled="disabled" name="form_type_id" class="form-control" value="{{ $formType->form_type_id }}"/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Questionnaire Type Name</label>
                                    <input type="text" name="form_type_name" class="form-control" value="{{ $formType->form_type_name }}"/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Questionnaire Type Code</label>
                                    <input type="text" name="form_type_code" class="form-control" value="{{ $formType->form_type_code }}"/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right"><b>Update</b></button>
                    </form>
                    <form method="POST" action="{{ route('delete_form_type', $formType->form_type_id) }}">
                        @method('DELETE')
                        @csrf
                        <div class="row">
                            <button type="submit" class="btn btn-rose"><i class="fa fa-trash"></i> <b>Delete</b></button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
