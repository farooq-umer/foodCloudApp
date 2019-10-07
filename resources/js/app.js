require('./bootstrap');

class Form {

    csvFileData = [];
    itemListJson = {};
    finalData = [];

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

    addNewRow = () => {
        const randomNum = this.getRandomNumber();
        const len = this.finalData.length;

        const newRow = `<tr data-rowid="${randomNum}" class="datarow_${randomNum}"> \
		<td>${randomNum}</td> \
		<td>Product_${randomNum} Desc</td> \
		<td><input type="number" name="quantity" onchange="product.editQuantity(this,this.value)" class="update-p-quantity form-control" value=1></input></td> \
		<td>1</<td> \
		<td>1</td> \
		<td><button class="delRowBtn btn btn-geopalgrey">Delete <i class="fa fa-fw fa-minus-square"></button></td></tr>`;

        $('#tableMain > tbody').append(newRow);

        this.finalData[len] = {
            code: randomNum,
            productDesc: `Product_${randomNum} Desc`,
            totalQuantity: 1,
            costPrice: 1,
            sellPrice: 1
        };

        this.getGrandTotal();

        this.displayMessage('New Row has been Added successfully.', 'success');
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
        const rowId = $(row).closest('tr').attr('data-rowid');
        const product = this.searchCode(rowId, this.finalData);
        const totalCosstPrice = Math.round(quantity * product[0].costPrice * 1000) / 1000;
        const totalSellPrice = Math.round(quantity * product[0].sellPrice * 1000) / 1000;

        var mainTable = document.getElementById('tableMain');
        mainTable.rows[row.parentNode.parentNode.rowIndex].cells[3].innerHTML = totalCosstPrice;
        mainTable.rows[row.parentNode.parentNode.rowIndex].cells[4].innerHTML = totalSellPrice;

        this.getGrandTotal();
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

    runDeleteRowCheck = () => {
        const that = this;
        $('table.table-striped').on('click', '.delRowBtn', function(event) {
            $(this).closest('tr').remove();

            that.displayMessage('Row has been Deleted successfully.', 'danger');

            that.getGrandTotal();
        });
    };

    displayMessage = (msg, type) => {
        $(`<div class="alert-${type} alert-geopal"> ${msg} </div>`)
            .insertBefore('#displayMessages')
            .slideDown(1000)
            .delay(1500)
            .slideUp(1000);
    };

    getRandomNumber = () => {
        let randomNum = Math.random().toString(36).substring(7);
        return randomNum;
    };

    getTableRowNumber = (element) => {
        alert('row' + element.parentNode.parentNode.rowIndex + ' - column' + element.parentNode.cellIndex);
    };

    grabTableRowChange = () => {
        //console.log('grabTableRowChange runing');
        // .update-p-quantity
        $('table.table-striped').on('change', 'tr', function(event) {
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
                tableData[3] +
                '*' +
                tableData[4] +
                '*' +
                tableData[5];

            console.log(tableData);
        });
    };
}

const form = new Form();
