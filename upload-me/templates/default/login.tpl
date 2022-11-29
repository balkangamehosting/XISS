<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="" />
<title>{$LOGIN}</title>
<link rel="stylesheet" type="text/css" href="{$template}css/login.css" media="screen" />
</head>
<body>
<div class="wrap">
	<div id="content">
		<div id="main">
			
		{nocache}					
		{if $notify}			
			<!-- When using custom template always have "error" class for error as that's pre-set in code -->					
			<div class="{$PRINT_CSS}">		
				<h2>{$PRINT_TITLE}</h2>
				<p>{$PRINT_MSG}</p>		
			</div>
		{/if}
		{/nocache}
		
			<a href="{$url}action/lang/si" class="lang"><img src="{$template}images/lang/si.png" title="Slovenski jezik"/></a>
			<a href="{$url}action/lang/en" class="lang"><img src="{$template}images/lang/en.png" title="English language"/></a>
			<a href="{$url}action/lang/de" class="lang"><img src="{$template}images/lang/de.png" title="Deutsche sprache"/></a>			
			<div class="full_w">			
				<form action="{$url}action/login" method="post">
					<label for="login">{$USERNAME}:</label>
					<input id="login" name="login" class="text" />
					<label for="pass">{$PASSWORD}:</label>
					<input id="pass" name="pass" type="password" class="text" />
					<div class="sep"></div>
					<button type="submit" class="ok">{$LOGIN}</button> <a class="button" href="{$url}show/reset_password">{$FORGOTPASS}</a>
				</form>
			</div>
			<div class="footer">&raquo; <a href="{$siteurl}"> {$sitename}</a> | AdminPanel</div>
		</div>
	</div>
</div>

</body>
</html>
