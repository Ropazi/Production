
function SubmitForm(contextname) {
    HideOptions('');
    dtoupdate = contextname + '_searchresult';
    $.ajax({
        type: "POST",
        url: $('#' + contextname + 'SearchForm').attr('action'),
        dataType: "json",
        data: $('#' + contextname + 'SearchForm').serialize(),
        success: SearchSuccess,
        error: AJXError
    });
}
function SearchSuccess(result) {
    //alert(dtoupdate);
    //alert(result.data);
    $('#' + dtoupdate).html(result.data);
    if ($('#PostProcess').length > 0) {
        PostProcess();
    }
    
}
function AJXError(xhr, ajaxOptions, thrownError) {
    alert(xhr.statusText);
    alert(ajaxOptions);
    alert(thrownError);
}


function SetSort(contextname, expression) {
    if ($('#' + contextname + '_hdnSortExpression').val() == expression) {
        if ($('#' + contextname + '_hdnSortDirection').val() == 'ASC') {
            $('#' + contextname + '_hdnSortDirection').val('DESC');
        }
        else {
            $('#' + contextname + '_hdnSortDirection').val('ASC');
        }
    }
    else {
        $('#' + contextname + '_hdnSortDirection').val('ASC');
    }
    $('#' + contextname + '_hdnSortExpression').val(expression);
    SubmitForm(contextname);
}

function SetNext(contextname) {
    var p = $('#' + contextname + '_hdnPageIndex').val();
    if (p == '') {
        p = '0';
    }
    p = (parseInt(p) + 1);
    if (parseInt(p) == parseInt($('#' + contextname + '_hdnTotalPages').val())) {
        return false;
    }
    
    $('#' + contextname + '_hdnPageIndex').val(p);
    SubmitForm(contextname);
}
function SetPrev(contextname) {
    var p = $('#' + contextname + '_hdnPageIndex').val();
    if (p == '' || p == '0') {
        p = '0';
        return false;
    }
    else {
        p = (parseInt(p) - 1);
    }
    $('#' + contextname + '_hdnPageIndex').val(p);
    SubmitForm(contextname);
}
function SetFirst(contextname) {
    var p = $('#' + contextname + '_hdnPageIndex').val();
    if (p == '' || p == '0') {
        p = '0';
        return false;
    }
    else {
        p = '0';
    }
    $('#' + contextname + '_hdnPageIndex').val(p);
    SubmitForm(contextname);
}
function SetLast(contextname) {
    var p = $('#' + contextname + '_hdnTotalPages').val();
    p = parseInt(p) - 1;
    $('#' + contextname + '_hdnPageIndex').val(p);
    SubmitForm(contextname);
}