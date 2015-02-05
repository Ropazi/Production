using System;
using System.Text;
using System.Collections.Generic;
using StandardOil.Apps.Dyaus.Business;


namespace StandardOil.Apps.Dyaus.Office.Web.Helpers
{



	///*****************************************************************
	///<summary>
	///Class Name: LinkHelper
	///Description: LinkHelper utils
	///</summary>
	///*****************************************************************

	public class LinkHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: RegisterLink
		///Description: Register Link
		///</summary>
		///*****************************************************************

		public static string RegisterLink(string BasePath)
		{
			string link = "<a href=\"" + BasePath + "AppUser/Register\" onclick=\"javascript:shownew('" + BasePath + "AppUser/Register', 'normaledit', false);return false;\">Click Here</a>";
			return link;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SignInLink
		///Description: Sign In Link
		///</summary>
		///*****************************************************************

		public static string ForgotPasswordSignInLink(string BasePath)
		{
			string link = "Your password has been emailed to you. <a href=\"" + BasePath + "AppUser/SignIn\" onclick=\"javascript:shownew('" + BasePath + "AppUser/SignIn', 'shortedit', false);return false;\">Click Here</a> to Sign In.";
			return link;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UniqueEmailLink
		///Description: Forgot Password Link
		///</summary>
		///*****************************************************************

		public static string UniqueEmailLink(string BasePath)
		{
			string link = "Email already exists. <a href=\"" + BasePath + "AppUser/ForgotPassword\" onclick=\"javascript:shownew('" + BasePath + "AppUser/ForgotPassword', 'shortedit', false);return false;\">Forgot Password?</a>";
			return link;
		}


		///*****************************************************************
		///<summary>
		///Method Name: NotLoggedIn
		///Description: Not Logged In
		///</summary>
		///*****************************************************************

		public static string NotLoggedInLink(string BasePath)
		{
			string link = "<a href=\"" + BasePath + "AppUser/SignIn\" onclick=\"javascript:shownew('" + BasePath + "AppUser/SignIn', 'shortedit', false);return false;\">Sign In</a>, OR ";
			link += "<a href=\"" + BasePath + "AppUser/Register\" onclick=\"javascript:shownew('" + BasePath + "AppUser/Register', 'normaledit', false);return false;\">Register</a>.";
			return link;
		}
        
	}
}
