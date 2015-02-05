<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/post.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class PostRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssemblePostEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssemblePostEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_Post = new Post();
			if ($_SERVER["REQUEST_METHOD"] == "GET")
			{
				$_Post->setTitle(($_GET["Title"]));
				$_Post->setPriceText(($_GET["Price"]));
				$_Post->setDetailText($this->CleanInput($_GET["Description"]));
				$_Post->setOriginalImageURL(($_GET["Image"]));
				$_Post->setPostURL($_GET["PageUrl"]);
				$_Post->setCatalogName($this->CleanInput($_GET["CatalogName"]));
				$scrapeError = $_GET["ScrapeError"];
				if ($scrapeError == "1"){
					$_Post->setScrapeError(TRUE);
				}
				else {
					$_Post->setScrapeError(FALSE);
				}
				
			}
			$logger->debug("END");
			return $_Post;
		}
		
		///*****************************************************************
		///<summary>
		///Method Name: AssemblePostEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************
		
		public function AssemblePostEditControlExtended()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_Post = new Post();
			if ($_SERVER["REQUEST_METHOD"] == "GET")
			{
				$_Post->setTitle(($_GET["Title"]));
				$_Post->setPriceText(($_GET["Price"]));
				if(isset($_GET["SalePrice"])) {
					$_Post->setSalePriceText(($_GET["SalePrice"]));
				}
				
				$_Post->setRetailPriceText(($_GET["RetailPrice"]));
				$_Post->setDetailText($this->CleanInput($_GET["Description"]));
				$_Post->setOriginalImageURL(($_GET["Image"]));
				$_Post->setPostURL($_GET["PageUrl"]);
				if(isset($_GET["Gender"])) {
					$_Post->setItemGender($_GET["Gender"]);
				}
				$_Post->setRating($_GET["Rating"]);
				$_Post->setCategoryName($_GET["Category"]);
				$_Post->setSubCategoryID($_GET["SubCategory"]);
				$_Post->setItemGender($_GET["ItemGender"]);
				$_Post->setInStock($_GET["InStock"]);
				$_Post->setProductID($_GET["ProductID"]);
				$scrapeError = $_GET["ScrapeError"];
				if ($scrapeError == "1"){
					$_Post->setScrapeError(TRUE);
				}
				else {
					$_Post->setScrapeError(FALSE);
				}
				$logger->debug("PageURL::" . $_GET["PageUrl"]);
		
			}
			$logger->debug("END");
			return $_Post;
		}
	}
?>
