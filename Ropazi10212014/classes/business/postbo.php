<?php
	include_once("classes/domain/userpost.php");
	include_once("classes/data/userpostdal.php");
	include_once("classes/domain/brand.php");
	include_once("classes/data/branddal.php");
	include_once("classes/domain/usercatalog.php");
	include_once("classes/data/usercatalogdal.php");
	include_once("classes/domain/appuser.php");
	include_once("classes/data/appuserdal.php");
	include_once("classes/data/postdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: Post
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class PostBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for PostBO
		///</summary>
		///*****************************************************************

		public function __construct($userinfo)
		{
			$this->_userinfo = $userinfo;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertPost($post)
		{
			$tContext = new AppTransaction();
			$postDAL = new PostDAL($this->_userinfo);
			$userPostDAL = new UserPostDAL($this->_userinfo);
			$appUserDAL = new AppUserDAL($this->_userinfo);
			$brandDAL = new BrandDAL($this->_userinfo);
			$userCatalogDAL = new UserCatalogDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				
				$postDAL->InsertPost($post, $tContext);
				
				$userCatalog = new UserCatalog();
				$userPost = new UserPost();
				$userPost->setPostID($post->getPostID());
				$userPost->setAppUserID($post->getAppUserID());
				$userPost->setCreateDate(new DateTime());
				$userPost->setIsValid(1);
				
				if (strlen($post->getCatalogName()) > 0) {
					$existingUserCatalog = $userCatalogDAL->SelectByName($post->getAppUserID(), $post->getCatalogName(), $tContext);
					if ($existingUserCatalog->getUserCatalogID() > 0) {
						$userPost->setUserCatalogID($existingUserCatalog->getUserCatalogID());
						$existingUserCatalog->setClips($existingUserCatalog->getClips() + 1);
						$userCatalogDAL->UpdateUserCatalog($existingUserCatalog, $tContext);
					}
					else{
						$userCatalog->setCatalogName($post->getCatalogName());
						$userCatalog->setAppUserID($post->getAppUserID());
						$userCatalog->setClips(1);
						$userCatalog->setCreateDate(new DateTime());
						$userCatalogDAL->InsertUserCatalog($userCatalog, $tContext);
						$userPost->setUserCatalogID($userCatalog->getUserCatalogID());
					}
				}
				
				
				$userPostDAL->InsertUserPost($userPost, $tContext);
				$appUser = $appUserDAL->SelectByAppUserID($post->getAppUserID(), $tContext);
				if ($appUser->getClips() > 0){
					$appUser->setClips($appUser->getClips() + 1);
				}
				else {
					$appUser->setClips(1);
				}
				$appUserDAL->UpdateClips($appUser, $tContext);
				
				$brand = $brandDAL->SelectByBrandID($post->getBrandID(), $tContext);
				if ($brand->getClips() > 0){
					$brand->setClips($brand->getClips() + 1);
				}
				else {
					$brand->setClips(1);
				}
				$brandDAL->UpdateClips($brand, $tContext);
				
				
				
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}


		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************
		
		public function UpdatePostClip($post)
		{
			$tContext = new AppTransaction();
			$postDAL = new PostDAL($this->_userinfo);
			$userPostDAL = new UserPostDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$postDAL->UpdateClips($_post, $Context);
				$userPost = new UserPost();
				$userPost->setPostID($post->getPostID());
				$userPost->setAppUserID($post->getAppUserID());
				$userPost->setCreateDate(new DateTime());
				$userPostDAL->InsertUserPost($userPost, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}

		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdatePost($post)
		{
			$tContext = new AppTransaction();
			$postDAL = new PostDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$postDAL->UpdatePost($post, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchPost($Title, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SearchPost($Title, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateClips($post)
		{
			$tContext = new AppTransaction();
			$postDAL = new PostDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$postDAL->UpdateClips($post, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************
		public function SearchUserPost($AppUserID, $Title, $PriceText, $ItemGender, $ItemSize, $ItemAgeGroup, $CategoryName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SearchUserPost($AppUserID, $Title, $PriceText, $ItemGender, $ItemSize, $ItemAgeGroup, $CategoryName, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}
		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************
		public function UpdateHearts($post)
		{
			$tContext = new AppTransaction();
			$postDAL = new PostDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$postDAL->UpdateHearts($post, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************
		public function UpdateBuys($post)
		{
			$tContext = new AppTransaction();
			$postDAL = new PostDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$postDAL->UpdateBuys($post, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************
		public function SelectByBrandIDAndAppUserID($AppUserID, $BrandID, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SelectByBrandIDAndAppUserID($AppUserID, $BrandID, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}
		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************
		public function SelectByAppUserIDAndPosterAppUserID($AppUserID, $PosterAppUserID, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SelectByAppUserIDAndPosterAppUserID($AppUserID, $PosterAppUserID, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}
		///*****************************************************************
		///<summary>
		///Method Name: SelectByUserAndPostID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByUserAndPostID($PostID, $AppUserID)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SelectByUserAndPostID($PostID, $AppUserID, null);
		}


		

		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandID($BrandID)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SelectByBrandID($BrandID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostURL
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostURL($PostURL)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SelectByPostURL($PostURL, null);
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************
		public function SelectByAppUserID($AppUserID)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SelectByAppUserID($AppUserID, null);
		}
		///*****************************************************************
		///<summary>
		///Method Name: SelectBySubCategoryID
		///Description: Select Method
		///</summary>
		///*****************************************************************
		public function SelectBySubCategoryID($SubCategoryID)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SelectBySubCategoryID($SubCategoryID, null);
		}
		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostID
		///Description: Select Method
		///</summary>
		///*****************************************************************
		public function SelectByPostID($PostID)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SelectByPostID($PostID, null);
		}
		///*****************************************************************
		///<summary>
		///Method Name: SelectByUserFollowers
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByUserFollowers($AppUserID)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SelectByUserFollowers($AppUserID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByUserFollowing
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByUserFollowing($AppUserID)
		{
			$postDAL = new PostDAL($this->_userinfo);
			return $postDAL->SelectByUserFollowing($AppUserID, null);
		}






	}
?>
