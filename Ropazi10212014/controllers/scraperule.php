<?php
	include_once("classes/business/scraperulebo.php");
	include_once("classes/domain/scraperule.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/scraperulerequesthelper.php");
	include_once("classes/validators/scraperulevalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: ScrapeRuleController
	///Description: Scrape RulesController
	///</summary>
	///*****************************************************************

	class ScrapeRuleController extends BaseController
	{
		private $_UserInfo;


		///*****************************************************************
		///<summary>
		///Method Name: scraperules
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function scraperules()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "scraperules";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputRedirect(Constants::$ADMINLOGIN);
				}
				$commandObject = new CommandObject();
				$commandObject->SetParameter("PageSize", 20);
				$commandObject->SetParameter("PageIndex", 0);
				$commandObject->SetParameter("SortExpression", "RuleType");
				$commandObject->SetParameter("SortDirection", "ASC");
				$scrapeRuleBO = new ScrapeRuleBO($this->_UserInfo);
				$paginatedlist = $scrapeRuleBO->SearchScrapeRule(0, "","RuleType", "ASC", 20, 0);
				$paginatedlist->SetRequestState("ContextName", "scraperules");
				$paginatedlist->SetRequestState("ModalIndex", "3");
				$paginatedlist->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedlist->getRequestStateDictionary()));
				$paginatedlist->SetRequestState("UpdateTarget", "scraperule/updatescraperuleget");
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

		public function scraperulespost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "scraperules";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$commandObject = new CommandObject();
				$commandObject->setParameter("RuleType", $_POST["scraperules_txtRuleType"]);
				$commandObject->setParameter("SortExpression", $_POST["scraperules_hdnSortExpression"]);
				$commandObject->setParameter("SortDirection", $_POST["scraperules_hdnSortDirection"]);
				$commandObject->setParameter("PageSize", $_POST["scraperules_txtPageSize"]);
				$commandObject->setParameter("PageIndex", $_POST["scraperules_hdnPageIndex"]);
				$commandObjectRequest = new CommandObject();
				$commandObjectRequest->DeSerialize(RequestStateHelper::GetRequestState("CommandObject", $_POST["rstate"]));
				if ($this->IsCommandObjectDirty($commandObjectRequest, $commandObject))
				{
					$commandObject->setParameter("PageIndex", "0");
				}
				$scrapeRuleBO = new ScrapeRuleBO($this->_UserInfo);
				$paginatedList = $scrapeRuleBO->SearchScrapeRule($commandObject->getParameter("BrandID"), $commandObject->getParameter("RuleType"), $commandObject->getParameter("SortExpression"), $commandObject->getParameter("SortDirection"),$commandObject->getParameter("PageSize"),$commandObject->getParameter("PageIndex"));
				$paginatedList->SetRequestState("ContextName", "scraperules");
				$paginatedList->SetRequestState("ModalIndex", "3");
				$paginatedList->setRequestStateDictionary(RequestStateHelper::SetRequestState("CommandObject", $commandObject->Serialize(), $paginatedList->getRequestStateDictionary()));
				$paginatedList->SetRequestState("UpdateTarget", "scraperule/Updatescraperule");
				$this->model = $paginatedList;
				ob_start();
				include('views/scraperule/_scraperuleselectioncontrol.php');
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
		///Method Name: scraperules
		///Description: Create Get Method
		///</summary>
		///*****************************************************************

		public function createscraperule()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "scraperules";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$scrapeRule = new ScrapeRule();
				$this->model = $scrapeRule;
				ob_start();
				include('views/scraperule/_scraperulesedit.php');
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
		///Method Name: scraperules
		///Description: Update Get Method
		///</summary>
		///*****************************************************************

		public function updatescraperuleget()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "scraperules";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$ScrapeRuleID = 0;
				if(isset($_POST["rstate"]) && !empty($_POST["rstate"]))
				{
					$ScrapeRuleID = RequestStateHelper::GetRequestState("ScrapeRuleID", $_POST["rstate"]);
				}
				$scrapeRuleBO = new ScrapeRuleBO($this->_UserInfo);
				$_ScrapeRule = $scrapeRuleBO->SelectByScrapeRuleID($ScrapeRuleID);
				$_ScrapeRule->setScrapeRuleID($ScrapeRuleID);
				$_ScrapeRule->setRequestStateDictionary(RequestStateHelper::SetRequestState("ScrapeRuleID", $_ScrapeRule->getScrapeRuleID(), $_ScrapeRule->getRequestStateDictionary()));
				$_ScrapeRule->SetRequestState("ContextName", "scraperules");
				$this->model = $_ScrapeRule;
				ob_start();
				include('views/scraperule/_scraperulesedit.php');
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
		///Method Name: scraperules
		///Description: CreateUpdate Post Method
		///</summary>
		///*****************************************************************

		public function createupdatescraperule()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "scraperules";
				$this->LogAccess($taskCode);
				$authResult = $this->Authorize($taskCode);
				if ($authResult == "LOGIN")
				{
					return $this->view->outputJson(Constants::$LOGIN, "", "");
				}
				$scrapeRuleRequestHelper = new ScrapeRuleRequestHelper();
				$scrapeRule = $scrapeRuleRequestHelper->AssembleScrapeRuleEditControl();
				$ScrapeRuleID = 0;
				if(isset($_GET["rstate"]) && !empty($_GET["rstate"]))
				{
					$ScrapeRuleID = RequestStateHelper::GetRequestState("ScrapeRuleID", $_GET["rstate"]);
				}
				$_ScrapeRule->setScrapeRuleID($ScrapeRuleID);
				$_ScrapeRule->setRequestStateDictionary(RequestStateHelper::SetRequestState("ScrapeRuleID", $_ScrapeRule->getScrapeRuleID(), $_ScrapeRule->getRequestStateDictionary()));
				$scrapeRuleBOBO = new ScrapeRuleBO($this->_UserInfo);
				$scrapeRuleValidator = new ScrapeRuleValidator();
				$scrapeRuleValidator->ValidateScrapeRuleEditControl($scrapeRule, $this->_UserInfo);
				if (!$scrapeRule->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $scrapeRule->getErrors());
				}
				else
				{
					if ($scrapeRuleBO->getScrapeRuleID() > 0)
					{
						$scrapeRuleBOBO->UpdateScrapeRule($scrapeRuleBO);
					}
					if ($scrapeRuleBO->getScrapeRuleID() == 0)
					{
						$scrapeRuleBOBO->InsertScrapeRule($scrapeRuleBO);
					}
					$scrapeRuleBO->setPageMessage("Record Updated Successfully!");
					$scrapeRuleBO->setRequestState("ContextName", "scraperules");
					ob_start();
					include('views/scraperule/_scraperulesconfirmation.php');
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
