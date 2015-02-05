
function SetPageSize() {

}
function SetSort(expression) {
    if ($('#hdnSortExpression').val() == expression) {
        if ($('#hdnSortDirection').val() == 'ASC') {
            $('#hdnSortDirection').val('DESC');
        }
        else {
            $('#hdnSortDirection').val('ASC');
        }
    }
    else {
        $('#hdnSortDirection').val('ASC');
    }
    $('#hdnSortExpression').val(expression);
    SubmitForm();
}


function SetNext() {
    var p = $('#hdnPageIndex').val();

    if (p == '') {
        p = '0';
    }
    p = (parseInt(p) + 1);
    if (parseInt(p) == parseInt($('#hdnTotalPages').val())) {
        return false;
    }

    $('#hdnPageIndex').val(p);
    SubmitForm();
}
function SetPrev() {
    var p = $('#hdnPageIndex').val();
    if (p == '' || p == '0') {
        p = '0';
        return false;
    }
    else {
        p = (parseInt(p) - 1);
    }

    $('#hdnPageIndex').val(p);
    SubmitForm();
}
function SetFirst() {
    var p = $('#hdnPageIndex').val();
    if (p == '' || p == '0') {
        p = '0';
        return false;
    }
    else {
        p = '0';
    }

    $('#hdnPageIndex').val(p);
    SubmitForm();
}
function SetLast() {
    var p = $('#hdnTotalPages').val();
    p = parseInt(p) - 1;
    $('#hdnPageIndex').val(p);
    SubmitForm();
}



function CreateError(result) {
    $('#errors').html(result);
}
function CreateSuccess(result) {
    var jsonResult = result.get_response().get_object();
    if (jsonResult.code == '300') {
        window.location = jsonResult.data;
    }
    if (jsonResult.code == '310') {
        $('#pagemessage').html(jsonResult.errors);
    }
    else if (jsonResult.code == '200') {
        $('#Ctl').html(jsonResult.data);
        $('#errors').html(jsonResult.errors);
    }

}


$(document).ready(function () {
    
});

function SubmitForm() {
    $('#SearchForm').submit();
}

function SubmitSearch() {
    $.ajax({
        type: "POST",
        url: $('#SearchForm').attr('action'),
        dataType: "json",
        data: $('#SearchForm').serialize(),
        success: SearchSuccess
    });


}
function SearchSuccess(result) {
    $('#searchresult').html(result.data);
    PostProcess();

}

function redirect(url) {
    window.location = url;
}
