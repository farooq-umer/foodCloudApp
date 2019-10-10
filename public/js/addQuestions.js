$( document ).ready(function() {

    form = new Form();
    $('#btn-add-questionnaire').attr('disabled','disabled');

    $('#select-question-type-dropdown').on('change', function() {
        //alert( this.value );
        console.log(this);

    });

    addTextField = () => {

        const form_question = '<input type="text" placeholder="" name="form_question" required class="form-control">';
        const form_answer = '<input type="text" placeholder="" name="form_answer" required class="form-control">';

        //new_row += '<button onclick="removeTableRow(this)" class="delRowBtn btn btn-danger"> <i class="material-icons">cancel</i></button>';

        $('#addNewQuestionToQuestionnaire').html(form_question);
        $('#answerToSelectedQuestion').html(form_answer);

        $('#btn-add-questionnaire').attr('disabled', false);

        console.log('Test Run');
        //form.showNotificationMessage('rose', 'Preview Route: ');

    }

});
