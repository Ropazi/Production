using System;
using System.Text;
using System.Collections.Generic;
using StandardOil.Apps.Dyaus.Domain;
using StandardOil.Apps.Dyaus.Business;
using StandardOil.Apps.Dyaus.Utils;


namespace StandardOil.Apps.Dyaus.Office.Web.Helpers
{



	///*****************************************************************
	///<summary>
	///Class Name: MenuHelper
	///Description: MenuHelper utils
	///</summary>
	///*****************************************************************

	public class MenuHelper
	{
		private static StringBuilder treeBuilder = new StringBuilder();
		private static string BasePath = "";

        public static string GetMenu(string BasePath, string SessionID)
        {
            UserInfo userInfo = UserInfoManager.GetInstance().GetUserInfo(SessionID);
            StringBuilder sb = new StringBuilder();

            sb.Append("<ul id=\"menulist\">");

            //Customers Tab
            if (userInfo.Authorize("SearchAccounts") || userInfo.Authorize("UserStats") || userInfo.Authorize("OilPriceHistory"))
            {
                if (userInfo.Authorize("SearchAccounts"))
                {
                    sb.Append(GetCustomerMenu(BasePath, "CustomerBillingInfo/SearchCustomerBillingInfo"));
                }
                else if (userInfo.Authorize("UserStats"))
                {
                    sb.Append(GetCustomerMenu(BasePath, "RegUser/UserStats"));
                }
                else if (userInfo.Authorize("OilPriceHistory"))
                {
                    sb.Append(GetCustomerMenu(BasePath, "DailyPrice/OilPriceHistory"));
                }
            }

            //payments tab
            if (userInfo.Authorize("Payments") || userInfo.Authorize("SearchTransactionSummaryInfo"))
            {
                if (userInfo.Authorize("Payments"))
                {
                    sb.Append(GetPaymentMenu(BasePath, "Payment/Payments"));
                }
                else if (userInfo.Authorize("SearchTransactionSummaryInfo"))
                {
                    sb.Append(GetPaymentMenu(BasePath, "TransactionSummaryInfo/SearchTransactionSummaryInfo"));
                }
            }
            //GOPP Tab
            if (userInfo.Authorize("SearchOPEnrollments") || userInfo.Authorize("SearchGOPPOffers") || userInfo.Authorize("SearchContracts") || userInfo.Authorize("SearchOPEnrollStats")
                || userInfo.Authorize("SearchGOPPAllowEarlyRenewal") || userInfo.Authorize("SearchEligibleAccounts") || userInfo.Authorize("OPPriceMismatch")
                || userInfo.Authorize("SearchDiagnostics") || userInfo.Authorize("CreateIVRLetters") || userInfo.Authorize("GallonsCalculator"))
            {
                if (userInfo.Authorize("SearchOPEnrollments"))
                {
                    sb.Append(GetGOPPMenu(BasePath, "OPEnrollment/SearchOPEnrollments"));
                }
                else if (userInfo.Authorize("CreateIVRLetters"))
                {
                    sb.Append(GetGOPPMenu(BasePath, "OPEnrollment/CreateIVRLetters"));
                }
                else if (userInfo.Authorize("SearchGOPPOffers"))
                {
                    sb.Append(GetGOPPMenu(BasePath, "GOPPSpecialOffer/SearchGOPPOffers"));
                }
                else if (userInfo.Authorize("SearchContracts"))
                {
                    sb.Append(GetGOPPMenu(BasePath, "IVRPassCodesContract/SearchContracts"));
                }
                else if (userInfo.Authorize("SearchOPEnrollStats"))
                {
                    sb.Append(GetGOPPMenu(BasePath, "OPEnrollStat/SearchOPEnrollStats"));
                }
                else if (userInfo.Authorize("SearchGOPPAllowEarlyRenewal"))
                {
                    sb.Append(GetGOPPMenu(BasePath, "GOPPAllowEarlyRenewal/SearchGOPPAllowEarlyRenewal"));
                }
                else if (userInfo.Authorize("SearchEligibleAccounts"))
                {
                    sb.Append(GetGOPPMenu(BasePath, "EligibleGOPPReEnrollmentAccount/SearchEligibleAccounts"));
                }
                else if (userInfo.Authorize("OPPriceMismatch"))
                {
                    sb.Append(GetGOPPMenu(BasePath, "OPPriceMismatch/OPPriceMismatch"));
                }
                else if (userInfo.Authorize("SearchDiagnostics"))
                {
                    sb.Append(GetGOPPMenu(BasePath, "FixedPricingPlan/SearchDiagnostics"));
                }
                else if (userInfo.Authorize("GallonsCalculator"))
                {
                    sb.Append(GetGOPPMenu(BasePath, "GallonCalculator/CreateGallonsCalculator"));
                }
            }
            

            //Budget Tab
            if (userInfo.Authorize("BudgetPlanInfos") || userInfo.Authorize("BudgetCalculator"))
            {
                if (userInfo.Authorize("BudgetPlanInfos")) 
                {
                    sb.Append(GetBudgetMenu(BasePath, "BudgetPlanInfo/BudgetPlanInfos"));
                }
                else if (userInfo.Authorize("BudgetCalculator"))
                {
                    sb.Append(GetBudgetMenu(BasePath, "BudgetCalculator/BudgetCalculator"));
                }
            }

            //e-billing tab
            if (userInfo.Authorize("SearchStatementRecordInfo"))
            {
                sb.Append(GetEBillingMenu(BasePath, "StatementRecordInfo/SearchStatementRecordInfo"));
            }

            
            //Tools Tab
            if (userInfo.Authorize("MAMFiles") || userInfo.Authorize("RegUsers") || userInfo.Authorize("RegUsersAlarm") || userInfo.Authorize("RecreateDocuments") || userInfo.Authorize("SearchUserStats"))
            {
                if (userInfo.Authorize("MAMFiles"))
                {
                    sb.Append(GetToolsMenu(BasePath, "Report/MAMFiles"));
                }
                else if (userInfo.Authorize("RegUsers"))
                {
                    sb.Append(GetToolsMenu(BasePath, "RegUser/RegUsers"));
                }
                else if (userInfo.Authorize("RegUsersAlarm"))
                {
                    sb.Append(GetToolsMenu(BasePath, "RegUserAlarm/RegUsers"));
                }
                else if (userInfo.Authorize("RecreateDocuments"))
                {
                    sb.Append(GetToolsMenu(BasePath, "Home/RecreateDocuments"));
                }
                else if (userInfo.Authorize("SearchUserStats"))
                {
                    sb.Append(GetToolsMenu(BasePath, "UserStat/SearchUserStats"));
                }
            }

            /*if (userInfo.Authorize("Management"))
            {
                sb.Append("<li id=\"managementTab\"><a href=\"" + BasePath + "Dashboard/Management\">");
                sb.Append("<img src=\"" + BasePath + "content/images/management.png\" border=\"0\" /><br/>");
                sb.Append("<span style=\"display:block;\">Management</span>");
                sb.Append("</a>");

                sb.Append("</li>");
            }*/

            //Reports Tab
            if (userInfo.Authorize("PlanAnalysisReport") || userInfo.Authorize("PlanUsageReport") || userInfo.Authorize("SearchSynchHistory"))
            {
                if (userInfo.Authorize("PlanAnalysisReport"))
                {
                    sb.Append(GetReportMenu(BasePath, "PlanAnalysis/PlanAnalysisReport"));
                }
                else if (userInfo.Authorize("PlanUsageReport"))
                {
                    sb.Append(GetReportMenu(BasePath, "PlanUsage/PlanUsageReport"));
                }
                else if (userInfo.Authorize("SearchSynchHistory"))
                {
                    sb.Append(GetReportMenu(BasePath, "UploadInfo/SearchSynchHistory"));
                }
            }

            //System Tab
            if (userInfo.Authorize("ConfigParameters") || userInfo.Authorize("ConfigParametersUser") || userInfo.Authorize("BudgetCalculatorSettings") 
                || userInfo.Authorize("HouseSetups") || userInfo.Authorize("DocumentTemplates") || userInfo.Authorize("AuditLogs"))
            {
                if (userInfo.Authorize("ConfigParameters"))
                {
                    sb.Append(GetSystemMenu(BasePath, "ConfigParameter/ConfigParameters"));
                }
                else if (userInfo.Authorize("ConfigParametersUser"))
                {
                    sb.Append(GetSystemMenu(BasePath, "ConfigParameter/SearchConfigParameters"));
                }
                else if (userInfo.Authorize("BudgetCalculatorSettings"))
                {
                    sb.Append(GetSystemMenu(BasePath, "BudgetCalculatorSetting/BudgetCalculatorSettings"));
                }
                else if (userInfo.Authorize("HouseSetups"))
                {
                    sb.Append(GetSystemMenu(BasePath, "HouseSetup/HouseSetups"));
                }
                else if (userInfo.Authorize("DocumentTemplates"))
                {
                    sb.Append(GetSystemMenu(BasePath, "DocumentTemplate/DocumentTemplates"));
                }
                else if (userInfo.Authorize("AuditLogs"))
                {
                    sb.Append(GetSystemMenu(BasePath, "AuditLog/SearchAuditLog"));
                }

            }
	
            sb.Append("</ul>");

            return sb.ToString();
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: 
        ///Description: 
        ///</summary>
        ///*****************************************************************
        private static string GetCustomerMenu(string BasePath, string Link)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("<li id=\"customerTab\"><a href=\"" + BasePath + Link + "\">");
            sb.Append("<img src=\"" + BasePath + "content/images/customers.png\" border=\"0\" /><br/>");
            sb.Append("<span style=\"display:block;\">Customers</span>");
            sb.Append("</a>");

            sb.Append("</li>");
            return sb.ToString();
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: 
        ///Description: 
        ///</summary>
        ///*****************************************************************
        private static string GetPaymentMenu(string BasePath, string Link)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("<li id=\"transactionsTab\"><a href=\"" + BasePath + Link + "\">");
            sb.Append("<img src=\"" + BasePath + "content/images/money.png\" border=\"0\" /><br/>");
            sb.Append("<span style=\"display:block;\">Transactions</span>");
            sb.Append("</a>");
            sb.Append("</li>");
            return sb.ToString();
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: 
        ///Description: 
        ///</summary>
        ///*****************************************************************
        private static string GetEBillingMenu(string BasePath, string Link)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("<li id=\"billingTab\"><a href=\"" + BasePath + Link + "\">");
            sb.Append("<img src=\"" + BasePath + "content/images/invoice.png\" border=\"0\" /><br/>");
            sb.Append("<span style=\"display:block;\">e-Billing</span>");
            sb.Append("</a>");
            sb.Append("</li>");
            return sb.ToString();
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: 
        ///Description: 
        ///</summary>
        ///*****************************************************************
        private static string GetBudgetMenu(string BasePath, string Link)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("<li id=\"budgetTab\"><a href=\"" + BasePath + "BudgetPlanInfo/BudgetPlanInfos\">");
            sb.Append("<img src=\"" + BasePath + "content/images/calculator.png\" border=\"0\" /><br/>");
            sb.Append("<span style=\"display:block;\">Budgets</span>");
            sb.Append("</a>");
            sb.Append("</li>");
            return sb.ToString();
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: 
        ///Description: 
        ///</summary>
        ///*****************************************************************
        private static string GetGOPPMenu(string BasePath, string Link)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("<li id=\"goppTab\"><a href=\"" + BasePath + Link + "\">");
            sb.Append("<img src=\"" + BasePath + "content/images/gopp.png\" border=\"0\" /><br/>");
            sb.Append("<span style=\"display:block;\">GOPP</span>");
            sb.Append("</a>");
            sb.Append("</li>");
            return sb.ToString();
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: 
        ///Description: 
        ///</summary>
        ///*****************************************************************
        private static string GetToolsMenu(string BasePath, string Link)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("<li id=\"toolsTab\"><a href=\"" + BasePath + Link + "\">");
            sb.Append("<img src=\"" + BasePath + "content/images/tools.png\" border=\"0\" /><br/>");
            sb.Append("<span style=\"display:block;\">Tools</span>");
            sb.Append("</a>");

            sb.Append("</li>");
            return sb.ToString();
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: 
        ///Description: 
        ///</summary>
        ///*****************************************************************
        private static string GetReportMenu(string BasePath, string Link)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("<li id=\"reportsTab\"><a href=\"" + BasePath + Link + "\">");
            sb.Append("<img src=\"" + BasePath + "content/images/reports.png\" border=\"0\" /><br/>");
            sb.Append("<span style=\"display:block;\">Reports</span>");
            sb.Append("</a>");

            sb.Append("</li>");
            return sb.ToString();
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: 
        ///Description: 
        ///</summary>
        ///*****************************************************************
        private static string GetSystemMenu(string BasePath, string Link)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("<li id=\"adminTab\"><a href=\"" + BasePath + Link + "\">");
            sb.Append("<img src=\"" + BasePath + "content/images/admin.png\" border=\"0\" /><br/>");
            sb.Append("<span style=\"display:block;\">System</span>");
            sb.Append("</a>");
            sb.Append("</li>");
            return sb.ToString();
        }
	}
}
