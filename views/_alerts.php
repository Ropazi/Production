

			
                    <div id="right-alert-dropdown" class="dropdown">
                        <div>
                            Alerts</div>
                        <div class="nano" style=" height:207px;">
                            <ul class="nano-content">
                            <?php if ($notifications != NULL and sizeof($notifications) > 0) {?>
                            <?php foreach ($notifications as $notification) { ?>
                            <?php 
                            	if ($notification->getNotificationType() == "CLIP") {
                            ?>
                                <li>
                                	<img alt="" src="/content/images/s-2.png" /><img alt="" src="/content/images/clip.png" />
                                    <img alt="" src="/uploads/thumb_<?php echo $notification->getPostImage() ?>" height="25" width="25" />
                                    
                                </li>
                            <?php } ?>
                            <?php 
                            	if ($notification->getNotificationType() == "POSTHEART") {
                            ?>
                                <li>
                                    <img alt="" src="/content/images/s-5.png" />
                                    <img alt="" src="/content/images/heart_s.png" /><img alt="" src="/uploads/thumb_<?php echo $notification->getPostImage() ?>"  height="25" width="25"/></li>
                            <?php } ?>
                            <?php 
                            	if ($notification->getNotificationType() == "USERHEART") {
                            ?>
                                <li>
                                    <img alt="" src="/content/images/s-5.png" />
                                    <div class="alert-content-3">
                                        <strong><?php echo $notification->getOtherText() ?></strong><br />
                                        started following you</div></li>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>    
                            </ul>
                        </div>
                    </div>
                    <span class="number"><?php echo sizeof($notifications)?></span> 