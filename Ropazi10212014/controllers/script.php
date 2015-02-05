<?php
	
	include_once("classes/business/brandbo.php");
	include_once("classes/domain/brand.php");
	include_once("classes/business/usercatalogbo.php");
	include_once("classes/domain/usercatalog.php");
	include_once("classes/business/scraperulebo.php");
	include_once("classes/domain/scraperule.php");
	include_once("classes/utils/constants.php");

	///*****************************************************************
	///<summary>
	///Class Name: PostController
	///Description: PostController
	///</summary>
	///*****************************************************************

	class ScriptController extends BaseController
	{
		private $_UserInfo;


		///*****************************************************************
		///<summary>
		///Method Name: searchpost
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function bookmarklet()
		{
			$logger = Logger::getLogger(__CLASS__);
			$scrapeRules;
			try
			{
				$domain = "";
				if(isset($_GET["url"]) && !empty($_GET["url"]))
				{
					$domain = parse_url($_GET["url"], PHP_URL_HOST);
				}
				$logger->debug("Domain is::" . $domain);
				if (strlen($domain) > 0){
					$brandBO = new BrandBO($this->_UserInfo);
					$brand = $brandBO->SelectByWebsite($domain);
					$logger->debug("Brand Got::" . $brand->getBrandCode());
					$scrapeRuleBO = new ScrapeRuleBO($this->_UserInfo);
					$scrapeRules = $scrapeRuleBO->SelectByBrandID($brand->getBrandID());
					$logger->debug("Scrape Rules::" . sizeof($scrapeRules));
					$this->model = $scrapeRules;
					$userid = CommonUtils::verifyUserCookie();
					if ($userid > 0){
						$userCatalogBO = new UserCatalogBO($this->_UserInfo);
						$userCatalogs = $userCatalogBO->SelectByAppUserID($userid);
						$logger->debug("Adding usercatalogs::". sizeof($userCatalogs));
						$submodels = array();
						$submodels[] = $userCatalogs;
						$this->view->setSubmodels($submodels);
					}
				}
			}
			catch(Exception $ex){
				
			}
			return $this->view->outputPartial($scrapeRules);
		}
		
		///*****************************************************************
		///<summary>
		///Method Name: searchpost
		///Description: Search Method
		///</summary>
		///*****************************************************************
		
		public function debugbookmarklet()
		{
			$logger = Logger::getLogger(__CLASS__);
			$scrapeRules;
			try
			{
				$domain = "";
				if(isset($_GET["url"]) && !empty($_GET["url"]))
				{
					$domain = parse_url($_GET["url"], PHP_URL_HOST);
				}
				$logger->debug("Domain is::" . $domain);
				if (strlen($domain) > 0){
					$brandBO = new BrandBO($this->_UserInfo);
					$brand = $brandBO->SelectByWebsite($domain);
					$logger->debug("Brand Got::" . $brand->getBrandCode());
					$scrapeRuleBO = new ScrapeRuleBO($this->_UserInfo);
					$scrapeRules = $scrapeRuleBO->SelectByBrandID($brand->getBrandID());
					$logger->debug("Scrape Rules::" . sizeof($scrapeRules));
					$this->model = $scrapeRules;
				}
			}
			catch(Exception $ex){
		
			}
			return $this->view->outputPartial($scrapeRules);
		}

		
	}
?>
