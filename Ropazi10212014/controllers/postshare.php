<?php
	include_once("classes/business/postsharebo.php");
	include_once("classes/domain/postshare.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/postsharerequesthelper.php");
	include_once("classes/validators/postsharevalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostShareController
	///Description: ShareController
	///</summary>
	///*****************************************************************

	class PostShareController extends BaseController
	{
		private $_UserInfo;


		///*****************************************************************
		///<summary>
		///Method Name: createpostshare
		///Description: Create Get Method
		///</summary>
		///*****************************************************************

		public function createpostshare()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$postShare = new PostShare();
				$this->model = $postShare;
				ob_start();
				include('views/postshare/_createpostshareedit.php');
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
		///Method Name: createpostshare
		///Description: Create Post Method
		///</summary>
		///*****************************************************************

		public function createpostsharepost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$postShareRequestHelper = new PostShareRequestHelper();
				$postShare = $postShareRequestHelper->AssemblePostShareEditControl();
				$postShareBO = new PostShareBO($this->_UserInfo);
				$postShareValidator = new PostShareValidator();
				$postShareValidator->ValidatePostShareEditControl($postShare, $this->_UserInfo);
				if (!$postShare->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $postShare->getErrors());
				}
				else
				{
					$postShareBO->InsertPostShare($postShare);
					ob_start();
					include('views/postshare/_createpostshareconfirmation.php');
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
