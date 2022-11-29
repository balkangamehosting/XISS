{extends file='../admin/_global.tpl'}

{block name=title}{$SERVERS} :: {$BOX}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/box.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}		
	<div class="main_full">		
		
		<span class="font_small color_dark">{$BOXES_FOUND}: {count($data)} (<a href="{$url}box/add">{$ADD_BOX}</a>)</span>
		<table class="default_tbl">
			<tr>
				<th>{$ID_NAME}</th>
				<th>{$LOCATION}</th>
				<th>{$IPADDRESS}</th>
				<th>{$IPS}</th>				
				<th>{$SERVERS}</th>
				<th>{$SSH}</th>							
				<th>{$FTP}</th>
				<th>{$STATISTICS}</th>
			</tr>
			{nocache}
			{if !$data}
				<tr>
					<td>{$NO_BOXES_FOUND}</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			{else}
				{foreach from=$data key=myId item=i}	
				<tr>
					<td>#{$i.id|offset} <a href="{$url}box/show/{$i.id|offset}">{$i.name}</a></td>
					<td>{$i.location}</td>
					<td>{$i.ip}</td>
					<td>{$i.ips}</td>
					<td>{$i.servers}</td>
					<td><img src="{$systemplate}images/status/{$i.ssh|ssh}.png" /></td>
					<td><img src="{$systemplate}images/status/{$i.ftp|ftp}.png" /></td>
					<td class="font_small">					
						<i>{$LOAD}: </i> {$i.load_avg|sortBlank}<br />
						<i>{$MEMORY}: {$i.mem_used|sortBlank} (U) </i>					
					</td>
				</tr>
				{/foreach}
			{/if}
			{/nocache}								
					
		</table>	
	</div>
	
	{$pagination}
{/block}