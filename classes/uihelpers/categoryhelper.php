<?php 
	include_once("classes/utils/commonutils.php");
	include_once("classes/domain/category.php");
	include_once("classes/business/categorybo.php");
	include_once("classes/utils/constants.php");
	///*****************************************************************
	///<summary>
	///Class Name: CategoryHelper
	///Description: CategoryHelper utils
	///</summary>
	///*****************************************************************

	class CategoryHelper
	{


		
        
        ///*****************************************************************
        ///<summary>
        ///Method Name: getCategories
        ///Description: getCategories
        ///</summary>
        ///*****************************************************************

        public static function getCategories()
        {
        	$rVal = '<li style="cursor:pointer;" onclick="javascript:$(\'#hdnCategory\').val(\'\');$(\'#displayCategory\').text(\'---\');">---</li>';
        	$categoryBO = new CategoryBO(NULL);
        	$categories = $categoryBO->SelectAllCategory(1);
        	foreach($categories as $category){
        	    //$lcCategory = mb_strtolower($category->getCategoryName());
        		$rVal .= '<li style="cursor:pointer;" onclick="javascript:$(\'#hdnCategory\').val(\'' . $category->getCategoryName() . '\');$(\'#displayCategory\').text(\'' . $category->getCategoryName() . '\');">' .  $category->getCategoryName() . '</li>';
        	}
        	return $rVal;
           
        }
		
	}
?>