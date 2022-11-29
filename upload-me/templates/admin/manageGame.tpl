{extends file='../admin/_global.tpl'}

{block name=title}{$SETTINGS} :: {$MANAGE}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/box.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}	
	<a class="butn" href="{$url}configuration/games">&lsaquo; {$BACK_TO_GAMES}</a> <br />	
	
	<div class="main_full">
		<h1>{$MANAGE}</h1>
		<form action="{$url}configuration/edit_game" method="post">
				
{nocache}
{assign var=i value=$data}		

			<fieldset>
				<legend>{$GAME_DETAILS}</legend>
				
				<div class="form_row"><div>*{$NAME}: </div> <input type="text" name="game[name_str]" value="{$i.name}"/></div>
				<div class="form_row"><div>*{$GAME}: </div> <input type="text" name="game[version_str]" value="{$i.version}"/> </div>
				<div class="form_row"><div>{$STATUS}: </div>
					{$ACTIVE} <input type="radio" name="game[status_int]" value="1" {if $i.status == 1}checked{/if}/>
					{$INACTIVE} <input type="radio" name="game[status_int]" value="2" {if $i.status == 2}checked{/if} />
				</div>
			</fieldset>
			
			<div class="clearfix"></div>
				
			<fieldset>
				<legend>{$GAME_SETTINGS}</legend>
				<div class="form_row"><div>{$PRIORITY}: </div>
					<select name="game[priority_int]">
						<option value="-15" {if $i.priority == -15} selected {/if}>{$PRIORITY_MAX}</option>
						<option value="0" {if $i.priority == 0} selected {/if}>{$PRIORITY_NORMAL}</option>
						<option value="10" {if $i.priority == 10} selected {/if}>{$PRIORITY_MIN}</option>
					</select>
				</div>
				<div class="form_row"><div>*{$MAXSLOTS}:</div> <input class="small" type="text" name="game[slots_int]" value="{$i.slots}"/></div>				
				<div class="form_row"><div>{$G_TYPE}: </div>
					{$PUBLIC} <input type="radio" name="game[type_int]" value="0" {if $i.type == 1}checked{/if}/>
					{$PRIVATE} <input type="radio" name="game[type_int]" value="1"{if $i.type == 2}checked{/if} />
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
			
			<fieldset>
				<legend>{$GAME_QUERY}</legend>
				<div class="form_row"><div>*{$QUERY_CODE}: </div> 
				<select name="game[querycode_str]">
					<option value="">- {$SELECT} -</option>		
					<option value="ase" {if $i.querycode == "ase"}selected{/if}>Ase</option>
					<option value="cry" {if $i.querycode == "cry"}selected{/if}>Cry</option>
					<option value="doom3" {if $i.querycode == "doom3"}selected{/if}>Doom 3</option>
					<option value="gamespy" {if $i.querycode == "gamespy"}selected{/if}>GameSpy</option>					
					<option value="gamespy2" {if $i.querycode == "gamespy2"}selected{/if}>GameSpy 2</option>
					<option value="gamespy3" {if $i.querycode == "gamespy3"}selected{/if}>GameSpy 3</option>
					<option value="ghostrecon" {if $i.querycode == "ghostrecon"}selected{/if}>GhostRecon</option>
					<option value="halflife" {if $i.querycode == "halflife"}selected{/if}>Half Life</option>
					<option value="openttd" {if $i.querycode == "openttd"}selected{/if}>OpenTTD</option>
					<option value="silverback" {if $i.querycode == "silverback"}selected{/if}>Silverback</option>
					<option value="source" {if $i.querycode == "source"}selected{/if}>Source</option>
					<option value="theship" {if $i.querycode == "theship"}selected{/if}>The Ship</option>
					<option value="unreal2" {if $i.querycode == "unreal2"}selected{/if}>Unreal 2</option>
					<option value="ut3" {if $i.querycode == "ut3"}selected{/if}>UT 3</option>
					<option value="ut2003" {if $i.querycode == "ut2003"}selected{/if}>UT 2003</option>
					<option value="quake2" {if $i.querycode == "quake2"}selected{/if}>Quake 2</option>
					<option value="quake3" {if $i.querycode == "quake3"}selected{/if}>Quake 3</option>
					<option value="quakeworld" {if $i.querycode == "quakeworld"}selected{/if}>Quake World</option>			
				</select>
				</div>		
				<div class="form_row"><div>*{$QUERY_PORT}: </div> <input class="small" type="text" name="game[queryport_int]" value="{$i.queryport}"/> </div>
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$GAME_PROPERTIES}</legend>
						
				<div class="form_row"><div>*{$DEFAULT_PORT}: </div> <input class="small" type="text" name="game[defaultport_int]" value="{$i.defaultport}"/> </div>
				<div class="form_row"><div>*{$INSTALL_PATH}: </div> <input type="text" name="game[installdir_str]" value="{$i.installdir}"/> </div>
			</fieldset>
			
			<input type="hidden" name="gameid" value="{$i.id|offset}" />
			
			<div class="clearfix"></div>
{/nocache}			
			<input type="submit" value="{$SAVE}" />
		</form>
	</div>	
	
{/block}