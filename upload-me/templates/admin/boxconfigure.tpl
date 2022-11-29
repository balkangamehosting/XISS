{extends file='../admin/_global.tpl'}

{block name=title}{$BOX} :: {$CONFIGURE}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/box.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}	
{nocache}
{assign var=i value=$data}	
	
	<a class="butn_bright" href="{$url}box/manage/{$i.id|offset}">&lsaquo; {$MANAGE}</a>
	
	<span class="right">
		<a class="butn" href="{$url}box/show/{$i.id|offset}">&lsaquo; {$BACKTO}</a> 
	</span>
	<br />
	
	<div class="main_full configure">
	
	<h1>Prior Requirements</h1>
	<ul>
		<li>&rsaquo; Install operational system.</li>
		<li>&rsaquo; Install SSH and FTP server.</li>
		<li>&nbsp; - Optionally configure SSH and FTP server on your server the way you want.</li>
		<li>&rsaquo; Under Manage Box page make sure you fill details correctly. </li>
		<li>&nbsp; - OS Distro is important so right command for package installement can be used (apt-get, yum..).</li>		
		<li>&nbsp; - Make sure you check SUDO field if it is required by your settings.</li>
		<li>&nbsp; - Select <b>{$CHECKS}</b> to make sure script can connect to your box.</li>
		<li>&rsaquo; Once you verified connectivity with your Box, select packages you wish to install and click Configure.</li>
	</ul>
	
	<p class="color_red font_small">If for some reason installation of packages fails you can install them manually over SSH. 
	Packages required for website to work correctly are: <br /> 
	- screen <br />
	- curl (for cronjobs) <br />
	- unzip (for unzipping games) <br />
	-- Additionally create a folder that matches location set here.
	</p>
		
	<h1>{$CONFIGURE}</h1>
		<form action="{$url}box/configure_box/{$i.id|offset}" method="post">
						
			<fieldset>
				<legend>Essentials</legend>
				<div class="form_row"><div>Packager</div>
					<select name="configure[packager_string]" disabled>	
						<optgroup label="RPM">				
							<option value="yum">yum </option>
						</optgroup>
						<optgroup label="APT">		
							<option value="apt-get">apt-get</option>
						</optgroup>
						<optgroup label="Suse">		
							<option value="yast" disabled>yast</option>
						</optgroup>
						<optgroup label="Gentoo">		
							<option value="emerge" disabled>emerge</option>
						</optgroup>
					</select>
				</div>
				<div class="form_row"><div>Screen: </div><input type="checkbox" name="check"/></div>
				<div class="form_row"><div>Curl: </div><input type="checkbox" name="check"/></div>
				<div class="form_row"><div>ia32-libs (32bit support on 64bit OS): </div><input type="checkbox" name="check"/></div>						
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>Repository</legend>
				<div class="form_row"><div>Tar: </div><input type="checkbox" name="check" checked disabled/></div>								
				<div class="form_row"><div>Unzip: </div><input type="checkbox" name="check" /></div>				
				<div class="form_row"><div>Location: </div> <input type="text" name="box[name_str]" value="/home/gamefiles/repository"/> </div>								
			</fieldset>
			
			<div class="clearfix"></div>
			
			<!--
			<fieldset>
				<legend>Steam</legend>				
				<div class="form_row"><div>HLDS Update tool: </div><input type="checkbox" name="check"/></div>	
				<div class="form_row"><div>Create Steam user: </div><input type="checkbox" name="check"/></div>			
				<div class="form_row"><div>Location: </div> <input type="text" name="box[name_str]" value="/home/steam"/> </div>
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>TeamSpeak 3</legend>
				<p class="font_center">Get latest URL on team speak website. Also make sure you select correct version (32/64bit) depending of the OS you run on your box!</p>				
				<div class="form_row"><div>Install: </div><input type="checkbox" name="check"/></div>	
				<div class="form_row"><div>Create TS3 user: </div><input type="checkbox" name="check"/></div>			
				<div class="form_row"><div>Location: </div> <input type="text" name="box[name_str]" value="/home/ts3"/> </div>
				<div class="form_row"><div>URL (get latest): </div> <input type="text" name="box[name_str]" value=""/> </div>
				<div class="form_row"><div>Start on Boot (Cronjob): </div><input type="checkbox" name="check"/></div>					
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>TeamSpeak 2</legend>
				<p class="font_center">Get latest URL on team speak website. Also make sure you select correct version (32/64bit) depending of the OS you run on your box!</p>				
				<div class="form_row"><div>Install: </div><input type="checkbox" name="check"/></div>	
				<div class="form_row"><div>Create TS3 user: </div><input type="checkbox" name="check"/></div>			
				<div class="form_row"><div>Location: </div> <input type="text" name="box[name_str]" value="/home/ts2"/> </div>
				<div class="form_row"><div>URL (get latest): </div> <input type="text" name="box[name_str]" value=""/> </div>	
				<div class="form_row"><div>Start on Boot (Cronjob): </div><input type="checkbox" name="check"/></div>								
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>Ventrilo</legend>
				<p class="font_center">Get latest URL on ventrilo website. Also make sure you select correct version (32/64bit) depending of the OS you run on your box!</p>				
				<div class="form_row"><div>Install: </div><input type="checkbox" name="check"/></div>	
				<div class="form_row"><div>Create Ventrilo user: </div><input type="checkbox" name="check"/></div>			
				<div class="form_row"><div>Location: </div> <input type="text" name="box[name_str]" value="/home/ventrilo"/> </div>
				<div class="form_row"><div>URL (get latest): </div> <input type="text" name="box[name_str]" value=""/> </div>
				<div class="form_row"><div>Start on Boot (Cronjob): </div><input type="checkbox" name="check"/></div>					
			</fieldset>
			
			<div class="clearfix"></div>
			
			-->
			
			<input type="submit" value="{$CONFIGURE}" />
		</form>
	</div>
{/nocache}
{/block}