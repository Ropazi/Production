<?php
	include_once("classes/business/brandheartbo.php");
	include_once("classes/domain/brandheart.php");
	include_once("classes/domain/commandobject.php");
	include_once("classes/request/brandheartrequesthelper.php");
	include_once("classes/validators/brandheartvalidator.php");
	include_once("classes/helpers/requeststatehelper.php");
	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandHeartController
	///Description: BrandsController
	///</summary>
	///*****************************************************************

	class BrandHeartController extends BaseController
	{
		private $_UserInfo;


		


		///*****************************************************************
		///<summary>
		///Method Name: createbrandheart
		///Description: Create Post Method
		///</summary>
		///*****************************************************************

		public function createbrandheartpost()
		{
			$logger = Logger::getLogger(__CLASS__);
			try
			{
				$taskCode = "";
				$this->LogAccess($taskCode);
				$brandHeartRequestHelper = new BrandHeartRequestHelper();
				$brandHeart = $brandHeartRequestHelper->AssembleBrandHeartEditControl();
				$brandHeartBO = new BrandHeartBO($this->_UserInfo);
				$brandHeartValidator = new BrandHeartValidator();
				$brandHeartValidator->ValidateBrandHeartEditControl($brandHeart, $this->_UserInfo);
				if (!$brandHeart->getIsValid())
				{
					return $this->view->outputJson(Constants::$VALERROR, "", $brandHeart->getErrors());
				}
				else
				{
					$logger->debug("adding brand heart");
					$userid = CommonUtils::verifyUserCookie();
					$brandHeart->setAppUserID($userid);
					$brandHeart->setCreateDate(new DateTime());
					$brandHeart->setIsValid(1);
					
					$existing = $brandHeartBO->SelectByAppUserAndBrand($brandHeart->getAppUserID(), $brandHeart->getBrandID());
					$more = "/content/images/heart-dark.png";
					if ($existing->getBrandHeartID() > 0) {
						if ($existing->getIsValid() == TRUE){
							$existing->setIsValid(FALSE);
							$existing->setRemoveDate(new DateTime());
							$more = "/content/images/grid-heart.png";
						}
						else {
							$existing->setIsValid(TRUE);
							$existing->setRemoveDate(new DateTime());
						}
						$hearts = $brandHeartBO->UpdateBrandHeart($existing);
						return $this->view->outputJson(Constants::$REFRESHCONTENT, $hearts, "", $more);
					}
					else {
						$hearts = $brandHeartBO->InsertBrandHeart($brandHeart);
						return $this->view->outputJson(Constants::$REFRESHCONTENT, $hearts, "", "/content/images/heart-dark.png");
					}
				}
			}
			catch (Exception $ex)
			{
				$logger->error($ex->getMessage());
			}
		}


	}
?>
