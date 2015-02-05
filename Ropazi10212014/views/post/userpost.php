<?php include_once("classes/helpers/webincludes.php");  ?>
<script type="text/javascript">
$(window).scroll(function() {
	  // Modify to adjust trigger point. You may want to add content
	  // a little before the end of the page is reached. You may also want
	  // to make sure you can't retrigger the end of page condition while
	  // content is still loading.
	  if ($(window).scrollTop() == $(document).height() - $(window).height()) {
	    loadMoreContentIndex();
	  }
	});
$(window).load(function() {
	var columns = 4,
    setColumns = function () { columns = $(window).width() > 640 ? 4 : $(window).width() > 320 ? 2 : 1; };

    setColumns();
    $(window).resize(setColumns);

    $('#item-list').masonry(
	{
	    itemSelector: '.item',
	    columnWidth: function (containerWidth) { return containerWidth / columns; }
	});
});



</script>
 <script type="text/javascript">
    guiders.createGuider({
      buttons: [{name: "Let's Go!", onclick: guiders.next},
      			{name: "No, Thanks", onclick: guiders.hideAll}],
      description: "I will take you through a quick demo and show you all the cool stuff we have built for you. You can breeze through this in less than a minute!",
      id: "guider1",
      next: "guider2",
      overlay: true,
      title: "Welcome to Ropazi! Let me give you a quick tour of the website"
    }).show();
    
   guiders.createGuider({
      attachTo: "#banner-line-container",
      buttons: [{name: "Next", onclick: guiders.next},
      			{name: "Close", onclick: guiders.hideAll}],
      description: "The Ropazi filter is a fun way to find things that you're on the lookout for. Play around with the drop-downs and configure it to your liking then click on the check mark icon to the right.",
      id: "guider2",
      next: "guider3",
      position: 5,
      title: "Filter To Your Need",
      width: 300
    });
    
   guiders.createGuider({
      attachTo: "#banner-line-container",
      buttons: [{name: "Next", onclick: guiders.next},
      			{name: "Close", onclick: guiders.hideAll}],
      description: "You can collapse the filter by clicking the 'X' sign",
      id: "guider3",
      next: "guider4",
      position: 7,
      title: "Or Don't Filter And See It All",
      width: 300
    });
    
   guiders.createGuider({
      attachTo: "#search-box",
      buttons: [{name: "Next", onclick: guiders.next},
      			{name: "Close", onclick: guiders.hideAll}],
      description: "If you know exactly what you're looking for you can search for it over here. E.g. 'Plaid shirt'",
      id: "guider4",
      next: "guider5",
      position: 6,
      title: "Or You Can Search for What YOU Want",
      width: 300
    });
    
   guiders.createGuider({
      attachTo: "#overlay-top-part1",
      buttons: [{name: "Next", onclick: guiders.next},
      			{name: "Close", onclick: guiders.hideAll}],
      description: "Hover your mouse over the product image and you'll have options to 'Heart' it or to 'Clip' it to your personal catalogs. You can also click the title of the product to view more details.",
      id: "guider5",
      next: "guider6",
      position: 3,
      title: "Hover Over to See a Surprise!",
      width: 300
    });
    
   guiders.createGuider({
      attachTo: "#brand-img1",
      buttons: [{name: "Next", onclick: guiders.next},
      			{name: "Close", onclick: guiders.hideAll}],
      description: "Click on the brand's icon to view all products by this brand",
      id: "guider6",
      next: "guider7",
      position: 3,
      title: "See What More the Brand has to Offer",
      width: 300
    });
    
   guiders.createGuider({
      attachTo: "#div-price1",
      buttons: [{name: "Next", onclick: guiders.next},
      			{name: "Close", onclick: guiders.hideAll}],
      description: "Hover here to see the Buy button. Clicking the Buy button will take you to this product's page, where you can buy the item directly from the brand's website.",
      id: "guider7",
      next: "guider8",
      position: 3,
      title: "Or Buy the Item",
      width: 300
    });
    
   guiders.createGuider({
      attachTo: "#user-panel1",
      buttons: [{name: "Next", onclick: guiders.next},
      			{name: "Close", onclick: guiders.hideAll}],
      description: "Click here to see all Clippings by this user",
      id: "guider8",
      next: "guider9",
      position: 3,
      title: "You can also Explore What Other Users are Doing on Ropazi",
      width: 300
    });
    
   guiders.createGuider({
      buttons: [{name: "See It Again", onclick: guiders.back},
      			{name: "Close", onclick: guiders.hideAll}],
      description: "Thank you for taking this tour with me. Hope you enjoy your ride on Ropazi :)",
      id: "guider9",
      back: "guider1",
      position: 7,
      title: "Thanks & Enjoy!",
      width: 300
    });
    
    /*guiders.createGuider({
      attachTo: "#clock",
      buttons: [{name: "Exit Guide", onclick: guiders.hideAll},
                {name: "Back"},
                {name: "Continue", onclick: guiders.next}],
      buttonCustomHTML: "<input type=\"checkbox\" id=\"stop_showing\" /><label for=\"stop_showing\" class=\"stopper\">Optional checkbox. (You can add one.)</label>",
      description: "Other aspects of the guider can be customized as well, such as the button names, button onclick handlers, and dialog widths. You'd also want to modify the CSS to your own project's style.",
      id: "guider4",
      next: "guider5",
      position: 7,
      title: "Guiders can be customized.",
      width: 600
    });
    
    guiders.createGuider({
      buttons: [{name: "Next"}],
      description: "Guiders can also be used to introduce of brand new features to existing users. Here is an example of a guider in Gmail. Google's CSS calls this a promo, likely short for promotional box. <br/><br/> <img src=\"promo_gmail.png\" style=\"border: 1px solid #333;\" />",
      id: "guider5",
      next: "guider6",
      overlay: true,
      title: "How else can I use guiders?",
      width: 550
    });

    guiders.createGuider({
      buttons: [{name: "Close", classString: "primary-button"}],
      description: "To get started, have a look at this HTML file, then emulate it for use in your own project. Enjoy!",
      id: "guider6",
      overlay: true,
      title: "Great, so how do I get started?",
      width: 500
    });*/
    </script>
<div class="pageouter">


	<script type="text/javascript">
	$(window).load(function() {
		$('#userpostSearchForm').submit(function (event) {
			event.preventDefault();
			SubmitForm('userpost');
		});
	});
	</script>
	<form id="userpostSearchForm" method="post" action="<?php echo Constants::$BASEPATH ?>post/userpostpost">
		<input type="hidden" id="userpost_hdnSortDirection" name="userpost_hdnSortDirection" value="ASC" />
		<input type="hidden" id="userpost_hdnSortExpression" name="userpost_hdnSortExpression" value="Title" />
		<input type="hidden" id="userpost_hdnSortExpressionDefault" name="userpost_hdnSortExpressionDefault" value="Title" />
		<input type="hidden" id="userpost_hdnTotalPages" name="userpost_hdnTotalPages" value="<?php $this->model->getTotalPages() ?>" />
		<input type="hidden" id="userpost_hdnPageSize" name="userpost_hdnPageSize" value="20" />
		<input type="hidden" id="userpost_txtPageSize" name="userpost_txtPageSize" value="20" />
		<?php echo RequestStateHelper::GetFormRequestState($this->model->getRequestStateDictionary()) ?>
		
		<div id="usercatalog" style="display:none;">
			<?php
				if ($this->submodels != NULL && sizeof($this->submodels)>0){ 
					$userCatalogs = $this->submodels[0];
				} 
				else {
					$userCatalogs = NULL;
				}
			?>
			<?php require("views/usercatalog/_usercatalogeditcontrol.php") ?>
		</div>
		
		<div id="userpost_searchresult">
			<div id="container" class="row">
    			<div id="item-list">
					<?php $posts = $this->model->getList(); ?>
					<?php require("views/post/_postlistcontrol.php") ?>
				</div>
 			</div>
		</div>
	</form>
</div>


<?php
/*$result = json_decode($string, true);
 
// Result: array(2) { ["foo"]=> string(3) "bar" ["cool"]=> string(4) "attr" }
var_dump($result);
 
// Prints "bar"
echo $result['foo'];
 
// Prints "attr"
echo $result['cool'];
*/?>
