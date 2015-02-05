<?php
	include_once("classes/business/brandbo.php");
	include_once("classes/domain/brand.php");
	include_once("classes/business/usercatalogbo.php");
	include_once("classes/domain/usercatalog.php");
	include_once("classes/business/postbo.php");
	include_once("classes/domain/post.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/brandrequesthelper.php");
	include_once("classes/validators/brandvalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandController
	///Description: BrandController
	///</summary>
	///*****************************************************************

	class BrandController extends BaseController
	{
		private $_UserInfo;


		///*****************************************************************
		///<summary>
		///Method Name: searchbrands
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function searchbrands()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "searchbrands";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputRedirect(Constants::$ADMINLOGIN);
				}
				$commandObject = new CommandObject();
				$commandObject->SetParameter("PageSize", 20);
				$commandObject->SetParameter("PageIndex", 0);
				$commandObject->SetParameter("SortExpression", "LastUpdateDate");
				$commandObject->SetParameter("SortDirection", "DESC");
				$brandBO = new BrandBO($this->_UserInfo);
				$paginatedlist = $brandBO->SearchBrand("","","LastUpdateDate", "DESC", 20, 0);
				$paginatedlist->SetRequestState("ContextName", "searchbrands");
				$paginatedlist->SetRequestState("ModalIndex", "2");
				$paginatedlist->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedlist->getRequestStateDictionary()));
				$paginatedlist->SetRequestState("UpdateTarget", "brand/updatebrandget");
				return $this->view->output($paginatedlist, "admin");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function searchbrandspost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "searchbrands";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$commandObject = new CommandObject();
				$commandObject->setParameter("BrandName", $_POST["searchbrands_txtBrandName"]);
				$commandObject->setParameter("BrandCode", $_POST["searchbrands_txtBrandCode"]);
				$commandObject->setParameter("SortExpression", $_POST["searchbrands_hdnSortExpression"]);
				$commandObject->setParameter("SortDirection", $_POST["searchbrands_hdnSortDirection"]);
				$commandObject->setParameter("PageSize", $_POST["searchbrands_txtPageSize"]);
				$commandObject->setParameter("PageIndex", $_POST["searchbrands_hdnPageIndex"]);
				$commandObjectRequest = new CommandObject();
				$commandObjectRequest->DeSerialize(RequestStateHelper::GetRequestState("CommandObject", $_POST["rstate"]));
				if ($this->IsCommandObjectDirty($commandObjectRequest, $commandObject))
				{
					$commandObject->setParameter("PageIndex", "0");
				}
				$brandBO = new BrandBO($this->_UserInfo);
				$paginatedList = $brandBO->SearchBrand($commandObject->getParameter("BrandName"), $commandObject->getParameter("BrandCode"), $commandObject->getParameter("SortExpression"), $commandObject->getParameter("SortDirection"),$commandObject->getParameter("PageSize"),$commandObject->getParameter("PageIndex"));
				$paginatedList->SetRequestState("ContextName", "searchbrands");
				$paginatedList->SetRequestState("ModalIndex", "2");
				$paginatedList->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedList->getRequestStateDictionary()));
				$paginatedList->SetRequestState("UpdateTarget", "brand/Updatesearchbrand");
				$this->model = $paginatedList;
				ob_start();
				include('views/brand/_brandselectioncontrol.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: createbrand
		///Description: Create Get Method
		///</summary>
		///*****************************************************************

		public function createbrand()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "createbrand";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$brand = new Brand();
				$this->model = $brand;
				ob_start();
				include('views/brand/_createbrandedit.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: createbrand
		///Description: Create Post Method
		///</summary>
		///*****************************************************************

		public function createbrandpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "createbrand";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$brandRequestHelper = new BrandRequestHelper();
				$brand = $brandRequestHelper->AssembleBrandEditControl();
				$brandBO = new BrandBO($this->_UserInfo);
				$brandValidator = new BrandValidator();
				$brandValidator->ValidateBrandEditControl($brand, $this->_UserInfo);
				if (!$brand->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $brand->getErrors());
				}
				else
				{
					$brandBO->InsertBrand($brand);
					ob_start();
					include('views/brand/_createbrandconfirmation.php');
					$output = ob_get_contents();
					ob_end_clean();
					return $this->view->outputJson(Constants::$REFRESHCONTENT, $output, "");
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: impersonate
		///Description: Create Get Method
		///</summary>
		///*****************************************************************
		
		public function userfollowing()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$appuserid = $_GET["id"];
				$logger->debug("Got app user id::" . $appuserid);
				$appUserBO = new AppUserBO($this->_UserInfo);
				$postBO = new PostBO($this->_UserInfo);
				$appUser = $appUserBO->SelectByAppUserID($appuserid);
				$logger->debug("User email is::" . $appUser->getEmail());
				$appUserID = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$logger->debug("Got user cookie");
					$logger->debug($_COOKIE["ropaziuser"]);
					$appUserID = CommonUtils::verifyUserCookie();
				}
					
				$submodels = array();
				$submodels[] = $appUser;
				$whotofollow = $appUserBO->SelectWhoToFollow($appUserID);
				$logger->debug("Got who to follow " . sizeof($whotofollow));
				$submodels[] = $whotofollow;
					
				$posts = $postBO->SelectByUserFollowing($appuserid);
				$submodels[] = $posts;
					
				$appUsers = $appUserBO->SelectFollowing($appuserid);
				$submodels[] = $appUsers;
					
				$logger->debug("This submodels " . sizeof($submodels));
				$this->view->setSubmodels($submodels);
				return $this->view->output($appUser);
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
				
		}
		///*****************************************************************
		///<summary>
		///Method Name: home
		///Description: Brand Home
		///</summary>
		///*****************************************************************
		
		public function home()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$brandid = $_GET["id"];
				$logger->debug("Got brand id::" . $brandid);
				$appUserID = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$appUserID = CommonUtils::verifyUserCookie();
				}
				$brandBO = new BrandBO($this->_UserInfo);
				$postBO = new PostBO($this->_UserInfo);
				$brand = $brandBO->SelectByBrandIDAndAppUserID($brandid, $appUserID);
				
				
				
				$submodels = array();
				$submodels[] = $brand;
				
				//$posts = $postBO->SelectByBrandIDAndAppUserID($appUserID, $brandid);
				$paginatedlist = $postBO->SelectByBrandIDAndAppUserID($appUserID, $brandid,"Title", "ASC", 20, 0);
				$posts = $paginatedlist->getList();
				$logger->debug("posts::" . sizeof($posts));
				$submodels[] = $posts;
				
				$userCatalogBO = new UserCatalogBO($this->_UserInfo);
				$userCatalogs = $userCatalogBO->SelectByAppUserID($appUserID);
				$submodels[] = $userCatalogs;
			
				$this->view->setSubmodels($submodels);
				return $this->view->output($brand);
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
			
		}
		///*****************************************************************
		///<summary>
		///Method Name: home
		///Description: Brand Home
		///</summary>
		///*****************************************************************
		
		public function homepost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$brandid = $_POST["brandid"];
				$pageIndex = $_POST["txtPageIndex"];
				$logger->debug("Got brand id::" . $brandid);
				$appUserID = 0;
				if (isset($_COOKIE["ropaziuser"])){
					$appUserID = CommonUtils::verifyUserCookie();
				}
				$brandBO = new BrandBO($this->_UserInfo);
				$postBO = new PostBO($this->_UserInfo);
				$brand = $brandBO->SelectByBrandIDAndAppUserID($brandid, $appUserID);
		
		
		
				$submodels = array();
				$submodels[] = $brand;
		
				//$posts = $postBO->SelectByBrandIDAndAppUserID($appUserID, $brandid);
				$paginatedlist = $postBO->SelectByBrandIDAndAppUserID($appUserID, $brandid,"Title", "ASC", 20, $pageIndex);
				
				$this->model = $paginatedlist;
				$posts = $this->model->getList();
				ob_start();
				include('views/post/_postlistcontrol.php');
				$output = ob_get_contents();
				ob_end_clean();
				return $this->view->outputJson(Constants::$OK, $output, "");
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
				
		}


	}
?>
