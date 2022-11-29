{extends file='../admin/_global.tpl'}

{block name=title}{$SERVERS} :: {$MANAGE}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/servers.css" type="text/css" media="screen" charset="utf-8" />
<link href="{$systemplate}css/vendors/datepicker.css" rel="stylesheet" type="text/css">
<link href="{$systemplate}css/vendors/jconfirm.css" rel="stylesheet" type="text/css" media="screen" />
{/block}

{block name=lang}{/block}

{block name=body}
{nocache}
{assign var=i value=$data}		
	<a class="butn" href="{$url}servers/show/{$i.id|offset}">&lsaquo; {$BACKTO}</a> 
		
	<span class="right">
	{if $i.boxid}
		<a class="butn_bright ask" href="{$url}servers/rebuild/{$i.id|offset}">{$REBUILD_SERVER}</a>
		<a class="butn_bright ask" href="{$url}servers/delete/{$i.id|offset}">{$DELETE_SERVER}</a>
	{else}
		<a class="butn_bright ask" href="{$url}servers/delete/{$i.id|offset}">{$DELETE_SERVER}</a>	
		<a class="butn_cyan" href="{$url}servers/install/{$i.id|offset}">{$INSTALL_SERVER}</a>
	{/if}
	</span>
	<br />	
	
	<div class="main_half">
		<h1>{$MANAGE}</h1>
		<form action="{$url}servers/update/{$i.id|offset}/general" method="post">
			<fieldset>
				<legend>{$SERVER_PROPERTIES}</legend>
				
				<div class="form_row"><div>{$NAME}: </div> <input type="text" name="game[name_str]" value="{$i.name}"/></div>				
				<div class="form_row"><div>{$GAME}: </div> {$i.version|sortBlank} </div>				
				<div class="form_row"><div>{$STATUS}: </div> 
					{$IS_PENDING} <input type="radio" name="game[status_int]" value="0" {if !$i.boxid}checked{/if}/>
					{$ACTIVE} <input type="radio" name="game[status_int]" value="1" {if $i.boxid}checked{/if}/>
					<!-- {$SUSPENDED} <input type="radio" name="game[status_int]" value="2" {if $i.type == 2}checked{/if} /> -->
				</div>
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
				<div class="form_row"><div>*{$MAXSLOTS}:</div> <input class="small" type="text" name="game[slots_int]" value="{$i.slots}" required/></div>				
				<div class="form_row"><div>{$G_TYPE}: </div>
					{$PUBLIC} <input type="radio" name="game[type_int]" value="0" {if $i.type == 0}checked{/if}/>
					{$PRIVATE} <input type="radio" name="game[type_int]" value="1" {if $i.type == 1}checked{/if} />
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
								
				<input type="submit" value="{$SAVE}" />
			
		</form>
	</div>
	
	{if $i.boxid}	
	<div class="main_half">
		<h1>{$ADVANCED}</h1>
		<form action="{$url}servers/update/{$i.id|offset}/advanced" method="post">
			<fieldset>
				<legend>{$SERVER_PROPERTIES}</legend>
								
				<div class="form_row"><div>{$IP}: </div> 
				<select name="adv[ipid_str]">
					{foreach from=$ip key=myId item=p}	
					<option value="{$p.id|offset}" {if $i.ipid == $p.id}selected{/if}>{$p.ip}</option>
					{/foreach}
				</select>
				</div>				
				<div class="form_row"><div>{$PORT}: </div> <input type="text" name="adv[port_int]" value="{$i.port}"/> </div>				
			</fieldset>	
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$GAME_QUERY}</legend>
				<div class="form_row"><div>{$QUERY_CODE}: </div>{$i.querycode}</div>		
				<div class="form_row"><div>{$QUERY_PORT}: </div> {$i.queryport} </div>
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>FTP</legend>
				<div class="form_row"><div>{$FTP_USER}: </div><input type="text" name="adv[ftpuser_str]" value="{$i.ftpuser}"/></div>
				<div class="form_row"><div>{$FTP_PASSWORD}: </div><input type="text" name="adv[ftppass_str]" value="{$i.ftppass}"/></div>
				<div class="form_row"><div>{$SSH_HOMEDIR}: </div><input type="text" name="adv[homedir_str]" value="{$i.homedir}"/></div>
				<div class="form_row"><div>{$SSH_INSTALLDIR}: </div><input type="text" name="adv[installdir_str]" value="{$i.installdir}"/></div>
				<!-- <div class="form_row"><div>{$SSH_UPDATEUSER}: </div><input type="checkbox" name="update" /></div> -->
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$SERVER_OWNER}</legend>
				<div class="form_row"><div>{$CLIENT}: </div>
				<select name="adv[clientid_int]">
					<option value="{$i.client|offset}" selected>{$i.username} ({$i.firstname|sortBlank}, {$i.lastname|sortBlank})</option>
					{foreach from=$clients key=myId item=c}	
					<option value="{$c.id|offset}">{$c.username} ({$c.firstname|sortBlank}, {$c.lastname|sortBlank})</option>
					{/foreach}	
				</select>
				</div>
				<!-- <div class="form_row"><div>{$EXPIRES}: </div><input type="text" id="expires" name="ownerexpires" value=""/> <input type="checkbox" name="unlimited" /> {$NEVER}</div> -->				
			</fieldset>
			
			<div class="clearfix"></div>
			
			<input type="submit" value="{$SAVE}" />
		</form>
	</div>
	{/if}

<script type="text/javascript" src="{$systemplate}js/jconfirmaction.jquery.js"></script>
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
{/literal}
{/nocache}
{/block}