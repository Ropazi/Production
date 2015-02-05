<?php include_once("classes/helpers/webincludes.php"); ?>
<div id="container" class="row">
    <div id="item-list">

<?php  $i = 0;?>
<?php foreach ($this->model->getList() as $post) { ?>

        <div class="item">
                <div class="outercontainer">
                    <div class="content-large-image container-position">
                        <div class="overlay-wrapper">
                            <div class="overlay-top-part">
                                <div class="overlay-opacity">
                                </div>
                                <div class="overlay-icons">
                                    <a href="#2">
                                        <img class="content-picture" src="/content/images/overlay-scissor.png" onmouseover="(function(obj){obj.src='/content/images/overlay-scissor-hover.png';})(this);"
                                            onmouseout="(function(obj){obj.src='/content/images/overlay-scissor.png';})(this);" /></a>
                                    <a href="#1">
                                        <img class="content-picture" src="/content/images/overrelay-heart.png" onmouseover="(function(obj){obj.src='/content/images/overrelay-heart-hover.png';})(this);"
                                            onmouseout="(function(obj){obj.src='/content/images/overrelay-heart.png';})(this);" /></a>
                                </div>
								<div class="overlay-item-clip">
									<div class="overlay-item-clip-header large-12 columns">
										<div class="overlay-item-clip-heading large-11 columns">Clip to...</div>
										<div class="overlay-item-clip-close-btn large-1 columns">X</div>
									</div>
									<div class="overlay-item-clip-form large-12 columns">
										<div class="overlay-item-clip-input large-10 columns"><input type="text" style="" placeholder="Catalog Name" /></div>
										<div class="overlay-item-clip-add-btn large-2 columns"><a href="javascript:void(0);">+</a></div>
									</div>
									<div class="overlay-item-clip-options large-12 columns nano" style="height:60%;">
										<ul class="nano-content">
											<li><a href="javascript:void(0);">Outfits for Billy</a></li>
											<li><a href="javascript:void(0);">Billy's Room</a></li>
											<li><a href="javascript:void(0);">Jill’s baby Shower Ideas</a></li>
											<li><a href="javascript:void(0);">I &lt;3 Ralph Lauren Kids</a></li>
											<li><a href="javascript:void(0);">Outfits for Billy</a></li>
											<li><a href="javascript:void(0);">Billy's Room</a></li>
											<li><a href="javascript:void(0);">Jill’s baby Shower Ideas</a></li>
											<li><a href="javascript:void(0);">I &lt;3 Ralph Lauren Kids</a></li>
										</ul>
									</div>
								</div>
                            </div>
                            <div class="overlay-text">
                                One Line <span class="darker-text">Ralph Lauren.</span>
                            </div>
                        </div>
                        <div class="content-image">
                            <img class="content-picture" src="/content/images/content-boy-img.png" />
                        </div>
                    </div>
                    <div class="content-price-panel">
                        <a class="large-8 small-8 columns price-9 no-padding">
                            <div class="padding-inner">
                                <img src="/content/images/content-polo.png" />
                                <span class="price">$29 <span class="buy">Buy</span></span>
                            </div>
                        </a>
                        <div class=" large-4 small-4 columns padding-inner-2 no-padding">
                            <div class="right-imgs-child">
                                <a class="clipping_sci" href="javascript:void(0)"><span>1</span></a> <a class="clipping_heart"
                                    href="javascript:void(0)"><span>0</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="content-clipping-panel">
                        <div class=" large-2 small-4 columns" style="padding-left: 5px;">
                            <img src="/content/images/content-profilepic.png" />
                        </div>
                        <div class="large-10 small-8 columns last-img">
                            <span>Clipped by <strong>Marsha Smith</strong>
                                <br />
                                <span class="bottom-txt">Boys Pants</span></span>
                        </div>
                    </div>
                </div>
            </div>
      
 <?php } ?>
  </div>
       </div>
