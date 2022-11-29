{extends file='../admin/_global.tpl'}

{block name=title}{$BOX} :: {$MANAGE}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/box.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}	
{nocache}
{assign var=i value=$data}	

	<a class="butn" href="{$url}box/show/{$i.id|offset}">&lsaquo; {$BACKTO}</a> 
	
	<span class="right">
		<!-- <a class="butn_bright" href="{$url}box/install_game/{$i.id|offset}">Install Game</a> -->
		<a class="butn_cyan" href="{$url}box/configure/{$i.id|offset}">{$CONFIGURE}</a>
	</span>
	<br />
	
	<div class="main_full">
	<h1>{$ADVANCED}</h1>
		<form action="{$url}box/update_box/{$i.id|offset}" method="post">
			<fieldset>
				<legend>{$BOX}</legend>
				
				<div class="form_row"><div>{$NAME}: </div> <input type="text" name="box[name_str]" value="{$i.name}"/> </div>
				<div class="form_row"><div>{$LOCATION}: </div> <input type="text" name="box[location_str]" value="{$i.location}"/> </div>				
				<div class="form_row"><div>{$IP}: </div> <input type="text" name="box[ip_str]" value="{$i.ip}"/> </div>
								
			</fieldset>	
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$PROPERTIES}</legend>
				
				<div class="form_row"><div>{$NETWORK}: </div> <input type="text" name="box[network_str]" value="{if $i.network}{$i.network}{/if}"/> 
					<input type="radio" value="Gb" name="box[nettype_str]" {if $i.nettype == "Gb"}checked{/if}/> {$GB}
					<input type="radio" value="Mb" name="box[nettype_str]" {if $i.nettype == "Mb"}checked{/if}/> {$MB}
				</div>
				<div class="form_row"><div>{$OS_TYPE}: </div> 
					<input type="radio" value="Linux" name="box[ostype_str]" checked/> Linux
				</div>
				<div class="form_row"><div>{$DISTRO}: </div>  
					<select name="box[distro_str]">
						<option value="">- {$SELECT} -</option>
						<option value="Debian" {if $i.distro == "Debian"}selected{/if}>Debian</option>
						<option value="CentOS" {if $i.distro == "CentOS"}selected{/if}>CentOS</option>
						<option value="Ubuntu" {if $i.distro == "Ubuntu"}selected{/if}>Ubuntu</option>
						<option value="" {if !$i.distro}selected{/if}>{$OTHER}</option>
					</select>
				</div>
				<div class="form_row"><div>{$DISTRO_VERSION}: </div><input type="text" name="box[distroVersion_str]" value="{$i.distroVersion}"/></div>
				<div class="form_row"><div>{$CPU}: </div><input type="text" name="box[cpu_str]" value="{$i.cpu}"/></div>
				<div class="form_row"><div>{$HDD}: </div><input type="text" name="box[hdd_str]" value="{$i.hdd}"/></div>
				<div class="form_row"><div>{$RAM}: </div><input type="text" name="box[ram_str]" value="{$i.ram}"/></div>
				<div class="form_row"><div>{$COST}: </div><input type="text" name="box[cost_str]" value="{$i.cost}"/>
					<input type="radio" value="€" name="box[valute_str]" {if $i.valute == "€"}checked{/if} /> Eur
					<input type="radio" value="$" name="box[valute_str]" {if $i.valute == "$"}checked{/if}/> Usd
				</div>
								
			</fieldset>	
			
			<div class="clearfix"></div>
					
			<fieldset>
				<legend>SSH Settings</legend>
				<div class="form_row"><div>{$SSH_USER}: </div><input type="text" name="box[sshuser_str]" value="{$i.sshuser}"/></div>
				<div class="form_row"><div>{$SSH_PASSWORD}: </div><input type="text" name="box[sshpass_str]" value="{$i.sshpass}"/></div>
				<div class="form_row"><div>{$SSH_PORT}: </div><input class="small" type="text" name="box[sshport_int]" value="{$i.sshport}"/></div>	
				<div class="form_row"><div>{$SSH_LOGIN_TYPE}: </div> 
					<input type="hidden" name=box[sudo_inline] value=0 />
					<input type="checkbox" name="box[sudo_inline]" {if $i.sudo}checked{/if}/> {$SSH_USE_SUDO}
				</div>			
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$FTP_SETTINGS}</legend>
				<div class="form_row"><div>{$FTP_PORT}: </div><input class="small" type="text" name="box[ftpport_int]" value="{$i.ftpport}"/></div>
				<input type="hidden" name=box[ftppassive_inline] value=0 />
				<div class="form_row"><div>{$FTP_PASSIVE}: </div><input type="checkbox" name="box[ftppassive_inline]" {if $i.ftppassive}checked{/if}/></div>				
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$BOX_OWNER}</legend>
				<div class="form_row"><div>{$BOX_USER}: <br /></div>
				{if $is_Admin}
				<select name="box[user_int]">
					{if !$i.user}
						<option value="0" selected>{$SELECT}</option>
					{else}
						<option value="{$i.userid}" selected>{$i.username} ({$i.firstname}, {$i.lastname})</option>
					{/if}
				
					{foreach from=$users key=myId item=u}					
						<option value="{$u.id}">{$u.username} ({$u.firstname}, {$u.lastname})</option>					
					{/foreach}
				</select>
				{else}
				<a href="{$url}clients/show/{$i.userid|offset}">{$i.username} ({$i.firstname}, {$i.lastname})</a>
				{/if}				
				</div>
												
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$CHECKS}</legend>
				<div class="form_row"><div>{$ENABLED}: </div><input type="checkbox" name="check" checked/> {$VERIFY}</div>
								
			</fieldset>
			
			<div class="clearfix"></div>
			
			<input type="submit" value="{$SAVE}" />
		</form>
	</div>
{/nocache}
{/block}