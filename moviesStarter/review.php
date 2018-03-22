<!DOCTYPE html>
<html>
<head>
    <!-- Ivan Mucyo Ngabo -->
    <title>Movie Reviews</title>
    <meta charset="utf-8" />
    <link href="movies.css" type="text/css" rel="stylesheet" />
</head>

<body>

<?php

include 'functions.php';

$movieFolder = $_GET['movie'];

if ( $movieFolder ) {
	
	$assets = getDir( $movieFolder );
	$info = setInfo( $movieFolder, $assets["info"] );
	$overview = setOverview( $movieFolder, $assets["overview"] );
	$reviews = setReviews( $movieFolder, $assets["reviews"] );
	
	$arrayLength = count($reviews);
	$midElem = $arrayLength%2 == 0 ? $arrayLength/2 : intval($arrayLength/2);
	
}

?>

<div>
		<div class="head-container">
	            
            <div class="head-banner">
                <img src="images/rancidbanner.png" alt="Rancid Tomatoes">
            </div>
            
            <div class="head-title">
                <?php
                	if( isset($movieFolder) ) {
                		
                    	echo "<h1>" . $info[0] . " (" . $info[1] . ")" . "</h1>";
                    	
                	}else {
                		
                		echo "<h1> Movie Unavalable </h1>";
                		
                	}
                ?>
            </div>
            
       </div>

		<div class="content-container">
			<div class="main-container round-border box-shadow grey">
				<div class="review-container left grey">
					<div class="review-header">
						<?php
						    if( $movieFolder ) {
							    $review = $info[2] > 50 ? "fresh" : "rotten";
							    
							    echo "<img src='./images/{$review}large.png' alt='{$review}' /><span>"
							    . $info[2] . "%"
							    ."</span>";
						    }
					    ?>
					</div>
					<div class="review-col left">
						<?php
						
							if( $movieFolder ) {
								
							    $count = 0;
							    
							    while ( $count <= $midElem ) {
							        
							        $review = $reviews[$count];
							        
							        $gifPath = trim(strtolower($review[1]));
							        
	    						        echo "<p class='review'>"
	    						            ."<img class='review-img' src='./images/{$gifPath}.gif' alt='{$review[1]}'/>"
	    						            ."<q>"
	    						            . $review[0]
	    						            ."</q>"
	    						            ."</p>";
	    						            
	    						        echo "<p>"
	    						            ."<img class='review-img' src='./images/critic.gif' alt='Critic' >"
	    						            .$review[2] . "<br>". $review[3]
	    						            ."</p>";
	    						           
							        $count++;
							    }
							    
							}
						?>
					</div>
					<div class="review-col left">
					    <?php
					    if( $movieFolder ) {
					    	
							$count = $midElem + 1;
							    
							    while ( $count <= $midElem*2 ) {
							        
						            $review = $reviews[$count];
							        
							        $gifPath = trim(strtolower($review[1]));
							        
	    						        echo "<p class='review'>"
	    						            ."<img class='review-img' src='./images/{$gifPath}.gif' alt='{$review[1]}'/>"
	    						            ."<q>"
	    						            . $review[0]
	    						            ."</q>"
	    						            ."</p>";
	    						            
	    						        echo "<p>"
	    						            ."<img class='review-img' src='./images/critic.gif' alt='Critic' >"
	    						            .$review[2] . "<br>". $review[3]
	    						            ."</p>";
	    						           
							        $count++;
							    }
							    
					    	}
						  ?>
					</div>
				</div>
			
				<div class="overview-container right grn">
					<div class="overview-img">
					    <?php
					    	if ( $movieFolder ) {
					    		
						    	echo "<img src='{$movieFolder}/overview.png' alt='general overview' />";
						    	
					    	}else {
					    		
					    		echo "<p>No movie selected</p>";
					    		
					       }
						?>
					</div>
					<dl class="overview-text grn">
					    
					    <?php
					       if( $movieFolder ) {
					       	
						       foreach ( $overview as $key=>$data ) {
						           
						           echo "<dt>" . $key . "</dt>";
						           echo "<dd>" . $data . "</dd>";
						       }
						       
					       }else {
					    		
					    		echo "<p>No movie selected</p>";
					    		
					       }
					    ?>
					</dl>
					<div class="grn" style="min-height: 60px"></div>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>