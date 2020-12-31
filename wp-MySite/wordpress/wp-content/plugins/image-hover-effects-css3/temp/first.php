
	<div class="main">
		<div class="view view-<?php echo $data['hoverstyle']; ?>">
       		<img src="<?php echo $data['imageurl']; ?>" title="<?php echo $data['imagetitle']; ?>" alt="<?php echo $data['imagealt']; ?>" />
       		<div class="mask">
           		<h2><?php echo $data['captiontitle']; ?></h2>
            	<p><?php echo stripcslashes($data['captiontext']); ?></p>
            	<a href="<?php echo $data['captionlink']; ?>" target="<?php echo $data['captiontarget']; ?>" class="info">Read More</a>
        	</div>
    	</div> 
	</div>