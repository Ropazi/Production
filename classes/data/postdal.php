<?php
	include_once("basedal.php");
	include_once("postsql.php");
	include_once("postassembler.php");
	include_once("classes/domain/post.php");


	///*****************************************************************
	///<summary>
	///Class Name: Post
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class PostDAL extends BaseDAL
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
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertPost($post, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->InsertPost($post);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$post->setPostID($this->mysqli->insert_id);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdatePost($post, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->UpdatePost($post);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Generic
		///</summary>
		///*****************************************************************

		public function SearchPost($Title, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SearchPost($Title, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$postAssembler = new PostAssembler($this->userInfo);
			$list = $postAssembler->AssemblePaginatedList($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByUserAndPostID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByUserAndPostID($PostID, $AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SelectByUserAndPostID($PostID, $AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postAssembler = new PostAssembler($this->userInfo);
				return $postAssembler->AssemblePostDetail($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandID($BrandID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SelectByBrandID($BrandID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postAssembler = new PostAssembler($this->userInfo);
				$posts = $postAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $posts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostURL
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostURL($PostURL, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SelectByPostURL($PostURL);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postAssembler = new PostAssembler($this->userInfo);
				return $postAssembler->AssemblePost($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateClips($post, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->UpdateClips($post);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Generic
		///</summary>
		///*****************************************************************

		public function SearchUserPost($AppUserID, $Title, $PriceText, $ItemGender, $ItemSize, $ItemAgeGroup, $CategoryName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SearchUserPost($AppUserID, $Title, $PriceText, $ItemGender, $ItemSize, $ItemAgeGroup, $CategoryName, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$postAssembler = new PostAssembler($this->userInfo);
			$list = $postAssembler->AssemblePostDetailListPaged($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postAssembler = new PostAssembler($this->userInfo);
				$posts = $postAssembler->AssembleShortPostList($result);
				$this->logger->debug("END");
				return $posts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectBySubCategoryID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectBySubCategoryID($SubCategoryID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SelectBySubCategoryID($SubCategoryID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postAssembler = new PostAssembler($this->userInfo);
				$posts = $postAssembler->AssembleShortPostList($result);
				$this->logger->debug("END");
				return $posts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostID($PostID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SelectByPostID($PostID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postAssembler = new PostAssembler($this->userInfo);
				return $postAssembler->AssemblePost($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByUserFollowers
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByUserFollowers($AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SelectByUserFollowers($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postAssembler = new PostAssembler($this->userInfo);
				$posts = $postAssembler->AssembleShortPostList($result);
				$this->logger->debug("END");
				return $posts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByUserFollowing
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByUserFollowing($AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SelectByUserFollowing($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postAssembler = new PostAssembler($this->userInfo);
				$posts = $postAssembler->AssembleShortPostList($result);
				$this->logger->debug("END");
				return $posts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateHearts($post, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->UpdateHearts($post);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateBuys($post, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->UpdateBuys($post);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Generic
		///</summary>
		///*****************************************************************

		public function SelectByBrandIDAndAppUserID($AppUserID, $BrandID, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SelectByBrandIDAndAppUserID($AppUserID, $BrandID, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$postAssembler = new PostAssembler($this->userInfo);
			$list = $postAssembler->AssemblePostDetailListPaged($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Generic
		///</summary>
		///*****************************************************************

		public function SelectByAppUserIDAndPosterAppUserID($AppUserID, $PosterAppUserID, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$postSQL = new PostSQL($this->userInfo, $this->mysqli);
			$query = $postSQL->SelectByAppUserIDAndPosterAppUserID($AppUserID, $PosterAppUserID, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$postAssembler = new PostAssembler($this->userInfo);
			$list = $postAssembler->AssemblePostDetailListPaged($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}


	}
?>
