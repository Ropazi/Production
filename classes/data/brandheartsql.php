<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class BrandHeartSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for BrandHeartSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertBrandHeart
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertBrandHeart($_brandheart)
		{
			$query = "insert into brandhearts(";
			$query .= "appuserid,";
			$query .= "brandid,";
			$query .= "createdate,";
			$query .= "isvalid";
			$query .= ")";
			$query .= " values (";
			$query .= $_brandheart->getAppUserID() . ",  ";
			$query .= $_brandheart->getBrandID() . ",  ";
			$query .= $this->CheckDate($_brandheart->getCreateDate()). " , ";
			$query .= $this->CheckBoolean($_brandheart->getIsValid()) ;
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateBrandHeart
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateBrandHeart($_brandheart)
		{
			$query = "update brandhearts set ";
			$query .= "isvalid = " . $this->CheckBoolean($_brandheart->getIsValid()) . " , ";
			$query .= "removedate = " . $this->CheckDate($_brandheart->getRemoveDate()) . "";
			$query .= " where brandheartid = " . $_brandheart->getBrandHeartID();
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
			$query = "select * from brandhearts where appuserid = '" . $AppUserID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandID($BrandID)
		{
			$query = "select * from brandhearts where brandid = '" . $BrandID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserAndBrand
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserAndBrand($AppUserID, $BrandID)
		{
			$query = "select * from brandhearts where appuserid = '" . $AppUserID . "' and brandid = '" . $BrandID . "'";
			return $query;
		}
	}
?>
