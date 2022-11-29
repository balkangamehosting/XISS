{extends file='../admin/_global.tpl'}

{block name=title}{$SERVERS} :: {$ADDSERVER}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/wizard.css" type="text/css" media="screen" charset="utf-8" />
<!-- <link href="{$systemplate}css/vendors/datepicker.css" rel="stylesheet" type="text/css"> -->
{/block}

{block name=lang}{/block}

{block name=body}	

	{if !$step}	
		
	<div class="main_full">		
		<form action="{$url}servers/add_server/step2" method="post">
			<fieldset>
			<legend>{$CLIENT}</legend>
			
			<div class="form_row"><div>{$CLIENTNAME}: </div> 
				<select name="client" required>
					<option value="">- {$SELECT} -</option>
					{nocache}
					{foreach from=$data key=myId item=i}					
						<option value="{$i.id|offset},,{$i.username}">{$i.username} ({$i.firstname}, {$i.lastname})</option>
					{/foreach}
					{/nocache}
				</select>			
			</div>
			
			</fieldset>		
			<div class="clearfix"></div>
			
			<a class="butn" href="{$url}servers">{$CANCEL}</a>						
			<input type="submit" value="{$NEXT}" />
		</form>	
		
	</div>
	
	{else if $step == 2}
	<div class="main_full">		
			
		<form action="{$url}servers/add_server/step3" method="post">
			<fieldset>
			<legend>{$GAME}</legend>
			
			{nocache}
			<div class="form_row"><div>{$CLIENTNAME}: </div> {$clientname} </div>
			<div class="form_row"><div>{$GAME}: </div> 
				<select name="game" required>
					<option value="">- {$SELECT} -</option>					
					{foreach from=$data key=myId item=i}
					<option value="{$i.id|offset},,{$i.name} ({$i.version})"> {$i.name} ({$i.version}) </option>					
					{/foreach}
				</select>			
			</div>
			{/nocache}
			
			</fieldset>		
			<div class="clearfix"></div>
			
			<input type="hidden" name="client" value="{$name|offset}" />
			<input type="hidden" name="clientname" value="{$clientname}" />
			
			<a class="butn" href="{$url}servers">{$CANCEL}</a>
			<a class="butn_bright" href="{$url}servers/add">{$PREVIOUS}</a>			
									
			<input type="submit" value="{$NEXT}" />
		</form>	
		
	</div>		
	
	{elseif $step == 3}
	<div class="main_full">		
		<form action="{$url}servers/add_server/step4" method="post">
			<fieldset>
				<legend>{$SERVER_PROPERTIES}</legend>
{nocache}
{assign var=i value=$data}	
	
				<div class="form_row"><div>{$CLIENT}: </div> {$name}</div>				
				<div class="form_row"><div>{$GAME}: </div> {$gamename}</div>				
				<div class="form_row"><div>*{$NAME}: </div> <input type="text" name="game[name_str]" value="" required/> </div>
				<!--<div class="form_row"><div>*{$EXPIRES}: </div><input type="text" id="expires" name="ownerexpires" value="" required/> <input type="checkbox" name="unlimited" /> {$NEVER}</div>-->
			</fieldset>
			
			<div class="clearfix"></div>
				
			<fieldset>
				<legend>{$SERVER_SETTINGS}</legend>
				<div class="form_row"><div>{$PRIORITY}: </div>
					<select name="game[priority_int]">
						<option value="-15" {if $i.priority == -15} selected {/if}>{$PRIORITY_MAX}</option>
						<option value="0" {if $i.priority == 0} selected {/if}>{$PRIORITY_NORMAL}</option>
						<option value="10" {if $i.priority == 10} selected {/if}>{$PRIORITY_MIN}</option>
					</select>
				</div>
				<div class="form_row"><div>*{$MAXSLOTS}:</div> <input class="small" type="text" name="game[slots_int]" value="{$i.slots}"/></div>				
				<div class="form_row"><div>{$G_TYPE}: </div>
					{$PUBLIC} <input type="radio" name="game[type_int]" value="0" {if $i.type == 0}checked{/if}/>
					{$PRIVATE} <input type="radio" name="game[type_int]" value="1"{if $i.type == 1}checked{/if} />
				</div>
				
				<input type="hidden" name="game[cfg1edit_inline]" value="0" />
				<input type="hidden" name="game[cfg2edit_inline]" value="0" />
				<input type="hidden" name="game[cfg3edit_inline]" value="0" />
				<input type="hidden" name="game[cfg4edit_inline]" value="0" />
				<input type="hidden" name="game[cfg5edit_inline]" value="0" />
				<input type="hidden" name="game[cfg6edit_inline]" value="0" />
				<input type="hidden" name="game[cfg7edit_inline]" value="0" />
				<input type="hidden" name="game[cfg8edit_inline]" value="0" />
				<input type="hidden" name="game[cfg9edit_inline]" value="0" />
				<input type="hidden" name="game[cfg10edit_inline]" value="0" />
				
				<div class="form_row"><div><input class="small" type="text" name="game[cfg1_str]" value="{$i.cfg1}"/> :</div> <input type="text" name="game[cfg1name_str]" value="{$i.cfg1name}"/> <input type="checkbox" name="game[cfg1edit_inline]" {if $i.cfg1edit}checked{/if}/> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg2_str]" value="{$i.cfg2}"/> :</div> <input type="text" name="game[cfg2name_str]" value="{$i.cfg2name}"/> <input type="checkbox" name="game[cfg2edit_inline]" {if $i.cfg2edit}checked{/if}/> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg3_str]" value="{$i.cfg3}"/> :</div> <input type="text" name="game[cfg3name_str]" value="{$i.cfg3name}"/> <input type="checkbox" name="game[cfg3edit_inline]" {if $i.cfg3edit}checked{/if}/> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg4_str]" value="{$i.cfg4}"/> :</div> <input type="text" name="game[cfg4name_str]" value="{$i.cfg4name}"/> <input type="checkbox" name="game[cfg4edit_inline]" {if $i.cfg4edit}checked{/if}/> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg5_str]" value="{$i.cfg5}"/> :</div> <input type="text" name="game[cfg5name_str]" value="{$i.cfg5name}"/> <input type="checkbox" name="game[cfg5edit_inline]" {if $i.cfg5edit}checked{/if}/> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg6_str]" value="{$i.cfg6}"/> :</div> <input type="text" name="game[cfg6name_str]" value="{$i.cfg6name}"/> <input type="checkbox" name="game[cfg6edit_inline]" {if $i.cfg6edit}checked{/if}/> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg7_str]" value="{$i.cfg7}"/> :</div> <input type="text" name="game[cfg7name_str]" value="{$i.cfg7name}"/> <input type="checkbox" name="game[cfg7edit_inline]" {if $i.cfg7edit}checked{/if}/> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg8_str]" value="{$i.cfg8}"/> :</div> <input type="text" name="game[cfg8name_str]" value="{$i.cfg8name}"/> <input type="checkbox" name="game[cfg8edit_inline]" {if $i.cfg8edit}checked{/if}/> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg9_str]" value="{$i.cfg9}"/> :</div> <input type="text" name="game[cfg9name_str]" value="{$i.cfg9name}"/> <input type="checkbox" name="game[cfg9edit_inline]" {if $i.cfg9edit}checked{/if}/> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg10_str]" value="{$i.cfg10}"/> :</div> <input type="text" name="game[cfg10name_str]" value="{$i.cfg10name}"/> <input type="checkbox" name="game[cfg10edit_inline]" {if $i.cfg10edit}checked{/if}/> {$ALLOW_CLIENT}</div>
				
				<div class="titled" >*{$STARTUP_LINE}: </div>
				<textarea name="game[startupline_str]" class="startup">{$i.startupline}</textarea>
				
			</fieldset>
				
			<div class="clearfix"></div>
			
			<input type="hidden" name="game[clientid_int]" value="{$client}" />
			<input type="hidden" name="game[game_int]" value="{$game}" />
			
			
			
{/nocache}				
			<a class="butn" href="{$url}servers">{$CANCEL}</a>									
			<input type="submit" value="{$ADD}" />
			
		</form>
	</div>
	{/if}
	
<!--	
<script type="text/javascript" src="{$systemplate}js/zebra_datepicker.js"></script>		
{literal}
<script type="text/javascript">
$(window).load(function()
{
	$('#expires').Zebra_DatePicker({		 
		 start_date: '{/literal}{$smarty.now|date_format:"%Y" - 16}{$smarty.now|date_format:"-%m-%d"}',
		 direction: 1,
		 months: ['{$JANUARY}', '{$FEBRUARY}', '{$MARCH}', '{$APRIL}', '{$MAY}', '{$JUNE}', '{$JULY}', '{$AUGUST}', '{$SEPTEMBER}', '{$OCTOBER}', '{$NOVEMBER}', '{$DECEMBER}'],
		 days:  ['SUNDAY', '{$MONDAY}', '{$TUESDAY}', '{$WEDNESDAY}', '{$THURSDAY}', '{$FRIDAY}', '{$SATURDAY}']
	{literal}
	});	
	
});
</script>
{/literal}
-->	
{/block}