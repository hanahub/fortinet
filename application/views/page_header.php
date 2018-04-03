<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
        <?php
        	if ($controller == "addresses") {
        		echo "<i class='fa-icon glyphicon glyphicon-pushpin'></i>";
        	} else if ($controller == "address_groups") {
        		echo "<i class='fa-icon fa fa-group'></i>";
        	} else if ($controller == "fortigates") {
        		echo "<i class='fa-icon fa fa-globe'></i>";
        	} else if ($controller == "locations") {
        		echo "<i class='fa-icon glyphicon glyphicon-map-marker'></i>";
        	} else {
        		echo "<i class='fa-icon fa fa-home'></i>";
        	}

        ?>
            
        </div>
        <div class="media-body">            
            <h4><?= $page_title; ?></h4>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->