{extends file='../admin/_global.tpl'}

{block name=title}{$SERVERS}:: {$CONSOLE}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/console.css" type="text/css" media="screen" charset="utf-8" />
<link href="{$systemplate}css/vendors/jconfirm.css" rel="stylesheet" type="text/css" media="screen" />
<meta http-equiv="refresh" content="60"> 
{/block}

{block name=lang}{/block}

{block name=body}
{nocache}
{assign var=i value=$data}		
	<a class="butn" href="{$url}servers/show/{$i.id|offset}">&lsaquo; {$BACKTO_SERVER}</a> 	
	<span class="right">
		<a class="butn_bright ask" href="{$url}servers/console_actions/purge/{$i.id|offset}">{$PURGE_CONSOLE}</a>
		<!-- <a class="butn_cyan" href="{$url}servers/console_actions/download/{$i.id|offset}">{$DOWNLOAD_CONSOLE}</a> -->
	</span> 	
	
	<div class="main_full">
		<span><img id="paused" style="display:none; text-align: center; position: fixed" src="{$systemplate}images/icons/paused.png" /></span>
		<span class="right"><a href="{$url}servers/console/{$i.id|offset}">{$REFRESH}</a></span>
		<div class="clear"></div>
		
		<div class="console" id="conbot">
			{$output}
		</div>
		
		<div class="clearfix"></div>
		
		<form method="post" action="{$url}servers/console_actions/execute/{$i.id|offset}">
			{$ENTER_COMMAND}: <input type="text" name="command" class="console" />
			<span class="right"><input type="submit" name="submit" value="{$ENTER}" /></span>
		</form>
	</div>
{/nocache}

<script src="{$systemplate}js/jquery.mouseOver.js"></script>
<script type="text/javascript" src="{$systemplate}js/jconfirmaction.jquery.js"></script>
{literal}
<script type="text/javascript">
$(window).load(function()
{
	$("#conbot").scrollTop($("#conbot")[0].scrollHeight);	
});
</script>
<script type="text/javascript">
 $(document).ready(function()
 { 
 	// Hover cannot be used in ajax as it bugs on leaving 
 	// but image fade is a different matter..
 	$("#conbot").hover(
		function () 
		{
			$("#paused").stop().fadeIn("fast");
		},
		function () 
		{
			$("#paused").stop().fadeOut();
		}
	);
 
 	// This part addresses an IE bug. without it, IE will only load the first number and will never refresh
	$.ajaxSetup({ cache: false }); 	
	// Set interval now	
	setInterval(function() 
	{	
		if($("#conbot").mouseIsOver()) 
		{
			// Does nothing..
		}
		else
		{
			$("#conbot").slideUp('slow').stop();
			//$("#conbot").empty();
			$('#conbot').load('{/literal}{$url}{literal}ajax/console_/{/literal}{$i.id|offset}/{$token}{literal}').slideDown();
			
			$("#conbot").scrollTop($("#conbot")[0].scrollHeight);
		}
	}, 5000);
	
	$('.ask').jConfirmAction({	
		{/literal}
		{nocache}
		question : "{$JQ_ARE_YOU_SURE}", 
		yesAnswer : "{$JQ_YES}", 
		cancelAnswer : "{$JQ_CANCEL}"
		{/nocache}
		{literal}
	});  
});
</script>
{/literal}
{/block}