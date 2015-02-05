<?php
	include_once("classes/business/userheartbo.php");
	include_once("classes/domain/userheart.php");
	include_once("classes/business/appuserbo.php");
	include_once("classes/domain/appuser.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/userheartrequesthelper.php");
	include_once("classes/validators/userheartvalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserHeartController
	///Description: FollowersController
	///</summary>
	///*****************************************************************

	class UserHeartController extends BaseController
	{
		private $_UserInfo;


		

	///*****************************************************************
		///<summary>
		///Method Name: createuserheart
		///Description: Create Post Method
		///</summary>
		///*****************************************************************

		public function createuserheartpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$userHeartRequestHelper = new UserHeartRequestHelper();
				$userHeart = $userHeartRequestHelper->AssembleUserHeartEditControl();
				$userHeartBO = new UserHeartBO($this->_UserInfo);
				$userHeartValidator = new UserHeartValidator();
				$userHeartValidator->ValidateUserHeartEditControl($userHeart, $this->_UserInfo);
				if (!$userHeart->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $userHeart->getErrors());
				}
				else
				{
					$userid = CommonUtils::verifyUserCookie();
					$userHeart->setHeartedByAppUserID($userid);
					$userHeart->setCreateDate(new DateTime());
					$userHeart->setIsValid(1);
					$exuserHeart = $userHeartBO->SelectByAppUserAndHeart($userHeart->getAppUserID(), $userid);
					$followers = 0;
					$more = "/content/images/grid-heart.png";
					if ($exuserHeart->getUserHeartID() > 0) {
						if ($exuserHeart->getIsValid() == TRUE) {
							$exuserHeart->setIsValid(FALSE);
							$exuserHeart->setRemoveDate(new DateTime());
							$followers = $userHeartBO->UpdateUserHeart($exuserHeart);
						}
						else {
							$exuserHeart->setIsValid(TRUE);
							$exuserHeart->setRemoveDate(new DateTime());
							$followers = $userHeartBO->UpdateUserHeart($exuserHeart);
							$more = "/content/images/heart-dark.png";
						}
					}
					else {
						$followers = $userHeartBO->InsertUserHeart($userHeart);
						//$appUserBO = new AppUserBO($this->_UserInfo);
						//$appusers = $appUserBO->SelectWhoToFollow($userid);
						$more = "/content/images/heart-dark.png";
					}
					
					
					return $this->view->outputJson(Constants::$REFRESHCONTENT, $followers, "", $more);
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		


	}
?>
