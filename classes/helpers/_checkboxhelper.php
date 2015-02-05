using System;


namespace StandardOil.Apps.Dyaus.Office.Web.Helpers
{



	///*****************************************************************
	///<summary>
	///Class Name: CheckBoxHelper
	///Description: CheckBoxHelper Class
	///</summary>
	///*****************************************************************

	public class CheckBoxHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: CheckBox
		///Description: Helper Method
		///</summary>
		///*****************************************************************

		public static string CheckBox(string name, string id, string css, string value, string check)
		{
			return String.Format("<input type=\"checkbox\" name=\"{0}\" id=\"{1}\" class=\"{2}\" value=\"{3}\" {4}/>", name, id, css, value, check);
		}



		///*****************************************************************
		///<summary>
		///Method Name: CheckBox
		///Description: Helper Method
		///</summary>
		///*****************************************************************

		public static string CheckBox(string name, string id, string css, string value, bool check, string script)
		{
            string checkd = "";
            if (check)
            {
                checkd = "checked";
            }
			return String.Format("<input type=\"checkbox\" name=\"{0}\" id=\"{1}\" class=\"{2}\" value=\"{3}\" {4} onclick=\"javascript:{5}\" />", name, id, css, value, checkd, script);
		}
        ///*****************************************************************
        ///<summary>
        ///Method Name: CheckBox
        ///Description: Helper Method
        ///</summary>
        ///*****************************************************************

        public static string CheckBox(string name, string id, string css, string value, bool check, string script, bool disabled)
        {
            string checkd = "";
            string disable = "";
            if (check)
            {
                checkd = "checked";
            }
            if (disabled)
            {
                disable = "disabled=\"disabled\" ";
            }
            return String.Format("<input type=\"checkbox\" " + disable + " name=\"{0}\" id=\"{1}\" class=\"{2}\" value=\"{3}\" {4} onclick=\"javascript:{5}\" />", name, id, css, value, checkd, script);
        }



		///*****************************************************************
		///<summary>
		///Method Name: CheckBox
		///Description: Helper Method
		///</summary>
		///*****************************************************************

		public static string CheckBox(string name, string id, string css, string value, bool check)
		{
			string checkd = "";
			if (check)
			{
				checkd = "checked";
			}
			return String.Format("<input type=\"checkbox\" name=\"{0}\" id=\"{1}\" class=\"{2}\" value=\"{3}\" {4}/>", name, id, css, value, checkd);
		}
        ///*****************************************************************
        ///<summary>
        ///Method Name: CheckBox
        ///Description: Helper Method
        ///</summary>
        ///*****************************************************************

        public static string CheckBox(string name, string id, string css, string value, bool check, bool disabled)
        {
            string checkd = "";
            string disable = "";
            if (check)
            {
                checkd = "checked";
            }
            if (disabled)
            {
                disable = "disabled=\"disabled\" ";
            }
            return String.Format("<input type=\"checkbox\" " + disable + "name=\"{0}\" id=\"{1}\" class=\"{2}\" value=\"{3}\" {4}/>", name, id, css, value, checkd);
        }
	}
}
