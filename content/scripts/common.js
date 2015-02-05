/*
codes: 
200: OK
210: OK but val error
230: Post register
300: REDIRECT
500: Internal Server Error

*/
$.ajaxSetup({
    cache: false
});


function popWindow(height, width, url) {
    var windowAttributes = 'width=' + width + 'px,scrollbars=1,status=yes,resizable=1,height=' + height + 'px,left=' + ((screen.width - width) / 2) + ',top=' + ((screen.height - height) / 2);
    window.open(url, 'PopWindow', windowAttributes);
    return false;
}
function CloseWindow() {
    window.close();
    window.opener.location.reload();
}

function updateScroll(dispatchObj, gridHeaderOuter) {
    if (document.getElementById(gridHeaderOuter) != null) {
        document.getElementById(gridHeaderOuter).scrollLeft = dispatchObj.scrollLeft;
    }
}


function ShowSpinner() {
    $('#spinner').removeClass('hdn');
    $('#btnSave').addClass('disabled');
    $('#btnCancel').addClass('disabled');

}
function HideSpinner() {
    $('#spinner').addClass('hdn');
    $('#btnSave').removeClass('disabled');
    $('#btnCancel').removeClass('disabled');


}



function SubmitCE(context) {
	
	if ($('#' + context + 'EditForm').valid()) {
        ShowSpinner();
        $('#errors').html('');
		$.ajax({
            type: "POST",
            url: $('#' + context + 'EditForm').attr('action'),
            dataType: "json",
            data: $('#' + context + 'EditForm').serialize(),
            success: CESuccess,
            error: AJXError
        });
        
    }
    

}


function CESuccess(result) {
	HideSpinner();
    CheckState(result);
    if (result.code == '201') {
        $('#pagemessage').html(result.errors);
        HideMForm(mindex);
        if (dtoupdate == '') {
        }
        else {
            $('#' + dtoupdate).html(result.data);
        }
    }
    if (result.code == '203') {
        $('#editcontainer').html(result.data);
    }
    if (result.code == '204') {
    	$('#mcontainer' + mindex).html(result.data);
    }
    else if (result.code == '220') {
        $('#pagemessage').html(result.data);
        HideMForm(mindex);
        if (issearch) {
            $('#hdnPageIndex').val('0');
            SubmitForm();
        }
    }
    else if (result.code == '215') {
        $('#WizardContent').html(result.data);
    }

    else if (result.code == '221') {
        $('#pagemessage').html(result.data);
        HideMForm(mindex);
        window.location = basePath + result.errors;
    }
    else if (result.code == '225') {
        $('#pagemessage').html(result.data);
        if (issearch) {
            $('#hdnPageIndex').val('0');
            SubmitForm();
        }
    }
    else if (result.code == '210') {
        $('#errors').html(result.errors);
    }
    else if (result.code == '240') {
        //$('#pagemessage').html(result.errors);
        HideMForm(mindex);
        $('#scriptholder').html(result.data);
        //alert($('#scriptholder').html());
        PostLogin();
    }
    else if (result.code == '300') {
        window.location = result.data;
    }
        //for QH only
    else if (result.code == '260') {
        $('#' + result.data).removeClass();
        $('#' + result.data).addClass('smdone');
        HideMForm(mindex);
        RefreshContent();

    }
    else if (result.code == '310') {
        window.location = basePath + 'Home/Index';
    }
    else if (result.code == '520') {
        window.location = basePath + 'Home/SecurityError';
    }

}

function ConfirmRemove(id, action, udiv) {
    $("#dialog:ui-dialog").dialog("destroy");

    $("#confirmremove").dialog({
        resizable: false,
        modal: true,
        dialogClass: 'shadow',
        buttons: {
            "OK": function () {
                updatediv = udiv;
                $(this).dialog("close");
                $.ajax({
                    type: "POST",
                    url: action,
                    dataType: "json",
                    data: "ID=" + id,
                    success: RemoveSuccess
                });
            },
            Cancel: function () {
                $(this).dialog("close");
            }
        }
    });



}
function RemoveSuccess(result) {
    if (result.code == '200' || result.code == '201') {
        $('#' + updatediv).html(result.data);
    }
    else {
        //search case
        $('#pagemessage').html(result.data);
        $('#hdnPageIndex').val('0');
        SubmitForm();
    }
}


function ConfirmRemoveImage(el, imgname) {
    $("#dialog:ui-dialog").dialog("destroy");

    $("#confirmremove").dialog({
        resizable: false,
        modal: true,
        dialogClass: 'shadow',
        buttons: {
            "OK": function () {

                $(this).dialog("close");
                $(el).parent().remove();
                RemoveVal('ImageGallery', imgname);
            },
            Cancel: function () {
                $(this).dialog("close");
            }
        }
    });



}


function CheckState(result) {
    if (result.code == '500' || result.code == '510') {
        window.location = result.data;
        return false;
    }
    if (result.code == '310') {
        window.location = basePath + 'Home/Index';
        return false;
    }

    return true;
}

function AJXError(xhr, ajaxOptions, thrownError) {
	alert('from ajx error');
	alert(xhr.statusText);
    alert(ajaxOptions);
    alert(thrownError);
}
function MSuccess(result) {
	if (CheckState(result)) {
        $('#ropaziModalContent').html(result.data);
        $('#ropaziModal').foundation('reveal', 'open');

    }
}



/*****new generic modal ****/
function showmodal(target, idx) {
	$.ajax({
        type: "GET",
        url: target,
        dataType: "json",
        success: MSuccess,
        error: AJXError
    });
}


//--------------app functions
function FollowUser(userid){
	$.ajax({
        type: "POST",
        url: "/userheart/createuserheartpost",
        dataType: "json",
        data: "AppUserID=" + userid + "&HeartedByAppUserID=0",
        success: followSuccess
    });
}
function followSuccess(result) {
	if (result.code == '204') {
        $('#followers').text(result.data + " Followers");
        $('#userheartimg').attr('src', result.more);
    }
}
function FollowUser2(userid){
	aid = userid;
	$.ajax({
        type: "POST",
        url: "/userheart/createuserheartpost",
        dataType: "json",
        data: "AppUserID=" + userid + "&HeartedByAppUserID=0",
        success: followSuccess2
    });
}
function followSuccess2(result) {
	if (result.code == '204') {
		src = '/content/images/light-heart.png';
		if (result.more == '/content/images/heart-dark.png'){
			src = '/content/images/dark-heart.png';
		}
		$('#userheartimg_' + aid).attr('src', result.more);
		$('#userheartimgf_' + aid).attr('src', src);
		
    }
}
function FollowUser3(userid){
	aid = userid;
	$.ajax({
        type: "POST",
        url: "/userheart/createuserheartpost",
        dataType: "json",
        data: "AppUserID=" + userid + "&HeartedByAppUserID=0",
        success: followSuccess3
    });
}
function followSuccess3(result) {
	if (result.code == '204') {
		src = '/content/images/grid-heart-small.png';
		src2 = '/content/images/light-heart.png';
		if (result.more == '/content/images/heart-dark.png'){
			src = '/content/images/grid-heart-small-dark.png';
			src2 = '/content/images/dark-heart.png';
		}
		$('#userheartimgg_' + aid).attr('src', src);
		$('#userheartimgf_' + aid).attr('src', src);
    }
}
function FollowUser4(userid){
	aid = userid;
	$.ajax({
        type: "POST",
        url: "/userheart/createuserheartpost",
        dataType: "json",
        data: "AppUserID=" + userid + "&HeartedByAppUserID=0",
        success: followSuccess4
    });
}
function followSuccess4(result) {
	if (result.code == '204') {
		src = '/content/images/light-heart.png';
		src2 = '/content/images/grid-heart-small.png';
		if (result.more == '/content/images/heart-dark.png'){
			src = '/content/images/dark-heart.png';
			src2 = '/content/images/grid-heart-small-dark.png';
		}
		$('#userheartimgf_' + aid).attr('src', src);
		if ($('#userheartimgg_' + aid).length) {
			$('#userheartimgg_' + aid).attr('src', src);
		}
		$('#userheartimg_' + aid).attr('src', result.more);
    }
}
function ClipPost2(postid, catname){
	if (catname == ''){
		alert('No Catalog Selected');
		return;
	}
	pid = postid;
	$.ajax({
        type: "POST",
        url: "/userpost/createuserpostwithcatalog",
        dataType: "json",
        data: "PostID=" + postid + "&AppUserID=0&CatalogName=" + catname,
        success: clipSuccess
    });
}
function ClipPost(postid){
	pid = postid;
	$.ajax({
        type: "POST",
        url: "/userpost/createuserpostpost",
        dataType: "json",
        data: "PostID=" + postid + "&AppUserID=0",
        success: clipSuccess
    });
}
function clipSuccess(result) {
	if (result.code == '204') {
		$('#link_clips_' + pid).removeClass('clipping_sci');
        $('#link_clips_' + pid).addClass('clipping_sci_active');
        $('#clips_' + pid).text(result.data);
        
    }
	UpdateCatalog();
}
function HeartPost(postid){
	pid = postid;
	$.ajax({
        type: "POST",
        url: "/postheart/createpostheartpost",
        dataType: "json",
        data: "PostID=" + postid + "&AppUserID=0",
        success: heartSuccess
    });
}
function heartSuccess(result) {
	if (result.code == '204') {
		$('#link_hearts_' + pid).removeClass('clipping_heart');
        $('#link_hearts_' + pid).addClass('clipping_heart_active');
        $('#hearts_' + pid).text(result.data);
        
    }
}
function HeartBrand(brandid){
	pid = brandid;
	$.ajax({
        type: "POST",
        url: "/brandheart/createbrandheartpost",
        dataType: "json",
        data: "BrandID=" + brandid + "&AppUserID=0",
        success: bheartSuccess
    });
}
function bheartSuccess(result) {
	if (result.code == '204') {
		$('#brand_followers_' + pid).text(result.data + " Followers");
		$('#brandheartimg').attr('src', result.more);
        
    }
}

function UpdateCatalog(){
	$.ajax({
        type: "POST",
        url: "/usercatalog/refreshusercatalogs",
        dataType: "json",
        success: catalogSuccess
    });
}
function catalogSuccess(result) {
	if (result.code == '204') {
		$('#usercatalog').html(result.data);
		   
    }
}

var ntimeout = 500000;
var tout = setTimeout("notifications()", ntimeout);
function ClearTOUT() {
    clearTimeout(tout);
}
function SetTOUT() {
    tout = setTimeout("notifications()", ntimeout);
}
function notifications(){
	ClearTOUT();
	$.ajax({
        type: "POST",
        url: "/notification/getnotification",
        dataType: "json",
        success: nSuccess
    });
}
function nSuccess(result) {
	if (result.code == '200') {
		$('#alerts').html(result.data);
		$("#right-alert-dropdown").addClass('display-none');
		$('#bell-img').click(function (e) {
			$('#bell-img').removeClass('bell-img');
			$('#bell-img').addClass('bell-img-hover');
	        $("#right-alert-dropdown").removeClass('display-none');
	        $("#right-alert-dropdown").css("display", "block");
        });
        
    }
	SetTOUT();
}
function loadMoreContentIndex()
{
	
	var p = $('#hdnPageIndex').val();
	if (p == '') {
        p = '0';
    }
    p = (parseInt(p) + 1);
    
    $('#hdnPageIndex').val(p);
	
    $.ajax({
        type: "POST",
        url: "/post/userpostpost",
        dataType: "json",
        data: "txtTitle=" + $('#hdnTitle').val() + "&txtPrice=" + $('#hdnPrice').val() + "&txtItemGender=" + $('#hdnGender').val() + "&txtItemSize=" + $('#hdnSize').val() + "&txtCategoryName=" + $('#hdnCategory').val() + "&txtPageIndex=" + $('#hdnPageIndex').val(),
        success: contentSuccess
    });
};
function contentSuccess(result) {
	if (result.code == '200') {
		var itemlist = $('#item-list').append(result.data);
		itemlist.imagesLoaded(
			function(){
				itemlist.masonry('reload');
			});
    }
    
}
function loadMoreContentUser()
{
	
	var p = $('#hdnPageIndex').val();
	if (p == '') {
        p = '0';
    }
    p = (parseInt(p) + 1);
    
    $('#hdnPageIndex').val(p);
	
    $.ajax({
        type: "POST",
        url: "/appuser/userclippingpost",
        dataType: "json",
        data: "txtPageIndex=" + $('#hdnPageIndex').val() + '&posterid=' + $("#PosterID").val(),
        success: contentSuccessUser
    });
};
function contentSuccessUser(result) {
	if (result.code == '200') {
		var itemlist = $('#item-list').append(result.data);
		itemlist.imagesLoaded(
			function(){
				itemlist.masonry('reload');
			});
    }
    
}

function loadMoreContentBrand()
{
	
	var p = $('#hdnPageIndex').val();
	if (p == '') {
        p = '0';
    }
    p = (parseInt(p) + 1);
    
    $('#hdnPageIndex').val(p);
	
    $.ajax({
        type: "POST",
        url: "/brand/homepost",
        dataType: "json",
        data: "txtPageIndex=" + $('#hdnPageIndex').val() + '&brandid=' + $("#BrandID").val(),
        success: contentSuccessBrand
    });
};
function contentSuccessBrand(result) {
    if (result.code == '200') {
        var itemlist = $('#item-list').append(result.data);
        itemlist.imagesLoaded(
            function(){
                itemlist.masonry('reload');
            });
    }
}



function RopaziFilter(){
	$('#hdnPageIndex').val('0');
	
    $.ajax({
        type: "POST",
        url: "/post/userpostpost",
        dataType: "json",
        data: "txtTitle=" + $('#searchText').val() + "&txtPrice=" + $('#hdnPrice').val() + "&txtItemGender=" + $('#hdnGender').val() + "&txtItemSize=" + $('#hdnSize').val() + "&txtCategoryName=" + $('#hdnCategory').val() + "&txtPageIndex=" + $('#hdnPageIndex').val(),
        success: filterSuccess
    });
}
function filterSuccess(result) {
	if (result.code == '200') {
        $('#item-list').html(result.data).masonry('reload');
    }
    
}
function RopaziSearch(){
	$('#hdnPageIndex').val('0');
	
    $.ajax({
        type: "POST",
        url: "/post/userpostpost",
        dataType: "json",
        data: "txtTitle=" + $('#searchText').val() + "&txtPrice=" + $('#hdnPrice').val() + "&txtItemGender=" + $('#hdnGender').val() + "&txtItemSize=" + $('#hdnSize').val() + "&txtCategoryName=" + $('#hdnCategory').val() + "&txtPageIndex=" + $('#hdnPageIndex').val(),
        success: searchSuccess
    });
}
function searchSuccess(result) {
	if (result.code == '200') {
        $('#item-list').html(result.data).masonry('reload');
    }
    
}
var postid = '';
function showCatalogs(id){
	postid = id;
	$('#overlay-icons' + id).hide();
	$('#usercatalog' + id).html($('#usercatalog').html());
	
	$(".nano").nanoScroller();


	$('#usercatalog' + id).on({
	    mouseenter: function () {
	        //stuff to do on mouse enter
	    },
	    mouseleave: function () {
	        $(this).html('');
	        $('#overlay-icons' + id).show();
	    }
	});
	
}
function showCatalogs2(id){
	postid = id;
	$('#usercataloglight' + id).html($('#usercatalog').html());
	
	$(".nano").nanoScroller();


	$('#usercataloglight' + id).on({
	    mouseenter: function () {
	        //stuff to do on mouse enter
	    },
	    mouseleave: function () {
	        $(this).html('');
	
	    }
	});
	
}
