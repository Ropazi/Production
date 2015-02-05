<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class BrandFollowerSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for BrandFollowerSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertBrandFollower
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertBrandFollower($_brandfollower)
		{
			$query = "insert into brandfollowers(";
			$query .= "brandid,";
			$query .= "appuserid,";
			$query .= "createdate,";
			$query .= "isfollowing";
			$query .= ")";
			$query .= " values (";
			$query .= $_brandfollower->getBrandID() . ",  ";
			$query .= $_brandfollower->getAppUserID() . ",  ";
			$query .= $this->CheckDate($_brandfollower->getCreateDate()). " , ";
			$query .= $this->CheckBoolean($_brandfollower->getIsFollowing()) ;
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateBrandFollower
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateBrandFollower($_brandfollower)
		{
			$query = "update brandfollowers set ";
			$query .= "isfollowing = " . $_brandfollower->getIsFollowing() . " , ";
			$query .= "unfollowdate = '" . $this->CheckDate($_brandfollower->getUnfollowDate()) . "'";
			$query .= " where brandfollowerid = " . $_brandfollower->getBrandFollowerID();
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
			$query = "select * from brandfollowers where brandid = '" . $BrandID . "'";
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
			$query = "select * from brandfollowers where appuserid = '" . $AppUserID . "'";
			return $query;
		}
	}
?>
