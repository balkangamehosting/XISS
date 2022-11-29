{extends file='../admin/_global.tpl'}

{block name=title}{$CLIENTS} :: {$VIEW_CLIENT}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/clients.css" type="text/css" media="screen" charset="utf-8" />
<link href="{$systemplate}css/vendors/jconfirm.css" rel="stylesheet" type="text/css" media="screen" />
<link href="{$systemplate}css/vendors/datepicker.css" rel="stylesheet" type="text/css">
{/block}

{block name=lang}{/block}

{block name=body}
{nocache}
{assign var=i value=$data}
	<div class="main_half">
	
		<h1>{$DETAILS}</h1>		
					
		<div class="form_row"><div>{$GROUP}: </div> {$i.group|groups:$i.suspended:false} </div>	
		<div class="form_row"><div>{$LAST_VISIT}: </div> {$i.last_visit} </div>
		<div class="form_row"><div>{$LAST_IP}: </div> {$i.ip|sortBlank} </div>
		<div class="form_row"><div>{$FIRSTNAME}: </div> {$i.firstname|sortBlank}</div>
		<div class="form_row"><div>{$LASTNAME}: </div> {$i.lastname|sortBlank}</div>
		<div class="form_row"><div>{$USERNAME}: </div> {$i.username}</div>		
		<div class="form_row"><div>{$EMAIL}: </div> {$i.email}</div>		
		<div class="form_row"><div>{$SERVERS}: </div> {$i.servers}</div>
		
		{if $is_Admin && ($i.group > 1 && $i.group < 10)}
			<br />
			
			<h1>{$PAC_PACKAGE}</h1>		
			{if $is_Admin}
				<div class="form_row"><div>{$PAC_TYPE}: </div> {if $i.package_unlimited}{$PAC_UNLIMITED}{else}{$i.package_type|sortBlank}{/if}</div>
				<div class="form_row"><div>{$PAC_BOXES}: </div> {if $i.package_unlimited}{$PAC_UNLIMITED} {else}{$i.package_boxes|sortBlank}{/if}</div>
				<div class="form_row"><div>{$PAC_SERVERS}: </div> {if $i.package_unlimited}{$PAC_UNLIMITED} {else}{$i.package_servers|sortBlank}{/if}</div>
				<div class="form_row"><div>{$PAC_CLIENTS}: </div> {if $i.package_unlimited}{$PAC_UNLIMITED} {else}{$i.package_clients|sortBlank}{/if}</div>
			{/if}			
			<div class="form_row"><div>{$PAC_EXPIRES}: </div> {$i.package_expires_nicer|sortBlank}</div>
		{/if}
	</div>
	
	<div class="main_half">
		<h1>{$EDIT_CLIENT}</h1>
		<form action="{$url}clients/edit/{$i.id|offset}" method="post">
			<fieldset>
				<legend>{$EDIT_CLIENT}</legend>			
				<div class="form_row"><div>{$GROUP}: </div> 
					<select name="client[group_int]" {if $isSelf}disabled{/if}>
						<option value="1" {if $i.group == 1}selected{/if}>{$MEMBER}</option>
						{if $isAdmin}
						<option value="5" {if $i.group == 5}selected{/if}>{$RESELLER}</option>
						<option value="10" {if $i.group == 10}selected{/if}>{$ADMIN}</option>
						{/if}
					</select> 
				</div>			
				<div class="form_row"><div>{$FIRSTNAME}: </div> <input type="text" name="client[firstname_str]" value="{$i.firstname}"/></div>
				<div class="form_row"><div>{$LASTNAME}: </div> <input type="text" name="client[lastname_str]" value="{$i.lastname}"/></div>					
				<div class="form_row"><div>{$USERNAME}: </div> <input type="text" name="client[username_str]" value="{$i.username}"/></div>				
				<div class="form_row"><div>{$EMAIL}: </div> <input type="text" name="client[email_str]" value="{$i.email}"/></div>				
				<div class="form_row"><div>{$PASSWORD}: </div> <input type="password" name="password" value="" autocomplete="off"/></div>
				<div class="clearfix"></div>				
				<div class="form_row"><div>{$EMAILUSER}: </div> <input type="checkbox" name="send_email"/></div>
				<div class="form_row"><div>{$EMAIL_LANG}: </div> 
					<select name="mail_lang">
						<option value="en" {if $sitelang == "en"}selected{/if}>English</option>
						<option value="de" {if $sitelang == "de"}selected{/if}>Deutsch</option>
						<option value="si" {if $sitelang == "si"}selected{/if}>Slovensko</option>
					</select>				
				</div>		
				<input type="hidden" name="client[suspended_inline]" value=0 /> 				
				<div class="form_row"><div>{$SUSPEND_ACCOUNT}: </div> <input type="checkbox" name="client[suspended_inline]" {if $i.suspended}checked{/if}/></div>	
			</fieldset>
			
			{if $is_Admin && ($i.group > 1 && $i.group < 10)}
			<fieldset>
				<legend>{$PAC_PACKAGE}</legend>
				<input type="hidden" name="package[unlimited_inline]" value=0 />
				
				<!--<div class="form_row"><div>{$PAC_TYPE}: </div> {if $i.package_unlimited}{$PAC_UNLIMITED}{else}{$i.package_type|sortBlank}{/if}</div>-->
				<div class="form_row"><div>{$PAC_BOXES}: </div> <input type="text" name="package[boxes_int]" value="{$i.package_boxes}"/></div>
				<div class="form_row"><div>{$PAC_SERVERS}: </div> <input type="text" name="package[servers_int]" value="{$i.package_servers}"/></div>
				<div class="form_row"><div>{$PAC_CLIENTS}: </div> <input type="text" name="package[clients_int]" value="{$i.package_clients}"/></div>						
				<div class="form_row"><div>{$PAC_EXPIRES}: </div> <input type="text" name="package[expires_str]" value="{$i.package_expires}" id="expires"/></div>
				<div class="form_row"><div>{$PAC_UNLIMITED}: </div> <input type="checkbox" name="package[unlimited_inline]" {if $i.package_unlimited}checked{/if}/></div>
			</fieldset>	
			
			{/if}
			
			<div class="clearfix"></div>
			<span class="right"><input type="submit" value="{$SAVE}" /></span>
		</form>
	</div>
	
	<div class="clearfix"></div>
	
	{if !$isSelf}
	<span class="left"><a class="butn ask" href="{$url}clients/delete/{$i.id|offset}">{$DELETE_CLIENT}</a></span>
	{if !$hijacked}	
		<span class="right"><a class="butn_bright" href="{$url}clients/hijack/{$i.id|offset}">{$LOGIN_AS}</a></span>
	{/if}
	{/if} 
{/nocache}

<script type="text/javascript" src="{$systemplate}js/jconfirmaction.jquery.js"></script>
<script type="text/javascript" src="{$systemplate}js/zebra_datepicker.js"></script>	
{nocache}
{literal}
<script>
$(document).ready(function(){
	$('.ask').jConfirmAction({
	{/literal}
	question : "{$JQ_ARE_YOU_SURE}", 
	yesAnswer : "{$JQ_YES}", 
	cancelAnswer : "{$JQ_CANCEL}"
	{literal}
	});  
}); 
</script>
<script type="text/javascript">
$(window).load(function()
{
	$('#expires').Zebra_DatePicker({
	{/literal}		 
		 start_date: '{$smarty.now|date_format:"%Y" - 16}{$smarty.now|date_format:"-%m-%d"}',
		 direction: 1,	
		 months: ['{$JANUARY}', '{$FEBRUARY}', '{$MARCH}', '{$APRIL}', '{$MAY}', '{$JUNE}', '{$JULY}', '{$AUGUST}', '{$SEPTEMBER}', '{$OCTOBER}', '{$NOVEMBER}', '{$DECEMBER}'],
		 days:  ['SUNDAY', '{$MONDAY}', '{$TUESDAY}', '{$WEDNESDAY}', '{$THURSDAY}', '{$FRIDAY}', '{$SATURDAY}'],		
		 show_icon: false
	{literal}
	});		
});
</script>
{/literal}
{/nocache}	
{/block}