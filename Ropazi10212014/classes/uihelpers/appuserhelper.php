<?php 
	include_once("classes/utils/commonutils.php");
	include_once("classes/domain/appuser.php");
	include_once("classes/business/appuserbo.php");
	include_once("classes/utils/constants.php");
	///*****************************************************************
	///<summary>
	///Class Name: AppUserHelper
	///Description: AppUserHelper utils
	///</summary>
	///*****************************************************************

	class AppUserHelper
	{


		
        
        ///*****************************************************************
        ///<summary>
        ///Method Name: getProfileImage
        ///Description: getProfileImage
        ///</summary>
        ///*****************************************************************

        public static function getProfileImage($userid)
        {
        	$rVal = '<img alt="" src="/content/images/profile-img.png" />';
        	$appUserBO = new AppUserBO(NULL);
        	$appUser = $appUserBO->SelectByAppUserID($userid);
        	if (strlen($appUser->getProfileImage()) > 0){
        		$rVal = '<img alt="" src="/uploads/users/' . $appUser->getProfileImage() . '_small.jpg" height="25" width="25" />';	
        	}
        	return $rVal;
           
        }
		
	}
?>