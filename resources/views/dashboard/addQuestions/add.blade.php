@extends('layouts.baseLayout')

@section('title', 'Edit From')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            {{--            <button id="btn-create-new-form" data-href="{{ route('create_form') }}" class="btn btn-primary mr-2" onclick="createNewForm()"> New <i class="material-icons">control_point</i></button>--}}
            <button id="btn-preview-button" class="btn btn-primary" data-href="{{ route('create_form_type') }}" onclick="saveNewQuestionnaireType()">
                Preview
            </button>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>Add New Question To Questionnaire</b></h4>
                    <p class="card-category"> </p>
                </div>
                <div class="card-body">
                        <form method="POST" action="{{ route('add_new_question', $formQTypes['form_id']) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">ID</label>
                                        <input type="text" name="form_type_id" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Questionnaire Name</label>
                                        <input type="text" name="form_type_name" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Questionnaire Type</label>
                                        <input type="text" name="form_type_code" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right"><b>Add</b></button>
                        </form>

                        @foreach($formQTypes as $qt)

                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection