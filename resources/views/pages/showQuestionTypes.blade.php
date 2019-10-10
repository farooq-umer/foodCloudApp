@extends('layouts.baseLayout')

@section('title', 'Question Types')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="{{ route('show_create_question_type') }}">
                        <b>Create</b>
                        <i class="material-icons">control_point</i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Question Types</h4>
                    <p class="card-category"> Here you can View, Edit and Add New Question Types</p>
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
                                <strong>Code</strong>
                            </th>
                            <th>
                                <strong>Description</strong>
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
                            @foreach($QTypes as $QType)
                                <tr>
                                    <td>
                                        {{ $QType->form_question_type_id }}
                                    </td>
                                    <td class="text-primary">
                                        {{ $QType->form_question_type_name }}
                                    </td>
                                    <td>
                                        {{ $QType->form_question_type_code }}
                                    </td>
                                    <td>
                                        {{ $QType->form_question_type_description }}
                                    </td>
                                    <td>
                                        {{ $QType->created_at }}
                                    </td>
                                    <td>
                                        {{ $QType->updated_at }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('show_edit_question_type', $QType->form_question_type_id) }}">Edit</a>
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
