{extends file='../admin/_global.tpl'}

{block name=title}{$CLIENTS} :: {$ADDACCOUNT}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/account.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}	
	<div class="main_full">
		<h1>{$ADDACCOUNT}</h1>
		<form action="{$url}clients/add_new" method="post">
			<fieldset>
				<legend>{$USER_DETAILS}</legend>				
						
				<div class="form_row"><div>{$GROUP}: </div> 
					<select name="group">
						<option value="1">{$MEMBER}</option>
						{if $isAdmin}
						<option value="5">{$RESELLER}</option>
						<option value="10">{$ADMIN}</option>
						{/if}
					</select> 
				</div>			
				<div class="form_row"><div>*{$FIRSTNAME}: </div> <input type="text" name="firstname" value="" required/></div>
				<div class="form_row"><div>*{$LASTNAME}: </div> <input type="text" name="lastname" value="" required/></div>					
				<div class="form_row"><div>*{$USERNAME}: </div> <input type="text" name="username" value="" required/></div>				
				<div class="form_row"><div>*{$EMAIL}: </div> <input type="text" name="email" value="" required/></div>				
				<div class="form_row"><div>{$PASSWORD}: </div> <input type="password" name="password" value=""/></div>
				<div class="clearfix"></div>				
				<div class="form_row"><div>{$EMAILUSER} : </div> <input type="checkbox" name="send_mail" checked/></div>	
				<div class="form_row"><div>{$EMAIL_LANG}: </div> 
					<select name="mail_lang">
						<option value="en" {if $sitelang == "en"}selected{/if}>English</option>
						<option value="de" {if $sitelang == "de"}selected{/if}>Deutsch</option>
						<option value="si" {if $sitelang == "si"}selected{/if}>Slovensko</option>
					</select>				
				</div>		
				<div class="form_row"><div>{$SUSPEND_ACCOUNT}: </div> <input type="checkbox" name="suspended" /></div>
			</fieldset>
			
			<div class="clearfix"></div>
			
			<a class="butn_bright" href="{$url}clients">&lsaquo; {$CANCEL}</a>						
			<input type="submit" value="{$ADD_ACCOUNT}" />
		</form>
	</div>
	
	<div class="clear"></div>
	
{/block}