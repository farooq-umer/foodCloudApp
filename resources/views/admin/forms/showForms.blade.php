@extends('layouts.baseLayout')

@section('title', 'show Froms')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="{{ route('show_create_form') }}">
                        <b>Create</b>
                        <i class="material-icons">control_point</i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Create New Questionnaire</h4>
                    <p class="card-category"> Here you can View, Edit and Add Questionnaires</p>
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
                                <strong>Active</strong>
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
                                        {{ $form->is_active }}
                                    </td>
                                    <td>
                                        {{ $form->created_at }}
                                    </td>
                                    <td>
                                        {{ $form->updated_at }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('show_edit_form', $form->form_id) }}">Edit</a>
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
