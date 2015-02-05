<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: Post
	///Description: Assembles Post
	///</summary>
	///*****************************************************************

	class PostAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for Post
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of Post
		///Description: Assembles List of Post from Results
		///</summary>
		///*****************************************************************

		public function AssembleList($result)
		{
			$this->logger->debug("START");
			$aList = array();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $aList;
				}
				while ($row = mysqli_fetch_array($result))
				{
					$post = new Post();
					$post->setPostID($row['postid']);
					$post->setAppUserID($row['appuserid']);
					$post->setBrandID($row['brandid']);
					$post->setCategoryID($row['categoryid']);
					$post->setSubCategoryID($row['subcategoryid']);
					$post->setTitle($row['title']);
					$post->setCreateDate($row['createdate']);
					$post->setCurrency($row['currency']);
					$post->setPriceText($row['pricetext']);
					$post->setPrice($row['price']);
					$post->setRetailPriceText($row['retailpricetext']);
					$post->setRetailPrice($row['retailprice']);
					$post->setSalePriceText($row['salepricetext']);
					$post->setSalePrice($row['saleprice']);
					$post->setDetailText($row['detailtext']);
					$post->setLastUpdateDate($row['lastupdatedate']);
					$post->setIsActive($row['isactive']);
					$post->setFeaturedProduct($row['featuredproduct']);
					$post->setIsApproved($row['isapproved']);
					$post->setEnableComments($row['enablecomments']);
					$post->setLastUpdateBy($row['lastupdateby']);
					$post->setOriginalImageURL($row['originalimageurl']);
					$post->setLocalImageURL($row['localimageurl']);
					$post->setPostURL($row['posturl']);
					$post->setScrapeError($row['scrapeerror']);
					$post->setItemGender($row['itemgender']);
					$post->setItemSize($row['itemsize']);
					$post->setItemAgeGroup($row['itemagegroup']);
					$post->setSKU($row['sku']);
					$post->setUPC($row['upc']);
					$post->setInStock($row['instock']);
					$post->setClips($row['clips']);
					$post->setHearts($row['hearts']);
					$post->setBuys($row['buys']);
					$post->setProductID($row['productid']);
					$post->setRating($row['rating']);
					$aList[] = $post;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return $aList;
		}




		///*****************************************************************
		///<summary>
		///Method Name: AssemblePost
		///Description: Assembles Post from DataReader
		///</summary>
		///*****************************************************************

		public function AssemblePost($result)
		{
			$this->logger->debug("START");
			$post = new Post();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $post;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$post->setPostID($row['postid']);
					$post->setAppUserID($row['appuserid']);
					$post->setBrandID($row['brandid']);
					$post->setCategoryID($row['categoryid']);
					$post->setSubCategoryID($row['subcategoryid']);
					$post->setTitle($row['title']);
					$post->setCreateDate($row['createdate']);
					$post->setCurrency($row['currency']);
					$post->setPriceText($row['pricetext']);
					$post->setPrice($row['price']);
					$post->setRetailPriceText($row['retailpricetext']);
					$post->setRetailPrice($row['retailprice']);
					$post->setSalePriceText($row['salepricetext']);
					$post->setSalePrice($row['saleprice']);
					$post->setDetailText($row['detailtext']);
					$post->setLastUpdateDate($row['lastupdatedate']);
					$post->setIsActive($row['isactive']);
					$post->setFeaturedProduct($row['featuredproduct']);
					$post->setIsApproved($row['isapproved']);
					$post->setEnableComments($row['enablecomments']);
					$post->setLastUpdateBy($row['lastupdateby']);
					$post->setOriginalImageURL($row['originalimageurl']);
					$post->setLocalImageURL($row['localimageurl']);
					$post->setPostURL($row['posturl']);
					$post->setScrapeError($row['scrapeerror']);
					$post->setItemGender($row['itemgender']);
					$post->setItemSize($row['itemsize']);
					$post->setItemAgeGroup($row['itemagegroup']);
					$post->setSKU($row['sku']);
					$post->setUPC($row['upc']);
					$post->setInStock($row['instock']);
					$post->setClips($row['clips']);
					$post->setHearts($row['hearts']);
					$post->setBuys($row['buys']);
					$post->setProductID($row['productid']);
					$post->setRating($row['rating']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $post;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of Post
		///Description: Assembles List of Post
		///</summary>
		///*****************************************************************

		public function AssemblePaginatedList($result, $PageSize, $PageIndex, $sortExpression, $sortDirection)
		{
			$this->logger->debug("START");
			$aList = array();
			$counter = 0;
			try
			{
				if (!mysqli_num_rows($result))
				{
					return new PaginatedList($aList, $counter, $PageSize, $PageIndex, $sortExpression, $sortDirection);
				}
				while ($row = mysqli_fetch_array($result))
				{
					if (($counter >= ($PageIndex * $PageSize)) && ($counter < (($PageIndex * $PageSize) + $PageSize)))
					{
						$post = new Post();
						$post->setPostID($row['postid']);
						$post->setAppUserID($row['appuserid']);
						$post->setBrandID($row['brandid']);
						$post->setCategoryID($row['categoryid']);
						$post->setSubCategoryID($row['subcategoryid']);
						$post->setTitle($row['title']);
						$post->setCreateDate($row['createdate']);
						$post->setCurrency($row['currency']);
						$post->setPriceText($row['pricetext']);
						$post->setPrice($row['price']);
						$post->setRetailPriceText($row['retailpricetext']);
						$post->setRetailPrice($row['retailprice']);
						$post->setSalePriceText($row['salepricetext']);
						$post->setSalePrice($row['saleprice']);
						$post->setDetailText($row['detailtext']);
						$post->setLastUpdateDate($row['lastupdatedate']);
						$post->setIsActive($row['isactive']);
						$post->setFeaturedProduct($row['featuredproduct']);
						$post->setIsApproved($row['isapproved']);
						$post->setEnableComments($row['enablecomments']);
						$post->setLastUpdateBy($row['lastupdateby']);
						$post->setOriginalImageURL($row['originalimageurl']);
						$post->setLocalImageURL($row['localimageurl']);
						$post->setPostURL($row['posturl']);
						$post->setScrapeError($row['scrapeerror']);
						$post->setItemGender($row['itemgender']);
						$post->setItemSize($row['itemsize']);
						$post->setItemAgeGroup($row['itemagegroup']);
						$post->setSKU($row['sku']);
						$post->setUPC($row['upc']);
						$post->setInStock($row['instock']);
						$post->setClips($row['clips']);
						$post->setHearts($row['hearts']);
						$post->setBuys($row['buys']);
						$post->setProductID($row['productid']);
						$post->setRating($row['rating']);
						$aList[] = $post;
					}
					$counter++;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return new PaginatedList($aList, $counter, $PageSize, $PageIndex, $sortExpression, $sortDirection);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of Post
		///Description: Assembles List of Post
		///</summary>
		///*****************************************************************

		public function AssemblePostDetailListPaged($result, $PageSize, $PageIndex, $sortExpression, $sortDirection)
		{
			$this->logger->debug("START");
			$aList = array();
			$counter = 0;
			try
			{
				if (!mysqli_num_rows($result))
				{
					return new PaginatedList($aList, $counter, $PageSize, $PageIndex, $sortExpression, $sortDirection);
				}
				while ($row = mysqli_fetch_array($result))
				{
					if (($counter >= ($PageIndex * $PageSize)) && ($counter < (($PageIndex * $PageSize) + $PageSize)))
					{
						$post = new Post();
						$post->setPostID($row['postid']);
						$post->setAppUserID($row['appuserid']);
						$post->setBrandID($row['brandid']);
						$post->setCategoryID($row['categoryid']);
						$post->setSubCategoryID($row['subcategoryid']);
						$post->setTitle($row['title']);
						$post->setCreateDate($row['createdate']);
						$post->setCurrency($row['currency']);
						$post->setPriceText($row['pricetext']);
						$post->setPrice($row['price']);
						$post->setRetailPriceText($row['retailpricetext']);
						$post->setRetailPrice($row['retailprice']);
						$post->setSalePriceText($row['salepricetext']);
						$post->setSalePrice($row['saleprice']);
						$post->setDetailText($row['detailtext']);
						$post->setLastUpdateDate($row['lastupdatedate']);
						$post->setIsActive($row['isactive']);
						$post->setFeaturedProduct($row['featuredproduct']);
						$post->setIsApproved($row['isapproved']);
						$post->setEnableComments($row['enablecomments']);
						$post->setLastUpdateBy($row['lastupdateby']);
						$post->setOriginalImageURL($row['originalimageurl']);
						$post->setLocalImageURL($row['localimageurl']);
						$post->setPostURL($row['posturl']);
						$post->setScrapeError($row['scrapeerror']);
						$post->setItemGender($row['itemgender']);
						$post->setItemSize($row['itemsize']);
						$post->setItemAgeGroup($row['itemagegroup']);
						$post->setSKU($row['sku']);
						$post->setUPC($row['upc']);
						$post->setInStock($row['instock']);
						$post->setClips($row['clips']);
						$post->setHearts($row['hearts']);
						$post->setBrandName($row['brandname']);
						$post->setBrandLogo($row['brandlogo']);
						$post->setUserName($row['username']);
						$post->setUserProfileImage($row['userprofileimage']);
						$post->setCategoryName($row['categoryname']);
						$post->setClippedByUser($row['clippedbyuser']);
						$post->setHeartByUser($row['heartbyuser']);
						$post->setPosterAppUserID($row['posterappuserid']);
						$aList[] = $post;
					}
					$counter++;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return new PaginatedList($aList, $counter, $PageSize, $PageIndex, $sortExpression, $sortDirection);
		}




		///*****************************************************************
		///<summary>
		///Method Name: AssemblePost
		///Description: Assembles Post from DataReader
		///</summary>
		///*****************************************************************

		public function AssemblePostDetail($result)
		{
			$this->logger->debug("START");
			$post = new Post();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $post;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$post->setPostID($row['postid']);
					$post->setAppUserID($row['appuserid']);
					$post->setBrandID($row['brandid']);
					$post->setCategoryID($row['categoryid']);
					$post->setSubCategoryID($row['subcategoryid']);
					$post->setTitle($row['title']);
					$post->setCreateDate($row['createdate']);
					$post->setCurrency($row['currency']);
					$post->setPriceText($row['pricetext']);
					$post->setPrice($row['price']);
					$post->setRetailPriceText($row['retailpricetext']);
					$post->setRetailPrice($row['retailprice']);
					$post->setSalePriceText($row['salepricetext']);
					$post->setSalePrice($row['saleprice']);
					$post->setDetailText($row['detailtext']);
					$post->setLastUpdateDate($row['lastupdatedate']);
					$post->setIsActive($row['isactive']);
					$post->setFeaturedProduct($row['featuredproduct']);
					$post->setIsApproved($row['isapproved']);
					$post->setEnableComments($row['enablecomments']);
					$post->setLastUpdateBy($row['lastupdateby']);
					$post->setOriginalImageURL($row['originalimageurl']);
					$post->setLocalImageURL($row['localimageurl']);
					$post->setPostURL($row['posturl']);
					$post->setScrapeError($row['scrapeerror']);
					$post->setItemGender($row['itemgender']);
					$post->setItemSize($row['itemsize']);
					$post->setItemAgeGroup($row['itemagegroup']);
					$post->setSKU($row['sku']);
					$post->setUPC($row['upc']);
					$post->setInStock($row['instock']);
					$post->setClips($row['clips']);
					$post->setHearts($row['hearts']);
					$post->setBrandName($row['brandname']);
					$post->setBrandLogo($row['brandlogo']);
					$post->setUserName($row['username']);
					$post->setUserProfileImage($row['userprofileimage']);
					$post->setCategoryName($row['categoryname']);
					$post->setClippedByUser($row['clippedbyuser']);
					$post->setHeartByUser($row['heartbyuser']);
					$post->setPosterAppUserID($row['posterappuserid']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $post;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of Post
		///Description: Assembles List of Post from Results
		///</summary>
		///*****************************************************************

		public function AssemblePostDetailList($result)
		{
			$this->logger->debug("START");
			$aList = array();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $aList;
				}
				while ($row = mysqli_fetch_array($result))
				{
					$post = new Post();
					$post->setPostID($row['postid']);
					$post->setAppUserID($row['appuserid']);
					$post->setBrandID($row['brandid']);
					$post->setCategoryID($row['categoryid']);
					$post->setSubCategoryID($row['subcategoryid']);
					$post->setTitle($row['title']);
					$post->setCreateDate($row['createdate']);
					$post->setCurrency($row['currency']);
					$post->setPriceText($row['pricetext']);
					$post->setPrice($row['price']);
					$post->setRetailPriceText($row['retailpricetext']);
					$post->setRetailPrice($row['retailprice']);
					$post->setSalePriceText($row['salepricetext']);
					$post->setSalePrice($row['saleprice']);
					$post->setDetailText($row['detailtext']);
					$post->setLastUpdateDate($row['lastupdatedate']);
					$post->setIsActive($row['isactive']);
					$post->setFeaturedProduct($row['featuredproduct']);
					$post->setIsApproved($row['isapproved']);
					$post->setEnableComments($row['enablecomments']);
					$post->setLastUpdateBy($row['lastupdateby']);
					$post->setOriginalImageURL($row['originalimageurl']);
					$post->setLocalImageURL($row['localimageurl']);
					$post->setPostURL($row['posturl']);
					$post->setScrapeError($row['scrapeerror']);
					$post->setItemGender($row['itemgender']);
					$post->setItemSize($row['itemsize']);
					$post->setItemAgeGroup($row['itemagegroup']);
					$post->setSKU($row['sku']);
					$post->setUPC($row['upc']);
					$post->setInStock($row['instock']);
					$post->setClips($row['clips']);
					$post->setHearts($row['hearts']);
					$post->setBrandName($row['brandname']);
					$post->setBrandLogo($row['brandlogo']);
					$post->setUserName($row['username']);
					$post->setUserProfileImage($row['userprofileimage']);
					$post->setCategoryName($row['categoryname']);
					$post->setClippedByUser($row['clippedbyuser']);
					$post->setHeartByUser($row['heartbyuser']);
					$post->setPosterAppUserID($row['posterappuserid']);
					$aList[] = $post;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return $aList;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of Post
		///Description: Assembles List of Post from Results
		///</summary>
		///*****************************************************************

		public function AssembleShortPostList($result)
		{
			$this->logger->debug("START");
			$aList = array();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $aList;
				}
				while ($row = mysqli_fetch_array($result))
				{
					$post = new Post();
					$post->setPostID($row['postid']);
					$post->setAppUserID($row['appuserid']);
					$post->setBrandID($row['brandid']);
					$post->setPrice($row['price']);
					$post->setRetailPriceText($row['retailpricetext']);
					$post->setLocalImageURL($row['localimageurl']);
					$aList[] = $post;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return $aList;
		}


	}
?>
