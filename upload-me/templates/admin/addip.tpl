{extends file='../admin/_global.tpl'}

{block name=title}{$BOX} :: {$ADDIP}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/wizard.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}
		
	<div class="main_full">		
			
		<form action="{$url}box/submit_ip" method="post">
			<fieldset>
				<legend>{$ADDIP}</legend>
			
				<div class="form_row"><div>{$IPADDRESS}: </div> <input type="text" name="ip" value="" required/> </div>	
				<input type="hidden" name="target" value="{$target}" />		
			</fieldset>		
			<div class="clearfix"></div>
			
			<div class="clearfix"></div>
			
			<a class="butn_bright" href="{$url}box/show/{$target}">&lsaquo; {$BACKTO}</a>						
			<input type="submit" value="{$ADD_IP}" />
		</form>	
		
	</div>
	
{/block}