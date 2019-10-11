<div class="sidebar" data-color="purple" data-background-color="white">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
    Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="javascript:void(0);" class="simple-text logo-normal">
            {{ config('app.name') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('form_types') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ route('show_form_types') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Questionnaire Types</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('question_types') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('show_question_types') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Question Types</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('forms') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('show_forms') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Questionnaires</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add_questions') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('show_questionnaires_to_add_questions') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Add Questions</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link alert-danger text-danger" href="{{ route('show_form_types') }}">
                    <i class="material-icons text-danger">warning</i>
                    <p><b>DELETE ZONE</b></p>
                </a>
            </li>
        </ul>
    </div>
</div>