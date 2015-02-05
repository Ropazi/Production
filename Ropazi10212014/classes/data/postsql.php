<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class PostSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for PostSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertPost
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertPost($_post)
		{
			$query = "insert into posts(";
			$query .= "appuserid,";
			$query .= "brandid,";
			$query .= "categoryid,";
			$query .= "subcategoryid,";
			$query .= "title,";
			$query .= "createdate,";
			$query .= "currency,";
			$query .= "pricetext,";
			$query .= "price,";
			$query .= "retailpricetext,";
			$query .= "retailprice,";
			$query .= "salepricetext,";
			$query .= "saleprice,";
			$query .= "detailtext,";
			$query .= "lastupdatedate,";
			$query .= "isactive,";
			$query .= "featuredproduct,";
			$query .= "isapproved,";
			$query .= "enablecomments,";
			$query .= "lastupdateby,";
			$query .= "originalimageurl,";
			$query .= "localimageurl,";
			$query .= "posturl,";
			$query .= "scrapeerror,";
			$query .= "itemgender,";
			$query .= "itemsize,";
			$query .= "itemagegroup,";
			$query .= "sku,";
			$query .= "upc,";
			$query .= "instock,";
			$query .= "clips,";
			$query .= "hearts,";
			$query .= "productid,";
			$query .= "rating";
			$query .= ")";
			$query .= " values (";
			$query .= $_post->getAppUserID() . ",  ";
			$query .= $_post->getBrandID() . ",  ";
			$query .= $_post->getCategoryID() . ",  ";
			$query .= $_post->getSubCategoryID() . ",  ";
			$query .= "'" . $this->CheckString($_post->getTitle()) . "', ";
			$query .= $this->CheckDate($_post->getCreateDate()). " , ";
			$query .= "'" . $this->CheckString($_post->getCurrency()) . "', ";
			$query .= "'" . $this->CheckString($_post->getPriceText()) . "', ";
			$query .= $this->CheckNumeric($_post->getPrice()) . " , ";
			$query .= "'" . $this->CheckString($_post->getRetailPriceText()) . "', ";
			$query .= $this->CheckNumeric($_post->getRetailPrice()) . " , ";
			$query .= "'" . $this->CheckString($_post->getSalePriceText()) . "', ";
			$query .= $this->CheckNumeric($_post->getSalePrice()) . " , ";
			$query .= "'" . $this->CheckString($_post->getDetailText()) . "', ";
			$query .= $this->CheckDate($_post->getLastUpdateDate()). " , ";
			$query .= $this->CheckBoolean($_post->getIsActive()) . " , ";
			$query .= $this->CheckBoolean($_post->getFeaturedProduct()) . " , ";
			$query .= $this->CheckBoolean($_post->getIsApproved()) . " , ";
			$query .= $this->CheckBoolean($_post->getEnableComments()) . " , ";
			$query .= $_post->getLastUpdateBy() . ",  ";
			$query .= "'" . $this->CheckString($_post->getOriginalImageURL()) . "', ";
			$query .= "'" . $this->CheckString($_post->getLocalImageURL()) . "', ";
			$query .= "'" . $this->CheckString($_post->getPostURL()) . "', ";
			$query .= $this->CheckBoolean($_post->getScrapeError()) . " , ";
			$query .= "'" . $this->CheckString($_post->getItemGender()) . "', ";
			$query .= "'" . $this->CheckString($_post->getItemSize()) . "', ";
			$query .= "'" . $this->CheckString($_post->getItemAgeGroup()) . "', ";
			$query .= "'" . $this->CheckString($_post->getSKU()) . "', ";
			$query .= "'" . $this->CheckString($_post->getUPC()) . "', ";
			$query .= $this->CheckBoolean($_post->getInStock()) . " , ";
			$query .= $_post->getClips() . ",  ";
			$query .= $_post->getHearts() . ",  ";
			$query .= "'" . $this->CheckString($_post->getProductID()) . "', ";
			$query .= "'" . $this->CheckString($_post->getRating()) . "'";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdatePost
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdatePost($_post)
		{
			$query = "update posts set ";
			$query .= "categoryid = " . $_post->getCategoryID() . ",  ";
			$query .= "subcategoryid = " . $_post->getSubCategoryID() . ",  ";
			$query .= "title = '" . $this->CheckString($_post->getTitle()) . "', ";
			$query .= "currency = '" . $this->CheckString($_post->getCurrency()) . "', ";
			$query .= "pricetext = '" . $this->CheckString($_post->getPriceText()) . "', ";
			$query .= "price = " . $_post->getPrice() . ",  ";
			$query .= "retailpricetext = '" . $this->CheckString($_post->getRetailPriceText()) . "', ";
			$query .= "retailprice = " . $_post->getRetailPrice() . ",  ";
			$query .= "salepricetext = '" . $this->CheckString($_post->getSalePriceText()) . "', ";
			$query .= "saleprice = " . $_post->getSalePrice() . ",  ";
			$query .= "detailtext = '" . $this->CheckString($_post->getDetailText()) . "', ";
			$query .= "lastupdatedate = " . $this->CheckDate($_post->getLastUpdateDate()) . ", ";
			$query .= "isactive = " . $_post->getIsActive() . " , ";
			$query .= "featuredproduct = " . $_post->getFeaturedProduct() . " , ";
			$query .= "isapproved = " . $_post->getIsApproved() . " , ";
			$query .= "enablecomments = " . $_post->getEnableComments() . " , ";
			$query .= "lastupdateby = " . $_post->getLastUpdateBy() . ",  ";
			$query .= "posturl = '" . $this->CheckString($_post->getPostURL()) . "', ";
			$query .= "scrapeerror = " . $_post->getScrapeError() . " , ";
			$query .= "itemgender = '" . $this->CheckString($_post->getItemGender()) . "', ";
			$query .= "itemsize = '" . $this->CheckString($_post->getItemSize()) . "', ";
			$query .= "itemagegroup = '" . $this->CheckString($_post->getItemAgeGroup()) . "', ";
			$query .= "sku = '" . $this->CheckString($_post->getSKU()) . "', ";
			$query .= "upc = '" . $this->CheckString($_post->getUPC()) . "', ";
			$query .= "instock = " . $_post->getInStock() . " , ";
			$query .= "hearts = " . $_post->getHearts() . ",  ";
			$query .= "productid = '" . $this->CheckString($_post->getProductID()) . "', ";
			$query .= "rating = '" . $this->CheckString($_post->getRating()) . "'";
			$query .= " where postid = " . $_post->getPostID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SearchPost
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchPost($Title, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$query = "select * from posts";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByUserAndPostID($PostID, $AppUserID)
		{
			$query = "select t1.*, t2.brandname, t2.brandlogo, t3.appuserid as posterappuserid, t3.firstname as username, t3.profileimage as 
			userprofileimage, (select categoryname from categories where categoryid = t1.subcategoryid) as categoryname, (select userpostid from userposts where postid=t1.postid and appuserid = " . $AppUserID . ") as clippedbyuser, (select heartid from posthearts where postid = " . $PostID . " and appuserid = " . $AppUserID . ") as heartbyuser from
			posts t1 inner join brands t2 on t1.brandid = t2.brandid inner join appusers t3 on t1.appuserid = t3.appuserid and t1.postid = " . $PostID;
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
			$query = "select * from posts where brandid = '" . $BrandID . "' order by lastupdatedate desc limit 0, 20";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostURL
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByPostURL($PostURL)
		{
			$query = "select * from posts where posturl = '" . $PostURL . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateClips
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateClips($_post)
		{
			$query = "update posts set ";
			$query .= "clips = " . $_post->getClips() . " ";
			$query .= " where postid = " . $_post->getPostID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SearchUserPost
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchUserPost($AppUserID, $Title, $PriceText, $ItemGender, $ItemSize, $ItemAgeGroup, $CategoryName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$where = FALSE;
			$query = "select t1.*, t2.brandname, t2.brandlogo, t3.appuserid as posterappuserid, t3.firstname as username, t3.profileimage as 
			userprofileimage, (select categoryname from categories where categoryid = t1.subcategoryid) as categoryname, (select userpostid from userposts where postid=t1.postid and appuserid = " . $AppUserID . ") as clippedbyuser, (select heartid from posthearts where postid = t1.postid and appuserid = " . $AppUserID . ") as heartbyuser from
			posts t1 inner join brands t2 on t1.brandid = t2.brandid inner join appusers t3 on t1.appuserid = t3.appuserid 
			left outer join userpostweights t5 on t1.postid = t5.postid and t5.userid = " . $AppUserID;  
			
			//add the filters
			if (strlen($Title) > 0){
				$query .= " where (t1.title like '%" . $Title . "%' or t1.detailtext like '%" .$Title . "%') ";
				$where = TRUE;
			}
			if (strlen($ItemGender) > 0){
				if (!$where){
					$query .= " where (t1.itemgender like '%" . $ItemGender . "%') ";
					$where = TRUE;
				}
				else {
					$query .= " and (t1.itemgender like '%" . $ItemGender . "%') ";
				}
			}
			if (strlen($CategoryName) > 0){
				if (!$where){
					$query .= " where (t1.subcategoryid in (select categoryid from categories where categoryname like '%" . $CategoryName . "%'))";
					$where = TRUE;
				}
				else {
					$query .= " and (t1.subcategoryid in (select categoryid from categories where categoryname like '%" . $CategoryName . "%'))";
				}
			}
			if (strlen($ItemSize) > 0){
				if (!$where){
					$query .= " where exists (select * from postsizes t4, sizes t6 where t6.sizeid =t4.sizeid and t1.postid = t4.postid and t6.sizename like '%" . $ItemSize . "%')";
					$where = TRUE;
				}
				else {
					$query .= " and exists (select * from postsizes t4, sizes t6 where t6.sizeid =t4.sizeid and t1.postid = t4.postid and t6.sizename like '%" . $ItemSize . "%')";
				}
			}
			if (strlen($PriceText) > 0){
				$priceRange = explode('-', $PriceText);
				if (!$where){
					$query .= " where (t1.price >= " . $priceRange[0] . " and t1.price <= " . $priceRange[1] . ") ";
					$where = TRUE;
				}
				else {
					$query .= " and (t1.price >= " . $priceRange[0] . " and t1.price <= " . $priceRange[1] . ") ";
				}
			}
			$query .= " order by t5.weight desc";
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
			$query = "select t1.* from posts t1 inner join userposts t2 on t1.postid = t2.postid and t2.appuserid = '" . $AppUserID . "' order by t2.createdate desc limit 0, 20";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectBySubCategoryID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectBySubCategoryID($SubCategoryID)
		{
			$query = "select * from posts where subcategoryid = '" . $SubCategoryID . "' order by createdate desc limit 0, 20";
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
			$query = "select t1.* from posts t1 where t1.postid = " . $PostID;
			return $query;
		}
		
		///*****************************************************************
		///<summary>
		///Method Name: SelectByUserFollowers
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByUserFollowers($AppUserID)
		{
			$query = "select * from posts inner join userposts on posts.postid = userposts.postid 
					where userposts.appuserid in 
					(select heartedbyappuserid from userhearts where appuserid = " . $AppUserID . ") group by posts.postid order by userposts.createdate desc limit 0, 20";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByUserFollowing
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByUserFollowing($AppUserID)
		{
			$query = "select * from posts inner join userposts on posts.postid = userposts.postid 
					where userposts.appuserid in 
					(select appuserid from userhearts where heartedbyappuserid = " . $AppUserID . ") group by posts.postid order by userposts.createdate desc limit 0, 20";
			return $query;
		}
		///*****************************************************************
		///<summary>
		///Method Name: UpdateHearts
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateHearts($_post)
		{
			$query = "update posts set ";
			$query .= "hearts = " . $_post->getHearts() . " ";
			$query .= " where postid = " . $_post->getPostID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateBuys
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateBuys($_post)
		{
			$query = "update posts set ";
			$query .= "buys = " . $_post->getBuys() . " ";
			$query .= " where postid = " . $_post->getPostID();
			return $query;
		}
		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandIDAndAppUserID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandIDAndAppUserID($AppUserID, $BrandID, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$query = "select t1.*, t2.brandname, t2.brandlogo, t3.appuserid as posterappuserid, t3.firstname as username, t3.profileimage as 
			userprofileimage, (select categoryname from categories where categoryid = t1.subcategoryid) as categoryname, (select userpostid from userposts where postid=t1.postid and appuserid = " . $AppUserID . ") as clippedbyuser, (select heartid from posthearts where postid = t1.postid and appuserid = " . $AppUserID . ") as heartbyuser from
			posts t1 inner join brands t2 on t1.brandid = t2.brandid inner join appusers t3 on t1.appuserid = t3.appuserid 
			left outer join userpostweights t4 on t1.postid = t4.postid and t4.userid = " . $AppUserID . " where t1.brandid = " . $BrandID . " order by t4.weight desc";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserIDAndPosterAppUserID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserIDAndPosterAppUserID($AppUserID, $PosterAppUserID, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$query = "select t1.*, t2.brandname, t2.brandlogo, t3.appuserid as posterappuserid, t3.firstname as username, t3.profileimage as 
			userprofileimage, (select categoryname from categories where categoryid = t1.subcategoryid) as categoryname, (select userpostid from userposts where postid=t1.postid and appuserid = " . $AppUserID . ") as clippedbyuser, (select heartid from posthearts where postid = t1.postid and appuserid = " . $AppUserID . ") as heartbyuser from
			posts t1 inner join brands t2 on t1.brandid = t2.brandid inner join appusers t3 on t1.appuserid = t3.appuserid inner join userposts t5 on t1.postid = t5.postid and t5.appuserid = " . $PosterAppUserID . " 
			left outer join userpostweights t4 on t1.postid = t4.postid and t4.userid = " . $AppUserID . "  order by t4.weight desc";
			return $query;
		}
	}
?>
