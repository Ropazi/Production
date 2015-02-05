<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/usernotification.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserNotificationRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class UserNotificationRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssembleUserNotificationEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleUserNotificationEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$userNotifications = array();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$userNotification = new UserNotification();
				$userNotification->setNotificationType("Email");
				$userNotification->setNotify($this->CleanInput($_POST["hdnEmail"]));
				$userNotifications[] = $userNotification;
				
				$userNotification1 = new UserNotification();
				$userNotification1->setNotificationType("Follows");
				$userNotification1->setNotify($this->CleanInput($_POST["hdnFollows"]));
				$userNotifications[] = $userNotification1;
				
				$userNotification2 = new UserNotification();
				$userNotification2->setNotificationType("ReClips");
				$userNotification2->setNotify($this->CleanInput($_POST["hdnReClips"]));
				$userNotifications[] = $userNotification2;
				
				$userNotification3 = new UserNotification();
				$userNotification3->setNotificationType("Tags");
				$userNotification3->setNotify($this->CleanInput($_POST["hdnTags"]));
				$userNotifications[] = $userNotification3;
				
				$userNotification4 = new UserNotification();
				$userNotification4->setNotificationType("Deals");
				$userNotification4->setNotify($this->CleanInput($_POST["hdnDeals"]));
				$userNotifications[] = $userNotification4;
				
				$userNotification5 = new UserNotification();
				$userNotification5->setNotificationType("NewFeature");
				$userNotification5->setNotify($this->CleanInput($_POST["hdnNewFeature"]));
				$userNotifications[] = $userNotification5;
				
				$userNotification6 = new UserNotification();
				$userNotification6->setNotificationType("Hearts");
				$userNotification6->setNotify($this->CleanInput($_POST["hdnHearts"]));
				$userNotifications[] = $userNotification6;
				
				$userNotification7 = new UserNotification();
				$userNotification7->setNotificationType("PriceChange");
				$userNotification7->setNotify($this->CleanInput($_POST["hdnPriceChange"]));
				$userNotifications[] = $userNotification7;
				
				$userNotification8 = new UserNotification();
				$userNotification8->setNotificationType("Weekly");
				$userNotification8->setNotify($this->CleanInput($_POST["hdnWeekly"]));
				$userNotifications[] = $userNotification8;
				
				$userNotification9 = new UserNotification();
				$userNotification9->setNotificationType("Feedback");
				$userNotification9->setNotify($this->CleanInput($_POST["hdnFeedback"]));
				$userNotifications[] = $userNotification9;
				
				$userNotification10 = new UserNotification();
				$userNotification10->setNotificationType("Facebook");
				$userNotification10->setNotify($this->CleanInput($_POST["hdnFacebook"]));
				$userNotifications[] = $userNotification10;
				
				
			}
			$logger->debug("END");
			return $userNotifications;
		}
	}
?>
