{extends file='../admin/_global.tpl'}

{block name=title}{$SETTINGS} :: {$ADDGAME}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/box.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}	
	<a class="butn" href="{$url}configuration/games">&lsaquo; {$BACK_TO_GAMES}</a> 	<br />	
	
	<div class="main_full">
		<h1>{$ADDGAME}</h1>
		<form action="{$url}configuration/submit_game" method="post">
			<fieldset>
				<legend>{$GAME_DETAILS}</legend>
				
				<div class="form_row"><div>*{$NAME}: </div> <input type="text" name="game[name_str]" value=""/></div>
				<div class="form_row"><div>*{$GAME}: </div> <input type="text" name="game[version_str]" value=""/> </div>
				<div class="form_row"><div>{$STATUS}: </div>
					{$ACTIVE} <input type="radio" name="game[status_int]" value="1" checked/>
					{$INACTIVE} <input type="radio" name="game[status_int]" value="2" />
				</div>
			</fieldset>
			
			<div class="clearfix"></div>
				
			<fieldset>
				<legend>{$GAME_SETTINGS}</legend>
				<div class="form_row"><div>{$PRIORITY}: </div>
					<select name="game[priority_int]">
						<option value="-15">{$PRIORITY_MAX}</option>
						<option value="0" selected>{$PRIORITY_NORMAL}</option>
						<option value="10">{$PRIORITY_MIN}</option>
					</select>
				</div>
				<div class="form_row"><div>*{$MAXSLOTS}:</div> <input class="small" type="text" name="game[slots_int]" value=""/></div>				
				<div class="form_row"><div>{$G_TYPE}: </div>
					{$PUBLIC} <input type="radio" name="game[type_int]" value="0" checked/>
					{$PRIVATE} <input type="radio" name="game[type_int]" value="1" />
				</div>
				
				<div class="form_row"><div><input class="small" type="text" name="game[cfg1_str]" value=""/> :</div> <input type="text" name="game[cfg1name_str]" value=""/> <input type="checkbox" name="game[cfg1edit_inline]" /> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg2_str]" value=""/> :</div> <input type="text" name="game[cfg2name_str]" value=""/> <input type="checkbox" name="game[cfg2edit_inline]" /> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg3_str]" value=""/> :</div> <input type="text" name="game[cfg3name_str]" value=""/> <input type="checkbox" name="game[cfg3edit_inline]" /> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg4_str]" value=""/> :</div> <input type="text" name="game[cfg4name_str]" value=""/> <input type="checkbox" name="game[cfg4edit_inline]" /> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg5_str]" value=""/> :</div> <input type="text" name="game[cfg5name_str]" value=""/> <input type="checkbox" name="game[cfg5edit_inline]" /> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg6_str]" value=""/> :</div> <input type="text" name="game[cfg6name_str]" value=""/> <input type="checkbox" name="game[cfg6edit_inline]" /> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg7_str]" value=""/> :</div> <input type="text" name="game[cfg7name_str]" value=""/> <input type="checkbox" name="game[cfg7edit_inline]" /> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg8_str]" value=""/> :</div> <input type="text" name="game[cfg8name_str]" value=""/> <input type="checkbox" name="game[cfg8edit_inline]" /> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg9_str]" value=""/> :</div> <input type="text" name="game[cfg9name_str]" value=""/> <input type="checkbox" name="game[cfg9edit_inline]" /> {$ALLOW_CLIENT}</div>
				<div class="form_row"><div><input class="small" type="text" name="game[cfg10_str]" value=""/> :</div> <input type="text" name="game[cfg10name_str]" value=""/> <input type="checkbox" name="game[cfg10edit_inline]" /> {$ALLOW_CLIENT}</div>
				
				<div class="titled" >*{$STARTUP_LINE}: </div>
				<textarea name="game[startupline_str]" class="startup"></textarea>
				
			</fieldset>
				
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$GAME_QUERY}</legend>
				<div class="form_row"><div>*{$QUERY_CODE}: </div> 
				<select name="game[querycode_str]">
					<option value="">- {$SELECT} -</option>		
					<option value="ase">Ase</option>
					<option value="cry">Cry</option>
					<option value="doom3">Doom 3</option>
					<option value="gamespy">GameSpy</option>					
					<option value="gamespy2">GameSpy 2</option>
					<option value="gamespy3">GameSpy 3</option>
					<option value="ghostrecon">GhostRecon</option>
					<option value="halflife">Half Life</option>
					<option value="openttd">OpenTTD</option>
					<option value="silverback">Silverback</option>
					<option value="source">Source</option>
					<option value="theship">The Ship</option>
					<option value="unreal2">Unreal 2</option>
					<option value="ut3">UT 3</option>
					<option value="ut2003">UT 2003</option>
					<option value="quake2">Quake 2</option>
					<option value="quale3">Quake 3</option>
					<option value="quakeworld">Quake World</option>			
				</select>
				</div>		
				<div class="form_row"><div>*{$QUERY_PORT}: </div> <input class="small" type="text" name="game[queryport_int]" value=""/> </div>
			</fieldset>
			
			<div class="clearfix"></div>
			
			<fieldset>
				<legend>{$GAME_PROPERTIES}</legend>
						
				<div class="form_row"><div>*{$DEFAULT_PORT}: </div> <input class="small" type="text" name="game[defaultport_int]" value=""/> </div>
				<div class="form_row"><div>*{$INSTALL_PATH}: </div> <input type="text" name="game[installdir_str]" value=""/> </div>
			</fieldset>
			
			<div class="clearfix"></div>
								
			<input type="submit" value="{$ADD}" />			
		</form>	
	</div>	
	
{/block}