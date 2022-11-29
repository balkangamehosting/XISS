{extends file='../admin/_global.tpl'}

{block name=title}{$ADMIN}:: {$ANNOUNCEMENT}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/index.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}
{nocache}
{assign var=i value=$data}	
	<a class="butn" href="{$url}">&lsaquo; {$GO_BACK}</a>	
	
	<div class="main_full">
	{if $isAdmin}
		<form method="post" action="{$url}admin/news_action/{$i.id|offset}">
		
			<textarea name="content" class="editfile">{$i.news}</textarea>
			<div class="clearfix"></div>			
			
			<span class="left"><input type="submit" name="delete" value="{$DELETE}" /></span>
			<span class="right"><input type="submit" name="save" value="{$SAVE}" /></span>	
		
		</form>
	{else}
		<div class="announcement">
			<h1>{$ANNOUNCEMENT}</h1>
			<p>{$news}</p>
		</div>
	{/if}
	</div>
{/nocache}

{/block}