<?php 
    $url = $_SERVER['REQUEST_URI'];
    $url = substr($url, 1);
    
    session_name('shitLogin');
    // Starting the session
    
    session_set_cookie_params(2*7*24*60*60);
    // Making the cookie live for 2 weeks
    
    session_start();
?>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<!--                 <a class="navbar-brand" href="index.php"><img src='img/sohappyits.png' height='50px;' /></a> -->
                <a class="navbar-brand" href="index.php">Welcome</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Events <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="page-scroll">
                                <a href="<?php echo str_replace($url, "", "events.php"); ?>#next-trail">Next Trail</a>
                            </li>
                            <li class="page-scroll">
                                <a href="<?php echo str_replace($url, "", "events.php"); ?>#announcements">Announcements</a>
                            </li>
                            <li class="page-scroll">
                                <a href="<?php echo str_replace($url, "", "events.php"); ?>#events">Calendar</a>
                            </li>
                            <li class="page-scroll">
                                <a href="<?php echo str_replace($url, "", "events.php"); ?>#harelog">Hare Log</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Shiggy <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="page-scroll">
                                <a href="<?php echo str_replace($url, "", "shiggy.php"); ?>#trash">Hash Trash</a>
                            </li>
                            <li class="page-scroll">
                                <a href="<?php echo str_replace($url, "", "shiggy.php"); ?>#history">History</a>
                            </li>
                            <li class="page-scroll">
                                <a href="<?php echo str_replace($url, "", "shiggy.php"); ?>#hareguide">Hare Guide</a>
                            </li>
                            <li class="page-scroll">
                                <a href="<?php echo str_replace($url, "", "shiggy.php"); ?>#mismanagement">Mis-management</a>
                            </li>
                            <li class="page-scroll">
                                <a href="<?php echo str_replace($url, "", "shiggy.php"); ?>#links">Links</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    	<?php
                    	    if( ! isset( $_SESSION['id'] ) ) {
                    	?>
                        <a id='login-button' href="javascript:void(0);"><i class="fa fa-sign-in"></i>Login</a>
                        <?php 
                       	    } else {
               	        ?>
                        <a id='logout-button' href="javascript:void(0);"><i class="fa fa-sign-out"></i>Logout (<?php echo $_SESSION['usr']; ?>)</a>               	        
               	        <?php 
                       	    }
                        ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <div class="container" id="login-container">
        <div class="row">
            <div id='login-holder' class="col-md-offset-5 col-md-3">
            	<div id="login-div-close-div"><a href="javascript:void(0);"><i class="fa fa-remove" style="padding:2px;"></i></a></div>
                <div class="form-login">
                <div id='login-error'></div>
                <div id='login-message'></div>
                <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" />
                <br/>
                <input type="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
                <br/>
                <div class="wrapper">
                <span class="group-btn">     
                    <a id='login-submit' href="#" class="btn btn-primary btn-md">Login <i class="fa fa-sign-in"></i></a>
                </span>
                </div>
                </div>
            
            </div>
        </div>
	</div>