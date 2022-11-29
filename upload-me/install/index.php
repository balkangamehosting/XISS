<?php 
	# Config
	define('_ROUTING_', true);
	require '../config.php';
	require 'sql.php';	
?>

<!DOCTYPE html>
<html>
<head>
<title>XISS Game Panel :: Installation</title>
<meta charset="utf-8" />
<style>
body
{
	background-color: #ddd;
	font-family: Verdana;
	font-size: 12px; 
}
h1 
{
	background: #fafafa;
	padding: 3px 10px;
	font-size: 16px;
	color: #888;
	text-shadow: #ddd 1px 1px 1px;
}
a
{
	text-decoration: none;
	color: #4696be;
}
a:hover 
{
	color: #c0c0c0;
}
h2
{
	margin-top: 0;
	background-color: #fff;
	padding: 2px 10px;
	font-size: 12px;
	color: #4696be; 
}
p
{
	text-align: center;
	color: #888;	
}
#wrapper 
{
	width: 1000px;
	margin: 0 auto;
	background-color: #fff;
	min-height: 400px;
	border: 1px solid #fafafa;
	padding: 10px;
	overflow: auto;	
	
	/* Webkit */
	-webkit-box-shadow: 10px 10px 5px 0px rgba(239,239,239,1);
	-moz-box-shadow: 10px 10px 5px 0px rgba(239,239,239,1);
	box-shadow: 10px 10px 5px 0px rgba(239,239,239,1);
}
.left
{
	float: left;
}
.right
{
	float: right;
}
.clearfix
{
	clear: both;
	margin-bottom: 20px;
}
div.menu_aside
{
	float: left;
	width: 250px;
	margin-right: 10px;
	background-color: #fafafa;
}
div.menu_main
{
	float: right;
	width: 710px;
	background-color: #fafafa;
	padding: 10px;
}

ul {	
	list-style-type: none;
	padding-left: 20px;
}
 
li {
	text-decoration: none;
	color: #999;
	font: 10px/1 Helvetica, Verdana, sans-serif;
	text-transform: uppercase;
	margin-bottom: 5px;
	padding-left: 14px;
 
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	transition: all 0.5s ease;
}
 
li:last-child {
	border-right: none;
}
  
li:hover {
	color: #666;
}
 
li.active {
	font-weight: bold;
	color: #333;
}

li.done
{
	border: none;
	width: 10px;
	height: 10px;
	background: url('images/done.png') no-repeat;
	margin-right: 15px;
}
li.pending
{
	border: none;
	width: 10px;
	height: 10px;	
	background: url('images/pending.png') no-repeat;		
}

li.fail
{
	border: none;
	width: 10px;
	height: 10px;	
	background: url('images/fail.png') no-repeat;		
}
.m_ok
{	
	display: inline-block;
	border: none;
	width: 10px;
	height: 10px;	
	background: url('images/ok.png') no-repeat;		
}
.m_fail
{	
	display: inline-block;
	border: none;
	width: 10px;
	height: 10px;	
	background: url('images/fail.png') no-repeat;		
}
.notes
{
	margin: 20px;
	background: #fff;
	border: 1px solid #999;
	padding: 10px;	
}
div#step1 .license 
{
	overflow: auto;
	height: 300px;
	background-color: #fff;
	padding: 10px;
	border: 1px solid silver;
	font-family: mono;
}
div#step1 div.btns
{
	margin-top: 10px;
	text-align: center;
}
#step2 div span.label
{
	width: 240px;
	display: inline-block;
	padding-left: 20px;	
}
#bailout, #step1, #step2, #step3, #step4, #step5 
{
	display: none;
}
/* Form box */
.form_box
{	
	overflow: none;
	color: #999;
}
.form_box fieldset
{
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	-khtml-border-radius: 10px;
	border-radius: 10px;	
}
.form_box legend
{
	color: #888;
	text-shadow: #eee 1px 1px 1px;
}
.form_box label
{
	clear: left;
	float: left;
	width: 150px;
	margin-bottom: 20px;
	font-weight: bolder;
	color: #999;
}
.form_box input[type=text], .form_box input[type=password]
{
	float: left;
	border: 1px solid #ddd;
	margin-top: -3px;
        
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
	-moz-box-shadow: 2px 2px 3px #666;
	-webkit-box-shadow: 2px 2px 3px #666;
	box-shadow: 2px 2px 3px #666;
	font-size: 12px;
	padding: 4px 7px;
	outline: 0;
	-webkit-appearance: none;
}
.form_box input[type=text]:focus, .form_box input[type=password]:focus {
	border-color: #4696be;
}
.form_box input[type=submit] 
{
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
	background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
	background-color:#ededed;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#777777;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:1px 1px 0px #ffffff;
}
.form_box input[type=submit]:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
	background-color:#4696be;
}
.form_box input[type=submit]:active {
	position:relative;
	top:1px;
}
.form_box span
{
	float: left;
	displine: inline;
}
</style>
</head>

<body>
	<div id="wrapper">
		<div class="header">
			<a href="http://rtcwx.com">XISS Forums</a> |
			<a href="http://dev.rtcwx.com/projects/gamepanel">XISS Source Code</a>
		</div>
		<noscript><span style="float: right; margin-top: -10px; color: #f00;">This installer requires javascript enabled!</span></noscript>
		
		<h1>Installation</h1>
		
		<?php 
			# Form was submitted
			if (!isset($_POST['submit']))
			{
		?>						
		<div class="menu_aside">
			<ul>
				<li class="active done" id="i_step1">About</li>
				<li class="pending" id="i_step1">Agreement</li>
				<li class="pending" id="i_step2">Checks</li>
				<li class="pending" id="i_step3">Settings</li>				
				<li class="pending" id="i_step5">Finish</li>
			</ul>
		</div>
		<?php } ?>
		
		<div class="menu_main" <?php if (isset($_POST['submit'])) echo 'style="width: 980px;"' ?>>
		
			<?php 
				# Form was submitted
				if (isset($_POST['submit']))
				{	
					$error = false;					
					if (!$pepper)
					{
						echo "Config file not configured! Configure your config.php file and hit refresh.";
						$error = true;
					}
					
					if (!$error)
					{
						$dsn = 'mysql:dbname='.$db_name.';host='.$db_host.';port='.$db_port.'';		
						try
						{			
							# Read settings from INI file
							$pdo = new PDO($dsn, $db_user, $db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
						
							# We can now log any exceptions on Fatal error.
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
							# Disable emulation of prepared statements, use REAL prepared statements instead.
							$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
						}
						catch (PDOException $e)
						{	
							echo "<h1>Error</h1>";
							echo "<p>Connection could not be established!</p>";
							echo "Error given: <br />" .$e->getMessage() . "<br />";
							$error = true;	
						}	
					}
					
					# Connection succeded so check the rest..
					if (!$error)
					{
						# Entry
						$username = $_POST['username'];
						$pass = $_POST['userpass'];
						$passCheck = $_POST['userpass_check'];	
						$email = $_POST['email'];
						$firstname = $_POST['firstname'];
						$lastname = $_POST['lastname'];
						
						if ($pass !== $passCheck)
						{
							$error = true;							
							echo "<p>Passwords do not match!</p>";							
							echo '<a href="#" id="goto_step3">Correct it</a> <br class="clearfix"/>';
						}
												
						if (!$error)
						{
							# Create databases..						
							$pdo->beginTransaction();						
							foreach ($arr['sql'] AS $out => $key)
							{								
								$pdo->exec($key);
							}						
							$pdo->rollBack();
							
							# Create password
							$salt = substr(md5(time()),0,10).'';
							$password = sha1($salt.$pass.$pepper);
							
							# We force ID so installation will fail if entry already exists..(to avoid duplicating it..).
							$sql = "
								INSERT INTO " . $db_prefix."users
									(id, username, password, password_temp, salt, firstname, lastname, email, `group`, created)
								VALUES
									(1, ?, ?, ?, ?, ?, ?, ?, 10, NOW());
							";
							$q = $pdo->prepare($sql);
							$do = $q->execute(array($username, $password, $password, $salt, $firstname, $lastname, $email));
							
							if ($do)
							{
								echo "<p>Installation is now completed.</p>";
								echo '<p>Please delete <b>install</b> folder and optionally to enhance your script\'s security, move <b>config.php</b> outside of web root.</p>';
								
								echo '';
							}
							else
							{	
								echo "<h1>Error</h1>";
								echo "Error has occured while trying to create new user! Please delete your DB and repeat the install process. :|";
							}
						}
					}
				}
			?>
			
			<!-- About -->
			<?php if (@!isset($_POST['submit'])) { ?>
			<div id="about">
				<h2>About</h2>	
				<p>
					Welcome to XISS Game Panel Installer.
					
					This process will guide you thru installation of XISS Game Panel.
				</p>
				<br />
				<a href="#" id="goto_step1">Start installation</a>
			</div>
			<?php } ?>
			
			<!--  Step 1 -->
			<div id="step1">
				
				<h2>License</h2>			
				<p>Before you can continue you must accept and agree with XISS Game Panel license.</p>
				
				<div class="license">				
					<?php 
					$content = file_get_contents('license');
					echo nl2br(mb_convert_encoding($content, 'UTF-8',
							mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true)));			
					?>					
				</div>
				
				<div class="btns"> <a href="#" id="goto_step2">I accept</a> | <a href="#" id="bail">I do NOT accept</a> </div>
				
				<br class="clearfix" />	
			</div>
			
			<!-- Step 2 -->
			<div id="step2">
				<h2>Checking Environment</h2>
				<p>Script is trying to be self depended as much as possible but some conditions must still be met.</p>	
				
				<div><span class="label">Minimum PHP 5.3.4 required: </span><?php echo((PHP_VERSION_ID > 50340) ? '<span class="m_ok"></span>' : '<span class="m_fail"></span>'); ?> </div> 
				<div><span class="label">PDO extension enabled: </span><?php echo(extension_loaded('pdo') ? '<span class="m_ok"></span>' : '<span class="m_fail"></span>'); ?> </div>
				<div><span class="label">FTP extension enabled: </span><?php echo(extension_loaded('ftp') ? '<span class="m_ok"></span>' : '<span class="m_fail"></span>'); ?> </div>
				<br />
				<div class="notes">
					<span style="color: red">IMPORTANT!</span> <br />
					<i>
						Note that if you're running Apache server then <b>mod_rewrite</b> has to be enabled! <br />				
						Since script also supports Nginx server by default and due the fact that determening if mod_rewrite is 
						enabled can be near to impossible at times installer chosen not to check for it. 
						Non the less, mod_rewrite is mandatory to run XISS Game Panel on Apache server!
					</i>
				</div>
				
				<br />
				<?php 
					if (PHP_VERSION_ID > 50340 && extension_loaded('pdo') && extension_loaded('ftp') && is_writable('../config.php'))
						echo '<a href="#" id="goto_step3">Continue</a>'; 
					else
						echo 'Process cannot continue! Please fix all the error and retry the installation process..';
				?>
			
				<br class="clearfix" />
			</div>
			
			<!-- Step 3 -->
			<div id="step3">
				<h2>Settings</h2>
				<p>Please fill all the fields carefully. You will be able to fine tune settings once installation is complete.</p>	
				
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form_box">
				    <fieldset id="admin">
				    	<legend>Admin account</legend>
				        <label>*Username: </label> <input type="text" placeholder="username" value="<?php if (@$_POST['username']) echo $_POST['username']; ?>" name="username" required>
				        <label>*Password: </label> <input type="password" placeholder="password" value="" name="userpass" required>
				        <label>*Password Again: </label> <input type="password" placeholder="password again" value="" name="userpass_check" required>
				        <label>*E-mail: </label> <input type="text" placeholder="email" value="<?php if (@$_POST['email']) echo $_POST['email']; ?>" name="email" required>
				        <label>*Firstname: </label> <input type="text" placeholder="firstname" value="<?php if (@$_POST['firstname']) echo $_POST['firstname']; ?>" name="firstname" required>
				        <label>*Lastname: </label> <input type="text" placeholder="lastname" value="<?php if (@$_POST['lastname']) echo $_POST['lastname']; ?>" name="lastname" required>				        
				    </fieldset>				 
				    <br />				    
				    <input type="submit" id="submit" name="submit" value="Install" />
				</form>
				
				<br class="clearfix" />
			</div>
			
			<!-- Bailing out.. -->
			<div id="bailout">
				<h2>Cancelling Installation..</h2>
				<p>
					Nothing more to do here. You decided not to accept XISS license - Delete this script and go on with your life. 
					<br />
					<br />
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>" id="reset" class="left" style="padding-left: 10px;">I changed my mind..take me back!</a>
				</p> 
			</div>
			
		</div>

	</div>
	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>	
<script type="text/javascript">
$(document).ready(function()
{	
	$("#bail").click(function () 
	{	
		$('li.done').removeClass('done');
		$('li').addClass('fail');
		
		$("#step1").fadeOut("normal");
		$("#step1").slideUp("fast");
		$("#bailout").slideDown("slow");
	});
	
	$("#goto_step1").click(function () 
	{
		$('li#i_step1').removeClass('active');
		$('li#i_step1').removeClass('pending');
		$('li#i_step1').addClass('done active');		
		
		$("#about").fadeOut("normal");
		$("#about").slideUp("fast");
		$("#step1").slideDown("slow");
	});	

	$("#goto_step2").click(function () 
	{	
		$('li#i_step1').removeClass('active');
		$('li#i_step1').removeClass('pending');
		$('li#i_step2').removeClass('pending');
		$('li#i_step2').addClass('done active');	

		$("#step1").fadeOut("normal");
		$("#step1").slideUp("fast");
		$("#step2").slideDown("slow");
	});

	$("#goto_step3").click(function () 
	{	
		$('li#i_step2').removeClass('active');
		$('li#i_step2').removeClass('pending');
		$('li#i_step3').removeClass('pending');
		$('li#i_step3').addClass('done active');	

		$("#step2").fadeOut("normal");
		$("#step3").slideUp("fast");
		$("#step3").slideDown("slow");
	});	
});
</script>	
</body>
</html>