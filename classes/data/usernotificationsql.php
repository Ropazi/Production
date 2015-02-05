<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class UserNotificationSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for UserNotificationSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertUserNotification
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertUserNotification($_usernotification)
		{
			$query = "insert into usernotifications(";
			$query .= "appuserid,";
			$query .= "notificationtype,";
			$query .= "displayname,";
			$query .= "notify";
			$query .= ")";
			$query .= " values (";
			$query .= $_usernotification->getAppUserID() . ",  ";
			$query .= "'" . $this->CheckString($_usernotification->getNotificationType()) . "', ";
			$query .= "'" . $this->CheckString($_usernotification->getDisplayName()) . "', ";
			$query .= $this->CheckBoolean($_usernotification->getNotify()) ;
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateUserNotification
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateUserNotification($_usernotification)
		{
			$query = "update usernotifications set ";
			$query .= "notify = " . $_usernotification->getNotify() ;
			$query .= " where appuserid = " . $_usernotification->getAppUserID() . " and notificationtype = '" . $_usernotification->getNotificationType() . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID)
		{
			$query = "select * from usernotifications where appuserid = '" . $AppUserID . "'";
			return $query;
		}
	}
?>
