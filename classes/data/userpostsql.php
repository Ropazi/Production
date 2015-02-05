<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class UserPostSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for UserPostSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertUserPost
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertUserPost($_userpost)
		{
			$query = "insert into userposts(";
			$query .= "postid,";
			$query .= "appuserid,";
			$query .= "usercatalogid,";
			$query .= "createdate,";
			$query .= "isvalid";
			$query .= ")";
			$query .= " values (";
			$query .= $_userpost->getPostID() . ",  ";
			$query .= $_userpost->getAppUserID() . ",  ";
			$query .= $_userpost->getUserCatalogID() . ",  ";
			$query .= $this->CheckDate($_userpost->getCreateDate()). " , ";
			$query .= $this->CheckBoolean($_userpost->getIsValid()) ;
			$query .= " )";
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
			$query = "select * from userposts where postid = '" . $PostID . "'";
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
			$query = "select * from userposts where appuserid = '" . $AppUserID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectExistingPost
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectExistingPost($PostID, $AppUserID)
		{
			$query = "select * from userposts where postid = '" . $PostID . "' and appuserid = '" . $AppUserID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateUserPost
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateUserPost($_userpost)
		{
			$query = "update userposts set ";
			$query .= "isvalid = " . $this->CheckBoolean($_userpost->getIsValid()) . " , ";
			$query .= "removedate = " . $this->CheckDate($_userpost->getRemoveDate()) . "";
			$query .= " where userpostid = " . $_userpost->getUserPostID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateUserCatalog
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateUserCatalog($_userpost)
		{
			$query = "update userposts set ";
			$query .= "usercatalogid = " . $_userpost->getUserCatalogID() . " ";
			$query .= " where userpostid = " . $_userpost->getUserPostID();
			return $query;
		}
	}
?>
