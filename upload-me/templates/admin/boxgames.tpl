{extends file='../admin/_global.tpl'}

{block name=title}{$BOX} :: {$GAMES}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/index.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}


	<a class="butn" href="{$url}box/show/{$id|offset}">&lsaquo; {$BACKTO}</a>	
	<br />

	<div class="main_full">
	<h1>{$INSTALLED_GAMES}</h1>
		<table class="default_tbl">
			<tr>
				<th>{$LABEL}</th>
				<th>{$GAME}</th>
				<th>{$INSTALL_PATH}</th>
				<th></th>
			</tr>
			{nocache}
			{foreach from=$games key=myId item=g}
			<tr>
				<td>{$g.name}</td>
				<td>{$g.version}</td>
				<td>{$g.installdir}</td>							
				<td><img src="{$systemplate}images/status/{if $g.installed}ok{else}error{/if}.png" /></td>
			</tr>
			{/foreach}
			{/nocache}
		</table>
			
	</div>
{/block}