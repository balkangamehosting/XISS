{extends file='../admin/_global.tpl'}

{block name=title}{$IND_HOME}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/index.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=body}	
	{$IND_WELCOME}<br />

{nocache}
{assign var=i value=$data}	
{/nocache}	

	<div class="main_third">
		<h1>{$IND_CLIENTS}</h1>		
		<ul>
{nocache}		
			<li>
				<a href="#">{$IND_ACTIVE}</a> ({$i.users_active}):
				<div class="graph">
					<strong class="bar_ok" style="width:{$usrActive}%;">{$usrActive}%</strong>
				</div>				
				<div class="clear"></div>
			</li>
			<!--
			<li>
				<a href="#">{$IND_EXPIRED}</a> (10):
				<div class="graph">
					<strong class="bar_warn" style="width:90%;">90%</strong>
				</div>				
				<div class="clear"></div>
			</li>
			-->
			<li>
				<a href="#">{$IND_SUSPENDED}</a> ({$i.users_suspended}):
				<div class="graph">
					<strong class="bar_warn" style="width:{$usrSuspended}%;">{$usrSuspended}%</strong>
				</div>				
				<div class="clear"></div>
			</li>
{nocache}			
		</ul>
	</div>
	
	<div class="main_third">
		<h1>{$IND_SERVERS}</h1>
		<ul>
{nocache}		
			<li>
				<a href="#">{$IND_PENDING}</a> {$i.servers_pending}:
				<div class="graph">
					<strong class="bar_error" style="width:{$srvPending}0%;">{$srvPending}%</strong>
				</div>				
				<div class="clear"></div>
			</li>
			<li>
				<a href="#">{$IND_ACTIVE}</a> ({$i.servers_active}):
				<div class="graph">
					<strong class="bar_ok" style="width:{$srvActive}%;">{$srvActive}%</strong>
				</div>				
				<div class="clear"></div>
			</li>
			<!--
			<li>
				<a href="#">{$IND_SUSPENDED}</a> (0):
				<div class="graph">
					<strong class="bar_warn" style="width:70%;">70%</strong>
				</div>				
				<div class="clear"></div>
			</li>
			-->
		</ul>
{/nocache}		
	</div>
	
	<div class="main_third">
		<h1>{$IND_BOXES}</h1>
		<ul>
{nocache}		
			<li>
				<a href="#">{$IND_ONLINE}</a> ({$i.boxes}):
				<div class="graph">
					<strong class="bar_info" style="width:100%;">100%</strong>
				</div>				
				<div class="clear"></div>
			</li>	
			<!--		
			<li>
				<a href="#">{$IND_OFFLINE}</a> (0):
				<div class="graph">
					<strong class="bar_info" style="width:30%;">30%</strong>
				</div>				
				<div class="clear"></div>
			</li>
			<li>
				<a href="#">{$IND_UNREACHABLE}</a> (1):
				<div class="graph">
					<strong class="bar_error" style="width:10%;">10%</strong>
				</div>				
				<div class="clear"></div>
			</li>
			-->
		</ul>
{/nocache}		
	</div>
	
	<div class="clear"></div>
	
	<div class="main_full">
	
		{if $isAdmin}
		<div class="notes">
			<form action="{$url}admin/announce" method="post">
			<h1>{$IND_ANNOUNCEMENT}</h1>
			<textarea name="news"></textarea>	
			<input type="submit" name="submit" value="{$PUBLISH}" />
			</form>
		</div>
		
		<div class="clearfix"></div>
		{/if}
		
		{if $news}
		<div class="announcement">
			<h1>{$ANNOUNCEMENT}</h1>
			<p>{$news}</p>
		</div>
		
		<div class="clearfix"></div>
		{/if}
		
		<span class="font_small color_dark">{$IND_LAST_15_EVENTS} (<a href="{$url}utilities/logs">{$VIEW_ALL}</a>)</span>
		<table class="default_tbl">
			<tr>
				<th>{$IND_ID}</th>
				<th>{$IND_MESSAGE}</th>
				<th>{$IND_CLIENT}</th>
				<th>{$IND_TIMESTAMP}</th>
			</tr>
			
{nocache}
			{foreach from=$logs key=myId item=l}	
			<tr>
				<td>#{$l.lid|offset}</td>
				<td>{$l.type|logs:$l.holder} </td>
				<td><a href="{$url}clients/show/{$l.id|offset}">{$l.username}</a></td>
				<td>{$l.created}</td>
			</tr>
			{/foreach}			
{/nocache}
		</table>
	
	</div>
	
{/block}