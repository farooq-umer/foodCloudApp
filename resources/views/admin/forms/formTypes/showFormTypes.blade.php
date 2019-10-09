@extends('layouts.baseLayout')

@section('title', 'show From Types')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="{{ route('show_create_form_type') }}">
                        <b>Create</b>
                        <i class="material-icons">control_point</i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Questionnaire Types</h4>
                    <p class="card-category"> Here you can View, Edit and Add Questionnaire Types</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                <strong>ID</strong>
                            </th>
                            <th>
                                <strong>Type</strong>
                            </th>
                            <th>
                                <strong>Code</strong>
                            </th>
                            <th>
                                <strong>Date Created</strong>
                            </th>
                            <th>
                                <strong>Date Updated</strong>
                            </th>
                            <th>
                                <strong>Edit</strong>
                            </th>
                            </thead>
                            <tbody>
                            @foreach($formTypes as $formType)
                            <tr>
                                <td>
                                    {{ $formType->form_type_id }}
                                </td>
                                <td class="text-primary">
                                    {{ $formType->form_type_name }}
                                </td>
                                <td>
                                    {{ $formType->form_type_code }}
                                </td>
                                <td>
                                    {{ $formType->created_at }}
                                </td>
                                <td>
                                    {{ $formType->updated_at }}
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('show_edit_form_type', $formType->form_type_id) }}">Edit</a>
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
