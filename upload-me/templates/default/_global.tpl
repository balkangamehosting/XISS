<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
{block name=meta}	
	<meta name="keywords" content="" />
	<meta name="description" content="" />	
{/block}
<title>{block name=title}{$HOME}{/block}</title>
<link rel="stylesheet" href="{$systemplate}css/style.css" type="text/css" media="screen" charset="utf-8" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

	<style type="text/css">
	.gradient {
	 filter: none;
 }
	</style>
<![endif]-->	
{block name=header}{/block}				
</head>

<body>			
<div id="wrapper">

	<div id="header">
		<div>
			<a href="{$siteurl}" class="logo">{$sitename}</a>
		</div>
		<div class="right">
			<p class="last">{$LOGGED_AS}, <a href="{$url}action/logout" class="header_link">{$LOGOUT}</a></p>
			{if $hijacked}
			<p class="last"><a href="{$url}action/restore" class="header_link">{$HIJACKED_RESTORE}</a></p>
			{/if}
		</div>
		<div class="clear"></div>
	</div>
	
	<div id="minwidth">
		<div id="holder">
			<div id="menu">						
				<ul>
					<li><a href="{$url}" {"index"|activepage}><span>{$HOME}</span></a></li>
					<!--
					<li><a href="{$url}order" {"order"|activepage}><span>{$ORDER}</span></a></li>	
					<li><a href="{$url}support"{"support"|activepage}><span>{$SUPPORT}</span></a></li>					
					-->		
									
				</ul>
						
				<div class="menu_side">								
					<a href="{$url}account">{$ACCOUNT}</a>
				</div>						
				<div class="clear"></div>
			</div>	
									
			<ul id="breadcrumbs-one">
				{$breadcrumbs}
			</ul>
			
			<div class="body">
				{block name=lang}
					<span class="right">
						<a href="{$url}action/lang/si" class="lang"><img src="{$template}images/lang/si.png" title="Slovenski jezik"/></a>
						<a href="{$url}action/lang/en" class="lang"><img src="{$template}images/lang/en.png" title="English language"/></a>
						<a href="{$url}action/lang/de" class="lang"><img src="{$template}images/lang/de.png" title="Deutsche sprache"/></a>
					</span>
				{/block}
				
				{block name=body}{/block}
			</div>
						
			<div class="clear"></div>
				
			<div id="body_footer">
				<div id="bottom_left"><div id="bottom_right"></div></div>
			</div>
			
		</div>
	</div>
</div>

<div id="footer">
	<p class="last">{$COPYRIGHT} 
	{mailto address="nate.afk@gmail.com" subject="XISS Game Panel" text="XISS GamePanel" encode="javascript_charcode"} 
	@ {nocache}{$smarty.now|date_format:"%Y"}{/nocache} - {$RIGHTSRESERVED} </p>
</div>

{literal}
<script type="text/javascript">
$(window).load(function()
{
	$('nav li ul').hide().removeClass('fallback');
	$('nav li ul').hover(
	    function ()
	     {
	        $('ul', this).stop().slideDown(100);
	    },
	    function () 
	    {
	        $('ul', this).stop().slideUp(100);
	    }
	);
});
</script>
{/literal}
</body>
</html>