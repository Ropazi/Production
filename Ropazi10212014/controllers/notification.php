<?php
	include_once("classes/business/notificationbo.php");
	include_once("classes/domain/notification.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: NotificationController
	///Description: NotificationController
	///</summary>
	///*****************************************************************

	class NotificationController extends BaseController
	{
		private $_UserInfo;
		///*****************************************************************
		///<summary>
		///Method Name: createuserpost
		///Description: Create Post Method
		///</summary>
		///*****************************************************************
		
		public function getnotification()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$userid = 0;
				$this->LogAccess($taskCode);
				if (isset($_COOKIE["ropaziuser"])){
					$logger->debug("Got user cookie");
					$logger->debug($_COOKIE["ropaziuser"]);
					$userid = CommonUtils::verifyUserCookie();
				}
				$notificationBO = new NotificationBO($this->_UserInfo);
				$notifications = $notificationBO->SelectByAppUserID($userid);
				$logger->debug("Got notifications::" . sizeof($notifications));
				$this->model = $notifications;
				ob_start();
				include('views/_alerts.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
	}
?>
