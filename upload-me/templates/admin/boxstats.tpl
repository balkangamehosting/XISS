{extends file='../admin/_global.tpl'}

{block name=title}{$BOX} :: {$SERVERS}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/box.css" type="text/css" media="screen" charset="utf-8" />

{/block}

{block name=lang}{/block}

{block name=body}
{nocache}
	<a class="butn" href="{$url}box/show/{$id|offset}">&lsaquo; {$BACKTO}</a>	
	<a class="butn_bright ask" href="{$url}box/charts/{$id|offset}">{$ACTUAL}</a>
	<a class="butn_bright ask" href="{$url}box/charts/{$id|offset}/daily">{$DAY}</a>
	<a class="butn_bright ask" href="{$url}box/charts/{$id|offset}/weekly">{$WEEK}</a>
	<a class="butn_bright ask" href="{$url}box/charts/{$id|offset}/monthly">{$MONTH}</a>
	<br />
	<span class="font_small color_red">
		{foreach from=$data key=myId item=i name=dataArr}
		{if $smarty.foreach.dataArr.last}
		{$LAST_UPDATED}: {$i.created}
		{/if}
		{/foreach} <span class="color_dark">|</span> 
		{$UPTIME}: {$uptime}
	</span>
	<br />	
	
	<div class="main_half">			
		<h1>{$RAM}</h1> 
		<div id="chart_ram" style="width:455px; height:250px;"></div>
	</div>
	
	<div class="main_half">			
		<h1>{$LOAD}</h1>
		<div id="chart_load" style="width:455px; height:250px;"></div>
	</div>
	
	<div class="main_half">
		<h1>{$HDD}</h1>
		<div id="chart_hdd" style="width:455px; height:250px;"></div>
	</div>
	
	<div class="main_half">
		<h1>{$SWAP}</h1>
		<div id="chart_swap" style="width:455px; height:250px;"></div>
	</div>
	
	<div class="main_full">
		<h1>{$BANDWIDTH}</h1>
		<div id="chart_bandwidth" style="width:960px; height:250px;"></div>
	</div>

<link rel="stylesheet" href="{$systemplate}css/vendors/morris.css">
<script src="{$systemplate}js/raphael-min.js"></script>
<script src="{$systemplate}js/morris.min.js"></script>
{literal}
<script type="text/javascript">

new Morris.Line({
	element: 'chart_ram',
	behaveLikeLine: true,
	data: 
	[	
		{/literal}{foreach from=$data key=myId item=i name=dataArr}{literal}
		{x: {/literal}'{if $timeSec}{$i.time_created}{else}{$i.date_created}{/if}', 
		total: '{$i.mem_total|getnum:2}', 
		free: '{$i.mem_free|getnum:2}', 
		used: '{$i.mem_used|getnum:2}',
		peak_total: '{$i.mem_total_peak|getnum:2}',
		peak_free: '{$i.mem_free_peak|getnum:2}',
		peak_used: '{$i.mem_used_peak|getnum:2}'
		{literal}}{/literal}{if not $smarty.foreach.dataArr.last},{/if}
		{/foreach}{literal}
	],
	xkey: 'x',
	ykeys: ['total', 'free', 'used', 'peak_total', 'peak_free', 'peak_used' ],
	labels: [{/literal}'{$AVERAGE} {$TOTAL}', '{$AVERAGE} {$FREE}', '{$AVERAGE} {$USED}', '{$PEAK} {$TOTAL}', '{$PEAK} {$FREE}', '{$PEAK} {$USED}'{literal}],
	//ymax: 2200, // FIXME
	lineColors: ['limegreen', 'green', 'darkgreen', 'darkorange', 'teal', 'gray' ],	
	fillOpacity: 0.3,
	parseTime: false,
	postUnits: " Mb",	
	hideHover: false
});

new Morris.Area({
	element: 'chart_load',
	behaveLikeLine: true,
	data: 
	[	
		{/literal}{foreach from=$data key=myId item=i name=dataArr}{literal}
		{x: {/literal}'{if $timeSec}{$i.time_created}{else}{$i.date_created}{/if}', avg: '{$i.load_avg|getnum:2}', peak: '{$i.load_avg_peak|getnum:2}'
		{literal}}{/literal}{if not $smarty.foreach.dataArr.last},{/if}
		{/foreach}{literal}
	],
	xkey: 'x',
	ykeys: ['avg', 'peak'],
	labels: [{/literal}'{$AVERAGE} {$LOAD}', '{$PEAK} {$LOAD}'{literal}],
	//ymax: 2200, // FIXME		
	fillOpacity: 0.3,
	parseTime: false,	
});

new Morris.Donut({
	element: 'chart_hdd',
	behaveLikeLine: true,
	data: 
	[	
	{/literal}{foreach from=$data key=myId item=i name=dataArr}
	{if $smarty.foreach.dataArr.last}
	{literal}
		{value: {/literal}'{($i.hdd_total - $i.swap_total)|percs:$i.hdd_used}', label: '{$USED}' {literal}},
		{value: {/literal}'{($i.hdd_total - $i.swap_total)|percs:$i.hdd_free}', label: '{$FREE}'{literal}}
	{/literal}
	{/if}
	{/foreach}{literal}
	],
	 backgroundColor: '#ccc',
	labelColor: '#1f7fa7',
	colors: 
	[
		'#00b4ff',
		'#089ddb',
		'#168cbe',
		'#1f7fa7'
	],
	formatter: function (x) { return x + "%"}	
});

new Morris.Donut({
	element: 'chart_swap',
	behaveLikeLine: true,
	data: 
	[	
	{/literal}{foreach from=$data key=myId item=i name=dataArr}
	{if $smarty.foreach.dataArr.last}
	{literal}
		{value: {/literal}'{$i.swap_total|percs:$i.swap_used}', label: '{$USED}' {literal}},
		{value: {/literal}'{$i.swap_total|percs:$i.swap_free}', label: '{$FREE}'{literal}}
	{/literal}
	{/if}
	{/foreach}{literal}
	],
	 backgroundColor: '#ccc',
	labelColor: '#060',
	colors: 
	[
		'#0BA462',
		'#39B580',
		'#67C69D',
		'#95D7BB'
	],
	formatter: function (x) { return x + "%"}	
});

new Morris.Line({
	element: 'chart_bandwidth',
	behaveLikeLine: false,
	data: 
	[	
		{/literal}{foreach from=$data key=myId item=i name=dataArr}{literal}
		{x: {/literal}'{if $timeSec}{$i.time_created}{else}{$i.date_created}{/if}', 
		tx: '{$i.band_send|getnum:2}', 
		rx: '{$i.band_rec|getnum:2}',
		tx_peak: '{$i.band_send_peak|getnum:2}',
		rx_peak: '{$i.band_rec_peak|getnum:2}'
		{literal}}{/literal}{if not $smarty.foreach.dataArr.last},
		{/if}
		{/foreach}{literal}
	],
	xkey: 'x',
	ykeys: ['tx', 'rx', 'tx_peak', 'rx_peak'],
	labels: [{/literal}'{$AVERAGE} {$BAND_TX}', '{$AVERAGE} {$BAND_RX}', '{$PEAK} {$BAND_TX}', '{$PEAK} {$BAND_RX}'{literal}],
	//ymax: 2200, // FIXME
	lineColors: ['red', 'blue', 'darkorange', 'teal' ],	
	fillOpacity: 0.3,
	parseTime: false,
	postUnits: " Mb"
});


</script>
{/literal}
{/nocache}
{/block}