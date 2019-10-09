class Form {

    constructor() {
        this.tblRowCount = 0;
        //this.runRemoveRowCheck();
        //this.grabTableRowChange();
    }

    ajaxCall = (url) => {
        $.ajax({ url: url, success: this.successCallBack, error: this.failCallBack });
    };

    ajaxPostCall = (url, data) => {
        $.ajax({ type: 'POST', url: url, data, success: successCallBack, error: failCallBack });
    };

    successCallBack = async (response, status) => {
        console.log('ajax response ' + status, response);
    };

    failCallBack = (response, status) => {
        console.dir('ajax response ' + status, response);
    };

    searchCode = (key, inputArray) => {
        let matchedObjsArr = [];
        let counter = 0;
        for (let i = 0; i < inputArray.length; i++) {
            if (inputArray[i].code === key) {
                matchedObjsArr[counter] = inputArray[i];
                counter++;
            }
        }
        return matchedObjsArr;
    };

    grabTableRowChange = () => {
        console.log('grabTableRowChange runing');
        $('table.table-main').on('click', 'tr', function(event) {
            //get row content into an array
            const tableData = $(this)
                .children('td')
                .map(function() {
                    return $(this).text();
                })
                .get();
            const td =
                tableData[0] +
                '*' +
                tableData[1] +
                '*' +
                tableData[2] +
                '*' +
                tableData[3];

            console.log(tableData);
        });
    };

    getRandomNumber = () => {
        let randomNum = Math.random().toString(36).substring(7);
        return randomNum;
    };

    getTableRowNumber = (element) => {
        alert('row' + element.parentNode.parentNode.rowIndex + ' - column' + element.parentNode.cellIndex);
    };

    runRemoveRowCheck = () => {
        console.log('runRemoveRowCheck is running');
        const that = this;
        $('table.table-main').on('click', '.delRowBtn', function(event) {
            $(this).closest('tr').remove();

            that.tblRowCount--;
            //that.showNotificationMessage('rose', 'Row has been Deleted successfully.');
        });
    };

    showNotificationMessage = (type, htmlMsg, align='', from='') => {
        //const type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];
        //const color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "add_alert",
            message: htmlMsg

        }, {
            //type: type[color],
            type: type,
            timer: type === 'danger' ? 100000 : 3000,
            placement: {
                from: from ? from : 'top', // top | bottom
                align: align ? align : 'center' // left | right| center
            }
        });
    };

    createNewInputField = (numOfCols, type, placeholder='', name='', classes='') => {

        let new_row = '';

        for(let i = 0; i < numOfCols; i++) {
            new_row += '<td>';
            new_row += `<input type="${type}" name="${name}" placeholder="${placeholder}" required class="form-control ${classes}">`;
            new_row += '</td>';
        }

        return new_row;
    };

    validateString = (string) => {
        return string.replace(/[^a-zA-Z0-9-_. ]/g, '');
    }

}

$( document ).ready(function() {

    const form = new Form();

    $('#btn-save-submit').attr('disabled','disabled');

    createNewFormType = () => {

        form.tblRowCount++;
        if(form.tblRowCount > 0) {
            $('#btn-create-new-form').attr('disabled', 'disabled');
            $('#btn-save-submit').attr('disabled', false);
        }
        console.log(form.tblRowCount);

        // let new_row = `<tr id="rowId${form.tblRowCount}">`;
        // new_row += form.createNewInputField(1,'text', 'Enter Questionnaire Name','form_type_name[]');
        // new_row += form.createNewInputField(1,'text', 'Enter Questionnaire Code','form_type_code[]');
        // new_row += '<td><button class="delRowBtn btn btn-danger"> <i class="material-icons">cancel</i></button></td>';
        // new_row += '<tr>';

        let new_row = `<tr id="rowId${form.tblRowCount}">`;
        new_row += '<td><input type="text" placeholder="Enter Questionnaire Name" name="form_type_name[]" required class="form-control">';
        new_row += '<td><input type="text" placeholder="Enter Questionnaire Code" name="form_type_code[]" required class="form-control">';
        new_row += '<td><button onclick="removeTableRow(this)" class="delRowBtn btn btn-danger"> <i class="material-icons">cancel</i></button></td>';
        new_row += '<tr>';

        $('#createNewFormTableMain > tbody').append(new_row);
    };

    createNewForm = ()  => {

        form.tblRowCount++;
        if(form.tblRowCount > 0) {
            $('#btn-create-new-form').attr('disabled', 'disabled');
            $('#btn-save-submit').attr('disabled', false);
        }
        console.log(form.tblRowCount);

        let new_row = `<tr id="rowId${form.tblRowCount}">`;
        new_row += form.createNewInputField(1,'text', 'Enter Name','form_name[]');
        new_row += form.createNewInputField(1,'text', 'Enter Description','form_description[]');
        new_row += form.createNewInputField(1,'text', 'form_type_id','form_type_id[]');
        new_row += '<td><button onclick="removeTableRow(this)" class="delRowBtn btn btn-danger"> <i class="material-icons">cancel</i></button></td>';
        new_row += '<tr>';

        $('#createNewFormTableMain > tbody').append(new_row);
    };

    $('#create_new_form_on_submit').on('submit', function(event) {
        event.preventDefault();
        const route = $('#btn-create-new-form').data('href');
        //console.log('route url:', route);
        //const d = $(this);
        //const d = $(this).serialize();
        //console.log('row_data', d);

        $.ajax({
            url: route,
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#btn-save-submit').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error) {
                    form.showNotificationMessage('danger', data.error);
                }
                else {
                    form.showNotificationMessage('success', data.success);
                }
                $('#createNewFormTableMain > tbody').html('');
                $('#btn-create-new-form').attr('disabled', false);
                form.tblRowCount = 0;
            },
            error:function(data, status) {
                const errors = $.parseJSON(data.responseText);

                let errors_html = '';
                $.each(errors, function (key, value) {
                    if(typeof value === 'object' && value !== null) {
                        $.each(value, function (key1, value1) {
                            errors_html += `<div> ${value1} </div>`;
                        })
                    }
                    else {
                        errors_html += `<div> ${value} </div>`;
                    }
                 });

                form.showNotificationMessage('danger', errors_html);
                $('#btn-save-submit').attr('disabled', false);
                // laravel sends JSON response with 422 HTTP status code on form validation failure.
            }
        })

    });

    removeTableRow = (element) => {

        $('table.table-main').on('click', '.delRowBtn', function(event) {
            $(this).closest('tr').remove();
        });
        //that.showNotificationMessage('rose', 'Row has been Deleted successfully.');
        form.tblRowCount--;
        if(form.tblRowCount === 0) {
            $('#btn-create-new-form').attr('disabled', false);
            $('#btn-save-submit').attr('disabled', 'disabled');
        }
    };

    saveNewQuestionnaireType = () => {

        //window.location.href = $(this).data('href');
        const link = $('#btn-preview-button').data('href');
        console.log('Preview Cliked', link);

        form.showNotificationMessage('primary', 'Preview Route: ' + link);

        //table.getElementsByTagName("tr").length;
        //const row_count = $('#bannerTable tr').length;
        //Select a value with the following two ways:
        //let v1 = $("#txt_name").val();
        //let v2 = $("#txt_name").attr('value');
        //let v3 = document.getElementById('txt_name').value
        //console.log([v1,v2,v3]);

        //To Remove all data/rows from table at Once
        //$('#createNewFormTableMain').find('tbody').detach();
        //$('#createNewFormTableMain > tbody').empty();
        //$jq("tbody", myTable).remove();
    };

});
