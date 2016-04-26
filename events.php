<!DOCTYPE html>
<html lang="en">

<?php require "php/sql.php"; ?>
<?php include "php/calendar.php"; ?>
<?php require "header.php"; ?>

<body id="page-top" class="index">
	
	<?php require "nav.php"; ?>
    
    <!-- Page Header -->
	<!-- Set your background image for this header on the line below. -->
	<!-- 	<header class="intro-header" style="background-image: url('img/group.jpg'); background-position-x: 50%; background-position-y: 30%; min-height: 550px;"> -->
	<!-- 		<div class="container"> -->
	<!-- 			<div class="row"> -->
	<!-- 				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"> -->
	<!-- 					<div class="site-heading"> -->
	<!-- 						<h1>So Happy It's Tuesday</h1> -->
	<!-- 						<h3>Hash House Harriers</h3> -->
	<!-- 					</div> -->
	<!-- 				</div> -->
	<!-- 			</div> -->
	<!-- 		</div> -->
	<!-- 	</header> -->
    
    <?php
    // defaults
    $nextWeek ['image'] = "beer.jpg";
    $nextWeek ['id'] = "XXX";
    $nextWeek ['number'] = "TBD";
    $nextWeek ['title'] = "TBD";
    $nextWeek ['hares'] = "TBD";
    $nextWeek ['location'] = "TBD";
    $nextWeek ['date'] = "TBD";
    $nextWeek ['description'] = "TBD";
    $nextWeek ['address'] = "TBD";
    $nextWeek ['directions'] = "TBD";
    $nextWeek ['ononon'] = "TBD";
    $nextWeek ['notes'] = "TBD";
    $nextWeek ['map'] = "TBD";
    
    // check for our image
    $sql = 'SELECT IMG FROM shit_trails WHERE HASHDATE >= CURRENT_DATE( ) ORDER BY HASHDATE ASC LIMIT 1 ';
    $result = mysqli_query ( $db, $sql );
    if ($row = mysqli_fetch_array ( $result )) {
        if ($row ["IMG"] != "") {
            $nextWeek ['image'] = $row ["IMG"];
        }
    }
    
    // get trail details
    $sql = 'SELECT ID, LOCATION, HASHDATE, TITLE, HARESTR FROM shit_trails WHERE HASHDATE >= CURRENT_DATE( ) ORDER BY HASHDATE ASC LIMIT 1 ';
    $result = mysqli_query ( $db, $sql );
    if ($row = mysqli_fetch_array ( $result )) {
        if ($row ["ID"] != "") {
            $nextWeek ['id'] = $row ["ID"];
            $nextWeek ['number'] = $row ["ID"];
            if ($row ["ID"] > 190) {
                $nextWeek ['number'] --;
            }
        }
        if ($row ["TITLE"] != "") {
            $nextWeek ['title'] = $row ["TITLE"];
        }
        if ($row ["HARESTR"] != "") {
            $nextWeek ['hares'] = $row ["HARESTR"];
        }
        if ($row ["LOCATION"] != "") {
            $nextWeek ['location'] = $row ["LOCATION"];
        }
        if ($row ["HASHDATE"] != "") {
            $date = $row ["HASHDATE"];
            $date = mktime ( 0, 0, 0, substr ( $date, 5, 2 ), substr ( $date, 8, 2 ), substr ( $date, 0, 4 ) );
            $nextWeek ['date'] = date ( 'F j, Y', $date );
        }
    }
    
    // get hare details
    $sql = "SELECT c.HASHNAME FROM shit_hares b, shit_hashers c WHERE b.trl_id = " . $nextWeek ['id'] . " AND b.hshr_id = c.id";
    $result = mysqli_query ( $db, $sql );
    if ($row = mysqli_fetch_array ( $result )) {
        do {
            $hares [] = $row ["HASHNAME"];
        } while ( $row = mysqli_fetch_array ( $result ) );
        $nextWeek ['hares'] = $hares;
    }
    
    // get description
    $sql = 'SELECT TIDBIT, ADDRESS, DIRECTIONS, ONONON, NOTES, MAPLINK FROM shit_directions WHERE TRL_ID = ' . $nextWeek ['id'];
    $result = mysqli_query ( $db, $sql );
    if ($row = mysqli_fetch_array ( $result )) {
        if ($row ["TIDBIT"] != "") {
            $nextWeek ['description'] = $row ["TIDBIT"];
        }
        if ($row ["ADDRESS"] != "") {
            $nextWeek ['address'] = $row ["ADDRESS"];
        }
        if ($row ["DIRECTIONS"] != "") {
            $nextWeek ['directions'] = $row ["DIRECTIONS"];
        }
        if ($row ["ONONON"] != "") {
            $nextWeek ['ononon'] = $row ["ONONON"];
        }
        if ($row ["NOTES"] != "") {
            $nextWeek ['notes'] = $row ["NOTES"];
        }
        if ($row ["MAPLINK"] != "") {
            $nextWeek ['map'] = $row ["MAPLINK"];
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
				<a href="#nextweektrailmodal" class="portfolio-link"
					data-toggle="modal">
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
								<div style='float: left; max-width: 300px;'>
									<img src='img/<?php echo $nextWeek['image']; ?>' />
								</div>
                        	<?php echo $nextWeek['description']; ?>
                        </div>
					
					</div>
				</a>
			</div>
		</div>
	</section>

	<!-- Announcements Section -->
	<section class="success" id="announcements">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Announcements</h2>
					<hr class="star-light">
					<div class='text-left'>
						<ul>
                            <?php
                            $sql = "SELECT * FROM shit_announcements WHERE DATE(FROMDATE) <= CURDATE() AND DATE(TODATE) >= CURDATE();";
                            $result = mysqli_query ( $db, $sql );
                            while ( $row = mysqli_fetch_array ( $result ) ) {
                                echo "			<li><a href='#announcement" . $row ["ID"] . "' class='portfolio-link' data-toggle='modal'>\n";
                                echo $row ["TITLE"] . "\n";
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
	<section id="events">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Events</h2>
					<hr class="star-primary">
					<div class='text-left'>
						<div id='event-calendar' style='color: black'></div>
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
					<div class="rl"></div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="modal-body">
							<h2>Trail <?php echo $nextWeek['number']; ?>: <?php echo $nextWeek['title']; ?></h2>
							<hr class="star-primary">
							<h4>Hares: <?php echo implode(", ", $nextWeek['hares']); ?></h4>
							<ul class="list-inline item-details">
								<li><b>Location</b>: <?php echo $nextWeek['location']; ?></li>
								<li><b>Date</b>: <?php echo $nextWeek['date']; ?></li>
								<li><b>Time</b>: 7:00 PM</li>
							</ul>
							<div class='text-left'>
								<p>
									<b>Description</b>: <?php echo $nextWeek['description']; ?></p>
								<p>
									<b>Start Address</b>: <a href='<?php echo $nextWeek['map']; ?>'
										target='_blank'><?php echo $nextWeek['address']; ?></a>
								</p>
								<p>
									<b>D'erections</b>: <?php echo $nextWeek['directions']; ?></p>
								<p>
									<b>OnOnOn Address</b>: <a
										href='<?php echo $nextWeek['map']; ?>' target='_blank'><?php echo $nextWeek['ononon']; ?></a>
								</p>
								<p>
									<b>Notes</b>: <?php echo $nextWeek['notes']; ?></p>
							</div>
							<hr>
							<button type="button" class="btn btn-default"
								data-dismiss="modal">
								<i class="fa fa-times"></i> Close
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Announcements modal expansion -->
    <?php
    $sql = "SELECT * FROM shit_announcements WHERE DATE(FROMDATE) <= CURDATE() AND DATE(TODATE) >= CURDATE();";
    $result = mysqli_query ( $db, $sql );
    while ( $row = mysqli_fetch_array ( $result ) ) {
        ?>
    <div class="portfolio-modal modal fade"
		id="announcement<?php echo $row["ID"]; ?>" tabindex="-1" role="dialog"
		aria-hidden="true">
		<div class="modal-content">
			<div class="close-modal" data-dismiss="modal">
				<div class="lr">
					<div class="rl"></div>
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
							<button type="button" class="btn btn-default"
								data-dismiss="modal">
								<i class="fa fa-times"></i> Close
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php
    }
    ?>
    
    <!-- Add trail/event modal -->
    <?php
    if (isset ( $_SESSION ['id'] )) {
        ?>
    <div class="portfolio-modal modal fade" id="newEvent" tabindex="-1"
		role="dialog" aria-hidden="true">
		<div class="modal-content">
			<div class="close-modal" data-dismiss="modal">
				<div class="lr">
					<div class="rl"></div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<h2>
							Add <select id='add-what'><option value='e'>Event</option>
								<option value='t'>Trail</option></select>
						</h2>
						<hr />
						<div class="modal-body">
							<h2>
								<span id='trail-title'>Trail <input id='number' type='number'
									value='' />:
								</span><input id='title' type='text' value=''
									placeholder='Title' />
							</h2>
							<hr class="star-primary">
							<h4 id='trail-hares'>
								Hares:
								<div name='hares' id='hares'></div>
								<input type='text' value='' placeholder='Find a hare'
									class='searcher' />
							</h4>
							<ul class="list-inline item-details">
								<li><b>Location</b>: <input id='location' type='text' value='' /></li>
								<li><b>Date</b>: <input id='date' type='date' value='' /></li>
								<li><b>Time</b>: <input id='time' type='time' value='' /></li>
							</ul>
							<ul id='trail-map' class="list-inline item-details">
								<li><b>Map Link</b>: <input id='map' type='text' value='' /></li>
							</ul>
							<div class='text-left'>
								<p>
									<b>Description</b>:
									<textarea id='description'></textarea>
								</p>
								<p>
									<b>Start Address</b>:
									<textarea id='start'></textarea>
								</p>
								<p>
									<b>D'erections</b>:
									<textarea id='directions'></textarea>
								</p>
								<p id='trail-ononon'>
									<b>OnOnOn Address</b>:
									<textarea id='ononon'></textarea>
								</p>
								<p id='trail-notes'>
									<b>Notes</b>:
									<textarea id='notes'></textarea>
								</p>
							</div>
							<hr>
							<button type="button" class="btn btn-default"
								data-dismiss="modal">
								<i class="fa fa-times"></i> Close
							</button>
							<button id='new-event-save' type="button" class="btn btn-default">
								<i class="fa fa-save"></i> Save
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php
    }
    ?>
    
    <!-- View Events From Calendar -->
	<div class="portfolio-modal modal fade" id="viewEventModal"
		tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<div class="close-modal" data-dismiss="modal">
				<div class="lr">
					<div class="rl"></div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="modal-body">
							<h2 id='viewEventTitle'></h2>
							<hr class="star-primary">
							<h4 id='viewEventHares'></h4>
							<ul class="list-inline item-details">
								<li><b>Location</b>: <span id='viewEventLocation'></span></li>
								<li><b>Date</b>: <span id='viewEventDate'></span></li>
								<li><b>Time</b>: <span id='viewEventTime'></span></li>
							</ul>
							<div class='text-left'>
								<p>
									<b>Description</b>: <span id='viewEventDescription'></span>
								</p>
								<p>
									<b>Start Address</b>: <span id='viewEventStart'></span>
								</p>
								<p>
									<b>D'erections</b>: <span id='viewEventDirections'></span>
								</p>
								<p>
									<b>OnOnOn Address</b>: <span id='viewEventOnOnOn'></span>
								</p>
								<p>
									<b>Notes</b>: <span id='viewEventNotes'></span>
								</p>
								<p>
									<input id='viewEventHiddenID' type='hidden' />
								</p>
								<p>
									<input id='viewEventHiddenType' type='hidden' />
								</p>
							</div>
							<hr>
							<button type="button" class="btn btn-default"
								data-dismiss="modal">
								<i class="fa fa-times"></i> Close
							</button>
    <?php
    if (isset ( $_SESSION ['id'] )) {
        ?>
                            <button id='viewEventSave' type="button"
								class="btn btn-default">
								<i class="fa fa-save"></i> Save
							</button>
							<button id='viewEventDelete' type="button"
								class="btn btn-default">
								<i class="fa fa-trash"></i> Delete
							</button>
                            <?php
    }
    ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
	<div class="scroll-top page-scroll visible-xs visible-sm">
		<a class="btn btn-primary" href="#page-top"> <i
			class="fa fa-chevron-up"></i>
		</a>
	</div>
    
    <?php require "footer.php"; ?>
    
    <script
		src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.0/fullcalendar.min.js"></script>
	<link
		href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.0/fullcalendar.min.css"
		rel="stylesheet" type="text/css">
	<script src="js/calendar.js"></script>
	<script src="js/jquery.confirm.min.js"></script>

</body>

<?php mysqli_close($db); ?>

</html>