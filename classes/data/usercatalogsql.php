<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class UserCatalogSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for UserCatalogSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertUserCatalog
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertUserCatalog($_usercatalog)
		{
			$query = "insert into usercatalogs(";
			$query .= "appuserid,";
			$query .= "catalogname,";
			$query .= "createdate,";
			$query .= "clips";
			$query .= ")";
			$query .= " values (";
			$query .= $_usercatalog->getAppUserID() . ",  ";
			$query .= "'" . $this->CheckString($_usercatalog->getCatalogName()) . "', ";
			$query .= $this->CheckDate($_usercatalog->getCreateDate()). " , ";
			$query .= $_usercatalog->getClips() . " ";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateUserCatalog
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateUserCatalog($_usercatalog)
		{
			$query = "update usercatalogs set ";
			$query .= "clips = " . $_usercatalog->getClips() . " ";
			$query .= " where usercatalogid = " . $_usercatalog->getUserCatalogID();
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
			$query = "select * from usercatalogs where appuserid = '" . $AppUserID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByName
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByName($AppUserID, $CatalogName)
		{
			$query = "select * from usercatalogs where appuserid = '" . $AppUserID . "' and catalogname = '" . $CatalogName . "'";
			return $query;
		}
	}
?>
