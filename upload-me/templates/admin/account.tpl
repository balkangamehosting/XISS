{extends file='../admin/_global.tpl'}

{block name=title}{$ACCOUNT}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/account.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=body}	
	<div class="main_full">
		<h1>{$ACCOUNT}</h1>
		<form action="{$url}admin/update_account" method="post">
			<fieldset>
{nocache}
{assign var=i value=$data}	
						
				<div class="form_row"><div>{$GROUP}: </div> {$i.group|groups:$i.suspended} </div>	
				<div class="form_row"><div>{$LASTVISIT}: </div> {$i.last_visit|sortBlank} </div>
				<div class="form_row"><div>{$LASTIP}: </div> {$i.ip|sortBlank} </div>
				<div class="form_row"><div>{$FIRSTNAME}: </div> <input type="text" name="client[firstname_str]" value="{$i.firstname}"/></div>
				<div class="form_row"><div>{$LASTNAME}: </div> <input type="text" name="client[lastname_str]" value="{$i.lastname}"/></div>
				<div class="form_row"><div>{$LANGUAGE}: </div> 
					<select name="client[lang_str]">
						{if !$i.lang}
						<option value="" selected>- {$SELECT} -</option>
						{/if}
						<option value="en" {if $i.lang == "en"}selected{/if}>English</option>
						<option value="de" {if $i.lang == "de"}selected{/if}>Deutsch</option>
						<option value="si" {if $i.lang == "si"}selected{/if}>Slovensko</option>
					</select>				
				</div>		
				<div class="clearfix"></div>	
				<div class="form_row"><div>{$USERNAME}: </div> {$i.username}</div>
				<div class="form_row"><div>{$EMAIL}: </div> <input type="text" name="client[email_str]" value="{$i.email}"/></div>				
				<div class="form_row"><div>{$PASS}: </div> <input type="password" name="password" value="" autocomplete="off"/></div>
				<div class="form_row"><div>{$PASSCONFIRM}: </div> <input type="password" name="confirm" value="" autocomplete="off"/></div>
{/nocache}								
				<input type="submit" value="{$SAVE}" />
			</fieldset>
		</form>
	</div>
	
	<div class="clear"></div>
	
{/block}