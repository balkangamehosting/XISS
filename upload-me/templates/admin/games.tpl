{extends file='../admin/_global.tpl'}

{block name=title}{$SETTINGS} :: {$GAMES}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/box.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}	
	
	<div class="main_full">		
		
		<span class="font_small color_dark">{nocache}{count($data)}{/nocache} {$RECORDS_FOUND} (<a href="{$url}configuration/add_game">{$ADD_A_GAME}</a>)</span>
		<table class="default_tbl">
			<tr>
				<th>{$NAME}</th>
				<th>{$GAME}</th>
				<th>{$SLOTS_AVAILABLE}</th>
				<th>{$QUERY}</th>				
				<th>{$DIRECTORY}</th>
				<th></th>
			</tr>
			{nocache}
			{foreach from=$data key=myId item=i}
			<tr>
				<td>{$i.name}</td>
				<td>{$i.version}</td>
				<td>{$i.slots} {$SLOTS_FREE}</td>
				<td>{$i.querycode}</td>
				<td>{$i.installdir}</td>
				<td><a href="{$url}configuration/manage_game/{$i.id|offset}"><img src="{$systemplate}images/icons/exec.png" /></a></td>
			</tr>			
			{/foreach}
			{/nocache}		
		</table>	
	</div>
	
	{$pagination}
	
{/block}