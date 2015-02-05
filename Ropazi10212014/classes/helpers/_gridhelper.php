using System;


namespace StandardOil.Apps.Dyaus.Office.Web.Helpers
{



	///*****************************************************************
	///<summary>
	///Class Name: GridHelper
	///Description: GridHelper Class
	///</summary>
	///*****************************************************************

	public class GridHelper
	{
		public static string GetSortImage(string SortExpression, string SortDirection, string ColumnExpression, string BasePath)
		{
			if (SortExpression == ColumnExpression)
			{
				if (SortDirection == "ASC")
				{
					return String.Format("<img src=\"" + BasePath + "Content/images/up.png\" alt=\"ASC\" />");
				}
				else
				{
					return String.Format("<img src=\"" + BasePath + "Content/images/down.png\" alt=\"DESC\" />");
				}
			}
			else
			{
				return String.Format("<img src=\"" + BasePath + "Content/images/transparent.gif\" height=\"0\" width=\"0\" alt=\"\" />");
			}
		}
	}
}
