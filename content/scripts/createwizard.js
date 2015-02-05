function FinishWizard() {
    window.location = basePath + 'OPEnrollment/ViewOPEnrollment';
}
$(document).ready(function () {
    $("#PrevButton").hide();
    
});
function ShowWizSpinner() {
    $('#spinner').removeClass('hdn');
    //$('#PrevButton').removeClass('orange');
    //$('#NextButton').removeClass('orange');
    $('#PrevButton').hide();
    $('#NextButton').hide();
        
    $('#CancelButton').hide();

}
function HideWizSpinner() {
    $('#spinner').addClass('hdn');
    $('#PrevButton').show();
    $('#NextButton').show();
    //$('#PrevButton').addClass('orange');
    //$('#NextButton').addClass('orange');
    $('#CancelButton').show();


}
function WizSubmit(context) {
    act = $('#waction').val();
    if (act == 'Prev' || act == "First") {
        $('#errors').html('');
        ShowWizSpinner();
        $.ajax({
            type: "POST",
            url: $('#' + context + 'EditForm').attr('action'),
            dataType: "json",
            data: $('#' + context + 'EditForm').serialize(),
            success: WSuccess
        });
    }
    else {
        if ($('#' + context + 'EditForm').valid()) {
            ShowWizSpinner();
            $('#errors').html('');
            $.ajax({
                type: "POST",
                url: $('#' + context + 'EditForm').attr('action'),
                dataType: "json",
                data: $('#' + context + 'EditForm').serialize(),
                success: WSuccess
            });
        }
    }
}
function WSuccess(result) {
    HideWizSpinner();
    //if (CheckResult(result)) {
    
    if (result.code == '215') {
        
        $('#WizardContent').html(result.data);
        $('#step').val(result.stepnumber);
        var step = parseInt(result.stepnumber);
        if (step > 1) {
            $('#PrevButton').show();
        }
        else {
            $('#PrevButton').hide();
            $('#wizardbuttons').show();
            $('#finishbutton').hide();
        }
        if (parseInt($('#totalsteps').val()) - step == 1) { //second last step
            $('#wizardbuttons').show();
            $('#finishbutton').hide();
            $('#NextButtonText').text('Confirm');
        }
        else if (result.stepnumber == parseInt($('#totalsteps').val())) {
            $('#wizardbuttons').hide();
            $('#finishbutton').show();
        }
        else {
            
            $('#wizardbuttons').show();
            $('#finishbutton').hide();
            $('#NextButtonText').text('Next');
        }
    }
    else if (result.code == '210') {
        $('#errors').html(result.errors);
        if ($('#step').val() == '1') {
            $('#PrevButton').hide();
        }
    }

            
    //}

}
function Next(context) {
    $('#waction').val('Next');
    WizSubmit(context);
}
function Prev(context) {
    $('#waction').val('Prev');
    WizSubmit(context);
}
function First(context) {
    $('#waction').val('First');
    WizSubmit(context);
}

