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
            <div class="row">
               	Coming Soon
            </div>
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
            <div class="row">
               	Coming Soon
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
               	Coming Soon
            </div>
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
            <div class="row">
               	Coming Soon
            </div>
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
            	<table class="table table-hover table-responsive">
                	<?php
                	$sql = "select distinct(position) from shit_mismanagement";
                    $result = mysqli_query ( $db, $sql );
                    while ( $row = mysqli_fetch_array ( $result ) ) {
                        $pos = $row['position'];
                        echo "<tr><td>";
                        echo $pos;
                        echo "</td><td>";
                        $sql = "select c.hashname, c.email from shit_mismanagement b, shit_hashers c where b.position = '$pos' and b.hshr_id = c.id;";
                        $result1 = mysqli_query ( $db, $sql );
                        while ( $row1 = mysqli_fetch_array ( $result1 ) ) {
                            $email = $row1['email'];
                            $name = $row1['hashname'];
                            if( $email != "" ) {
                                echo "<a href='mailto:$email' target='_blank'>$name</a><br/>";
                            } else {
                                echo "$name<br/>";
                            }
                        }
                        echo "</td></tr>";
                    }
                    ?>
            	</table>
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
               	Coming Soon
            </div>
        </div>
    </section>
    
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