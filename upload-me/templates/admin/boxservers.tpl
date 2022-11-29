{extends file='../admin/_global.tpl'}

{block name=title}{$BOX} :: {$SERVERS}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/clients.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}
	<a class="butn" href="{$url}box/show/{$id}">&lsaquo; {$BACKTO}</a>	<br />	
	
	<div class="main_full">		
			
		<span class="font_small color_dark">{$SERVERS_FOUND}: {nocache}{count($data)}{/nocache}</span>
			<table class="default_tbl">
			<tr>
				<th>{$STATUS}</th>
				<th>{$NAME}</th>
				<th>{$GAME}</th>
				<th>{$INFO} <span class="font_small">( <a href="#">{$REFRESH}</a> )</span></th>			
				<th>{$ACTIONS}</th>
			</tr>
			
		{nocache}
		{foreach from=$data key=myId item=i}		
		{if $i.boxid}
			<tr>			
				<td>
				{if $i.started}
				<img src="{$template}images/status/ok.png"/>
				{else}
				<img src="{$template}images/status/ok_off.png"/>
				{/if}
				</td>
				<td><a href="{$url}servers/show/{$i.serverid|offset}">{$i.name}</a></td>
				<td class="font_small">
					{$i.game}  ( {$i.version} ) <br />
					{$i.user} ( {$i.firstname}, {$i.lastname} )
				</td>
				<td class="font_small">
					<span>{$IP}: {$i.ip} : {$i.port} </span>
					<span>{$PLAYERS}: {if $i.started}{$i.name|gamequery:$i.querycode:$i.ip:$i.port:"gq_numplayers":true}{else}N/a{/if} / {$SLOTS}: {$i.slots} <br /></span>
					<!-- <span>{$EXPIRES}: in 4 days</span> -->
				</td>			
				<td>
					{if $i.started}
					<a href="{$url}servers/actions/restart/{$i.serverid|offset}"><img src="{$template}images/status/restart.png"/></a>
					<a href="{$url}servers/actions/stop/{$i.serverid|offset}"><img src="{$template}images/status/stop.png"/></a>
					{else}
					<a href="{$url}servers/actions/start/{$i.serverid|offset}"><img src="{$template}images/status/start.png"/></a>
					{/if}
				</td>
			</tr>
		{else}
			<tr class="inactive">			
				<td><img src="{$template}images/status/warning.png"/></td>
				<td><a href="{$url}servers/show/{$i.serverid|offset}">{$i.name}</a></td>
				<td class="font_small">
					{$i.game}  ( {$i.version} ) <br />
					{$i.user} ( {$i.firstname}, {$i.lastname} )
				</td>
				<td></td>
				<td class="font_small"><a class="butn_cyan" style="color: #fff" href="{$url}servers/install/{$i.serverid|offset}">{$INSTALL_SERVER}</a></td>	
			</tr>
		{/if}
		{/foreach}
		{/nocache}
		
		</table>	
	</div>
	
	{nocache}
	{$pagination}
	{/nocache}
	
{/block}