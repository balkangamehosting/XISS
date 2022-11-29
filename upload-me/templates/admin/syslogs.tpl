{extends file='../admin/_global.tpl'}

{block name=title}{$UTILITIES} :: {$LOGS}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/index.css" type="text/css" media="screen" charset="utf-8" />
<link href="{$systemplate}css/vendors/jconfirm.css" rel="stylesheet" type="text/css" media="screen" />
{/block}

{block name=lang}{/block}

{block name=body}	
	<span class="right"><a class="butn ask" href="{$url}utilities/purge">{$PURGE_LOGS}</a></span>
	<br />

	<div class="main_full">
	<h1>{$LOGS}</h1>
		<table class="default_tbl">
			<tr>
				<th>{$ID}</th>
				<th>{$MESSAGE}</th>
				<th>{$CLIENT}</th>
				<th>{$TIMESTAMP}</th>
			</tr>
			{nocache}
			{foreach from=$data key=myId item=i}
			<tr>
				<td>#{$i.id|offset}</td>				
				<td>{$i.type|logs:$i.holder}</td>
				<td><a class="color_dark" href="{$url}clients/show/{$i.uid|offset}">( {$i.user} )</a></td>			
				<td>{$i.created}</td>
			</tr>					
			{/foreach}	
			{/nocache}	
					
		</table>
			
	</div>
	
	{nocache}
	{$pagination}
	{/nocache}	

<script type="text/javascript" src="{$systemplate}js/jconfirmaction.jquery.js"></script>
{literal}
<script type="text/javascript">
 $(document).ready(function()
 { 
	$('.ask').jConfirmAction({	
		{/literal}
		{nocache}
		question : "{$JQ_ARE_YOU_SURE}", 
		yesAnswer : "{$JQ_YES}", 
		cancelAnswer : "{$JQ_CANCEL}"
		{/nocache}
		{literal}
	});  
});
</script>
{/literal}	
{/block}