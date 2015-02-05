<?php

	include_once("classes/utils/commonutils.php");
    ///*****************************************************************
    ///<summary>
    ///Class Name: RequestStateHelper
    ///Description: RequestStateHelper utils
    ///</summary>
    ///*****************************************************************

    class RequestStateHelper
    {


        ///*****************************************************************
        ///<summary>
        ///Method Name: GetSecureString
        ///Description: GetSecureString
        ///</summary>
        ///*****************************************************************

        public static function CreateRequestState($name, $value)
        {
        	$link = "";
            if (strpos($name,';') > 0)
            {
                $names = explode(';', $name);
                $vals = explode(';', $value);
                $qstring = "";
                for ($i = 0; $i < count($names); $i++)
                {
                    $qstring .= $names[$i] . ">" . $vals[$i] . ";";
                }
                $qstring = substr($qstring, 0, strlen($qstring) - 1);
                $link = "?rstate=" . urlencode(CommonUtils::EncryptTripleDES($qstring));
            }
            else
            {
                $link = "?rstate=" . urlencode(CommonUtils::EncryptTripleDES($name . ">" . $value));
            }
            return $link;
        }
        
        ///*****************************************************************
        ///<summary>
        ///Method Name: GetRequestState
        ///Description: GetRequestState
        ///</summary>
        ///*****************************************************************

        public static function GetRequestState($name,$RequestState)
        {
        	$logger = Logger::getLogger(__CLASS__);
            if ($RequestState != null && strlen($RequestState) > 0)
            {
                $_RequestState = CommonUtils::DecryptTripleDES($RequestState);
                $logger->debug("Decrypted state::" . $_RequestState);
                $pairs = explode(';', $_RequestState);
                foreach ($pairs as $pair)
                {
                    $keyval = explode('>', $pair);
                    if ($keyval[0] == $name)
                    {
                        return $keyval[1];
                    }

                }
            }
            return "0";
            
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: SetRequestState
        ///Description: SetRequestState
        ///</summary>
        ///*****************************************************************

        public static function SetRequestState($name, $value, $RequestState)
        {
        	$logger = Logger::getLogger(__CLASS__);
        	$logger->debug("Starting Set Req State");
            $_RequestState = "";
            if (array_key_exists("rstate", $RequestState))
            {
                $_RequestState = $RequestState["rstate"];
                if (strlen($_RequestState) > 0)
                {
                	$logger->debug("Has Req State");
                    $_RequestState = CommonUtils::DecryptTripleDES($RequestState["rstate"]);
                    $_RequestState = $_RequestState . ";" + $name . ">" . $value;
                    $RequestState["rstate"] = CommonUtils::EncryptTripleDES($_RequestState);
                }
                else
                {
                	$logger->debug("No Req State");
                    $_RequestState = $name . ">" . $value;
                    $RequestState["rstate"] = CommonUtils::EncryptTripleDES($_RequestState);
                    $logger->debug("set req state to:: " . $RequestState["rstate"]);
                }
            }
            else
            {
            	$logger->debug("No Req State 2");
                $_RequestState = $name . ">" . $value;
                $RequestState["rstate"] = CommonUtils::EncryptTripleDES($_RequestState);
            }
            return $RequestState;

        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: GetFormRequestState
        ///Description: GetFormRequestState
        ///</summary>
        ///*****************************************************************

        public static function GetFormRequestState($RequestState)
        {
            $_RequestState = "";
            if (array_key_exists("rstate", $RequestState))
            {
                $_RequestState = $RequestState["rstate"];
            }
            return "<input type=\"hidden\" id=\"rstate\" name=\"rstate\" value=\"" . $_RequestState . "\" />";

        }

    }
?>
