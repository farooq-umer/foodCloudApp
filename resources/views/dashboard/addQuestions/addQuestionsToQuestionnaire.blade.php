@extends('layouts.baseLayout')

@section('title', 'Edit From')

@section('content')
    <div class="container">
        <h3>Questionnaire: {{ $form->form_name }}</h3>
        <div class="row justify-content-end">
            <button id="btn-preview-button" class="btn btn-primary" data-href="{{ route('create_form_type') }}" onclick="previewNewQuestionnaire()">
                Preview
            </button>
            <button id="btn-add-text-button" class="btn btn-primary" onclick="addTextField()">
                Add Text
            </button>
            <button id="btn-add-Checkbox-button" class="btn btn-primary" onclick="addCheckBox()">
                Add Check Box
            </button>
            <button id="btn-add-radio-button" class="btn btn-primary" onclick="addRadioButton()">
                Add Radio Button
            </button>
            <button id="btn-add-date-picker-button" class="btn btn-primary" onclick="addDataePicker()">
                Add Date Picker
            </button>
            <button id="btn-add-drop-down-button" class="btn btn-primary" onclick="addDropDown()">
                Add Drop Down
            </button>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>Add New Question To Questionnaire</b></h4>
                    <p class="card-category"> </p>
                </div>
                <div class="card-body">
                        <form method="POST" action="{{ route('add_new_question', ['form_id' => $form->form_id]) }}">
                            @csrf
                            <div class="row checkbox justify-content-center">
                                <label><input type="checkbox" name="is_mandatory" value=""> Is Mandatory</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Question</label>
                                        <div id="addNewQuestionToQuestionnaire"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Answer</label>
                                        <div id="answerToSelectedQuestion"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Question Type</label>
                                        <select  id="select-question-type-dropdown" name="form_question_type_id" required class="form-control">
                                            <option value="">Select</option>
                                            @foreach($formQTypes as $qt)
                                                <option value="{{ $qt->form_question_type_id }}">{{ $qt->form_question_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button id="btn-add-questionnaire" type="submit" class="btn btn-primary pull-right"><b>Add</b></button>
                        </form>

                        @foreach($formQTypes as $qt)

                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection