{extends file='../admin/_global.tpl'}

{block name=title}{$UTILITIES} :: {$LICENSE_SETTINGS}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/license.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}	
	
	<div class="main_half">
	<h1>{$INFORMATION}</h1>
				
		<div class="form_row"><div>{$REGISTERED_TO}: </div> Some user</div>
		<div class="form_row"><div>{$LICENSE}: </div> Valid</div>
		<div class="form_row"><div>{$TYPE}: </div> Single </div>
		<div class="form_row"><div>{$ALLOWED_BOXES}: </div> 10 ({$USED}: 1)</div>
		<div class="form_row"><div>{$BRANDING}: </div> None</div>
		<div class="form_row"><div>{$VALID_DOMAIN}: </div> www.sdas.ss </div>
		<div class="form_row"><div>{$VALID_IP}: </div> xxx.xxx.xxx.xxx</div>
		<div class="form_row"><div>{$CREATED}: </div> 10/10/2013</div>
		<div class="form_row"><div>{$EXPIRES}: </div> 10/10/2014</div>
		<div class="form_row"><div>{$VERSION}: </div> 0.9a</div>
		<div class="form_row"><div>{$LAST_UPDATE}: </div> 12/12/2013</div>
	</div>

	<div class="main_half">
		<form method="post" action="#">
			<fieldset>
			<legend>{$LICENSE}</legend>
			
				<div class="titled" >{$COPY_LICENSE}: </div>
				<textarea name="startup" value="" class="startup"></textarea>
		
			</fieldset>
			
			<div class="clearfix"></div>
			
			<input type="submit" value="{$SAVE}" />
		</form>
	</div>
	
	<div class="clear"></div>
	
{/block}