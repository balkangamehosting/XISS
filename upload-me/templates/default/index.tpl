{extends file='_global.tpl'}

{block name=title}{$HOME}{/block}

{block name=header}
<link rel="stylesheet" href="{$template}css/index.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=body}	
	{$WELCOME}<br />
{nocache}
{assign var=i value=$data}	
{/nocache}
	
	<div class="main_third">
		<h1>{$DETAILS}</h1>
		<ul>
{nocache}
			<li><b>{$NAME}:</b> {$i.username} ({$i.firstname|sortBlank}, {$i.lastname|sortBlank})</li>
			<li><b>{$EMAIL}:</b> {$i.email} </li>
{/nocache}
		</ul>
	</div>
	
	<div class="main_third">
		<h1>{$SERVERS}</h1>
		<ul>
{nocache}		
			<li><b>{$GAMESERVERS}:</b> {$i.servers}</li>
			<li><b>{$PENDING}:</b> {$i.servers_pending}</li>
{/nocache}			
		</ul>
	</div>
	
	<div class="main_third">
		<h1>{$MESSAGES}</h1>
		<ul>
{nocache}	
		{foreach from=$latest key=myId item=l}		
			<li> ! <a href="{$url}index/show/{$l.id|offset}">{$l.news|cut:40}</a></li>
		{/foreach}
{/nocache}						
		</ul>
	</div>
	
	<div class="clear"></div>
	
	<div class="main_full">
	<!--
		{if $news}
		<div class="announcement">
			<h1>{$ANNOUNCEMENT}</h1>
			<p>{$news}</p>
		</div>
	
		<div class="clearfix"></div>
		{/if}
	-->	
	
		<table class="default_tbl">
			<tr>
				<th>{$STATUS}</th>
				<th>{$NAME}</th>
				<th>{$GAME}</th>
				<th>{$INFO} <span class="font_small">( <a href="{$url}">{$REFRESH}</a> )</span></th>			
				<th>{$ACTIONS}</th>
			</tr>
			
			{nocache}
			
			{if !$servers && !$i.servers_pending}
				<tr>
					<td>{$NO_SERVERS}</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			{elseif !$servers && $i.servers_pending}	
				<tr class="inactive">			
					<td><img src="{$template}images/status/warning.png"/></td>
					<td></td>
					<td class="font_small"></td>
					<td>{$PENDING_SERVER}</td>
					<td class="font_small"></td>	
				</tr>
			{else}			
				{foreach from=$servers key=myId item=i}	
					<tr>			
						<td>
						{if $i.started}
							<img src="{$template}images/status/ok.png"/>
						{else}
							<img src="{$template}images/status/ok_off.png"/>
						{/if}
						</td>
						<td><a href="{$url}server/show/{$i.serverid|offset}">{$i.name}</a></td>
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
								<a href="{$url}server/actions/restart/{$i.serverid|offset}"><img src="{$template}images/status/restart.png"/></a>
								<a href="{$url}server/actions/stop/{$i.serverid|offset}"><img src="{$template}images/status/stop.png"/></a>
							{else}
								<a href="{$url}server/actions/start/{$i.serverid|offset}"><img src="{$template}images/status/start.png"/></a>
							{/if}
						</td>
					</tr>
				{/foreach}
			{/if}
			</table>	
		</div>
		
		{nocache}
		{$pagination}
		{/nocache}
	
	</div>
	
{/block}