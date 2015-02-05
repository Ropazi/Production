<?php include_once("classes/helpers/webincludes.php") ?>
<?php echo ScriptHelper::EditFormScript("signup") ?>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

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

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
      SubmitFB(response.email, response.name);
      
    });
  }
  function facebookLogin() {
	    FB.login(function(response) {
	        if (response.authResponse) {
	            console.log('Authenticated!');
	            // location.reload(); //or do whatever you want
	            //alert(response.email, response.name);
	            //alert(response.email);
	            //SubmitFB(response.email, response.name);
	            FB.api('/me', function(response) {
		            SubmitFB(response.email, response.name, response.id, response.gender);
	            });
	        } else {
	            console.log('User cancelled login or did not fully authorize.');
	        }
	    },
	    {
	        scope: 'public_profile,email'
	    });
	}
  function SubmitFB(email, name, id, gender) {
		    ShowSpinner();
	        $('#errors').html('');
	        $.ajax({
	            type: "POST",
	            url: '/appuser/signupfbpost',
	            dataType: "json",
	            data: 'Email=' + email + '&FirstName=' + name + '&LastName=' + '&Id=' + id + '&Gender=' + gender,
	            success: CESuccess,
	            error: AJXError
	        });
  }
</script>

<div style="position:relative;background:white;height:450px;width:300px;-webkit-border-radius: 10;-moz-border-radius:10;border-radius: 10px;">
	<form id="signupEditForm" action="<?php echo Constants::$BASEPATH ?>appuser/signuppost" method="post">
		<?php echo RequestStateHelper::GetFormRequestState($this->model->getRequestStateDictionary()) ?>
		<div id="spinner" class="spinwrapper2 hdn spinner"><?php echo ImageButtonHelper::Spinner("") ?></div>
				<div style="text-align:center;padding-top:5px;"><img src="<?php echo Constants::$BASEPATH ?>content/images/ropazi_logo.png"/></div>
				<div style="font-size:20px;color:#777373;text-align:center;margin:0px 0px 20px 0px;">Start Shopping</div>
				<div style="text-align:center; margin:15px;">
				<img src="/content/images/fbk.png" onclick="javascript:facebookLogin();" style="cursor:pointer;"/><p/>
				<img src="/content/images/or.png" />
					
				</div>
				<div id="EditFormContent" style="text-align:center;">
						<?php require("views/appuser/_appusersignupcontrol.php") ?>
				</div>
				
		
		<div id="errors" class="errors" style="padding:0px 10px 10px 10px;"></div>
		<div style="margin-top:20px;">
			<?php echo ButtonHelper::RopaziButton("", "#", "$('#signupEditForm').submit();return false;", "&nbsp;&nbsp;Sign Up!&nbsp;&nbsp;", "save.png") ?>&nbsp;
		</div>
		
		<div style="color:#777373;font-size:14px;margin-top:25px;text-align:center;font-style:italic;">
		Have an account? Login <a href="#" class="blue">here</a><br/><br/>
		</div>
		
		<iframe height="315" src="https://www.youtube.com/embed/Wi7R0E2kv-o?wmode=opaque&rel=0" frameborder="0" allowfullscreen=""></iframe>
	</form>
</div>
