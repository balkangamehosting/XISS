{extends file='../admin/_global.tpl'}

{block name=title}{$SERVERS}:: {$ADDBOX} {/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/box.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}	
	<a class="butn" href="{$url}box/show">&lsaquo; {$BACKTO}</a> <br />
	
	<div class="main_full">
		<h1>{$ADVANCED}</h1>
		<form action="{$url}box/addbox" method="post">
			<fieldset>
				<legend>{$BOX}</legend>
				
				<div class="form_row"><div>*{$NAME}: </div> <input type="text" name="box[name_str]" value="" required/> </div>
				<div class="form_row"><div>*{$LOCATION}: </div> <input type="text" name="box[location_str]" value="" required/> </div>				
				<div class="form_row"><div>*{$IP}: </div> <input type="text" name="box[ip_str]" value="" required/> </div>
								
			</fieldset>	
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$PROPERTIES}</legend>
				
				<div class="form_row"><div>{$NETWORK}: </div> <input type="text" name="box[network_int]" value=""/> 
					<input type="radio" value="Gb" name="box[nettype_str]" /> {$GB}
					<input type="radio" value="Mb" name="box[nettype_str]" /> {$MB}
				</div>
				<div class="form_row"><div>{$OS_TYPE}: </div> 
					<input type="radio" value="Linux" name="box[ostype_str]" checked/> Linux
				</div>
				<div class="form_row"><div>{$DISTRO}: </div>  
					<select name="box[distro_str]">
						<option value="">- {$SELECT} -</option>
						<option value="Debian">Debian</option>
						<option value="CentOS">CentOS</option>
						<option value="Ubuntu">Ubuntu</option>
						<option value="0">{$OTHER}</option>
					</select>
				</div>
				<div class="form_row"><div>{$DISTRO_VERSION}: </div><input type="text" name="box[distroVersion_str]" value=""/></div>
				<div class="form_row"><div>{$CPU}: </div><input type="text" name="box[cpu_str]" value=""/></div>
				<div class="form_row"><div>{$HDD}: </div><input type="text" name="box[hdd_str]" value=""/></div>
				<div class="form_row"><div>{$RAM}: </div><input type="text" name="box[ram_str]" value=""/></div>
				<div class="form_row"><div>{$COST}: </div><input type="text" name="box[cost_str]" value=""/>
					<input type="radio" value="€" name="box[valute_str]" /> Eur
					<input type="radio" value="$" name="box[valute_str]" /> Usd
				</div>
								
			</fieldset>	
			
			<div class="clearfix"></div>
					
			<fieldset>
				<legend>SSH Settings</legend>
				<div class="form_row"><div>*{$SSH_USER}: </div><input type="text" name="box[sshuser_str]" value="" required/></div>
				<div class="form_row"><div>*{$SSH_PASSWORD}: </div><input type="text" name="box[sshpass_str]" value="" required/></div>
				<div class="form_row"><div>*{$SSH_PORT}: </div><input class="small" type="text" name="box[sshport_int]" value="" required/></div>	
				<div class="form_row"><div>{$SSH_LOGIN_TYPE}: </div> 
					<input type="checkbox" name="box[sudo_inline]"/> {$SSH_USE_SUDO}
				</div>			
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$FTP_SETTINGS}</legend>
				<div class="form_row"><div>*{$FTP_PORT}: </div><input class="small" type="text" name="box[ftpport_int]" value="" required/></div>
				<div class="form_row"><div>{$FTP_PASSIVE}: </div><input type="checkbox" name="box[ftppassive_inline]" checked/></div>				
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$CHECKS}</legend>
				<div class="form_row"><div>{$ENABLED}: </div><input type="checkbox" name="check" checked/> {$VERIFY}</div>
								
			</fieldset>
			
			<div class="clearfix"></div>
			
			<input type="submit" value="{$ADD}" />
		</form>
	</div>
{/block}