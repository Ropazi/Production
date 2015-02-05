<?php include_once("classes/helpers/webincludes.php") ?>
<?php include_once("classes/domain/usernotification.php"); ?>
<?php include_once("classes/uihelpers/userchildrenhelper.php"); ?>
<?php echo ScriptHelper::EditFormScriptSettings("updateprofile") ?>
<script src="/content/scripts/jquery.maskedinput.js"></script> 
<script type="text/javascript">
function toggleNotification(el, notype) {
	if ($(el).children().find('span').text() == 'Yes') {
		content = '<div class="bg-switch-wrapper bg-switch-wrapper-no"><div class="bg-switch bg-switch-no"></div></div><div class="no-state-wrapper"><div class="no-state-content"><div class="no-state"><span>No</span></div></div></div><div class="clear"></div>';
		$(el).html(content);
		$('#hdn' + notype).val('0');
	}
	else {
		content = '<div class="yes-state-wrapper"><div class="yes-state-content"><div class="yes-state"><span>Yes</span></div></div></div><div class="bg-switch-wrapper bg-switch-wrapper-yes"><div class="bg-switch bg-switch-yes"></div></div><div class="clear"></div>';
		$(el).html(content);
		$('#hdn' + notype).val('1');
	}
}

function SubmitSettings(context) {
		$('#ropaziModalContentAlert').html('');
		$.ajax({
            type: "POST",
            url: $('#' + context + 'EditForm').attr('action'),
            dataType: "json",
            data: $('#' + context + 'EditForm').serialize(),
            success: SettingsSuccess,
            error: AJXError
        });
        
    
    

}


function SettingsSuccess(result) {
	if (result.code == '210') {
		$('#ropaziModalContentAlert').html(result.errors);
    }
	else if (result.code == '200') {
		$('#ropaziModalContentAlert').html(result.data);
	}
    $('#ropaziModalAlert').foundation('reveal', 'open');

}
function addChildren(){
	c = $('#childrenCount').val();
	totalChildren = parseInt(c);
	totalChildren++;
	var row = '<tr>';
	row += '<td class="children-col1">';
	row += '<span>' + totalChildren + '.</span>';
	row += '</td>';
	row += '<td class="children-col2">';
	row += '<input type="hidden" name="UserChildrenID' + totalChildren + '" value="0" />';
	row += '<select name="gender' + totalChildren + '" id="gender' + totalChildren + '" class="custom-arrow-dropdown">';
	row += '<option value="Gender" selected="selected">Gender</option>';
	row += '<option value="Male">Male</option>';
	row += '<option value="Female">Female</option>';
	row += '</select>';
	row += '</td>';
	row += '<td class="children-col3">';
	row += '<input type="text" name="dateOfBirth' + totalChildren + '" id="dateOfBirth' + totalChildren + '"  value="" onfocus="javascript:$(this).mask(\'99/99/9999\');" onchange="javascript:calculateAge($(this).val(), \'' + totalChildren + '\');"/>';
	row += '</td>';
	row += '<td>';
	row += '<input class="center-text" type="text"  name="displayAge' + totalChildren + '" id="displayAge' + totalChildren + '" value="0yr 0mo" />';
	row += '</td>';
	row += '</tr>';

	
	$('#childrenTable tr:last').after(row);
	$('#childrenCount').val(totalChildren);

	$("#dateOfBirth" + totalChildren).watermark("Birthday 00/00/0000");
}
function calculateAge(dob, idx) {
	dob = new Date(dob);
	var today = new Date();
	var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
	age = age+' yr ';
	var b = today.getMonth() - dob.getMonth();
	if (b < 0) {
	  b = 12 + b;
	}
	age += b+' mo';
	$('#displayAge' + idx).val(age);
}
</script>


<script>


window.fbAsyncInit = function() {
	  FB.init({
		  appId      : '<?php echo Constants::$FBAPPID?>',
		    cookie     : true,  // enable cookies to allow the server to access 
		                        // the session
		    xfbml      : true,  // parse social plugins on this page
		    oAuth		:true,
		    version    : 'v2.0', // use version 2.0
		    channelUrl: '<?php echo Constants::$SERVERURL?>/channel.php' //custom channel
	  });

	  // Now that we've initialized the JavaScript SDK, we call 
	  // FB.getLoginStatus().  This function gets the state of the
	  // person visiting this page and can return one of three states to
	  // the callback you provide.  They can be:
	  //
	  // 1. Logged into your app ('connected')
	  // 2. Logged into Facebook, but not your app ('not_authorized')
	  // 3. Not logged into Facebook and can't tell if they are logged into
	  //    your app or not.
	  //
	  // These three cases are handled in the callback function.

	  FB.getLoginStatus(function(response) {
	    statusChangeCallback(response);
	  });

	  };

	  // Load the SDK asynchronously
	  (function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/en_US/sdk.js";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));


</script>



<a name="Account"></a>
<div id="container" class="banner-row">
        <div id="contentWrapper-settings" class="row">
        	
            <div id="mainContent-settings" class="large-12 small-12 columns">
                <h1>
                    Settings</h1>
                <div id="left-nav-wrapper" class="large-3 columns">
                    <div id="left-nav">
                        <ul>
                            <li><a href="#Account">Account</a></li>
                            <li><a href="#Profile">Profile</a></li>
                            <li><a href="#Notification">Notifications</a></li>
                            <li><a href="#Facebook">Facebook Connect</a></li>
                        </ul>
                    </div>
                    <div id="form-actions">
                        <ul>
                            <li><a class="selected" href="#" onclick="javascript:$('#updateprofileEditForm').submit();return false;">Save Settings</a></li>
                            <li><a href="javascript:void(0);">Cancel</a></li>
                        </ul>
                    </div>
                </div>
                <form id="updateprofileEditForm" method="post" action="/appuser/updateprofilepost">
                <div id="form-content-wrapper" class="large-6 columns">
                	<a name="Profile"></a>
                    <div class="ropazi-section">
                        <div class="section-header-settings">
                            Account Details</div>
                        <div class="section-content-settings">
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>
                                        Email Address</label>
                                    <input type="text" name="Email" value="<?php echo $this->model->getEmail() ?>" />
                                </div>
                                <div class="large-12 columns">
                                    <div class="large-6 columns clear-padding-margin">
                                        <label>
                                            Password</label>
                                        <input type="password" value="password" />
                                    </div>
                                    <div class="large-6 columns clear-padding-margin">
                                        <a id="change-pw" href="javascript:void(0);">Change</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ropazi-section">
                    	
                        <div class="section-header-settings">
                            Profile Details</div>
                        <div class="section-content-settings">
                            <div class="row">
                                <div class="large-12 columns">
                                    <div id="first-name-input" class="large-6 columns">
                                        <label>
                                            First Name</label>
                                        <input type="text" name="FirstName" value="<?php echo $this->model->getFirstName() ?>" />
                                    </div>
                                    <div id="last-name-input" class="large-6 columns">
                                        <label>
                                            Last Name</label>
                                        <input type="text" name="LastName" value="<?php echo $this->model->getLastName() ?>" />
                                    </div>
                                </div>
                                <div class="large-12 columns">
                                    <label>
                                        Username</label>
                                    <input type="text" name="Username" value="<?php echo $this->model->getUsername() ?>" />
                                </div>
                                <div class="large-12 columns">
                                    <label>
                                        Profile Picture</label>
                                    <div id="profile-pic-wrapper">
                                    <?php if (strlen($this->model->getProfileImage()) > 0) {
				                		echo '<img src="/uploads/users/' . $this->model->getProfileImage() . '_big.jpg" height="79" width="81" />';
				                	} else {
				                    	echo '<img src="/content/images/settings-profile-pic.png" />';
				                    }
				                    ?>
                        
                                        
                                        <a id="change-pic" href="javascript:void(0);">Change</a>
                                    </div>
                                </div>
                                <div class="large-12 columns">
                                    <label>
                                        About You <span id="number-char" class="light-text">165 char</span></label>
                                    <textarea name="AboutMe"><?php echo $this->model->getAboutMe() ?></textarea>
                                </div>
                                <div class="large-12 columns">
                                    <div id="city-input" class="large-8 columns">
                                        <label>
                                            City</label>
                                        <input type="text" name="City" value="<?php echo $this->model->getCity() ?>" />
                                    </div>
                                    <div id="state-dropdown" class="large-4 columns">
                                        <label>
                                            State</label>
                                        <?php echo DropDownHelper::StateDropDown($this->model->getState())?>
                                    </div>
                                </div>
                                <div class="large-12 columns">
                                    <label>
                                        Website</label>
                                    <input type="text" name="Website" value="<?php echo $this->model->getWebsite() ?>" />
                                </div>
                                <div class="large-12 columns">
                                    <div id="facebook-input" class="large-6 columns">
                                        <label>
                                            Facebook</label>
                                        <input type="text" name="Facebook" value="<?php echo $this->model->getFacebook() ?>" />
                                    </div>
                                    <div id="twitter-input" class="large-6 columns">
                                        <label>
                                            Twitter</label>
                                        <input type="text" name="Twitter" value="<?php echo $this->model->getTwitter() ?>" />
                                    </div>
                                </div>
                                <div class="large-12 columns">
                                    <label>
                                        Children <span id="children-text" class="light-text">Not displayed publicly.</span></label>
                                    <div id="children-wrapper">
                                        <?php echo UserChildrenHelper::getChildren($this->model->getUserChildren())?>
                                    </div>
                                </div>
                                <div id="additional-child-wrapper" class="large-12 columns">
                                    <a class="btn-additional-child" href="#" onclick="javascript:addChildren();return false;">+ Add Additional Child</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ropazi-section">
                    	<a name="Notification"></a>
                        <div class="section-header-settings">
                            Notifications</div>
                        <div class="section-content-settings">
                            <div class="row">
                            	
                                
                                <?php 
                                	$userNotifications = $this->submodels[0];
                                	$emailNotification = $userNotifications[0];
                                	
                                	if ($emailNotification->getNotify() == TRUE) {
                                ?> 
                                <input type="hidden" id="hdnEmail" name="hdnEmail" value="1" />
                                <div class="large-12 columns">
                                    <label>
                                        Email Notifications</label>
                                    <div class="switch-wrapper"  onclick="javascript:toggleNotification(this, 'Email');">
                                        <div class="yes-state-wrapper">
                                            <div class="yes-state-content">
                                                <div class="yes-state">
                                                    <span>Yes</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-switch-wrapper bg-switch-wrapper-yes">
                                            <div class="bg-switch bg-switch-yes">
                                            </div>
                                        </div>
                                        <div class="clear">
                                        </div>
                                    </div>
                                </div>
                                <?php  } else { ?>
                                <input type="hidden" id="hdnEmail" name="hdnEmail" value="0" />
                                <div class="large-12 columns">
                                    <label>
                                        Email Notifications</label>
                                    <div class="switch-wrapper"  onclick="javascript:toggleNotification(this, 'Email');">
                                        <div class="bg-switch-wrapper bg-switch-wrapper-no">
                                                <div class="bg-switch bg-switch-no">
                                                </div>
                                            </div>
                                            <div class="no-state-wrapper">
                                                <div class="no-state-content">
                                                    <div class="no-state">
                                                        <span>No</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear">
                                            </div>
                                    </div>
                                </div>
                                <?php } ?>
                                
                                <div class="large-12 columns">
                                    <label>
                                        Email me when:</label>
                                </div>
                                <?php  
                                $i = 0;
                                foreach($userNotifications as $userNotification){
									if ($i > 0 && $i < (sizeof($userNotifications)-1)) {
									if ($userNotification->getNotify() == TRUE) {
								?>
								<input type="hidden" id="hdn<?php echo $userNotification->getNotificationType(); ?>" name="hdn<?php echo $userNotification->getNotificationType(); ?>" value="1" />	
                                <div class="large-12 columns">
                                    <div class="large-3 columns switch-section">
                                        <div class="switch-wrapper"  onclick="javascript:toggleNotification(this, '<?php echo $userNotification->getNotificationType(); ?>');">
                                            <div class="yes-state-wrapper">
                                                <div class="yes-state-content">
                                                    <div class="yes-state">
                                                        <span>Yes</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-switch-wrapper bg-switch-wrapper-yes">
                                                <div class="bg-switch bg-switch-yes">
                                                </div>
                                            </div>
                                            <div class="clear">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="large-9 columns switch-text">
                                        <p>
                                            <?php echo $userNotification->getDisplayName() ;?></p>
                                    </div>
                                </div>
                                
                                
                                
                                <?php }
                                else {
								?>
								<input type="hidden" id="hdn<?php echo $userNotification->getNotificationType(); ?>" name="hdn<?php echo $userNotification->getNotificationType(); ?>" value="0" />
                                <div class="large-12 columns">
                                    <div class="large-3 columns switch-section">
                                        <div class="switch-wrapper"  onclick="javascript:toggleNotification(this, '<?php echo $userNotification->getNotificationType(); ?>');">
                                            <div class="bg-switch-wrapper bg-switch-wrapper-no">
                                                <div class="bg-switch bg-switch-no">
                                                </div>
                                            </div>
                                            <div class="no-state-wrapper">
                                                <div class="no-state-content">
                                                    <div class="no-state">
                                                        <span>No</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="large-9 columns switch-text">
                                        <p>
                                            <?php echo $userNotification->getDisplayName() ;?></p>
                                    </div>
                                </div>
								<?php } }
								$i++;}?>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="ropazi-section">
                    	<a name="Facebook"></a>
                        <div class="section-header-settings">
                            Facebook Connect</div>
                        <div class="section-content-settings">
                            <div class="row">
                                <div class="large-12 columns">
                                    <a class="btn-additional-child" href="javascript:FB.logout();">Disconnect Facebook Account</a>
                                </div>
                                
                                <?php 
                                	$fbNotification = $userNotifications[10];
                                	if ($fbNotification->getNotify() == TRUE) {
                                
                                ?>
                                <input type="hidden" id="hdnFacebook" name="hdnFacebook" value="1" />
                                <div class="large-12 columns">
                                    <div class="large-3 columns switch-section">
                                        <div class="switch-wrapper"  onclick="javascript:toggleNotification(this, 'Facebook');">
                                            <div class="yes-state-wrapper">
                                                <div class="yes-state-content">
                                                    <div class="yes-state">
                                                        <span>Yes</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-switch-wrapper bg-switch-wrapper-yes">
                                                <div class="bg-switch bg-switch-yes">
                                                </div>
                                            </div>
                                            <div class="clear">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="large-9 columns switch-text">
                                        <p>
                                            <?php echo $fbNotification->getDisplayName() ;?></p>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <input type="hidden" id="hdnFacebook" name="hdnFacebook" value="0" />
                                <div class="large-12 columns">
                                    <div class="large-3 columns switch-section">
                                        <div class="switch-wrapper"  onclick="javascript:toggleNotification(this, 'Facebook');">
                                            <div class="bg-switch-wrapper bg-switch-wrapper-no">
                                                <div class="bg-switch bg-switch-no">
                                                </div>
                                            </div>
                                            <div class="no-state-wrapper">
                                                <div class="no-state-content">
                                                    <div class="no-state">
                                                        <span>No</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="large-9 columns switch-text">
                                        <p>
                                            <?php echo $fbNotification->getDisplayName() ;?></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="large-3 columns">
                </div>
            </div>
        </div>
        </div>
