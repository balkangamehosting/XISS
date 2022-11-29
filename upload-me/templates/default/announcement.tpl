{extends file='_global.tpl'}

{block name=title}{$ANNOUNCEMENT}{/block}

{block name=header}
<link rel="stylesheet" href="{$template}css/index.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}
{nocache}
{assign var=i value=$data}	
	<a class="butn" href="{$url}">&lsaquo; {$GO_BACK}</a>	
	
	<div class="main_full">
		<div class="announcement">
			<h1>{$ANNOUNCEMENT}</h1>
			<p>{$news}</p>
		</div>
	</div>
{/nocache}

{/block}