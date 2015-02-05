<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class NotificationSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for NotificationSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertNotification
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertNotification($_notification)
		{
			$query = "insert into notifications(";
			$query .= "appuserid,";
			$query .= "entityname,";
			$query .= "entityid,";
			$query .= "notificationtype,";
			$query .= "createdate,";
			$query .= "viewlink,";
			$query .= "viewed,";
			$query .= "userimage,";
			$query .= "postimage,";
			$query .= "othertext";
			$query .= ")";
			$query .= " values (";
			$query .= $_notification->getAppUserID() . ",  ";
			$query .= "'" . $this->CheckString($_notification->getEntityName()) . "', ";
			$query .= $_notification->getEntityID() . ",  ";
			$query .= "'" . $this->CheckString($_notification->getNotificationType()) . "', ";
			$query .= $this->CheckDate($_notification->getCreateDate()). " , ";
			$query .= "'" . $this->CheckString($_notification->getViewLink()) . "', ";
			$query .= $this->CheckBoolean($_notification->getViewed()) . " , ";
			$query .= "'" . $this->CheckString($_notification->getUserImage()) . "', ";
			$query .= "'" . $this->CheckString($_notification->getPostImage()) . "', ";
			$query .= "'" . $this->CheckString($_notification->getOtherText()) . "'";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateNotification
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateNotification($_notification)
		{
			$query = "update notifications set ";
			$query .= "viewed = " . $this->CheckBoolean($_notification->getViewed()) . " , ";
			$query .= "viewdate = " . $this->CheckDate($_notification->getViewDate()) . "";
			$query .= " where notificationid = " . $_notification->getNotificationID();
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
			$query = "select * from notifications where appuserid = '" . $AppUserID . "'";
			return $query;
		}
	}
?>
