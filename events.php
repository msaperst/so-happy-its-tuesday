<!DOCTYPE html>
<html lang="en">

<?php require "php/sql.php"; ?>
<?php require "header.php"; ?>
<?php

define ( 'INTERNAL_FORMAT', 'Y-m-d' );
?>

<link
	href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.0/fullcalendar.min.css"
	rel="stylesheet" type="text/css">
<link href="css/hashers.min.css" rel="stylesheet" type="text/css">
<link href="wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css">


<body id="page-top" class="index">
	
	<?php require "nav.php"; ?>
    
    <?php require "modules/next-trail.php"; ?>

	<!-- Announcements Section -->
	<section class="success" id="announcements">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>News</h2>
					<hr class="star-light">
					<div class='text-left'>
						<ul id='allAnnouncements'>
                            <?php
                            $sql = "SELECT * FROM shit_announcements WHERE DATE(FROMDATE) <= CURDATE() AND DATE(TODATE) >= CURDATE();";
                            $result = mysqli_query ( $db, $sql );
                            while ( $row = mysqli_fetch_array ( $result ) ) {
                                echo "			<li class='loadAnnouncement' announcement='" . $row ["ID"] . "'>\n";
                                echo $row ["TITLE"] . "\n";
                                echo "</li>\n";
                            }
                            ?>          
                    	</ul>
					</div>
					<?php
    if (isset ( $_SESSION ['id'] )) {
        ?>
                    <button href="#newAnnouncementModal"
						data-toggle="modal" type="button" class="btn btn-default">
						<i class="fa fa-add"></i> Add An Announcement
					</button>
                    <?php
    }
    ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Open Dates Section -->
	<section id="open-dates">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Open Trails</h2>
					<hr class="star-primary">
					<div class='text-center' id='available-date'>
						<?php
    $sql = "SELECT * FROM shit_hares JOIN shit_trails ON shit_hares.TRL_ID = shit_trails.ID WHERE shit_hares.HSHR_ID !=  '239' AND shit_trails.HASHDATE >= CURRENT_DATE( ) GROUP BY shit_trails.HASHDATE ORDER BY shit_trails.HASHDATE ASC;";
    $result = mysqli_query ( $db, $sql );
    $claimed_dates = array ();
    $available_dates = array ();
    while ( $row = mysqli_fetch_array ( $result ) ) {
        $claimed_dates [$row ["ID"]] = $row ["HASHDATE"];
    }
    $start_date = date ( INTERNAL_FORMAT );
    foreach ( range ( 0, 120 ) as $day ) {
        $internal_date = date ( INTERNAL_FORMAT, strtotime ( "{$start_date} + {$day} days" ) );
        $this_day = date ( INTERNAL_FORMAT, strtotime ( $internal_date ) );
        $this_month = date ( 'M Y', strtotime ( $internal_date ) );
        if (isTuesday ( $internal_date ) && ! in_array ( $internal_date, $claimed_dates )) {
            $available_dates [$this_month] [] = $this_day;
        }
    }
    if (! empty ( $available_dates )) {
        foreach ( current ( $available_dates ) as $day ) {
            echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-3 text-left'>";
            echo date ( 'F j, Y', strtotime ( $day ) );
            echo "</div><div class='col-sm-3 text-left'>";
            echo "<a class='sign-up' href='javascript:void(0);'>Sign Up To Hare</a>";
            echo "</div><div class='col-sm-3'></div></div>";
        }
    } else {
        echo "<p>Sorry, we're all filled up. Wait until next the next month opens to sign up</p>";
    }
    ?>
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
					<hr class="star-light">
					<div class='text-left'>
						<div id='event-calendar' style='color: black'></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Hare Log Section -->
	<section id="harelog">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Hare Log</h2>
					<hr class="star-primary">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-left">
					<input id='hareLogLookup' class='form-control'
						placeholder='Find A Wanker' />
					<table id='harelog'
						class="table table-striped table-hover table-responsive">
						<thead style='background-color: green;'>
							<tr>
								<th>Hasher</th>
								<th>Count</th>
                	<?php
                if (isset ( $_SESSION ['id'] )) {
                    ?>
                    			<th></th>
                	<?php
                }
                ?>
							</tr>
						</thead>
						<tbody>
                    	<?php
                    $sql = 'SELECT b.id, b.hashname, count(*) as count FROM shit_hares a, shit_hashers b, shit_trails c WHERE a.hshr_id = b.id AND a.trl_id = c.id AND c.hashdate < current_date() GROUP BY b.hashname ORDER BY `count` DESC , b.hashname ASC';
                    $result = mysqli_query ( $db, $sql );
                    while ( $row = mysqli_fetch_array ( $result ) ) {
                        $id = $row ['id'];
                        $hasher = $row ['hashname'];
                        $count = $row ['count'];
                        echo "<tr hasher-id='$id'><td class='hashname'>";
                        echo $hasher;
                        echo "</td><td class='count'>";
                        echo $count;
                        if (isset ( $_SESSION ['id'] )) {
                            echo "</td><td class='buttons'>";
                            echo "<button class='btn btn-xsm btn-warning editHasher' title='Edit Hasher'><i class='fa fa-edit'></i></button>";
                        }
                        echo "</td></tr>";
                    }
                    ?>
                    	</tbody>
					</table>
				</div>
				<div class="col-lg-12 text-center">
                	<?php
                if (isset ( $_SESSION ['id'] )) {
                    ?>
                    <button href="#hasherModal" data-toggle="modal"
						id="addHasher" type="button" class="btn btn-default">
						<i class="fa fa-add"></i> Add Hasher
					</button>
                    <?php
                }
                ?>
                </div>
			</div>
		</div>
	</section>

	<!-- Announcement modal expansion -->
	<div class="portfolio-modal modal fade" id="viewAnnouncementModal"
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
							<h2 id='viewAnnouncementTitle'></h2>
							<hr class="star-primary">
							<ul id='viewAnnouncementToFrom'
								class="list-inline item-details hidden">
								<li><b>Display From</b>: <input id='viewAnnouncementFrom'
									type='date' /></li>
								<li><b>Display To</b>: <input id='viewAnnouncementTo'
									type='date' /></li>
							</ul>
							<p id='viewAnnouncementDescription' class='text-left'></p>
							<p>
								<input id='viewAnnouncementHiddenID' type='hidden' />
							</p>
							<hr>
							<button type="button" class="btn btn-default"
								data-dismiss="modal">
								<i class="fa fa-times"></i> Close
							</button>
							    <?php
        if (isset ( $_SESSION ['id'] )) {
            ?>
                            <button id='viewAnnouncementEdit'
								type="button" class="btn btn-default">
								<i class="fa fa-edit"></i> Edit
							</button>
							<button id='viewAnnouncementSave' type="button"
								class="btn btn-default hidden">
								<i class="fa fa-save"></i> Save
							</button>
							<button id='viewAnnouncementDelete' type="button"
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
								Hares: <span name='hares' id='hares' class='holder'></span>
								<div>
									<input type='text' value='' placeholder='Find a hare'
										class='searcher' />
								</div>
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

	<!-- Add Announcement modal -->
	<div class="portfolio-modal modal fade" id="newAnnouncementModal"
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
							<h2 id='newAnnouncementTitle'>
								<input type='text'>
							</h2>
							<hr class="star-primary">
							<ul id='newAnnouncementToFrom' class="list-inline item-details">
								<li><b>Display From</b>: <input id='newAnnouncementFrom'
									type='date' /></li>
								<li><b>Display To</b>: <input id='newAnnouncementTo' type='date' /></li>
							</ul>
							<div id='newAnnouncementDescription' class='text-left'>
								<textarea></textarea>
							</div>
							<p>
								<input id='newAnnouncementHiddenID' type='hidden' />
							</p>
							<hr>
							<button type="button" class="btn btn-default"
								data-dismiss="modal">
								<i class="fa fa-times"></i> Close
							</button>
							<button id='newAnnouncementSave' type="button"
								class="btn btn-default">
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
							<h4>
								Hares: <span name='viewEventHares' id='viewEventHares'
									class='holder'></span>
								<div class='hidden'>
									<input type='text' value='' placeholder='Find a hare'
										class='searcher' />
								</div>
							</h4>
							<ul id='viewEventDetailsList' class="list-inline item-details">
								<li><b>Location</b>: <span id='viewEventLocation'></span></li>
								<li><b>Date</b>: <span id='viewEventDate'></span></li>
								<li><b>Time</b>: <span id='viewEventTime'></span></li>
							</ul>
							<ul id='viewEventDetailsList2'
								class="list-inline item-details hidden">
								<li><b>Map Link</b>: <span id='viewEventMap'></span></li>
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
                            <button id='viewEventEdit' type="button"
								class="btn btn-default">
								<i class="fa fa-edit"></i> Edit
							</button>
							<button id='viewEventSave' type="button"
								class="btn btn-default hidden">
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

	<!-- Add Hasher modal -->
    <?php
    if (isset ( $_SESSION ['id'] )) {
        ?>
	<div class="portfolio-modal modal fade" id="hasherModal" tabindex="-1"
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
						<div class="modal-body">
							<h2 class="col-md-12">
								<input id='hashName' class='form-control'
									placeholder='Hash Name' type='text' />
							</h2>
							<h4 class="col-md-12">
								<input id='nerdName' class='form-control'
									placeholder='Nerd Name' type='text' />
							</h4>
							<div class='class-left'>
								<div class="col-md-6">
									<input id="email" class='form-control'
										placeholder='Email Address' type="email" />
								</div>
								<div class="col-md-6">
									<input id="phone" class='form-control'
										placeholder='Phone Number' type="tel" />
								</div>
								<div class="col-md-12">
									<input id="address" class='form-control'
										placeholder='Street Address' type="text" />
								</div>
								<div class="col-md-4">
									<input id="city" class='form-control' placeholder='City'
										type="text" />
								</div>
								<div class="col-md-4">
									<input id="state" class='form-control' placeholder='State'
										type="text" />
								</div>
								<div class="col-md-4">
									<input id="zip" class='form-control' placeholder='Zip Code'
										type="text" />
								</div>
								<p>
									<input id='hasher-id' type='hidden' />
								</p>
							</div>
							<p>
							
							
							<hr>
							</p>
							<p>
								<button type="button" class="btn btn-default"
									data-dismiss="modal">
									<i class="fa fa-times"></i> Close
								</button>
								<button id='hasherSave' type="button" class="btn btn-default">
									<i class="fa fa-save"></i> Save
								</button>
							</p>
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
		<a class="btn btn-primary" href="#page-top"> <i
			class="fa fa-chevron-up"></i>
		</a>
	</div>
    
    <?php require "footer.php"; ?>
    
    <script
		src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.0/fullcalendar.min.js"></script>
	
	<script src="js/hashers.min.js"></script>
	<script src="js/events.min.js"></script>
	<script src="plugins/jquery.confirm.min.js"></script>
	<script src="wysihtml5/wysihtml5x-toolbar.min.js"></script>
	<script src="wysihtml5/handlebars.runtime.min.js"></script>
	<script src="wysihtml5/bootstrap3-wysihtml5.min.js"></script>

</body>

<?php mysqli_close($db); ?>

</html>


<?php
// Some basic PHP functions used in some of our calculations
function isTuesday($date) {
    return date ( 'w', strtotime ( $date ) ) === '2';
}
?>