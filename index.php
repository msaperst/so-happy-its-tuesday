<!DOCTYPE html>
<html lang="en">

<?php require "php/sql.php"; ?>
<?php include "php/calendar.php"; ?>
<?php require "header.php"; ?>

<body id="page-top" class="index">
	
	<?php require "nav.php"; ?>
    
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image:url('img/group.jpg'); background-position-x:50%; background-position-y:30%; min-height:550px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>So Happy It's Tuesday</h1>
                        <h3>Hash House Harriers</h3>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <?php
        //defaults
        $nextWeek['image'] = "beer.jpg";
        $nextWeek['id'] = "XXX";
        $nextWeek['number'] = "TBD";
        $nextWeek['title'] = "TBD";
        $nextWeek['hares'] = "TBD";
        $nextWeek['location'] = "TBD";
        $nextWeek['date'] = "TBD";
        $nextWeek['description'] = "TBD";
        $nextWeek['address'] = "TBD";
        $nextWeek['directions'] = "TBD";
        $nextWeek['ononon'] = "TBD";
        $nextWeek['notes'] = "TBD";
        $nextWeek['map'] = "TBD";
        
        //check for our image
        $sql = 'SELECT IMG FROM shit_trails WHERE HASHDATE >= CURRENT_DATE( ) ORDER BY HASHDATE ASC LIMIT 1 ';
        $result = mysqli_query($db, $sql);
        if ($row = mysqli_fetch_array($result)) {
            if ( $row["IMG"] != "" ) {
                $nextWeek['image'] = $row["IMG"];
            }
        }
        
        //get trail details
        $sql = 'SELECT ID, LOCATION, HASHDATE, TITLE, HARESTR FROM shit_trails WHERE HASHDATE >= CURRENT_DATE( ) ORDER BY HASHDATE ASC LIMIT 1 ';
        $result = mysqli_query($db, $sql);
        if ($row = mysqli_fetch_array($result)) {
            if( $row["ID"] != "" ) {
                $nextWeek['id'] = $row["ID"];
                $nextWeek['number'] = $row["ID"];
                if( $row["ID"] > 190 ) {
                    $nextWeek['number']--;
                }
            }
            if( $row["TITLE"] != "" ) {
                $nextWeek['title'] = $row["TITLE"];
            }
            if( $row["HARESTR"] != "" ) {
                $nextWeek['hares'] = $row["HARESTR"];
            }
            if( $row["LOCATION"] != "" ) {
                $nextWeek['location'] = $row["LOCATION"];
            }
            if( $row["HASHDATE"] != "" ) {
                $date = $row["HASHDATE"];
                $date = mktime(0, 0, 0, substr($date, 5, 2), substr($date, 8, 2), substr($date, 0, 4));
                $nextWeek['date'] = date('F j, Y', $date);
            }
        }

        //get hare details
        $sql = "SELECT c.HASHNAME FROM shit_hares b, shit_hashers c WHERE b.trl_id = ".$nextWeek['id']." AND b.hshr_id = c.id";
        $result = mysqli_query($db, $sql);
        if ($row = mysqli_fetch_array($result)) {
            do {
                $hares[] = $row["HASHNAME"];
            } while ( $row = mysqli_fetch_array($result) );
            $nextWeek['hares'] = $hares;
        }
           
        //get description
        $sql = 'SELECT TIDBIT, ADDRESS, DIRECTIONS, ONONON, NOTES, MAPLINK FROM shit_directions WHERE TRL_ID = '.$nextWeek['id'];
        $result = mysqli_query($db, $sql);
        if ($row = mysqli_fetch_array($result)) {
            if( $row["TIDBIT"] != "" ) {
                $nextWeek['description'] = $row["TIDBIT"];
            }
            if( $row["ADDRESS"] != "" ) {
                $nextWeek['address'] = $row["ADDRESS"];
            }
            if( $row["DIRECTIONS"] != "" ) {
                $nextWeek['directions'] = $row["DIRECTIONS"];
            }
            if( $row["ONONON"] != "" ) {
                $nextWeek['ononon'] = $row["ONONON"];
            }
            if( $row["NOTES"] != "" ) {
                $nextWeek['notes'] = $row["NOTES"];
            }
            if( $row["MAPLINK"] != "" ) {
                $nextWeek['map'] = $row["MAPLINK"];
            }
        }
    ?>
    

    <!-- Next Trail Section -->
    <section id="next-trail">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Next Weeks Trail</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
               	<a href="#nextweektrailmodal" class="portfolio-link" data-toggle="modal">
                    <div class="col-lg-12">
                    	<h3>Trail <?php echo $nextWeek['number']; ?>: <?php echo $nextWeek['title']; ?></h3>
                    	<h4>Hares: <?php echo implode(", ", $nextWeek['hares']); ?></h3>
    	                <div class="col-lg-6">
                    		<h4>Location: <?php echo $nextWeek['location']; ?></h4>
                    	</div>
    	                <div class="col-lg-6">
    	                	<h4>Date: <?php echo $nextWeek['date']; ?></h4>
                    	</div>
                    	<div>
                        	<div style='float:left; max-width:300px;'><img src='img/<?php echo $nextWeek['image']; ?>' /></div>
                        	<?php echo $nextWeek['description']; ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="success" id="welcome">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Welcome</h2>
                    <h4>If your trails aren't live, your Hash ain't S.H.I.T.!</h4>
                    <hr class="star-light">
                    <div class='text-left'>
                        <p>Welcome to the SH*T Hash. Looking for something to do on Tuesday nights? Well, look no further!</p>
    					<p>The S.H.I.T. H3 is one of thousands of social groups that like to run (or walk) and drink beer! We are a "Drinking Club with a Running Problem!" Our goal is to have a good time, meet new people and get a little exercise. For more information about the history of the hash, check out our History page.</p>
    					<p>We meet every Tuesday, rain or shine, at 6:30 and hares are away at 7:00.</p>
    					<p>Bear in mind that hashing is an adult activity, and as such requires that you exhibit the responsibilities implied therein. Underage drinking will not be tolerated, and we will be checking ID's for anyone under 69.  We also do not condone drinking and driving please conduct yourself accordingly.  That being said, if you are of legal age to enjoy fine food, drink, and the company of the greatest people wandering through the woods on any given Tuesday night, please come on out and enjoy!</p>
   					</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Announcements Section -->
    <section id="announcements">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Announcements</h2>
                    <hr class="star-primary">
                    <div class='text-left'>
                    	<ul>
                            <?php
                            	$sql = "SELECT * FROM shit_announcements WHERE DATE(FROMDATE) <= CURDATE() AND DATE(TODATE) >= CURDATE();";
                            	$result = mysqli_query($db, $sql);
                            	while ( $row = mysqli_fetch_array($result) ) {
                            		echo "			<li><a href='#announcement".$row["ID"]."' class='portfolio-link' data-toggle='modal'>\n";
                            		echo                $row["TITLE"]."\n";
                            		echo "</a></li>\n";
                            	}
                            ?>                    	
                    	</ul>
   					</div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Events Section -->
    <section class="success" id="events">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Events</h2>
                    Need to add events in here, and make it more dynamic
                    <hr class="star-light">
                    <div class='text-left'>
                        <h3>April 2016</h3>
                        <?php echo draw_calendar(4,2016); ?>
   					</div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Next week trail modal expansion -->
    <div class="portfolio-modal modal fade" id="nextweektrailmodal" tabindex="-1" role="dialog" aria-hidden="true" style="background-image:url('img/<?php echo $nextWeek['image']; ?>');">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Trail <?php echo $nextWeek['number']; ?>: <?php echo $nextWeek['title']; ?></h2>
                            <hr class="star-primary">
	                    	<h4>Hares: <?php echo implode(", ", $nextWeek['hares']); ?></h3>
	                    	<ul class="list-inline item-details">
	                    		<li><b>Location</b>: <?php echo $nextWeek['location']; ?></li>
	                    		<li><b>Date</b>: <?php echo $nextWeek['date']; ?></li>
	                    	</ul>
	                    	<div class='text-left'>
	                    		<p><b>Description</b>: <?php echo $nextWeek['description']; ?></p>
	                    		<p><b>Address</b>: <a href='<?php echo $nextWeek['map']; ?>' target='_blank'><?php echo $nextWeek['address']; ?></a></p>
	                    		<p><b>D'erections</b>: <?php echo $nextWeek['directions']; ?></p>
	                    		<p><b>OnOnOn</b>: <a href='<?php echo $nextWeek['map']; ?>' target='_blank'><?php echo $nextWeek['ononon']; ?></a></p>
	                    		<p><b>Notes</b>: <?php echo $nextWeek['notes']; ?></p>
	                    	</div>
	                    	<hr>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Announcements modal expansion -->
    <?php
    	$sql = "SELECT * FROM shit_announcements WHERE DATE(FROMDATE) <= CURDATE() AND DATE(TODATE) >= CURDATE();";
    	$result = mysqli_query($db, $sql);
    	while ( $row = mysqli_fetch_array($result) ) {
    ?>
    <div class="portfolio-modal modal fade" id="announcement<?php echo $row["ID"]; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="background-image:url('img/<?php echo $nextWeek['image']; ?>');">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
							<h2><?php echo $row["TITLE"] ?></h2>
                            <hr class="star-primary">
	                    	<div class='text-left'>
	                    		<?php echo $row["DESCRIPTION"]; ?>
	                    	</div>
	                    	<hr>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    	}
    ?>  

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
    
    <?php require "footer.php"; ?>
    
</body>

<?php mysqli_close($db); ?>

</html>
