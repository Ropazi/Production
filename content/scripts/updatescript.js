/*$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
function BlockUI() {

}*/
$(document).ready(function () {
    $('#SearchForm').keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            var defaultButtonId = $(this).attr("defaultButton");
            $("#" + defaultButtonId).click();
            return false;
        }
    });
});
function CreateNew(url) {
    $.ajax({
        type: "GET",
        url: $('#EditForm').attr('action'),
        dataType: "json",
        success: CreateSuccess,
        error: AJXError
    });
}
function CreateSuccess(result) {
    if (result.code == '300') {
        $('#EditArea').html(result.data);
    }

}

function SaveNew() {
    $.ajax({
        type: "POST",
        url: $('#EditForm').attr('action'),
        dataType: "json",
        data: $('#EditForm').serialize(),
        success: SaveSuccess,
        error: AJXError
    });
}
function SaveSuccess(result) {
    if (result.code == '300') {
        $('#EditArea').html('');
        $('#searchresult').html(result.data);
    }
    

}

function AddNew(action) {
    $.ajax({
        type: "POST",
        url: action,
        dataType: "json",
        success: AddSuccess,
        error: AJXError
    });
}
function AddSuccess(result) {
    $('#searchresult').html(result.data);
    
}

$(document).ready(function () {
    $('#SearchForm').submit(function (event) {
        event.preventDefault();
        SubmitSearch();
    });
    slideit();
});
function SubmitSearch() {
    HideOptions('');
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
    if (result.code == '300') {
        $('#updatemessage').text(result.data);
    }
    else if (result.code == '200') {
        $('#searchresult').html(result.data);
    }

}
function AJXError(xhr, ajaxOptions, thrownError) {
    alert(xhr.statusText);
    alert(ajaxOptions);
    alert(thrownError);
}

function SubmitForm() {
    $('#SearchForm').submit();
}
var targetid = '';
var targetid2 = '';
var eid = '';
function GetElements(el, tid) {
    targetid = tid;
    $.ajax({
        type: "POST",
        url: basePath + "Relation/GetElements",
        dataType: "json",
        data: "EntityID=" + $(el).val(),
        success: GetElementSuccess,
        error: AJXError
    });
}
function GetElementSuccess(result) {
    $('#' + targetid).html(result.data);

}
function GetProjectControls(el, tid, tid2) {
    targetid = tid;
    targetid2 = tid2;
    eid = $(el).val();
    $.ajax({
        type: "POST",
        url: basePath + "Page/GetProjectControls",
        dataType: "json",
        data: "EntityID=" + eid,
        success: GetProjectControlSuccess,
        error: AJXError
    });
}
function GetProjectControlSuccess(result) {
    $('#' + targetid).html(result.data);
    GetBusinessMethods();

}
function GetBusinessMethods() {
    $.ajax({
        type: "POST",
        url: basePath + "Page/GetBusinessMethods",
        dataType: "json",
        data: "EntityID=" + eid,
        success: GetBusinessMethodSuccess,
        error: AJXError
    });
}
function GetBusinessMethodSuccess(result) {
    $('#' + targetid2).html(result.data);

}
function Expand(tid, pcid, idx, target) {
    targetid = tid;
    $('#Expanded' + idx).val('1');
    $('#Expand' + idx).hide();
    $('#Collapse' + idx).show();
    $.ajax({
        type: "POST",
        url: basePath + target,
        dataType: "json",
        data: "ID=" + pcid + "&Index=" + idx,
        success: GetDetailSuccess,
        error: AJXError
    });
}
function GetDetailSuccess(result) {
    $('#' + targetid).html(result.data);
    

}
function Collapse(idx, tid) {
    $('#Expanded' + idx).val('0');
    $('#Expand' + idx).show();
    $('#Collapse' + idx).hide();
    $('#' + tid).html('');
}
function AddNewPC(id, action) {
    targetid = 'Page' + id;
    $('#ActiveIndex').val(id);
    $.ajax({
        type: "POST",
        url: action,
        dataType: "json",
        data: $('#SearchForm').serialize(),
        success: AddSuccessPC,
        error: AJXError
    });
}
function AddSuccessPC(result) {
    $('#' + targetid).html(result.data);
}
function ConfirmRemove(id, action) {
    $("#dialog:ui-dialog").dialog("destroy");

    $("#confirmremove").dialog({
        resizable: false,
        height: 140,
        modal: true,
        dialogClass: 'shadow',
        buttons: {
            "OK": function () {
                $(this).dialog("close");
                $.ajax({
                    type: "POST",
                    url: basePath + action,
                    dataType: "json",
                    data: "ID=" + id,
                    success: SearchSuccess
                });
            },
            Cancel: function () {
                $(this).dialog("close");
            }
        }
    });
}