<!DOCTYPE html>
<html lang="en">

<?php require "php/sql.php"; ?>
<?php require "header.php"; ?>

<body id="page-top" class="index">
	
	<?php require "nav.php"; ?>
    
    <!-- Hash Trash Section -->
	<section id="trash">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Hash Trash</h2>
					<hr class="star-primary">
				</div>
			</div>
			<div class="row">Coming Soon</div>
		</div>
	</section>

	<!-- History Section -->
	<section class="success" id="history">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>History</h2>
					<hr class="star-light">
				</div>
			</div>
			<div class="row">Coming Soon</div>
		</div>
	</section>

	<!-- Hare Guide Section -->
	<section class="success" id="hareguide">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Hare Guide</h2>
					<hr class="star-light">
				</div>
			</div>
			<div class="row">Coming Soon</div>
		</div>
	</section>

	<!-- MisManagement Section -->
	<section id="mismanagement">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Mis-Management</h2>
					<hr class="star-primary">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-left">
					<table id='mismanagement'
						class="table table-hover table-responsive">
                    	<?php
                    $sql = "select distinct(position) from shit_mismanagement";
                    $result = mysqli_query ( $db, $sql );
                    while ( $row = mysqli_fetch_array ( $result ) ) {
                        $pos = $row ['position'];
                        echo "<tr class='mismanagement' id='" . $pos . "_row'><td class='position'>";
                        echo $pos;
                        echo "</td><td class='whois'>";
                        
                        echo "<span class='hidden'><input type='text' value='' placeholder='Find a wanker'
                                class='searcher form-control' style='position:relative;top:2px;'/></span>";
                        echo "<span id='" . $pos . "_hares' class='holder'></span>";
                        
                        $sql = "select c.id, c.hashname, c.email from shit_mismanagement b, shit_hashers c where b.position = '$pos' and b.hshr_id = c.id;";
                        $result1 = mysqli_query ( $db, $sql );
                        while ( $row1 = mysqli_fetch_array ( $result1 ) ) {
                            $id = $row1 ['id'];
                            $name = $row1 ['hashname'];
                            $email = $row1 ['email'];
                            echo "<div class='hasherholder'>";
                            if ($email != "") {
                                echo "<a href='mailto:$email' target='_blank'>";
                            }
                            echo "<span class='viewHasher' hasherid='$id'>$name </span>";
                            if ($email != "") {
                                echo "</a>";
                            }
                            echo "</div>";
                        }
                        echo "</td></tr>";
                    }
                    ?>
                	</table>
				</div>
				<div class="col-lg-12 text-center">
                	<?php
                if (isset ( $_SESSION ['id'] )) {
                    ?>
                    <button id="addPosition" type="button"
						class="btn btn-default hidden">
						<i class="fa fa-add"></i> Add Position
					</button>
					<button id="saveMismanagement" type="button"
						class="btn btn-default hidden">
						<i class="fa fa-save"></i> Save Mismanagement
					</button>
					<button id="editMismanagement" type="button"
						class="btn btn-default">
						<i class="fa fa-edit"></i> Edit Mismanagement
					</button>
                    <?php
                }
                ?>
                </div>
			</div>
		</div>
	</section>

	<!-- Links Section -->
	<section class="success" id="links">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Links</h2>
					<hr class="star-light">
				</div>
			</div>
			<div class="row">
				<ul>
					<li><a href="http://www.dchashing.org">DC Hashing</a> - This is a
						good site for information about the Hash Houses in the area</li>
					<li><a href="http://www.dchashing.org/mvh3/index.html">Mount Vernon
							H3</a> - Our Mother Hash</li>
					<li><a href="https://sites.google.com/site/othhhh/">Over the Hump
							Hash House Harriers</a> - OTH4 hashes in the Woodbridge, Quantico
						and further south</li>
					<li><a href="http://www.ewh3.com">Everyday is Wednesday H3</a> -
						EWH3 hashes by a metro in DC and Crystal City</li>
					<li><a href="http://www.dchashing.org/wh4/index.html">White House
							H3</a> - Hashes all over the DC area</li>
					<li><a href="http://www.th3.org/">Tidewater H3</a> - Hashes down in
						the Tidewater region</li>
					<li><a href="http://dchashing.net/dcreddress/index.html">DC Red
							Dress Run</a> - Annual hash which runs in October</li>
					<li><a href="http://www.onon.com/">OnOn.com</a> - Worldwide Hasher
						Forums</li>
					<li><a href="http://www.worldharrierorganization.com/">World
							Harrier Organization</a></li>
				</ul>
			</div>
		</div>
	</section>

	<!-- Add Hasher modal -->
    <?php
    if (isset ( $_SESSION ['id'] )) {
        ?>
	<div class="portfolio-modal modal fade" id="hasherModal"
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
							<h2 class="col-md-12">
								<input id='hashName' class='form-control' placeholder='Hash Name' type='text' />
							</h2>
							<h4 class="col-md-12">
								<input id='nerdName' class='form-control' placeholder='Nerd Name' type='text' />
							</h4>
							<div class='class-left'>
    							<div class="col-md-6">
    				                <input id="email" class='form-control' placeholder='Email Address' type="email" />
    				            </div>
    							<div class="col-md-6">
    				                <input id="phone" class='form-control' placeholder='Phone Number' type="tel" />
    				            </div>
    							<div class="col-md-12">
    				                <input id="address" class='form-control' placeholder='Street Address' type="text" />
    				            </div>
    							<div class="col-md-4">
    				                <input id="city" class='form-control' placeholder='City' type="text" />
    				            </div>
    							<div class="col-md-4">
    				                <input id="state" class='form-control' placeholder='State' type="text" />
    				            </div>
    							<div class="col-md-4">
    				                <input id="zip" class='form-control' placeholder='Zip Code' type="text" />
    				            </div>
    							<p>
    								<input id='hasher-id' type='hidden' />
    							</p>
							</div>
							<p><hr></p>
							<p>
    							<button type="button" class="btn btn-default"
    								data-dismiss="modal">
    								<i class="fa fa-times"></i> Close
    							</button>
    							<button id='hasherSave' type="button"
    								class="btn btn-default">
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

	<script src="js/hashers.min.js"></script>
	<link href="css/hashers.min.css" rel="stylesheet" type="text/css">
	<script src="js/shiggy.min.js"></script>

</body>

<?php mysqli_close($db); ?>

</html>