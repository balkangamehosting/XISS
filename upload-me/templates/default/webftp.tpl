{extends file='_global.tpl'}

{block name=title}{$SERVER}:: {$WEBFTP}{/block}

{block name=header}
<link rel="stylesheet" href="{$template}css/webftp.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}	
{nocache}
{assign var=d value=$data}
{nocache}	
	<a class="butn" href="{$url}server/show/{$d.id|offset}">&lsaquo; {$BACKTO_SERVER}</a>
{/nocache} 	
	
	<span class="right font_small color_dark">
{nocache} 
	<i>{$FTP_DETAILS}</i> - {$FTP_DETAILS_FULL} 
{/nocache} 
	</span>	
	
	<div class="main_full">
		
		{if $goup}
		<a class="navicons" href="{$url}server/webftp/{$d.id|offset}"><img  src="{$template}images/icons/home.png" /></a>		
		<a class="navicons" href="{$filepath}"><img src="{$template}images/icons/back.png" /></a>
		<br />
		{/if}
		
		<table class="default_tbl">
			<tr>
				<th>{$FTP_FILE}</th>
				<th>{$FTP_SIZE}</th>
				<th>{$FTP_OWNER}</th>
				<th>{$FTP_GROUP}</th>			
				<th>{$FTP_PERMS}</th>
				<th></th>				
			</tr>
			
{nocache}
			{foreach from=$list key=myId item=i}
			<tr>
				{if $i.notdir}
					<td class="text_left">
					{if $i.icontype == "edit"}
						<a href="{$url}server/ftp_actions/{$d.id|offset}/edit/{$file}{$i.name}" class="file"><img src="{$template}images/icons/{$i.icontype}.png"/> {$i.name}</a>
					{else}
						<img src="{$template}images/icons/{$i.icontype}.png"/> {$i.name}
					{/if}
					</td>
				{else}
					<td class="text_left"><a href="{$fileurl}/{$i.name}"><img src="{$template}images/icons/dir.png"/> {$i.name}</a></td>
				{/if}
				<td class="font_small">	{$i.size}</td>	
				<td class="font_small"> {$i.owner}</td>
				<td class="font_small">	{$i.group}</td>			
				<td class="font_small">	{$i.perms}</td>	
				<td>
					<a href="{$url}server/ftp_actions/{$d.id|offset}/delete/{$file}{$i.name}"><img src="{$template}images/icons/delete.png"/></a>
					<!--
					{if $i.notdir}
						<a href="{$url}server/ftp_actions/{$d.id|offset}/download/{$file}{$i.name}"><img src="{$template}images/icons/download.png"/></a>
					{/if}
					-->
				</td>
			</tr>
			{/foreach}
{/nocache}
		</table>
		
		<div class="clearfix"></div>
{nocache} 		
		<div class="options">
			<form class="ftp" action="{$url}server/ftp_actions/{$d.id|offset}/upload" method="post" enctype="multipart/form-data">
			<fieldset>
				<label>{$FTP_UPLOAD}:</label> <input type="file" name="file" />
				<input type="submit" name="submit" value="{$UPLOAD}" />
				<input type="hidden" name="path" value="{$file}" />
			</fieldset>
			</form>
			
			<form class="ftp" action="{$url}server/ftp_actions/{$d.id|offset}/mkdir" method="post">
			<fieldset>
				<label>{$FTP_NEWDIR}:</label> <input type="text" name="mkdir" />
				<input type="submit" name="submit" value="{$CREATE}" />
				<input type="hidden" name="path" value="{$file}" />
			</fieldset>
			</form>
			
			<!--
			<form class="ftp" action="{$url}server/ftp_actions/{$d.id|offset}/mkfile" method="post">
			<fieldset>
				<label>{$NEWFILE}:</label> <input type="text" name="mkfile" />				
				<input type="submit" name="submit" value="{$CREATE}" />
				<input type="hidden" name="path" value="{$file}" />
			</fieldset>
			</form>
			-->
		</div>
{/nocache} 		
	</div>	
	
{/block}