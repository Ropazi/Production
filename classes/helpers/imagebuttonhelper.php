<?php

	///*****************************************************************
	///<summary>
	///Class Name: ImageButtonHelper
	///Description: ImageButtonHelper Class
	///</summary>
	///*****************************************************************

	class ImageButtonHelper
	{
		

        public static function Button($name, $type, $context, $title, $imageFile)
        {
            if ($type == "Next")
            {
                return "<img src=\"" . $imageFile . "\" onmouseover=\"javascript:this.className='hand';\" onclick=\"javascript:SetNext('" . $context . "');\" alt=\"" . $title . "\" title=\"" . $title . "\" />";
            }
            
            else if ($type == "Previous")
            {
                return "<img src=\"" . $imageFile . "\" onmouseover=\"javascript:this.className='hand';\" onclick=\"javascript:SetPrev('" . $context . "');\" alt=\"" . $title . "\" title=\"" . $title . "\"  />";
            }
            else if ($type == "First")
            {
                return "<img src=\"" . $imageFile . "\" onmouseover=\"javascript:this.className='hand';\" onclick=\"javascript:SetFirst('" . $context . "');\" alt=\"" . $title . "\" title=\"" . $title . "\"  />";
            }
            else if ($type == "Last")
            {
                return "<img src=\"" . $imageFile . "\" onmouseover=\"javascript:this.className='hand';\" onclick=\"javascript:SetLast('" . $context . "');\" alt=\"" . $title . "\" title=\"" . $title . "\"  />";
            }
            return "";
        }


		public static function Spinner($basePath){
			return "";
		}

		///*****************************************************************
		///<summary>		
		///Method Name: ModalEditButton
		///Description: Edit Button
		///</summary>
		///*****************************************************************
		
		public static function ModalEditButton($BasePath, $Target, $ModalIndex)
		
		{
			$rVal = "<a href=\"" . $BasePath . $Target . "\" class=\"LinkButton\" onclick=\"javascript:showmodal('" . $BasePath . $Target . "', '" . $ModalIndex . "');return false;\" ><img class=\"LinkButton\" src=\"" . $BasePath . "content/images/edit.png\" alt=\"Edit\" title=\"Edit\" /></a>&nbsp;&nbsp;";
			return $rVal;
		
		}
	}
?>
