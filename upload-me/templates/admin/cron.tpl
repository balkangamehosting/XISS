{extends file='../admin/_global.tpl'}

{block name=title}{$SETTINGS} :: {$CRON_SETTINGS}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/cron.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}
	
	<div class="main_full">
				
		<p class="title">{$CRON_INFO}</p>
		
		<div class="cron">
			<!--{$CRON_TITLE}--> <br class="clearfix" />
			<input type="text" value="{$path}" readonly />
		</div>
		
		<div class="clearfix"></div>		
		
		<p class="title">{$CRON_PACKAGES}</p>
		
		<div class="cron">
			<br class="clearfix" />
			<input type="text" value="{$packages}" readonly />
		</div>
				
			
	</div>
{/block}