{extends file='../admin/_global.tpl'}

{block name=title}{$SERVERS} :: {$INSTALLSERVER}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/wizard.css" type="text/css" media="screen" charset="utf-8" />
<link href="{$systemplate}css/vendors/jconfirm.css" rel="stylesheet" type="text/css" media="screen" />
{/block}

{block name=lang}{/block}

{block name=body}	

	{if !$step}	
		
	<div class="main_full">		
		<form action="{$url}servers/install_server/step2" method="post">
			<fieldset>
			<legend>{$INSTALLSERVER}</legend>
{nocache}
{assign var=i value=$data}	
			
				<div class="form_row"><div>{$NAME}: </div> {$i.name}</div>
				<div class="form_row"><div>{$GAME}: </div> {$i.game} ({$i.version})</div>
				<div class="form_row"><div>{$SLOTS}: </div> {$i.slots} </div>
				
				<div class="form_row"><div>{$INSTALL_BOX}: </div> 
					<select name="box" required>
						<option value="">- {$SELECT} -</option>					
						{foreach from=$box key=myId item=b}					
							<option value="{$b.id|offset},,{$b.name} - {$b.location} ({$b.ostype})">{$b.name} - {$b.location} ({$b.ostype})</option>
						{/foreach}				
					</select>			
				</div>
			
			<input type="hidden" name="name" value="{$i.name}" />
			<input type="hidden" name="game" value="{$i.game} ({$i.version})" />
			<input type="hidden" name="slots" value="{$i.slots}" />
			<input type="hidden" name="server" value="{$server}" />
{/nocache}			
			
			</fieldset>		
			<div class="clearfix"></div>
			
			<a class="butn ask" href="{$url}servers">{$CANCEL}</a>						
			<input type="submit" value="{$NEXT}" />
		</form>	
		
	</div>
	
	{else if $step == 2}
	<div class="main_full">		
			
		<form action="{$url}servers/install_server/step3" method="post">
			<fieldset>
			<legend>{$INSTALLSERVER}</legend>
{nocache}			
				<div class="form_row"><div>{$NAME}: </div> {$name}</div>
				<div class="form_row"><div>{$GAME}: </div> {$game}</div>
				<div class="form_row"><div>{$SLOTS}: </div> {$slots} </div>
				<div class="form_row"><div>{$INSTALL_BOX}: </div> {$box} </div>
				
				<div class="form_row"><div>{$INSTALL_IP}: </div> 
					<select name="ip" required>
						<option value="">- {$SELECT} -</option>					
						{foreach from=$ip key=myId item=p}					
							<option value="{$p.id},,{$p.ip}">{$p.ip}</option>
						{/foreach}				
					</select>			
				</div>
			
			</fieldset>		
			<div class="clearfix"></div>
			
			<input type="hidden" name="name" value="{$name}" />
			<input type="hidden" name="game" value="{$game}" />
			<input type="hidden" name="slots" value="{$slots}" />
			<input type="hidden" name="box" value="{$box}" />
			<input type="hidden" name="boxid" value="{$boxid}" />
			<input type="hidden" name="server" value="{$server}" />
{/nocache}			
			<a class="butn ask" href="{$url}servers">{$CANCEL}</a>
									
			<input type="submit" value="{$NEXT}" />
		</form>	
		
	</div>
	
	{else if $step == 3}
	<div class="main_full">		
			
		<form action="{$url}servers/install_server/step4" method="post">
			<fieldset>
			<legend>{$INSTALLSERVER}</legend>
{nocache}
{assign var=i value=$data}
			
				<div class="form_row"><div>{$NAME}: </div> {$name}</div>
				<div class="form_row"><div>{$GAME}: </div> {$game}</div>
				<div class="form_row"><div>{$SLOTS}: </div> {$slots} </div>
				<div class="form_row"><div>{$INSTALL_BOX}: </div> {$box} </div>
				<div class="form_row"><div>{$INSTALL_IP}: </div> {$ip} </div>
				
				
				<div class="form_row"><div>{$PORT}: </div> <input type="text" name="server[port_int]" value="{$defaultport}" /></div>
				<div class="form_row"><div>{$USER}: </div> <input type="text" name="server[ftpuser_str]" value="{$ftpuser}" /> <span class="font_small">{$USER_NOTE}</span></div>
				<div class="form_row"><div>{$PASSWORD}: </div> <input type="text" name="server[ftppass_str]" value="" /> <span class="font_small">{$PASSWORD_NOTE}</span></div>
				<div class="form_row"><div>{$HOMEDIR}: </div> <input type="text" name="server[homedir_str]" value="/home/{$ftpuser}" /></div>
				<div class="form_row"><div>{$ENABLED}: </div> <input type="checkbox" name="create_user" checked/>{$CREATE_USER}</div>
			
			</fieldset>		
					
			<div class="clearfix"></div>
			
			<fieldset>		
				<div class="form_row"><div>{$INSTALLDIR}: </div> <input type="text" name="server[installdir_str]" value="{$installdir}" /></div>
				<div class="form_row"><div>{$ENABLED}: </div> <input type="checkbox" name="auto_install" checked/>{$AUTOINSTALL}</div>
			</fieldset>
			<div class="clearfix"></div>	
			
			<input type="hidden" name="server[boxid_int]" value="{$boxid}" />
			<input type="hidden" name="server[ipid_int]" value="{$ipID}" />
			<input type="hidden" name="serverid" value="{$server}" />
{/nocache}			
			<a class="butn ask" href="{$url}servers">{$CANCEL}</a>
									
			<input type="submit" value="{$FINISH}" />
		</form>	
		
	</div>		
			
	{/if}		
			
{/nocache}	

<script type="text/javascript" src="{$systemplate}js/jconfirmaction.jquery.js"></script>
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
{/literal}
{/nocache}			

{/block}