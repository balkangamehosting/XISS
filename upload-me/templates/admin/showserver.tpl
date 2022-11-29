{extends file='../admin/_global.tpl'}

{block name=title}{$SERVERS} :: {$SHOW}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/servers.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}
{nocache}
{assign var=i value=$data}
	
	{if $i.boxid}
	<a class="butn" href="{$url}servers/webftp/{$i.id|offset}">{$WEBFTP}</a> 
	<a class="butn" href="{$url}servers/console/{$i.id|offset}">{$CONSOLE}</a>	
	<a class="butn" href="{$url}servers/manage/{$i.id|offset}">{$MANAGE}</a>
	
	<span class="right">
		{if $i.started}
		<a href="{$url}servers/actions/restart/{$i.id|offset}"><img src="{$template}images/status/restart.png"/></a>
		<a href="{$url}servers/actions/stop/{$i.id|offset}"><img src="{$template}images/status/stop.png"/></a>
		{else}
		<a href="{$url}servers/actions/start/{$i.id|offset}"><img src="{$template}images/status/start.png"/></a>
		{/if}
	</span>	
	
	{else}
		<a class="butn" href="{$url}servers/manage/{$i.id|offset}">{$MANAGE}</a>
		<span class="right">
			<a class="butn_cyan" style="color: #fff" href="{$url}servers/install/{$i.id|offset}">{$INSTALL_SERVER}</a>
		</span>
	{/if}
	<br />
	
	<div class="main_half">
		<h1>{$CLIENT_DETAILS}</h1>		
		<ul>			
			<li><div class="form_row"><div>{$GROUP}: </div> {$i.group|groups:$i.suspended} </div></li>	
			<li><div class="form_row"><div>{$LAST_VISIT}: </div> {$i.last_visit} </div></li>
			<li><div class="form_row"><div>{$LAST_IP}: </div> {$i.ip|sortBlank} </div></li>
			<li><div class="form_row"><div>{$FIRSTNAME}: </div> {$i.firstname|sortBlank}</div></li>
			<li><div class="form_row"><div>{$LASTNAME}: </div> {$i.lastname|sortBlank}</div></li>
			<li><div class="form_row"><div>{$USERNAME}: </div> {$i.username}</div></li>
			<li><div class="form_row"><div>{$EMAIL}: </div> {$i.email|sortBlank}</div></li>
		</ul>
	</div>
	
	<div class="main_half">
		<h1>{$SERVER_PROPERTIES}</h1>
		<ul>
			<li><div class="label">{$NAME}:</div> {$i.name}</li>
			<li><div class="label">{$GAME}:</div> {$i.game} {$i.version} </li>		
			<li><div class="label">{$IP}:</div> {$i.serverip|sortBlank} </li>
			<li><div class="label">{$PORT}:</div> {$i.port|sortBlank} </li>
			<li><div class="label">{$LOCATION}:</div> {$i.location|sortBlank} </li>			
			<!-- <li><div class="label">{$EXPIRES}:</div> in 40 days </li> -->			
			<li>&nbsp;</li>
			<li><div class="label">{$FTP_IP}:</div> {$i.ftpip|sortBlank}</li>
			<li><div class="label">{$FTP_PORT}:</div> {$i.ftpport|sortBlank}</li>
			<li><div class="label">{$FTP_USER}:</div> {$i.ftpuser}</li>
			<li><div class="label">{$FTP_PASSWORD}:</div> {$i.ftppass}</li>
		</ul>
	</div>
	
	<div class="main_half" id="toggle">
		<h1>{$STATUS} <span class="right"><a href="{$url}servers/show/{$i.id|offset}">{$REFRESH}</a></span></h1>
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