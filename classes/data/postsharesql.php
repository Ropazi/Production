<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class PostShareSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for PostShareSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertPostShare
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertPostShare($_postshare)
		{
			$query = "insert into postshares(";
			$query .= "appuserid,";
			$query .= "postid,";
			$query .= "emails,";
			$query .= "message,";
			$query .= "createdate,";
			$query .= "viewlink,";
			$query .= "viewed";
			$query .= ")";
			$query .= " values (";
			$query .= $_postshare->getAppUserID() . ",  ";
			$query .= $_postshare->getPostID() . ",  ";
			$query .= "'" . $this->CheckString($_postshare->getEmails()) . "', ";
			$query .= "'" . $this->CheckString($_postshare->getMessage()) . "', ";
			$query .= $this->CheckDate($_postshare->getCreateDate()). " , ";
			$query .= "'" . $this->CheckString($_postshare->getViewLink()) . "', ";
			$query .= $this->CheckBoolean($_postshare->getViewed()) ;
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdatePostShare
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdatePostShare($_postshare)
		{
			$query = "update postshares set ";
			$query .= "viewed = " . $this->CheckBoolean($_postshare->getViewed()) . " , ";
			$query .= "viewdate = " . $this->CheckDate($_postshare->getViewDate()) . "";
			$query .= " where postshareid = " . $_postshare->getPostShareID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByPostID($PostID)
		{
			$query = "select * from postshares where postid = '" . $PostID . "'";
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
			$query = "select * from postshares where appuserid = '" . $AppUserID . "'";
			return $query;
		}
	}
?>
