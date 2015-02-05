<?php 
	include_once("classes/utils/commonutils.php");
	///*****************************************************************
	///<summary>
	///Class Name: EmailTemplateHelper
	///Description: EmailTemplateHelper utils
	///</summary>
	///*****************************************************************

	class EmailTemplateHelper
	{


		
        
        
		///*****************************************************************
		///<summary>
		///Method Name: FillTemplate
		///Description: Fill Template
		///</summary>
		///*****************************************************************

		/*public static EmailTemplate FillExceptionEmailTemplate(string Subject, string Message)
		{
            UserInfo _UserInfo = new UserInfo();
			EmailTemplate emailTemplate = new EmailTemplate();
            ConfigParameterBO _ConfigParameterBO = new ConfigParameterBO(_UserInfo);
            FillCredentials(emailTemplate, _UserInfo);
			emailTemplate.SentFrom = "";
            emailTemplate.SentTo = _ConfigParameterBO.SelectValueByParameterName("DyausErrorEmailTo");
            emailTemplate.Subject = Subject;
			emailTemplate.MessageBody = Message;
			return emailTemplate;
		}*/
        ///*****************************************************************
        ///<summary>
        ///Method Name: FillCredentials
        ///Description: Fill SMTP Credentials for all Templates
        ///</summary>
        ///*****************************************************************

        /*private static void FillCredentials(EmailTemplate _EmailTemplate, UserInfo _UserInfo)
        {
            ConfigParameterBO _ConfigParameterBO = new ConfigParameterBO(_UserInfo);

            _EmailTemplate.SMTPServer = _ConfigParameterBO.SelectValueByParameterName("SMTPServer");
            _EmailTemplate.SMTPAuthRequired = Convert.ToBoolean(_ConfigParameterBO.SelectValueByParameterName("SMTPAuthRequired"));
            _EmailTemplate.SMTPLogin = _ConfigParameterBO.SelectValueByParameterName("SMTPLogin");
            _EmailTemplate.SMTPPassword = _ConfigParameterBO.SelectValueByParameterName("SMTPPassword");
            _EmailTemplate.SMTPPort = Convert.ToInt32(_ConfigParameterBO.SelectValueByParameterName("SMTPPort"));
            _EmailTemplate.SMTPUseSSL = Convert.ToBoolean(_ConfigParameterBO.SelectValueByParameterName("SMTPUseSSL"));
        }*/
        
		///*****************************************************************
		///<summary>
		///Method Name: FormatBody
		///Description: Format Template Body
		///</summary>
		///*****************************************************************

		private static function FormatBody($body, $logo)
		{
            $parsed = ParseTags($body);
            $formattedBody = "";
            
            for ($i = 0; $i < sizeof($parsed); $i++)
            {
                $val = $parsed[i];
                if (CommonUtils::startsWith($val, "_"))
                {
                    $formattedBody .= "</" . str_replace("_", "", $val) . ">";
                }
                else if (CommonUtils::startsWith($val, "html"))
                {
                    $formattedBody .= "<html>";
                }
                else if (CommonUtils::startsWith($val, "body_"))
                {
                    $div = explode("_", $val);
                    $formattedBody .= "<body style=\"" . $div[1] . "\">";
                    if ($logo != null && sizeof($logo) > 0 && $logo != "NA")
                    {
                        $formattedBody .= "<img src=\"" . $logo . "\" /><p/>";
                    }
                }
                else if (CommonUtils::startsWith($val, "body"))
                {
                    $formattedBody .= "<body>";
                    if ($logo != null && sizeof($logo) > 0 && $logo != "NA")
                    {
                        $formattedBody .= "<img src=\"" . $logo . "\" /><p/>";
                    }
                }
                else if (CommonUtils::startsWith($val, "div_"))
                {
                    $div = explode("_", $val);
                    $formattedBody .= "<div style=\"" . $div[1] . "\">";
                }
                else if (CommonUtils::startsWith($val, "img_"))
                {
                    $div = explode("__", $val);
                    $formattedBody .= "<img src=\"" . $div[1] . "\" />";
                }
                else if (CommonUtils::startsWith($val, "hr_"))
                {
                    $div = explode("_", $val);
                    $formattedBody .= "<hr style=\"" . $div[1] . "\" />";
                }
                else if (CommonUtils::startsWith($val, "span_"))
                {
                    $div = explode("_", $val);
                    $formattedBody .= "<span style=\"" . $div[1] . "\">";
                }
                else if (CommonUtils::startsWith($val, "td_"))
                {
                    $div = explode("_", $val);
                    $formattedBody .= "<td style=\"" . $div[1] . "\">";
                }
                else if (CommonUtils::startsWith($val, "a_"))
                {
                    $div = explode("_", $val);
                    $formattedBody .= "<a href=\"" + $div[1] . "\" style=\"" . $div[2] . "\">" . $div[3] . "</a>";
                }
                else if ($val == "b")
                {
                    $formattedBody .= "<b>";
                    $formattedBody .= $parsed[$i + 1];
                    $formattedBody .= "</b>";
                    $i++;
                }
                else if ($val == "p")
                {
                    $formattedBody .= "<p />";
                    $formattedBody .= $parsed[$i + 1];
                    $i++;
                }
                else if ($val == "br")
                {
                    $formattedBody .= "<br />";
                    $formattedBody .= $parsed[$i + 1];
                    $i++;
                }
                else if ($val == "table")
                {
                    $formattedBody .= "<table>";
                }
                else if ($val == "tr")
                {
                    $formattedBody .= "<tr>";
                }
                else if ($val == "i")
                {
                    $formattedBody .= "<i>";
                    $formattedBody .= $parsed[$i + 1];
                    $formattedBody .= "</i>";
                    $i++;
                }
                else if ($val == "u")
                {
                    $formattedBody .= "<u>";
                    $formattedBody .= $parsed[$i + 1];
                    $formattedBody .= "</u>";
                    $i++;
                }
                else if ($val == "a")
                {
                    $formattedBody .= "<a href=\"" + $parsed[$i+1] + "\">";
                    $formattedBody .= $parsed[$i + 1];
                    $formattedBody .= "</a>";
                    $i++;
                }
                else if ($val == "s")
                {
                    $formattedBody .= "*";

                }
                else
                {
                    $formattedBody .= $val;
                }
            }
            return $formattedBody;
		}
        ///*****************************************************************
        ///<summary>
        ///Method Name: 
        ///Description: 
        ///</summary>
        ///*****************************************************************

        private static function ParseTags($inputString)
        {
            $parsed = array();
            $start = 0;
            $end = sizeof($inputString) - 1;
            $counter = 0;
            $chars = str_split($inputString);
            foreach ($chars as $char)
            {
                $counter++;
                if ($char == '*')
                {
                    //tag starts
                    array_push($parsed, substr($inputString, $start, $counter - 1));
                    $start = $start + $counter;
                    $counter = 0;

                }
            }
            array_push($parsed, substr($inputString, $start, ($end - $start) + 1));
            return $parsed;
        }
        
        ///*****************************************************************
        ///<summary>
        ///Method Name: SendMail
        ///Description: Sends Mail out of the application
        ///</summary>
        ///*****************************************************************

        /*public static bool SendEmail(EmailTemplate emailTemplate)
        {
            try
            {
                //emailTemplate.SMTPAuthRequired = false;
                if (emailTemplate.SMTPPort == 0)
                {
                    emailTemplate.SMTPPort = 25;
                }
                string smtpserver = emailTemplate.SMTPServer;
                string from = emailTemplate.SentFrom;
                string to = emailTemplate.SentTo;
                if (smtpserver.Contains("gmail"))
                {
                    to = "";
                    from = "";
                    emailTemplate.CC = "";
                    emailTemplate.BCC = "";
                }
                MailAddress fromAddress = new MailAddress(from);
                string[] toAddresses = to.Split(new char[] { ',' });
                foreach (string toAddress in toAddresses)
                {
                    if (toAddress.Length > 0)
                    {
                        MailAddress mailTo = new MailAddress(toAddress.Trim());
                        var message = new MailMessage(fromAddress, mailTo)
                        {
                            Subject = emailTemplate.Subject,
                            Body = emailTemplate.MessageBody
                        };
                        message.IsBodyHtml = true;
                        if (emailTemplate.CC.Length > 0)
                        {
                            message.CC.Add(new MailAddress(emailTemplate.CC));
                        }
                        if (emailTemplate.BCC.Length > 0)
                        {
                            message.Bcc.Add(new MailAddress(emailTemplate.BCC));
                        }
                        foreach (AppAttachment _AppAttachment in emailTemplate.AppAttachments)
                        {
                            message.Attachments.Add(new Attachment(new MemoryStream(_AppAttachment.Content), _AppAttachment.FileName, _AppAttachment.ContentType));
                        }

                        var client = new SmtpClient(smtpserver);
                        client.EnableSsl = emailTemplate.SMTPUseSSL;
                        if (emailTemplate.SMTPAuthRequired)
                        {
                            client.Credentials = new NetworkCredential(emailTemplate.SMTPLogin, emailTemplate.SMTPPassword);
                        }
                        client.Port = emailTemplate.SMTPPort;
                        client.Send(message);
                    }
                }
                return true;
            }
            catch (Exception e)
            {
                string logFile = AppDomain.CurrentDomain.BaseDirectory + "//Log/errorlog_" + String.Format("{0:MM-dd-yyyy}", DateTime.Today) + ".log";
                StreamWriter sw = new StreamWriter(logFile, true);
                sw.WriteLine("Error Sending Email" + Environment.NewLine + e.Message + Environment.NewLine + e.StackTrace);
                sw.Close();
                return false;
            }
        }*/
	}
?>
