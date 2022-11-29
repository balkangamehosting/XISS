{extends file='../admin/_global.tpl'}

{block name=title}{$SETTINGS} :: {$EMAIL_TEMPLATE}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/wizard.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}	
	
	<div class="main_full">		
		<form action="" method="post">			
				
			<fieldset>
				<legend>{$EMAIL_SETTINGS}</legend>
				
				<div class="form_row"><div>{$EMAIL_TITLE}:</div> <input type="text" name="title" value=""/></div>
				<div class="form_row"><div>{$EMAIL_SUBJECT}:</div> <input type="text" name="subject" value=""/></div>
				
				<div class="titled" >{$EMAIL_MESSAGE}: </div>
				<textarea name="startup" value="" class="startup"></textarea>
				
				<div class="clearfix"></div>
				<div class="form_row"><div>{$EMAIL_SHORTCODES}:</div>{literal}{firstname} {lastname} {username} {password} {panel}{/literal}</div>
			</fieldset>
				
			<div class="clearfix"></div>
					
			<input type="submit" value="{$SAVE}" />
			
		</form>
	</div>
{/block}