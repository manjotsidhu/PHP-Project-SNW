<!DOCTYPE html>
<?php
	include("Login.php");
	include("cg_files/cg_index_file/fb_SignUp_file/SignUp.php");
?>
<html lang="en">

<head>
<LINK REL="SHORTCUT ICON" HREF="cg_files/cg_title_icon/candygram.png?<?php echo time(); ?>" />
	<link href="cg_files/cg_index_file/fb_css_file/index_css.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="cg_files/fb_font/font.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="cg_files/cg_index_file/fb_js_file/Registration_validation.js?<?php echo time(); ?>"> </script>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CandyGram</title>

    <!-- Bootstrap Core CSS -->
    <link href="landing/css/bootstrap.min.css?<?php echo time(); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="landing/css/landing.css?<?php echo time(); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="landing/font-awesome/css/font-awesome.min.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- Login Css --> 
	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>
	<link rel="stylesheet" href="login/style.css?<?php echo time(); ?>">

	
</head>
<script>
	function time_get()
	{
		d = new Date();
		mon = d.getMonth()+1;
		time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
		Reg.fb_join_time.value=time;
	}
</script>
<style>
</style>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
         	<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="#">
					<img alt="Brand" src="Main_Template/img/brand.png" width="30" height="30" style="margin-top: -4px;">
				</a>
                <a class="navbar-brand" href="#">CandyGram</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#sign">SignIn / SignUp</a>
                    </li>
                    <li>
                        <a href="#services">Project Information</a>
                    </li>
                    <li>
                        <a href="#open">OpenSource</a>
                    </li>
					<li>
                        <a href="#about">About Us</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="sign"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h3>Connect With Your Friends With One Click</h3>
                        <div class="login-wrap">
						<form  method="post">
		
	</form>
	<!-- Login/Signup Form -->
	<form method="post">
	<div class="login-html" height="100%">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="username">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" type="password" name="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="Login">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="Forgot_Password.php">Forgot Password?</a>
				</div>
			</div></form>
			<div class="sign-up-htm" id="enl">
			<!-- Registration -->
				<form  method="post" onSubmit="return check();" name="Reg">
				<div class="group"><div class="sdf">
					<label for="user" class="label" >First Name</label>
					<input id="user" type="text" class="input" name="first_name">
				</div></div><div class="sdf">
				<div class="group">
					<label for="user" class="label" >Last Name</label>
					<input id="user" type="text" class="input" name="last_name">
				</div></div><div class="sdf">
				<div class="group">
					<label for="user" class="label">Your Email</label>
					<input id="user" type="text" class="input" name="email">
				</div></div><div class="sdf">
				<div class="group">
					<label for="user" class="label">Re-enter Email</label>
					<input id="user" type="text" class="input" name="remail">
				</div></div>
				<div class="sdff"><div class="group">
				<label for="user" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="password">
				</div>
				<div class="group">
				
					<select class="form-control" name="sex" >
					
			<option value="Select Sex:"> Select Sex: </option>
			<option value="Female"> Female </option>
			<option value="Male"> Male </option>
		</select>
				</div>
				<div class="group" >
				<div class="form-inline" style="display: block;margin: 0 auto;float:middle">
					<label for="user" class="label">Your Birthday</label>
					<div>
	
	<select class="form-control" name="month" style="width:20%;float:left;">
	<option value="Month:"> Month : </option>
	
	<script type="text/javascript">
	
		var m=new Array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		for(i=1;i<=m.length-1;i++)
		{
			document.write("<option value='"+i+"'>" + m[i] + "</option>");
		}	
	</script>
	
	</select>
	</div>



	<div>
	<select name="day" class="form-control" style="width:20%;float:right;">
	<option value="Day:"> Day : </option>
	
	<script type="text/javascript">
	
		for(i=1;i<=31;i++)
		{
			document.write("<option value='"+i+"'>" + i + "</option>");
		}
		
	</script>
	
	</select>
	</div>	

	<div style="">
	<select name="year" class="form-control" style="width:20%">
	<option value="Year:"> Year : </option>
	
	<script type="text/javascript">
	
		for(i=2017;i>=1960;i--)
		{
			document.write("<option value='"+i+"'>" + i + "</option>");
		}
	
	</script>
	
	</select>
	</div>	</div></div>
				</div>
				<div class="group" style="">
					<input type="submit" class="button" name="signup" value="Sign Up" onClick="time_get()">
				</div>
				
				<div class="foot-lnk" style="">
					<label for="tab-1"><a>Already A Member?</a>
				</div>
			</div>
		</div>
	</div>
</div></form>
						
                        <p>Made With <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> By You and Manjot Sidhu</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Based On PHP 5.8.0 and MYSQL</h2>
                    <p class="lead"> PHP 5.8.0 for better stability in older Operating Systems like Windows 7 . Databases made on MYSQL for securely storing Usernames and Passwords
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="landing/img/ipad.png?<?php echo time(); ?>" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Freshly BootStrap 3.3.7 and HTML 5</h2>
                    <p class="lead"> Used BootStrap to get Official look of website including Login Forms and Pop'ups<br>Animatons done with HTML5</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="landing/img/dog.png?<?php echo time(); ?>" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->
<a  name="about"></a>
    <div class="content-section-a">
	
        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">About Us</h2>
                    <p class="lead">Hi , I m Manjot Sidhu , a 16 Year Old Kid , I love Doing Creative Things . My Hobbies are Android Developing , Application and Web Development .<span class="glyphicon glyphicon-flash" aria-hidden="true"></span><br><br><small><div align="right">My another website :-  <a href="https://unite2roms.blogspot.in/" class="btn btn-primary"> Unite 2 Roms</a></small></p></div>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6 img">
                    <img class="img-thumbnail" src="landing/img/me.gif" alt="" align="right" width="50%">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

	<a  name="open"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>We Are OpenSource! Contribute To this project</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        
                        <li>
                            <a href="https://manjotsidhu.github.io/PHP-Project-SNW/" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Check Our Repository Here Github</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#sign">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#sign">SignIn/SignUp</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Project Information</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#open">OpenSource</a>
                        </li>
						<li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About Us</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; GOD 2017. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="landing/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="landing/js/bootstrap.min.js"></script>
<?php
	include("cg_files/cg_index_file/fb_erorr_file/fb_erorr.php");
?>
</body>

</html>
