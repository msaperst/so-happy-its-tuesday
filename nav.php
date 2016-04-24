<?php 
    $url = $_SERVER['REQUEST_URI'];
    $url = substr($url, 1);
    
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
                                <a href="<?php echo str_replace($url, "", "shiggy.php"); ?>#harelog">Hare Log</a>
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
                    <li class="page-scroll">
                        <a href="javascript:void(0);"><i class="fa fa-sign-in"></i>Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>