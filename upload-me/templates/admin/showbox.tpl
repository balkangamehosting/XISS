{extends file='../admin/_global.tpl'}

{block name=title}{$BOX}:: {$SHOW}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/box.css" type="text/css" media="screen" charset="utf-8" />
<link href="{$systemplate}css/vendors/jconfirm.css" rel="stylesheet" type="text/css" media="screen" />
{/block}

{block name=lang}{/block}

{block name=body}
{nocache}
{assign var=i value=$data}	

	<a class="butn_cyan" href="{$url}box/manage/{$i.id|offset}">{$MANAGE}</a>
	<a class="butn_bright" href="{$url}box/servers/{$i.id|offset}">{$SERVERS}</a>
	<a class="butn_bright" href="{$url}box/games/{$i.id|offset}">{$GAMES}</a> 
	<a class="butn_bright" href="{$url}box/logs/{$i.id|offset}">{$LOGS}</a>
	<a class="butn_bright" href="{$url}box/charts/{$i.id|offset}">{$STATS}</a>
	
	<span class="right">
	<a class="butn ask" href="{$url}box/delete/{$i.id|offset}">{$DELETE}</a>
	</span>
	<br />	

	<div class="main_half">
	
		<h1>{$DETAILS}</h1>		
					
		<div class="form_row"><div>{$NAME}: </div> {$i.name}</div>	
		<div class="form_row"><div>{$LOCATION}: </div> {$i.location} </div>
		<div class="form_row"><div>{$IP}: </div> {$i.ip} </div>
		<div class="form_row"><div>{$OS_TYPE}: </div> {$i.ostype|sortBlank}</div>
		<div class="form_row"><div>{$DISTRO}: </div> {$i.distro} {$i.distro_version|sortBlank}</div>
		<div class="form_row"><div>{$CPU}: </div> {$i.cpu|sortBlank} </div>
		<div class="form_row"><div>{$MEMORY}: </div> {$i.ram|sortBlank}</div>
		<div class="form_row"><div>{$HDD}: </div> {$i.hdd|sortBlank}</div>
		<div class="form_row"><div>{$NETWORK}: </div> {$i.network|sortBlank} {$i.nettype}</div>
		<div class="form_row"><div>{$COST}: </div> {$i.cost|sortBlank} {$i.valute}</div>	
		<div class="form_row"><div>{$BOX_OWNER}: </div> <a href="{$url}clients/show/{$i.userid|offset}">{$i.username} ({$i.firstname}, {$i.lastname})</a></div>	
	</div>
	
	<div class="main_half">
	
		<h1>{$STATUS}</h1>		
		<div class="form_row"><div>{$IP}: </div> {$i.ip} </div>
		<div class="form_row"><div>{$SSH_USER}: </div> {$i.sshuser} </div>
		<div class="form_row"><div>{$SSH_PASSWORD}: </div> {$i.sshpass|cut:"4"} </div>			
		<div class="form_row"><div>{$FTP}: </div> <img style="width: 16px; height: 16px" src="{$systemplate}images/status/{$i.ftp|ftp}.png" /> (Port: {$i.ftpport}) </div>	
		<div class="form_row"><div>{$SSH}: </div> <img style="width: 16px; height: 16px" src="{$systemplate}images/status/{$i.ssh|ssh}.png" /> (Port: {$i.sshport}) </div>
	</div>
	
	<div class="clear"></div>
	
	<div class="main_half">
	
		<h1>{$LAST_5_ENTRIES}</h1>		
		
		{foreach from=$logs key=myId item=l}
			<div class="form_row"><div>{$l.created}: </div> {$l.type|logs:$l.holder} <a class="color_dark" href="{$url}clients/show/{$l.id|offset}">( {$l.user} )</a></div>		
		{/foreach}			
		
	</div>
	
	<div class="main_half">
	
		<h1>{$LAST_5_STATS}</h1>
		
		<div class="form_row"><div>{$RAM}: </div>
			<span class="font_small right">
				<span class="ram"></span>
			</span>
		</div>	
		
		<br />
		<div class="form_row"><div>{$LOAD}: </div>
			<span class="font_small right">
				<span class="load"></span>
			</span>
		</div>		
	</div>
	
	<div class="main_full">
	
		<span class="font_small color_dark">{$IP_ASSIGNED}: {count($ips)} (<a href="{$url}box/addip/{$i.id|offset}">{$ADD_IP}</a>)</span>
		<table class="default_tbl">
			<tr>
				<th>{$IP}</th>
				<th>{$SERVERS}</th>
				<th>{$SLOTS}</th>
				<th>{$USED_PORTS}</th>				
				<th></th>
			</tr>
			{foreach from=$ips key=myId item=p}
			<tr>				
				<td>{$p.ip}</td>
				<td>{$p.servers}</td>
				<td>{if !$p.slots} 0 {else} {$p.slots} {/if}</td>
				<td>{$p.ports}</td>
				<td><a href="{$url}box/delete_ip/{$p.id|offset}"><img id="{$p.id|offset}" src="{$systemplate}images/icons/delete.png" /></a></td>
			</tr>	
			{/foreach}
		</table>	
	
	</div>

<script type="text/javascript" src="{$systemplate}js/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="{$systemplate}js/jconfirmaction.jquery.js"></script>
{literal}
<script type="text/javascript">
$(function() {
   	var ram = [{/literal}{foreach from=$stats key=myId item=s}{$s.mem_used|getnum},{/foreach}{literal} 0];
   	var load = [{/literal}{foreach from=$stats key=myId item=s}{$s.load_avg|getnum},{/foreach}{literal} 0];
    	
	/* The second argument gives options such as chart type */
	$('.ram').sparkline(ram, {type: 'bar', barColor: 'blue'} );
        
	/* The second argument gives options such as chart type */
	$('.load').sparkline(load, {type: 'bar', barColor: 'green'} );
	
	$('.ask').jConfirmAction({
		{/literal}
		question : "{$JQ_ARE_YOU_SURE}", 
		yesAnswer : "{$JQ_YES}", 
		cancelAnswer : "{$JQ_CANCEL}"
		{literal}
	});        
});
</script>
{/literal}
{/nocache}
{/block}