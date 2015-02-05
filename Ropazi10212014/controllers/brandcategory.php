<?php
	include_once("classes/business/brandcategorybo.php");
	include_once("classes/domain/brandcategory.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/brandcategoryrequesthelper.php");
	include_once("classes/validators/brandcategoryvalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandCategoryController
	///Description: CategoryController
	///</summary>
	///*****************************************************************

	class BrandCategoryController extends BaseController
	{
		private $_UserInfo;


		///*****************************************************************
		///<summary>
		///Method Name: brandcategories
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function brandcategories()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "brandcategories";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputRedirect(Constants::$ADMINLOGIN);
				}
				$commandObject = new CommandObject();
				$commandObject->SetParameter("PageSize", 20);
				$commandObject->SetParameter("PageIndex", 0);
				$commandObject->SetParameter("SortExpression", "CategoryName");
				$commandObject->SetParameter("SortDirection", "ASC");
				$brandCategoryBO = new BrandCategoryBO($this->_UserInfo);
				$paginatedlist = $brandCategoryBO->SearchBrandCategory("","CategoryName", "ASC", 20, 0);
				$paginatedlist->SetRequestState("ContextName", "brandcategories");
				$paginatedlist->SetRequestState("ModalIndex", "3");
				$paginatedlist->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedlist->getRequestStateDictionary()));
				$paginatedlist->SetRequestState("UpdateTarget", "brandcategory/updatebrandcategoryget");
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

		public function brandcategoriespost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "brandcategories";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$commandObject = new CommandObject();
				$commandObject->setParameter("Name", $_POST["brandcategories_txtName"]);
				$commandObject->setParameter("SortExpression", $_POST["brandcategories_hdnSortExpression"]);
				$commandObject->setParameter("SortDirection", $_POST["brandcategories_hdnSortDirection"]);
				$commandObject->setParameter("PageSize", $_POST["brandcategories_txtPageSize"]);
				$commandObject->setParameter("PageIndex", $_POST["brandcategories_hdnPageIndex"]);
				$commandObjectRequest = new CommandObject();
				$commandObjectRequest->DeSerialize(RequestStateHelper::GetRequestState("CommandObject", $_POST["rstate"]));
				if ($this->IsCommandObjectDirty($commandObjectRequest, $commandObject))
				{
					$commandObject->setParameter("PageIndex", "0");
				}
				$brandCategoryBO = new BrandCategoryBO($this->_UserInfo);
				$paginatedList = $brandCategoryBO->SearchBrandCategory($commandObject->getParameter("Name"), $commandObject->getParameter("SortExpression"), $commandObject->getParameter("SortDirection"),$commandObject->getParameter("PageSize"),$commandObject->getParameter("PageIndex"));
				$paginatedList->SetRequestState("ContextName", "brandcategories");
				$paginatedList->SetRequestState("ModalIndex", "3");
				$paginatedList->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedList->getRequestStateDictionary()));
				$paginatedList->SetRequestState("UpdateTarget", "brandcategory/Updatebrandcategorie");
				$this->model = $paginatedList;
				ob_start();
				include('views/brandcategory/_brandcategoryselectioncontrol.php');
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
		///Method Name: brandcategories
		///Description: Create Get Method
		///</summary>
		///*****************************************************************

		public function createbrandcategory()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "brandcategories";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$brandCategory = new BrandCategory();
				$this->model = $brandCategory;
				ob_start();
				include('views/brandcategory/_brandcategoriesedit.php');
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
		///Method Name: brandcategories
		///Description: Update Get Method
		///</summary>
		///*****************************************************************

		public function updatebrandcategoryget()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "brandcategories";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$BrandCategoryID = 0;
				if(isset($_POST["rstate"]) && !empty($_POST["rstate"]))
				{
					$BrandCategoryID = RequestStateHelper::GetRequestState("BrandCategoryID", $_POST["rstate"]);
				}
				$brandCategoryBO = new BrandCategoryBO($this->_UserInfo);
				$_BrandCategory = $brandCategoryBO->SelectByBrandCategoryID($BrandCategoryID);
				$_BrandCategory->setBrandCategoryID($BrandCategoryID);
				$_BrandCategory->setRequestStateDictionary(RequestStateHelper::SetRequestState("BrandCategoryID", $_BrandCategory->getBrandCategoryID(), $_BrandCategory->getRequestStateDictionary()));
				$_BrandCategory->SetRequestState("ContextName", "brandcategories");
				$this->model = $_BrandCategory;
				ob_start();
				include('views/brandcategory/_brandcategoriesedit.php');
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
		///Method Name: brandcategories
		///Description: CreateUpdate Post Method
		///</summary>
		///*****************************************************************

		public function createupdatebrandcategory()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "brandcategories";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$brandCategoryRequestHelper = new BrandCategoryRequestHelper();
				$brandCategory = $brandCategoryRequestHelper->AssembleBrandCategoryEditControl();
				$BrandCategoryID = 0;
				if(isset($_GET["rstate"]) && !empty($_GET["rstate"]))
				{
					$BrandCategoryID = RequestStateHelper::GetRequestState("BrandCategoryID", $_GET["rstate"]);
				}
				$_BrandCategory->setBrandCategoryID($BrandCategoryID);
				$_BrandCategory->setRequestStateDictionary(RequestStateHelper::SetRequestState("BrandCategoryID", $_BrandCategory->getBrandCategoryID(), $_BrandCategory->getRequestStateDictionary()));
				$brandCategoryBOBO = new BrandCategoryBO($this->_UserInfo);
				$brandCategoryValidator = new BrandCategoryValidator();
				$brandCategoryValidator->ValidateBrandCategoryEditControl($brandCategory, $this->_UserInfo);
				if (!$brandCategory->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $brandCategory->getErrors());
				}
				else
				{
					if ($brandCategoryBO->getBrandCategoryID() > 0)
					{
						$brandCategoryBOBO->UpdateBrandCategory($brandCategoryBO);
					}
					if ($brandCategoryBO->getBrandCategoryID() == 0)
					{
						$brandCategoryBOBO->InsertBrandCategory($brandCategoryBO);
					}
					$brandCategoryBO->setPageMessage("Record Updated Successfully!");
					$brandCategoryBO->setRequestState("ContextName", "brandcategories");
					ob_start();
					include('views/brandcategory/_brandcategoriesconfirmation.php');
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


	}
?>
