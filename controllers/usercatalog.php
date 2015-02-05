<?php
	include_once("classes/business/usercatalogbo.php");
	include_once("classes/domain/usercatalog.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/usercatalogrequesthelper.php");
	include_once("classes/validators/usercatalogvalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserCatalogController
	///Description: CatalogsController
	///</summary>
	///*****************************************************************

	class UserCatalogController extends BaseController
	{
		private $_UserInfo;


		///*****************************************************************
		///<summary>
		///Method Name: createuserbuy
		///Description: Create Get Method
		///</summary>
		///*****************************************************************

		public function createuserbuy()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$userCatalog = new UserCatalog();
				$this->model = $userCatalog;
				ob_start();
				include('views/usercatalog/_createuserbuyedit.php');
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
		///Method Name: createuserbuy
		///Description: Create Post Method
		///</summary>
		///*****************************************************************

		public function createuserbuypost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$userCatalogRequestHelper = new UserCatalogRequestHelper();
				$userCatalog = $userCatalogRequestHelper->AssembleUserCatalogEditControl();
				$userCatalogBO = new UserCatalogBO($this->_UserInfo);
				$userCatalogValidator = new UserCatalogValidator();
				$userCatalogValidator->ValidateUserCatalogEditControl($userCatalog, $this->_UserInfo);
				if (!$userCatalog->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $userCatalog->getErrors());
				}
				else
				{
					$userCatalogBO->InsertUserCatalog($userCatalog);
					ob_start();
					include('views/usercatalog/_createuserbuyconfirmation.php');
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
