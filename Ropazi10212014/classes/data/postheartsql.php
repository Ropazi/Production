<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class PostHeartSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for PostHeartSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertPostHeart
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertPostHeart($_postheart)
		{
			$query = "insert into posthearts(";
			$query .= "appuserid,";
			$query .= "postid,";
			$query .= "createdate,";
			$query .= "isvalid";
			$query .= ")";
			$query .= " values (";
			$query .= $_postheart->getAppUserID() . ",  ";
			$query .= $_postheart->getPostID() . ",  ";
			$query .= $this->CheckDate($_postheart->getCreateDate()). " , ";
			$query .= $this->CheckBoolean($_postheart->getIsValid()) ;
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdatePostHeart
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdatePostHeart($_postheart)
		{
			$query = "update posthearts set ";
			$query .= "isvalid = " . $this->CheckBoolean($_postheart->getIsValid()) . " , ";
			$query .= "removedate = " . $this->CheckDate($_postheart->getRemoveDate()) . "";
			$query .= " where heartid = " . $_postheart->getHeartID();
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
			$query = "select * from posthearts where appuserid = '" . $AppUserID . "'";
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
			$query = "select * from posthearts where postid = '" . $PostID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserAndPost
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserAndPost($AppUserID, $PostID)
		{
			$query = "select * from posthearts where appuserid = '" . $AppUserID . "' and postid = '" . $PostID . "'";
			return $query;
		}
	}
?>
