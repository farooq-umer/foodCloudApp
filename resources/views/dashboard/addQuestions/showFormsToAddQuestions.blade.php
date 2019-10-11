@extends('layouts.baseLayout')

@section('title', 'show Froms')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>Add Questions To Questionnaires</b></h4>
                    <p class="card-category"> </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                <strong>ID</strong>
                            </th>
                            <th>
                                <strong>Name</strong>
                            </th>
                            <th>
                                <strong>Type</strong>
                            </th>
                            <th>
                                <strong>Description</strong>
                            </th>
                            <th>
                                <strong>Edit</strong>
                            </th>
                            </thead>
                            <tbody>
                            @foreach($forms as $form)
                                <tr>
                                    <td>
                                        {{ $form->form_id }}
                                    </td>
                                    <td class="text-primary">
                                        {{ $form->form_name }}
                                    </td>
                                    <td>
                                        {{ $form->form_type_name }}
                                    </td>
                                    <td>
                                        {{ $form->form_description }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('add_questions_to_questionnaire', $form->form_id) }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
