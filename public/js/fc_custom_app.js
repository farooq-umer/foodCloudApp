class Form {

    csvFileData = [];
    itemListJson = {};
    finalData = [];
    rowCount = 1;

    constructor() {
        this.runDeleteRowCheck();
        this.rowCount = 1;
        this.grabTableRowChange();
    }

    ajaxCall = (url) => {
        $.ajax({ url: url, success: this.successCallBack, error: this.failCallBack });
    };

    ajaxPostCall = (url, data) => {
        $.ajax({ type: 'POST', url: url, data, success: successCallBack, error: failCallBack });
    };

    successCallBack = async (response, status) => {
        const csvArrOfObjects = response.split(/\r?\n|\r/).slice(1);
        this.csvFileData = csvArrOfObjects.map((line) => {
            const row = line.split(',');
            return row;
        });

        this.itemListJson = await this.getJsonData();

        let csvData;
        let counter = 0;
        for (csvData of this.csvFileData) {
            const productItemList = this.getProductItemsList(csvData[0], csvData[1], csvData[3], csvData[4]);
            this.finalData[counter] = productItemList;

            let newRow =
                `<tr data-rowid="${productItemList.code}" class="RowId_${productItemList.code}"><td>` +
                productItemList.code +
                '</td><td>' +
                productItemList.productDesc +
                `</td><td><input type="number" name="quantity" onchange="product.editQuantity(this,this.value)" class="update-p-quantity form-control"
				value="${productItemList.totalQuantity}">
				</td><td>` +
                Math.round(productItemList.totalQuantity * productItemList.costPrice * 1000) / 1000 +
                '</td><td>' +
                Math.round(productItemList.totalQuantity * productItemList.sellPrice * 1000) / 1000 +
                '</td><td>' +
                '<button class="delRowBtn btn btn-geopalgrey">Delete <i class="fa fa-fw fa-minus-square"></button>' +
                '</td></tr>';

            $('#tableMain > tbody').append(newRow);

            counter++;
        }
        this.getGrandTotal();
    };

    failCallBack = (response, status) => {
        console.dir('ajax response ' + status, response);
    };

    getProductItemsList = (productCode, productDesc, costPrice, sellPrice) => {
        const resultObject = this.searchCode(productCode, this.itemListJson);

        if (resultObject.length > 1) {
            const totalQuantity = resultObject[0].quantity + resultObject[1].quantity;
            return {
                code: productCode,
                productDesc: productDesc,
                totalQuantity: totalQuantity,
                costPrice: costPrice,
                sellPrice: sellPrice
            };
        }

        const quantity = resultObject[0].quantity;
        return {
            code: productCode,
            productDesc: productDesc,
            totalQuantity: quantity,
            costPrice: costPrice,
            sellPrice: sellPrice
        };
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
            new_row += `<input type="${type}" name="${name}" placeholder="${placeholder}" class="form-control ${classes}">`;
            new_row += '</td>';
        }

        return new_row;
    };

    addNewRow = () => {

        let new_row = '<tr>';
        new_row += '<td><input type="text" placeholder="Enter Questionnaire Name" name="questionnaire_type_name" class="form-control">';
        new_row += '<td><input type="text" placeholder="Enter Questionnaire Code" name="questionnaire_type_code" class="form-control">';
        $('#createQuestionnaireTypeTableMain > tbody').append(new_row);

        // const randomNum = this.getRandomNumber();
        // const len = this.finalData.length;
        //
        // const newRow = `<tr data-rowid="${randomNum}" class="datarow_${randomNum}"> \
        // <td>${randomNum}</td> \
        // <td>Product_${randomNum} Desc</td> \
        // <td><input type="number" name="quantity" onchange="product.editQuantity(this,this.value)" class="update-p-quantity form-control" value=1></td> \
        // <td>1</<td> \
        // <td>1</td> \
        // <td><button class="delRowBtn btn btn-geopalgrey">Delete <i class="fa fa-fw fa-minus-square"></button></td></tr>`;
        //
        // $('#tableMain > tbody').append(newRow);
        //
        // this.finalData[len] = {
        //     code: randomNum,
        //     productDesc: `Product_${randomNum} Desc`,
        //     totalQuantity: 1,
        //     costPrice: 1,
        //     sellPrice: 1
        // };
        //
        // this.getGrandTotal();

        //this.displayMessage('New Row has been Added successfully.', 'success');
    };

    getJsonData = async () => {
        const response = await fetch('Data/itemlist.json');
        const csvDataArr = await response.json();
        return csvDataArr;
    };

    editQuantity = (row, quantity) => {
        if (Number.isInteger(quantity) || quantity < 0.01) {
            alert('Quantity Must be a positive number');
        }
        else {
            const rowId = $(row).closest('tr').attr('data-rowid');
            const product = this.searchCode(rowId, this.finalData);
            const totalCosstPrice = Math.round(quantity * product[0].costPrice * 1000) / 1000;
            const totalSellPrice = Math.round(quantity * product[0].sellPrice * 1000) / 1000;

            var mainTable = document.getElementById('tableMain');
            mainTable.rows[row.parentNode.parentNode.rowIndex].cells[3].innerHTML = totalCosstPrice;
            mainTable.rows[row.parentNode.parentNode.rowIndex].cells[4].innerHTML = totalSellPrice;

            this.getGrandTotal();
        }
    };

    getGrandTotal = () => {
        document.getElementById('grandCostPriceSum').innerHTML = '';
        document.getElementById('grandSellPriceSum').innerHTML = '';

        let mainTable = document.getElementById('tableMain');
        let costPriceSum = 0;
        let sellPriceSum = 0;

        for (let i = 1; i < mainTable.rows.length; i++) {
            costPriceSum = costPriceSum + parseFloat(mainTable.rows[i].cells[3].innerHTML);
            sellPriceSum = sellPriceSum + parseFloat(mainTable.rows[i].cells[4].innerHTML);
        }

        const grandCostPriceSum = `Cost Price Total : <span class="badge btn-geopalgreen">${costPriceSum.toFixed(
            2
        )}</span>`;
        const grandSellPriceSum = `Sell Price Total : <span class="badge btn-geopalgreen">${sellPriceSum.toFixed(
            2
        )}</span>`;
        document.getElementById('grandCostPriceSum').innerHTML = grandCostPriceSum;
        document.getElementById('grandSellPriceSum').innerHTML = grandSellPriceSum;
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

    displayMessage = (msg, type) => {
        $(`<div class="alert-${type} alert-geopal"> ${msg} </div>`)
            .insertBefore('#displayMessages')
            .slideDown(1000)
            .delay(1500)
            .slideUp(1000);
    };

    runDeleteRowCheck = () => {
        console.log('fc app is running');
        const that = this;
        $('table.table-main').on('click', '.delRowBtn', function(event) {
            $(this).closest('tr').remove();

            that.displayMessage('Row has been Deleted successfully.', 'danger');
        });
    };

}
$( document ).ready(function() {

    console.log( "ready!" );
    const form = new Form();

    addNewQuestionnaireType = () => {

        //form.addNewRow();
        let new_row = '<tr>';
        new_row += form.createNewInputField(1,'text', 'Enter Questionnaire Name','questionnaire_type_name');
        new_row += form.createNewInputField(1,'text', 'Enter Questionnaire Code','questionnaire_type_code');
        new_row += '<td><button class="delRowBtn btn btn-danger"> <i class="material-icons">cancel</i></button></td>';
        new_row += '<tr>';

        $('#createQuestionnaireTypeTableMain > tbody').append(new_row);
    };

    $('#create_questionnaire_type_form').on('submit', function(event) {
        event.preventDefault();
        console.log('save cliked');
        const d = $(this).serialize();
        console.log(d);

        // $.ajax({
        //     url:'{{ route("create_form_type") }}',
        //     method:'post',
        //     data:$(this).serialize(),
        //     dataType:'json',
        //     beforeSend:function(){
        //         $('#save').attr('disabled','disabled');
        //     },
        //     success:function(data)
        //     {
        //         if(data.error)
        //         {
        //             let error_html = '';
        //             for(let count = 0; count < data.error.length; count++)
        //             {
        //                 error_html += '<p>'+data.error[count]+'</p>';
        //             }
        //             $('#results').html('<div class="alert alert-danger">'+error_html+'</div>');
        //         }
        //         else
        //         {
        //             $('#results').html('<div class="alert alert-success">'+data.success+'</div>');
        //         }
        //
        //         $('#save').attr('disabled', false);
        //     }
        // })
    });

    saveNewQuestionnaireType = () => {

        //window.location.href = $(this).data('href');

        const link = $('#store-button-href').data('href');
        console.log('Store Cliked', link);

        //You can only select a value with the following two ways:
        // First way to get a value
        let v1 = $("#txt_name").val();

        // Second way to get a value
        //let v2 = $("#txt_name").attr('value');

        //If you want to use straight JavaScript to get the value, here is how:

        //let v3 = document.getElementById('txt_name').value

        //console.log([v1,v2,v3]);
    };

});
