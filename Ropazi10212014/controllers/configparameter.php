<?php
	include_once("classes/business/configparameterbo.php");
	include_once("classes/domain/configparameter.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/configparameterrequesthelper.php");
	include_once("classes/validators/configparametervalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: ConfigParameterController
	///Description: Config SettingsController
	///</summary>
	///*****************************************************************

	class ConfigParameterController extends BaseController
	{
		private $_UserInfo;


		///*****************************************************************
		///<summary>
		///Method Name: configparameters
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function configparameters()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "configparameters";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputRedirect(Constants::$ADMINLOGIN);
				}
				$commandObject = new CommandObject();
				$commandObject->SetParameter("PageSize", 20);
				$commandObject->SetParameter("PageIndex", 0);
				$commandObject->SetParameter("SortExpression", "ParameterName");
				$commandObject->SetParameter("SortDirection", "ASC");
				$configParameterBO = new ConfigParameterBO($this->_UserInfo);
				$paginatedlist = $configParameterBO->SearchConfigParameter("","ParameterName", "ASC", 20, 0);
				$paginatedlist->SetRequestState("ContextName", "configparameters");
				$paginatedlist->SetRequestState("ModalIndex", "3");
				$paginatedlist->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedlist->getRequestStateDictionary()));
				$paginatedlist->SetRequestState("UpdateTarget", "configparameter/updateconfigparameterget");
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

		public function configparameterspost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "configparameters";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$commandObject = new CommandObject();
				$commandObject->setParameter("ParameterName", $_POST["configparameters_txtParameterName"]);
				$commandObject->setParameter("SortExpression", $_POST["configparameters_hdnSortExpression"]);
				$commandObject->setParameter("SortDirection", $_POST["configparameters_hdnSortDirection"]);
				$commandObject->setParameter("PageSize", $_POST["configparameters_txtPageSize"]);
				$commandObject->setParameter("PageIndex", $_POST["configparameters_hdnPageIndex"]);
				$commandObjectRequest = new CommandObject();
				$commandObjectRequest->DeSerialize(RequestStateHelper::GetRequestState("CommandObject", $_POST["rstate"]));
				if ($this->IsCommandObjectDirty($commandObjectRequest, $commandObject))
				{
					$commandObject->setParameter("PageIndex", "0");
				}
				$configParameterBO = new ConfigParameterBO($this->_UserInfo);
				$paginatedList = $configParameterBO->SearchConfigParameter($commandObject->getParameter("ParameterName"), $commandObject->getParameter("SortExpression"), $commandObject->getParameter("SortDirection"),$commandObject->getParameter("PageSize"),$commandObject->getParameter("PageIndex"));
				$paginatedList->SetRequestState("ContextName", "configparameters");
				$paginatedList->SetRequestState("ModalIndex", "3");
				$paginatedList->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedList->getRequestStateDictionary()));
				$paginatedList->SetRequestState("UpdateTarget", "configparameter/Updateconfigparameter");
				$this->model = $paginatedList;
				ob_start();
				include('views/configparameter/_configparameterselectioncontrol.php');
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
		///Method Name: configparameters
		///Description: Create Get Method
		///</summary>
		///*****************************************************************

		public function createconfigparameter()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "configparameters";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$configParameter = new ConfigParameter();
				$this->model = $configParameter;
				ob_start();
				include('views/configparameter/_configparametersedit.php');
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
		///Method Name: configparameters
		///Description: Update Get Method
		///</summary>
		///*****************************************************************

		public function updateconfigparameterget()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "configparameters";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$ParameterID = 0;
				if(isset($_POST["rstate"]) && !empty($_POST["rstate"]))
				{
					$ParameterID = RequestStateHelper::GetRequestState("ParameterID", $_POST["rstate"]);
				}
				$configParameterBO = new ConfigParameterBO($this->_UserInfo);
				$_ConfigParameter = $configParameterBO->SelectByParameterID($ParameterID);
				$_ConfigParameter->setParameterID($ParameterID);
				$_ConfigParameter->setRequestStateDictionary(RequestStateHelper::SetRequestState("ParameterID", $_ConfigParameter->getParameterID(), $_ConfigParameter->getRequestStateDictionary()));
				$_ConfigParameter->SetRequestState("ContextName", "configparameters");
				$this->model = $_ConfigParameter;
				ob_start();
				include('views/configparameter/_configparametersedit.php');
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
		///Method Name: configparameters
		///Description: CreateUpdate Post Method
		///</summary>
		///*****************************************************************

		public function createupdateconfigparameter()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "configparameters";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$configParameterRequestHelper = new ConfigParameterRequestHelper();
				$configParameter = $configParameterRequestHelper->AssembleConfigParameterEditControl();
				$ParameterID = 0;
				if(isset($_GET["rstate"]) && !empty($_GET["rstate"]))
				{
					$ParameterID = RequestStateHelper::GetRequestState("ParameterID", $_GET["rstate"]);
				}
				$_ConfigParameter->setParameterID($ParameterID);
				$_ConfigParameter->setRequestStateDictionary(RequestStateHelper::SetRequestState("ParameterID", $_ConfigParameter->getParameterID(), $_ConfigParameter->getRequestStateDictionary()));
				$configParameterBOBO = new ConfigParameterBO($this->_UserInfo);
				$configParameterValidator = new ConfigParameterValidator();
				$configParameterValidator->ValidateConfigParameterEditControl($configParameter, $this->_UserInfo);
				if (!$configParameter->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $configParameter->getErrors());
				}
				else
				{
					if ($configParameterBO->getParameterID() > 0)
					{
						$configParameterBOBO->UpdateConfigParameter($configParameterBO);
					}
					if ($configParameterBO->getParameterID() == 0)
					{
						$configParameterBOBO->InsertConfigParameter($configParameterBO);
					}
					$configParameterBO->setPageMessage("Record Updated Successfully!");
					$configParameterBO->setRequestState("ContextName", "configparameters");
					ob_start();
					include('views/configparameter/_configparametersconfirmation.php');
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
