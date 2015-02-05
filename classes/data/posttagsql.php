<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class PostTagSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for PostTagSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertPostTag
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertPostTag($_posttag)
		{
			$query = "insert into posttags(";
			$query .= "appuserid,";
			$query .= "postid,";
			$query .= "createdate,";
			$query .= "taggedbyappuserid";
			$query .= ")";
			$query .= " values (";
			$query .= $_posttag->getAppUserID() . ",  ";
			$query .= $_posttag->getPostID() . ",  ";
			$query .= $this->CheckDate($_posttag->getCreateDate()). " , ";
			$query .= $_posttag->getTaggedByAppUserID() . " ";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdatePostTag
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdatePostTag($_posttag)
		{
			$query = "update posttags set ";
			$query .= "viewed = " . $this->CheckBoolean($_posttag->getViewed()) . " , ";
			$query .= "viewdate = " . $this->CheckDate($_posttag->getViewDate()) . "";
			$query .= " where tagid = " . $_posttag->getTagID();
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
			$query = "select * from posttags where postid = '" . $PostID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectNotViewedByAppUserID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectNotViewedByAppUserID($AppUserID)
		{
			$query = "select * from posttags where appuserid = '" . $AppUserID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectViewedByAppUserID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectViewedByAppUserID($AppUserID)
		{
			$query = "select * from posttags where appuserid = '" . $AppUserID . "'";
			return $query;
		}
	}
?>
