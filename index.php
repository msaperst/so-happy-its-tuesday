<!DOCTYPE html>
<html lang="en">

<?php require "php/sql.php"; ?>
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
