class Form {

    constructor() {
        this.runDeleteRowCheck();
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

    createNewInputField = (numOfCols, type, placeholder='', name='', classes='') => {

        let new_row = '';

        for(let i = 0; i < numOfCols; i++) {
            new_row += '<td>';
            new_row += `<input type="${type}" name=[] placeholder="${placeholder}" class="form-control ${classes}">`;
            new_row += '</td>';
        }

        return new_row;
    };

    addNewRow = () => {
        let new_row = '<tr>';
        new_row += '<td><input type="text" placeholder="Enter Questionnaire Name" name="questionnaire_type_name" class="form-control">';
        new_row += '<td><input type="text" placeholder="Enter Questionnaire Code" name="questionnaire_type_code" class="form-control">';
        $('#createQuestionnaireTypeTableMain > tbody').append(new_row);
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

    runDeleteRowCheck = () => {
        console.log('fc app is running');
        const that = this;
        $('table.table-main').on('click', '.delRowBtn', function(event) {
            $(this).closest('tr').remove();

            that.displayMessage('Row has been Deleted successfully.', 'danger');
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
            timer: 2500,
            placement: {
                from: from ? from : 'top', // top | bottom
                align: align ? align : 'center' // left | right| center
            }
        });
    };

}

$( document ).ready(function() {

    const form = new Form();

    addNewQuestionnaireType = () => {

        //form.addNewRow();
        // let new_row = '<tr>';
        // new_row += form.createNewInputField(1,'text', 'Enter Questionnaire Name','questionnaire_type_name');
        // new_row += form.createNewInputField(1,'text', 'Enter Questionnaire Code','questionnaire_type_code');
        // new_row += '<td><button class="delRowBtn btn btn-danger"> <i class="material-icons">cancel</i></button></td>';
        // new_row += '<tr>';

        let new_row = '<tr>';
        new_row += '<td><input type="text" placeholder="Enter Questionnaire Name" name="questionnaire_type_name" class="form-control">';
        new_row += '<td><input type="text" placeholder="Enter Questionnaire Code" name="questionnaire_type_code" class="form-control">';
        new_row += '<td><button class="delRowBtn btn btn-danger"> <i class="material-icons">cancel</i></button></td>';
        new_row += '<tr>';
        $('#createQuestionnaireTypeTableMain > tbody').append(new_row);
    };

    $('#create_questionnaire_type_form').on('submit', function(event) {
        event.preventDefault();

        const route = $('#store-button-href').data('href');
        //console.log('route url:', route);
        //const d = $(this).serialize();
        //console.log('row_data', d);

        $.ajax({
            url: route,
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    let error_html = '';
                    for(let count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    form.showNotificationMessage('danger', error_html);
                }
                else
                {
                    form.showNotificationMessage('success', data.success);
                }
                $('#save').attr('disabled', false);
            }
        })
    });

    saveNewQuestionnaireType = () => {

        //window.location.href = $(this).data('href');
        const link = $('#store-button-href').data('href');
        console.log('Preview Cliked', link);

        form.showNotificationMessage('primary', 'Preview Route: ' + link);

        //Select a value with the following two ways:
        //let v1 = $("#txt_name").val();
        //let v2 = $("#txt_name").attr('value');
        //let v3 = document.getElementById('txt_name').value
        //console.log([v1,v2,v3]);
    };

});
