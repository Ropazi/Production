<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class BrandStatisticSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for BrandStatisticSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertBrandStatistic
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertBrandStatistic($_brandstatistic)
		{
			$query = "insert into brandstatistics(";
			$query .= "brandid,";
			$query .= "followers,";
			$query .= "pageviews,";
			$query .= "posttags,";
			$query .= "postshares,";
			$query .= "posthearts";
			$query .= ")";
			$query .= " values (";
			$query .= $_brandstatistic->getBrandID() . ",  ";
			$query .= $_brandstatistic->getFollowers() . ",  ";
			$query .= $_brandstatistic->getPageViews() . ",  ";
			$query .= $_brandstatistic->getPostTags() . ",  ";
			$query .= $_brandstatistic->getPostShares() . ",  ";
			$query .= $_brandstatistic->getPostHearts() . " ";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateFollowers
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateFollowers($_brandstatistic)
		{
			$query = "update brandstatistics set ";
			$query .= "followers = " . $_brandstatistic->getFollowers() . " ";
			$query .= " where brandstatisticid = " . $_brandstatistic->getBrandStatisticID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdatePageViews
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdatePageViews($_brandstatistic)
		{
			$query = "update brandstatistics set ";
			$query .= "pageviews = " . $_brandstatistic->getPageViews() . " ";
			$query .= " where brandstatisticid = " . $_brandstatistic->getBrandStatisticID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateTags
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateTags($_brandstatistic)
		{
			$query = "update brandstatistics set ";
			$query .= "posttags = " . $_brandstatistic->getPostTags() . " ";
			$query .= " where brandstatisticid = " . $_brandstatistic->getBrandStatisticID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateShares
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateShares($_brandstatistic)
		{
			$query = "update brandstatistics set ";
			$query .= "postshares = " . $_brandstatistic->getPostShares() . " ";
			$query .= " where brandstatisticid = " . $_brandstatistic->getBrandStatisticID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateHearts
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateHearts($_brandstatistic)
		{
			$query = "update brandstatistics set ";
			$query .= "posthearts = " . $_brandstatistic->getPostHearts() . " ";
			$query .= " where brandstatisticid = " . $_brandstatistic->getBrandStatisticID();
			return $query;
		}
	}
?>
