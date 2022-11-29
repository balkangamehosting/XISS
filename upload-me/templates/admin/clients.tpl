{extends file='../admin/_global.tpl'}

{block name=title}{$CLIENTS}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/clients.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}
	
	<div class="main_full">		
		
		<span class="font_small color_dark">{$CLIENTS} (<a href="{$url}clients/add">{$ADD_A_CLIENT}</a>)</span>
		<table class="default_tbl">
			<tr>
				<th>{$ID}</th>				
				<th>{$USERNAME}</th>
				<th>{$FIRSTNAME}, {$LASTNAME}</th>				
				<th>{$EMAIL}</th>
				<th>{$SERVERS}</th>							
				<th>{$LAST_LOGIN}</th>
				<th>{$ACCOUNT}</th>
			</tr>
			{nocache}
			{foreach from=$data key=myId item=i}
			<tr {if $i.suspended}class="inactive"{/if}>
				<td>#{$i.id|offset}</td>
				<td><a href="{$url}clients/show/{$i.id|offset}">{$i.username}</a></td>				
				<td>{$i.firstname} {$i.lastname}</td>
				<td>{$i.email}</td>
				<td>{$i.servers}</td>
				<td class="font_small">{$i.last_visit}</td>
				<td class="font_small">
					<i>{$i.group|groups:$i.suspended}</i>
				</td>
			</tr>					
			{/foreach}
			{/nocache}
		</table>
		
	</div>
	
	{nocache}{$pagination}{/nocache}
	
{/block}