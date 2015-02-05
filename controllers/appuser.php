<?php
	include_once("classes/business/appuserbo.php");
	include_once("classes/domain/appuser.php");
	include_once("classes/business/usercatalogbo.php");
	include_once("classes/domain/usercatalog.php");
	include_once("classes/business/usernotificationbo.php");
	include_once("classes/domain/usernotification.php");
	include_once("classes/request/usernotificationrequesthelper.php");
	include_once("classes/business/userchildrenbo.php");
	include_once("classes/domain/userchildren.php");
	include_once("classes/request/userchildrenrequesthelper.php");
	include_once("classes/business/postbo.php");
	include_once("classes/domain/post.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/appuserrequesthelper.php");
	include_once("classes/validators/appuservalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: AppUserController
	///Description: UsersController
	///</summary>
	///*****************************************************************

	class AppUserController extends BaseController
	{
		private $_UserInfo;


		///*****************************************************************
		///<summary>
		///Method Name: signup
		///Description: Create Get Method
		///</summary>
		///*****************************************************************

		public function signup()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$_AppUser = new AppUser();
				$this->model = $_AppUser;
				ob_start();
				include('views/appuser/_signupedit.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: signup
		///Description: Create Post Method
		///</summary>
		///*****************************************************************

		public function signuppost()
		{
			$logger = Logger::getLogger(__CLASS__);
			//$abc=CommonUtils::EncryptTripleDES('ropazi123');
			//$logger->debug("ABC" . $abc);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$_AppUserRequestHelper = new AppUserRequestHelper();
				$_AppUser = $_AppUserRequestHelper->AssembleAppUserSignUpControl();
				$_AppUserBO = new AppUserBO($this->_UserInfo);
				$_AppUserValidator = new AppUserValidator();
				$_AppUserValidator->ValidateAppUserSignUpControl($_AppUser, $this->_UserInfo);
				if (!$_AppUser->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $_AppUser->getErrors());
				}
				else
				{
					$appUser = $_AppUserBO->SelectByEmail($_AppUser->getEmail());
					if ($appUser->getAppUserID() > 0){
						$this->setUserCookie($appUser->getAppUserID(), $appUser->getEmail(), $appUser->getFirstName());
						$logger->debug("Cookie dropped for " . $appUser->getEmail());
						$appUser->setLastLogin(new DateTime());
						$_AppUserBO->UpdateAppUserLastLogin($appUser);
						return $this->view->outputJson(Constants::$REDIRECT, "/post/userpost", "");
					}
					else 
					{
						$_AppUser->setCreateDate(new DateTime());
						$_AppUser->setLastLogin(new DateTime());
						$_AppUser->setLastUpdateDate(new DateTime());
						$_AppUser->setSource("Ropazi");
						$_AppUser->setEmailVerified(FALSE);
						$_AppUser->setUserType("USER");
						$_AppUser->setPassword(CommonUtils::EncryptTripleDES($_AppUser->getPassword()));
						$_AppUserBO->InsertAppUser($_AppUser);
						$appUser = $_AppUserBO->SelectByEmail($_AppUser->getEmail());
						$logger->debug("Email::" . $appUser->getEmail());
						$this->setUserCookie($appUser->getAppUserID(), $appUser->getEmail(), $appUser->getFirstName());
						$logger->debug("Cookie is set for user");
						return $this->view->outputJson(Constants::$REDIRECT, "/post/userpost", "Welcome");
					}
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: signup
		///Description: Create Post Method
		///</summary>
		///*****************************************************************
		
		public function signupfbpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$_AppUserRequestHelper = new AppUserRequestHelper();
				$_AppUser = $_AppUserRequestHelper->AssembleAppUserSignUpFBControl();
				$name = explode(" ", $_AppUser->getFirstName());
				$_AppUser->setFirstName($name[0]);
				$_AppUser->setLastName($name[1]);
				$_AppUserBO = new AppUserBO($this->_UserInfo);
				$appUser = $_AppUserBO->SelectByEmail($_AppUser->getEmail());
				if ($appUser->getAppUserID() > 0){
					$appUser->setLastLogin(new DateTime());
					$_AppUserBO->UpdateAppUserLastLogin($appUser);
					$this->setUserCookie($appUser->getAppUserID(), $appUser->getEmail(), $appUser->getFirstName());
					$logger->debug("Cookie dropped for " . $appUser->getEmail());
					return $this->view->outputJson(Constants::$REDIRECT, "/post/userpost", "");
				}
				else {
					$_AppUserValidator = new AppUserValidator();
					$_AppUserValidator->ValidateAppUserSignUpFBControl($_AppUser, $this->_UserInfo);
					if (!$_AppUser->getIsValid())
					{
						return $this->view->outputJson(Constants::$VALERROR, "", $_AppUser->getErrors());
					}
					else
					{
					    //this if statement looks like dead code 
					    //start dead code
						if ($appUser->getAppUserID() > 0){
							$logger->debug("Email::" . $appUser->getEmail());
							$this->setUserCookie($appUser->getAppUserID(), $appUser->getEmail(), $appUser->getFirstName());
							$logger->debug("Cookie is set for returning FB user");
						}
						//end dead code
						else {
							$_AppUser->setCreateDate(new DateTime());
							$_AppUser->setLastLogin(new DateTime());
							$_AppUser->setLastUpdateDate(new DateTime());
							$_AppUser->setSource("Facebook");
							$_AppUser->setEmailVerified(TRUE);
							$_AppUser->setUserType("USER");
							$this->saveProfileImage("http://graph.facebook.com/" . $_AppUser->getFacebookId() , $_AppUser->getProfileImage());
							$_AppUserBO->InsertAppUser($_AppUser);
							$appUser = $_AppUserBO->SelectByEmail($_AppUser->getEmail());
							$logger->debug("Email::" . $appUser->getEmail());
							$this->setUserCookie($appUser->getAppUserID(), $appUser->getEmail(), $appUser->getFirstName());
							$logger->debug("Cookie is set for new FB user");
						}
						return $this->view->outputJson(Constants::$REDIRECT, "/post/userpost", "");
					}
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}

		///*****************************************************************
		///<summary>
		///Method Name: createpost
		///Description: Create Post Method
		///</summary>
		///*****************************************************************
		private function saveProfileImage($url, $fileName){
		    $logger = Logger::getLogger(__CLASS__);
		    $logger->debug("In saveImage");
		    	
		    $Thumburl = $url."/picture?width=25&height=25";
		    $Largeurl = $url."/picture?width=147&height=147";
		    $ThumbSquareSize        = 25; //Thumbnail will be 200x200
		    $LargeImageSize			= 147;
		    $DestinationDirectory   =  Constants::$IMAGEDIRECTORY . "users/"; //specify upload directory ends with / (slash)
		    $Quality                = 90; //jpeg quality
		
		    	
		    // Random number will be added after image name
		    //$RandomNumber   = rand(0, 9999999999);
		   //$fileName = $this->getfileName($url);
		    $ImageName      = $fileName; //get image name
		    $ImageSize      = getimagesize($Largeurl); // get original image size
		    //$TempSrc        = $_FILES['ImageFile']['tmp_name']; // Temp name of image file stored in PHP tmp folder
		    $ImageType      = $ImageSize[2]; //get file type, returns "image/png", image/jpeg, text/plain etc.
		    	
		    $logger->debug("Image Name::" . $fileName);
		    $logger->debug("Image Size::" . $ImageSize[0] . $ImageSize[1]);
		    $logger->debug("Image Type::" . $ImageType);
		    //Let's check allowed $ImageType, we use PHP SWITCH statement here
		    switch(strtolower($ImageType))
		    {
		        case 1:
		            //Create a new image from file
		            $CreatedImage =  imagecreatefromgif($Largeurl);
		            break;
		        case 2:
		            $CreatedImage =  imagecreatefromjpeg($Largeurl);
		            break;
		        case 3:
		            $CreatedImage = imagecreatefrompng($Largeurl);
		            break;
		        default:
		            die('Unsupported File!'); //output error and exit
		    }
		    switch(strtolower($ImageType))
		    {
		        case 1:
		            //Create a new image from file
		            $ImageExt =  "gif";
		            break;
		        case 2:
		            $ImageExt =  "jpg";
		            break;
		        case 3:
		            $ImageExt =  "png";
		            break;
		        default:
		            die('Unsupported File!'); //output error and exit
		    }
		    //PHP getimagesize() function returns height/width from image file stored in PHP tmp folder.
		    //Get first two values from image, width and height.
		    //list assign svalues to $CurWidth,$CurHeight
		    //list($CurWidth,$CurHeight)=getimagesize($TempSrc);
		    $CurWidth = $ImageSize[0];
		    $CurHeight = $ImageSize[1];
		    $logger->debug("Current Width::" . $CurWidth);
		    $logger->debug("Current Height::" . $CurHeight);
		    	
		    	
		    $logger->debug("Going to resize now");
		    //Resize image to Specified Size by calling resizeImage function.
		    if($this->resizeImage($CurWidth,$CurHeight,$ThumbSquareSize,$DestinationDirectory.$ImageName."_small.".$ImageExt,$CreatedImage,$Quality,$ImageType))
		    {
		    	if($this->resizeImage($CurWidth,$CurHeight,$LargeImageSize,$DestinationDirectory.$ImageName."_big.".$ImageExt,$CreatedImage,$Quality,$ImageType))
		    {

		    }else{
		        $logger->debug("Large Resize Error");
		        //die('Resize Error'); //output error
		    }
		    }else{
		        $logger->debug("Small Resize Error");
		        //die('Resize Error'); //output error
		    }
		    //$logger->debug($output);
		    $logger->debug("Completed Upload");
		}
		///*****************************************************************
		///<summary>
		///Method Name: createpost
		///Description: Create Post Method
		///</summary>
		///*****************************************************************
		private function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
		{
		    $logger = Logger::getLogger(__CLASS__);
		    $logger->debug("In resize Image");
		    //Check Image size is not 0
		    if($CurWidth <= 0 || $CurHeight <= 0)
		    {
		        return false;
		    }
		
		    //Construct a proportional size of new image
		    $ImageScale         = max($MaxSize/$CurWidth, $MaxSize/$CurHeight);
		    $NewWidth           = $MaxSize == 25 ? $MaxSize : ceil($ImageScale*$CurWidth);
		    $NewHeight          = $MaxSize == 25 ? $MaxSize : ceil($ImageScale*$CurHeight);
		    $NewCanves          = imagecreatetruecolor($NewWidth, $NewHeight);
		    $logger->debug("MaxSize::CurWidth::CurHeight::ImageScale::NewWidth::NewHeight::" .$MaxSize . "::" . $CurWidth . "::" . $CurHeight . "::" . $ImageScale . "::" . $NewWidth . "::" . $NewHeight);
		    // Resize Image
		    if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
		    {
		        $logger->debug("In resize Image:: ImageType" . $ImageType);
		        switch(strtolower($ImageType))
		        {
		            case 1:
		                imagegif($NewCanves,$DestFolder);
		                break;
		            case 2:
		                imagejpeg($NewCanves,$DestFolder, $Quality);
		                break;
		            case 3:
		                imagepng($NewCanves,$DestFolder);
		                break;
		            default:
		                return false;
		        }
		        //Destroy image, frees memory
		        if(is_resource($NewCanves)) {imagedestroy($NewCanves);}
		        return true;
		    }
		
		}

		///*****************************************************************
		///<summary>
		///Method Name: appusers
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function appusers()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "AppUsers";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputRedirect(Constants::$ADMINLOGIN);
				}
				$commandObject = new CommandObject();
				$commandObject->SetParameter("PageSize", 20);
				$commandObject->SetParameter("PageIndex", 0);
				$commandObject->SetParameter("SortExpression", "Email");
				$commandObject->SetParameter("SortDirection", "ASC");
				$_AppUserBO = new AppUserBO($this->_UserInfo);
				$paginatedlist = $_AppUserBO->SearchAppUser("","Email", "ASC", 20, 0);
				$paginatedlist->SetRequestState("ContextName", "appusers");
				$paginatedlist->SetRequestState("ModalIndex", "2");
				$paginatedlist->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedlist->getRequestStateDictionary()));
				$paginatedlist->SetRequestState("UpdateTarget", "appuser/updateappuserget");
				return $this->view->output($paginatedlist, "admin");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function appuserspost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "AppUsers";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$commandObject = new CommandObject();
				$commandObject->setParameter("Email", $_POST["appusers_txtEmail"]);
				$commandObject->setParameter("SortExpression", $_POST["appusers_hdnSortExpression"]);
				$commandObject->setParameter("SortDirection", $_POST["appusers_hdnSortDirection"]);
				$commandObject->setParameter("PageSize", $_POST["appusers_txtPageSize"]);
				$commandObject->setParameter("PageIndex", $_POST["appusers_hdnPageIndex"]);
				$commandObjectRequest = new CommandObject();
				$commandObjectRequest->DeSerialize(RequestStateHelper::GetRequestState("CommandObject", $_POST["rstate"]));
				if ($this->IsCommandObjectDirty($commandObjectRequest, $commandObject))
				{
					$commandObject->setParameter("PageIndex", "0");
				}
				$_AppUserBO = new AppUserBO($this->_UserInfo);
				$paginatedList = $_AppUserBO->SearchAppUser($commandObject->getParameter("Email"), $commandObject->getParameter("SortExpression"), $commandObject->getParameter("SortDirection"),$commandObject->getParameter("PageSize"),$commandObject->getParameter("PageIndex"));
				$paginatedList->SetRequestState("ContextName", "appusers");
				$paginatedList->SetRequestState("ModalIndex", "2");
				$paginatedList->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedList->getRequestStateDictionary()));
				$paginatedList->SetRequestState("UpdateTarget", "appuser/Updateappuser");
				$this->model = $paginatedList;
				ob_start();
				include('views/appuser/_appuserselectioncontrol.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: appusers
		///Description: Create Get Method
		///</summary>
		///*****************************************************************

		public function createappuser()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "AppUsers";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$_AppUser = new AppUser();
				$this->model = $_AppUser;
				ob_start();
				include('views/appuser/_appusersedit.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: appusers
		///Description: Update Get Method
		///</summary>
		///*****************************************************************

		public function updateappuserget()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "AppUsers";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$AppUserID = 0;
				if(isset($_POST["rstate"]) && !empty($_POST["rstate"]))
				{
					$AppUserID = RequestStateHelper::GetRequestState("AppUserID", $_POST["rstate"]);
				}
				$_AppUserBO = new AppUserBO($this->_UserInfo);
				$_AppUser = $_AppUserBO->SelectByAppUserID($AppUserID);
				$_AppUser->setAppUserID($AppUserID);
				$_AppUser->setRequestStateDictionary(RequestStateHelper::SetRequestState("AppUserID", $_AppUser->getAppUserID(), $_AppUser->getRequestStateDictionary()));
				$_AppUser->SetRequestState("ContextName", "appusers");
				$this->model = $_AppUser;
				ob_start();
				include('views/appuser/_appusersedit.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: appusers
		///Description: CreateUpdate Post Method
		///</summary>
		///*****************************************************************

		public function createupdateappuser()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "AppUsers";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$_AppUserRequestHelper = new AppUserRequestHelper();
				$_AppUser = $_AppUserRequestHelper->AssembleAppUserSignUpControl();
				$AppUserID = 0;
				if(isset($_GET["rstate"]) && !empty($_GET["rstate"]))
				{
					$AppUserID = RequestStateHelper::GetRequestState("AppUserID", $_GET["rstate"]);
				}
				$_AppUser->setAppUserID($AppUserID);
				$_AppUser->setRequestStateDictionary(RequestStateHelper::SetRequestState("AppUserID", $_AppUser->getAppUserID(), $_AppUser->getRequestStateDictionary()));
				$_AppUserBO = new AppUserBO($this->_UserInfo);
				$_AppUserValidator = new AppUserValidator();
				$_AppUserValidator->ValidateAppUserSignUpControl($_AppUser, $this->_UserInfo);
				if (!$_AppUser->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $_AppUser->getErrors());
				}
				else
				{
					if ($_AppUser->getAppUserID() > 0)
					{
						$_AppUserBO->UpdateAppUser($_AppUser);
					}
					if ($_AppUser->getAppUserID() == 0)
					{
						$_AppUser->setPassword(CommonUtils::EncryptTripleDES($_AppUser->getPassword()));
						$_AppUserBO->InsertAppUser($_AppUser);
					}
					$_AppUser->setPageMessage("Record Updated Successfully!");
					$_AppUser->setRequestState("ContextName", "appusers");
					ob_start();
					include('views/appuser/_appusersconfirmation.php');
					$output = ob_get_contents();
					ob_end_clean();
					return $this->view->outputJson(Constants::$REFRESHCONTENT, $output, "");
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: adminlogin
		///Description: Create Get Method
		///</summary>
		///*****************************************************************

		public function adminlogin()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$_AppUser = new AppUser();
				return $this->view->output($_AppUser, "plaintemplate");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: adminlogin
		///Description: Create Post Method
		///</summary>
		///*****************************************************************

		public function adminloginpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$_AppUserRequestHelper = new AppUserRequestHelper();
				$_AppUser = $_AppUserRequestHelper->AssembleAppUserLoginControl();
				$_AppUserBO = new AppUserBO($this->_UserInfo);
				$_AppUserValidator = new AppUserValidator();
				$_AppUserValidator->ValidateAppUserLoginControl($_AppUser, $this->_UserInfo);
				if (!$_AppUser->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $_AppUser->getErrors());
				}
				else
				{
					$_AppUser->setPassword(CommonUtils::EncryptTripleDES($_AppUser->getPassword()));
					$_AppUserBO->InsertAppUser($_AppUser);
					$appUser = $_AppUserBO->SelectByEmail($_AppUser->getEmail());
					$logger->debug("Email::" . $appUser->getEmail());
					$this->setAdminCookie($appUser->getEmail());
					$logger->debug("Cookie is set");
					$this->view->outputJson(Constants::$REDIRECT, "/brand/searchbrands", "");
						
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: updateprofile
		///Description: Create Get Method
		///</summary>
		///*****************************************************************
		
		public function updateprofile()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$userID = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$logger->debug("Got user cookie");
					$logger->debug($_COOKIE["ropaziuser"]);
					$userID = CommonUtils::verifyUserCookie();
				}
				$appUserBO = new AppUserBO($this->_UserInfo);
				$appUser = $appUserBO->SelectByAppUserID($userID);
				$this->model = $appUser;
				
				$userChildrenBO = new UserChildrenBO($this->_UserInfo);
				$userChildren = $userChildrenBO->SelectByAppUserID($userID);
				$appUser->setUserChildren($userChildren);
				
				$userNotificationBO = new UserNotificationBO($this->_UserInfo);
				$userNotifications = $userNotificationBO->SelectByAppUserID($userID);
				$logger->debug("Got usernotifications::" . sizeof($userNotifications));
				if ($userNotifications == NULL || sizeof($userNotifications) == 0){
					$logger->debug("Going to create default notifications");
					$this->InsertDefaultNotifications($userID);
					$userNotifications = $userNotificationBO->SelectByAppUserID($userID);
				}
				$submodels = array();
				$submodels[] = $userNotifications;
				
				$this->view->setSubmodels($submodels);
				
				return $this->view->output($appUser, "maintemplate");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		
		///*****************************************************************
		///<summary>
		///Method Name: 
		///Description: 
		///</summary>
		///*****************************************************************
		private function InsertDefaultNotifications($appUserID){
			$userNotificationBO = new UserNotificationBO($this->_UserInfo);
			$userNotification = new UserNotification();
			
			$userNotification->setAppUserID($appUserID);
			$userNotification->setNotificationType("Email");
			$userNotification->setDisplayName("Email me");
			$userNotification->setNotify(TRUE);
			$userNotificationBO->InsertUserNotification($userNotification);
			
			$userNotification->setNotificationType("Follows");
			$userNotification->setDisplayName("Someone follows me");
			$userNotificationBO->InsertUserNotification($userNotification);
			
			$userNotification->setNotificationType("ReClips");
			$userNotification->setDisplayName("Some re-clips a product I clipped");
			$userNotificationBO->InsertUserNotification($userNotification);
			
			$userNotification->setNotificationType("Tags");
			$userNotification->setDisplayName("Someone mentions (tags) me");
			$userNotificationBO->InsertUserNotification($userNotification);
			
			$userNotification->setNotificationType("Deals");
			$userNotification->setDisplayName("Deals from my favorite brands");
			$userNotificationBO->InsertUserNotification($userNotification);
			
			$userNotification->setNotificationType("NewFeature");
			$userNotification->setDisplayName("New feature announcements");
			$userNotificationBO->InsertUserNotification($userNotification);
			
			$userNotification->setNotificationType("Hearts");
			$userNotification->setDisplayName("Someone hearts my clip");
			$userNotificationBO->InsertUserNotification($userNotification);
			
			$userNotification->setNotificationType("PriceChange");
			$userNotification->setDisplayName("Price change for your clips");
			$userNotificationBO->InsertUserNotification($userNotification);
			
			$userNotification->setNotificationType("Weekly");
			$userNotification->setDisplayName("Weekly Inspiration");
			$userNotificationBO->InsertUserNotification($userNotification);
			
			$userNotification->setNotificationType("Feedback");
			$userNotification->setDisplayName("Ropazi invites you for feedback on the product");
			$userNotificationBO->InsertUserNotification($userNotification);
			
			$userNotification->setNotificationType("Facebook");
			$userNotification->setDisplayName("Post activity to your timeline");
			$userNotificationBO->InsertUserNotification($userNotification);
		}
		
		
		///*****************************************************************
		///<summary>
		///Method Name: updateprofile
		///Description: Create Post Method
		///</summary>
		///*****************************************************************
		
		public function updateprofilepost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$logger->debug("Inside Update Profile post");
				$taskCode = "";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$appUserRequestHelper = new AppUserRequestHelper();
				$userNotificationRequestHelper = new UserNotificationRequestHelper();
				$userChildrenRequestHelper = new UserChildrenRequestHelper();
				$appUser = $appUserRequestHelper->AssembleAppUserEditControl();
				$appUser->setUserNotifications($userNotificationRequestHelper->AssembleUserNotificationEditControl());
				$appUser->setUserChildren($userChildrenRequestHelper->AssembleUserChildrenEditControl());
				$logger->debug("Got data::" . $appUser->getUsername());
				$appUserID = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$appUserID = CommonUtils::verifyUserCookie();
				}
				$appUser->setAppUserID($appUserID);
				$appUserValidator = new AppUserValidator();
				$appUserValidator->ValidateAppUserEditControl($appUser, $this->_UserInfo);
				if (!$appUser->getIsValid())
				{
					$logger->debug("App user not valid" . $appUser->getErrors());
					return $this->view->outputJson(Constants::$VALERROR, "", $appUser->getErrors());
				}
				else
				{
					$appUserBO = new AppUserBO($this->_UserInfo);
					$appUser->setLastUpdateDate(new DateTime());
					$appUserBO->UpdateProfile($appUser);
					$output = "Profile Updated Successfully!";
					return $this->view->outputJson(Constants::$OK, $output, "");
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}


		///*****************************************************************
		///<summary>
		///Method Name: impersonate
		///Description: Create Get Method
		///</summary>
		///*****************************************************************

		public function impersonate()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$appuserid = $_GET["id"];
				$logger->debug("Got app user id::" . $appuserid);
				$appUserBO = new AppUserBO($this->_UserInfo);
				$appUser = $appUserBO->SelectByAppUserID($appuserid);
				$this->setUserCookie($appUser->getAppUserID(), $appUser->getEmail(), $appUser->getFirstName());
				$logger->debug("User email is::" . $appUser->getEmail());
				return $this->view->output($appUser);
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: impersonate
		///Description: Create Get Method
		///</summary>
		///*****************************************************************
		
		public function userclipping()
		{
		$logger = Logger::getLogger(__CLASS__);
			try
			{
				$posterid = $_GET["id"];
				$appUserID = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$logger->debug("Got user cookie");
					$logger->debug($_COOKIE["ropaziuser"]);
					$appUserID = CommonUtils::verifyUserCookie();
				}
				$appUserBO = new AppUserBO($this->_UserInfo);
				$postBO = new PostBO($this->_UserInfo);
				$appUser = $appUserBO->SelectByAppUserIDAndLoggedInAppUserID($posterid, $appUserID);
				$logger->debug("User email is::" . $appUser->getEmail());
				
				
				$submodels = array();
				$submodels[] = $appUser;
				
				//$posts = $postBO->SelectByAppUserIDAndPosterAppUserID($appUserID, $posterid);
				$paginatedlist = $postBO->SelectByAppUserIDAndPosterAppUserID($appUserID, $posterid,"Title", "ASC", 20, 0);
				$posts = $paginatedlist->getList();
				$submodels[] = $posts;
				
				$userCatalogBO = new UserCatalogBO($this->_UserInfo);
				$userCatalogs = $userCatalogBO->SelectByAppUserID($appUserID);
				$submodels[] = $userCatalogs;
				
				$logger->debug("This submodels " . sizeof($submodels));
				$this->view->setSubmodels($submodels);
				return $this->view->output($appUser);
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		
		///*****************************************************************
		///<summary>
		///Method Name: impersonate
		///Description: Create Get Method
		///</summary>
		///*****************************************************************
		
		public function userclippingpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$posterid = $_POST["posterid"];
				$pageIndex = $_POST["txtPageIndex"];
				$logger->debug("PosterID::" . $posterid);
				$appUserBO = new AppUserBO($this->_UserInfo);
				$postBO = new PostBO($this->_UserInfo);
				$appUser = $appUserBO->SelectByAppUserID($posterid);
				$logger->debug("User email is::" . $appUser->getEmail());
				$appUserID = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$logger->debug("Got user cookie");
					$logger->debug($_COOKIE["ropaziuser"]);
					$appUserID = CommonUtils::verifyUserCookie();
				}
		
				$submodels = array();
				$submodels[] = $appUser;
		
				$paginatedlist = $postBO->SelectByAppUserIDAndPosterAppUserID($appUserID, $posterid,"Title", "ASC", 20, $pageIndex);
				$this->model = $paginatedlist;
				$posts = $this->model->getList();
				ob_start();
				include('views/post/_postlistcontrol.php');
				$output = ob_get_contents();
				ob_end_clean();
				$logger->debug($output);
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: impersonate
		///Description: Create Get Method
		///</summary>
		///*****************************************************************
		
		public function userfollower()
		{
		$logger = Logger::getLogger(__CLASS__);
			try
			{
				$appuserid = $_GET["id"];
				$appUserID = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$logger->debug("Got user cookie");
					$logger->debug($_COOKIE["ropaziuser"]);
					$appUserID = CommonUtils::verifyUserCookie();
				}
				$logger->debug("Got app user id::" . $appuserid);
				$appUserBO = new AppUserBO($this->_UserInfo);
				$postBO = new PostBO($this->_UserInfo);
				$appUser = $appUserBO->SelectByAppUserIDAndLoggedInAppUserID($appuserid, $appUserID);
				$logger->debug("User email is::" . $appUser->getEmail());
				
				
				$submodels = array();
				$submodels[] = $appUser;
				$whotofollow = $appUserBO->SelectWhoToFollow($appUserID);
				$logger->debug("Got who to follow " . sizeof($whotofollow));
				$submodels[] = $whotofollow;
				
				$posts = $postBO->SelectByUserFollowers($appuserid);
				$submodels[] = $posts;
				
				$appUsers = $appUserBO->SelectFollowers($appuserid, $appUserID);
				$submodels[] = $appUsers;
				
				$logger->debug("This submodels " . sizeof($submodels));
				$this->view->setSubmodels($submodels);
				return $this->view->output($appUser);
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: impersonate
		///Description: Create Get Method
		///</summary>
		///*****************************************************************
		
		public function userfollowergrid()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$appuserid = $_GET["id"];
				$appUserID = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$logger->debug("Got user cookie");
					$logger->debug($_COOKIE["ropaziuser"]);
					$appUserID = CommonUtils::verifyUserCookie();
				}
				$logger->debug("Got app user id::" . $appuserid);
				$appUserBO = new AppUserBO($this->_UserInfo);
				$postBO = new PostBO($this->_UserInfo);
				$appUser = $appUserBO->SelectByAppUserIDAndLoggedInAppUserID($appuserid, $appUserID);
				$logger->debug("User email is::" . $appUser->getEmail());
				
		
				$submodels = array();
				$submodels[] = $appUser;
				$whotofollow = $appUserBO->SelectWhoToFollow($appUserID);
				$logger->debug("Got who to follow " . sizeof($whotofollow));
				$submodels[] = $whotofollow;
		
				$posts = $postBO->SelectByUserFollowers($appuserid);
				$submodels[] = $posts;
		
				$appUsers = $appUserBO->SelectFollowers($appuserid, $appUserID);
				$submodels[] = $appUsers;
		
				$logger->debug("This submodels " . sizeof($submodels));
				$this->view->setSubmodels($submodels);
				return $this->view->output($appUser);
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: impersonate
		///Description: Create Get Method
		///</summary>
		///*****************************************************************
		
		public function userfollowing()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$appuserid = $_GET["id"];
				$appUserID = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$logger->debug("Got user cookie");
					$logger->debug($_COOKIE["ropaziuser"]);
					$appUserID = CommonUtils::verifyUserCookie();
				}
				$logger->debug("Got app user id::" . $appuserid);
				$appUserBO = new AppUserBO($this->_UserInfo);
				$postBO = new PostBO($this->_UserInfo);
				$appUser = $appUserBO->SelectByAppUserIDAndLoggedInAppUserID($appuserid, $appUserID);
				$logger->debug("User email is::" . $appUser->getEmail());
				
			
				$submodels = array();
				$submodels[] = $appUser;
				$whotofollow = $appUserBO->SelectWhoToFollow($appUserID);
				$logger->debug("Got who to follow " . sizeof($whotofollow));
				$submodels[] = $whotofollow;
			
				$posts = $postBO->SelectByUserFollowing($appuserid);
				$submodels[] = $posts;
			
				$appUsers = $appUserBO->SelectFollowing($appuserid, $appUserID);
				$submodels[] = $appUsers;
			
				$logger->debug("This submodels " . sizeof($submodels));
				$this->view->setSubmodels($submodels);
				return $this->view->output($appUser);
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
			
		}

		///*****************************************************************
		///<summary>
		///Method Name: impersonate
		///Description: Create Get Method
		///</summary>
		///*****************************************************************
		
		public function userfollowinggrid()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$appuserid = $_GET["id"];
				$appUserID = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$logger->debug("Got user cookie");
					$logger->debug($_COOKIE["ropaziuser"]);
					$appUserID = CommonUtils::verifyUserCookie();
				}
				$logger->debug("Got app user id::" . $appuserid);
				$appUserBO = new AppUserBO($this->_UserInfo);
				$postBO = new PostBO($this->_UserInfo);
				$appUser = $appUserBO->SelectByAppUserIDAndLoggedInAppUserID($appuserid, $appUserID);
				$logger->debug("User email is::" . $appUser->getEmail());
				
					
				$submodels = array();
				$submodels[] = $appUser;
				$whotofollow = $appUserBO->SelectWhoToFollow($appUserID);
				$logger->debug("Got who to follow " . sizeof($whotofollow));
				$submodels[] = $whotofollow;
					
				$posts = $postBO->SelectByUserFollowing($appuserid);
				$submodels[] = $posts;
					
				$appUsers = $appUserBO->SelectFollowing($appuserid, $appUserID);
				$submodels[] = $appUsers;
					
				$logger->debug("This submodels " . sizeof($submodels));
				$this->view->setSubmodels($submodels);
				return $this->view->output($appUser);
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
				
		}



		
	}
?>
