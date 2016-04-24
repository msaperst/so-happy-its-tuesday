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
               	Coming Soon
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