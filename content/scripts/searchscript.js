
$(document).ready(function () {
    $('#SearchForm').submit(function (event) {
        event.preventDefault();
        SubmitSearch();
    });
    
});
function SubmitSearch() {
    HideOptions('');
    $.blockUI();
    $.ajax({
        type: "POST",
        url: $('#SearchForm').attr('action'),
        dataType: "json",
        data: $('#SearchForm').serialize(),
        success: SearchSuccess,
        error: AJXError
    });
}
function SearchSuccess(result) {
    
    $('#searchresult').html(result.data);
    $.unblockUI();

}
function AJXError(xhr, ajaxOptions, thrownError) {
    alert(xhr.statusText);
    alert(ajaxOptions);
    alert(thrownError);
}

function SubmitForm() {
    $('#SearchForm').submit();
}
function SetPageSize() { }
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
    $('#SearchForm').submit();
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
    $('#SearchForm').submit();
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
    $('#SearchForm').submit();
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
    $('#SearchForm').submit();
}
function SetLast() {
    var p = $('#hdnTotalPages').val();
    p = parseInt(p) - 1;
    $('#hdnPageIndex').val(p);
    $('#SearchForm').submit();
}
