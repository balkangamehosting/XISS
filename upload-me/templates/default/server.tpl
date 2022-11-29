{extends file='_global.tpl'}

{block name=title}{$SERVER}{/block}

{block name=header}
<link rel="stylesheet" href="{$template}css/server.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}
{nocache}
{assign var=i value=$data}	
	
	<a class="butn" href="{$url}server/webftp/{$i.id|offset}">{$WEBFTP}</a> 
	<a class="butn" href="{$url}server/console/{$i.id|offset}">{$CONSOLE}</a>	
	
	<span class="right">
		{if $i.started}
		<a href="{$url}server/actions/restart/{$i.id|offset}"><img src="{$template}images/status/restart.png"/></a>
		<a href="{$url}server/actions/stop/{$i.id|offset}"><img src="{$template}images/status/stop.png"/></a>
		{else}
		<a href="{$url}server/actions/start/{$i.id|offset}"><img src="{$template}images/status/start.png"/></a>
		{/if}
	</span>	
	<br />
	
	<div class="main_half">
		<h1>{$SERVER_SETTINGS}</h1>
		<form action="{$url}server/edit_config/{$i.id|offset}" method="post">
			<fieldset>
				<div class="form_row"><div>{$NAME}: </div>  {$i.name}</div>	
				<div class="form_row"><div>{$SLOTS}: </div> {$i.slots}</div>				
				<div class="form_row"><div>{$TYPE}: </div> {if $i.type == 1}{$PRIVATE}{else}{$PUBLIC}{/if} </div>				
			</fieldset>	
			
				<div class="clearfix"></div>
				
			<fieldset>
				
				{if $i.cfg1}<div class="form_row"><div>{$i.cfg1}:</div> {if $i.cfg1edit}<input type="text" name="game[1]" value="{$i.cfg1name}"/>{else}{$i.cfg1name}{/if} </div>{/if}
				{if $i.cfg2}<div class="form_row"><div>{$i.cfg2}:</div> {if $i.cfg2edit}<input type="text" name="game[2]" value="{$i.cfg2name}"/>{else}{$i.cfg2name}{/if} </div>{/if}
				{if $i.cfg3}<div class="form_row"><div>{$i.cfg3}:</div> {if $i.cfg3edit}<input type="text" name="game[3]" value="{$i.cfg3name}"/>{else}{$i.cfg3name}{/if} </div>{/if}
				{if $i.cfg4}<div class="form_row"><div>{$i.cfg4}:</div> {if $i.cfg4edit}<input type="text" name="game[4]" value="{$i.cfg4name}"/>{else}{$i.cfg4name}{/if} </div>{/if}
				{if $i.cfg5}<div class="form_row"><div>{$i.cfg5}:</div> {if $i.cfg5edit}<input type="text" name="game[5]" value="{$i.cfg5name}"/>{else}{$i.cfg5name}{/if} </div>{/if}
				{if $i.cfg6}<div class="form_row"><div>{$i.cfg6}:</div> {if $i.cfg6edit}<input type="text" name="game[6]" value="{$i.cfg6name}"/>{else}{$i.cfg6name}{/if} </div>{/if}
				{if $i.cfg7}<div class="form_row"><div>{$i.cfg7}:</div> {if $i.cfg7edit}<input type="text" name="game[7]" value="{$i.cfg7name}"/>{else}{$i.cfg7name}{/if} </div>{/if}
				{if $i.cfg8}<div class="form_row"><div>{$i.cfg8}:</div> {if $i.cfg8edit}<input type="text" name="game[8]" value="{$i.cfg8name}"/>{else}{$i.cfg8name}{/if} </div>{/if}
				{if $i.cfg9}<div class="form_row"><div>{$i.cfg9}:</div> {if $i.cfg9edit}<input type="text" name="game[9]" value="{$i.cfg9name}"/>{else}{$i.cfg9name}{/if} </div>{/if}
				{if $i.cfg10}<div class="form_row"><div>{$i.cfg10}:</div> {if $i.cfg10edit}<input type="text" name="game[10]" value="{$i.cfg10name}"/>{else}{$i.cfg10name}{/if} </div>{/if}
				
				<div class="clearfix"></div>
								
				<input type="submit" value="{$SAVE}" />
			</fieldset>
		</form>
	</div>
	
	<div class="main_half">
		<h1>{$SERVER_PROPERTIES}</h1>
		<ul>
			<li><div class="label">{$GAME}:</div> {$i.game} ({$i.version}) </li>			
			<li><div class="label">{$IP}:</div> {$i.ip} </li>
			<li><div class="label">{$PORT}:</div> {$i.port} </li>
			<li><div class="label">{$LOCATION}:</div> {$i.location} </li>			
			<!-- <li><div class="label">{$EXPIRES}:</div> in 40 days </li> -->
			<!-- <li><div class="label">Server Account:</div> <a href="#">Manage</a> </li> -->
			<li>&nbsp;</li>
			<li><div class="label">{$FTP_IP}:</div> {$i.ip}</li>
			<li><div class="label">{$FTP_PORT}:</div> {$i.ftpport}</li>
			<li><div class="label">{$FTP_USER}:</div> {$i.ftpuser}</li>
			<li><div class="label">{$FTP_PASSWORD}:</div> {$i.ftppass}</li>
		</ul>
	</div>
	
	<div class="main_half" id="toggle">
		<h1>{$STATUS} <span class="right"><a href="{$url}server/show/{$i.id|offset}">{$REFRESH}</a></span></h1>
		<ul id="status">
			{if !$i.boxid}
			<li><div class="label">Server Status:</div> <span class="color_red">{$PENDING}</span></li>
			{else}	
				{if !$i.started}
					<li><div class="label">N/a</div></li>
				{else}	
				{section name=$i.name loop=$serverData} 			
					{foreach from=$serverData[$i.name] item=value key=label}				
					<li><div class="label_alt">{$label}</div> {$value}</li>
					{/foreach}
				{/section}
				{/if} 
			{/if}		
		</ul>
	</div>
	
	<div class="clear"></div>
	
{/nocache}
{literal}
<script type="text/javascript">
$(window).load(function()
{
	$("#status").hide();
	
	$("#toggle").hover( 
		function() 
		{
			$("#status").stop().fadeIn("normal");
			$("#status").slideDown("slow");
		},
		function() 
		{	
			var aTag =  $("head");
			$('html,body').stop().animate({scrollTop: aTag.offset().top},'slow');
			$("#status").stop().fadeOut("fast");
			$("#status").slideUp("slow");
		}
	);
});
</script>
{/literal}	
{/block}