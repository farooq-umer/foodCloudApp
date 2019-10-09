@extends('layouts.baseLayout')

@section('title', 'Edit From')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>EDIT</b> Questionnaire</h4>
                    <p class="card-category">You <b><i>Must</i></b> be 100% Sure before Editing any Questionnaire</p>
                </div>
                <div class="card-body">

                    @foreach($formArr as $form)

                    <form method="POST" action="{{ route('update_form', $form->form_id) }}">
                        {{ method_field('PATCH') }}
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="bmd-label-floating">ID</label>
                                    <input type="text" disabled="disabled" name="form_type_id" class="form-control" value="{{ $form->form_id }}"/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Questionnaire Name</label>
                                    <input type="text" name="form_type_name" class="form-control" value="{{ $form->form_name }}"/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Questionnaire Type</label>
                                    <input type="text" name="form_type_code" class="form-control" value="{{ $form->form_type_name }}"/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right"><b>Update</b></button>
                    </form>
                    <form method="POST" action="{{ route('delete_form', $form->form_id) }}">
                        @method('DELETE')
                        @csrf
                        <div class="row">
                            <button type="submit" class="btn btn-rose"><i class="fa fa-trash"></i> <b>Delete</b></button>
                        </div>

                        @endforeach

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
