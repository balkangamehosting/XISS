{extends file='../admin/_global.tpl'}

{block name=title}{$SETTINGS} :: {$SET_GENERAL}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/account.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}	
	<div class="main_full">
		<h1>{$SET_PANEL_SETTINGS}</h1>
		<form action="{$url}configuration/edit_general" method="post">
			<fieldset>
				<legend>{$SET_PANEL}</legend>			
{nocache}
{assign var=i value=$data}	

				<div class="form_row"><div>{$SET_PANEL_NAME}: </div> <input type="text" name="script[panelname_str]" value="{$i.panelname}"/></div>
				<div class="form_row"><div>{$SET_PANEL_URL}: </div> <input type="text" name="script[panelurl_str]" value="{$i.panelurl}"/></div>					
				<div class="form_row"><div>{$SET_TEMPLATE}: </div>
				<select name="script[template_str]">
						{if !$i.template}
						<option value="" selected>- {$SELECT} -</option>
						{/if}
						{foreach from=$templateList key=k item=l}
							<option value="{$l}">{$l}</option>
						{/foreach}
					</select>	
				</div>										
				<div class="form_row"><div>{$SET_LANGUAGE}: </div> 
					<select name="script[lang_str]">
						{if !$i.lang}
							<option value="" selected>- {$SELECT} -</option>
						{/if}
						<option value="en" {if $i.lang == "en"}selected{/if}>English</option>
						<option value="de" {if $i.lang == "de"}selected{/if}>Deutsch</option>
						<option value="si" {if $i.lang == "si"}selected{/if}>Slovensko</option>
					</select>				
				</div>		
				<!--
				<div class="form_row"><div>{$SET_PUBLIC_REPOSITORY}: </div> <input type="checkbox" name="script[repository_inline]" value="" checked/>{$ENABLED}</div>
				<div class="form_row"><div>{$SET_CHECK_FOR_UPDATES}: </div> <input type="checkbox" name="script[updates_inline]" value="" checked/>{$ENABLED}</div>
				-->			
			</fieldset>
			
			<div class="clearfix"></div>	
			
			<fieldset>
				<legend>{$SET_EMAIL}</legend>			

				<div class="form_row"><div>{$SET_EMAIL_SUPPORT}: </div> <input type="text" name="script[supportmail_str]" value="{$i.supportmail}"/></div>
				<div class="form_row"><div>{$SET_EMAIL_NOREPLY}: </div> <input type="text" name="script[noreplymail_str]" value="{$i.noreplymail}"/></div>
			</fieldset>
			
			<div class="clearfix"></div>
			
			<input type="hidden" name="script[geoip_inline]" value="0"/>
			<input type="hidden" name="script[geoipipv6_inline]" value="0"/>
			<input type="hidden" name="script[caching_inline]" value="0"/>
			<input type="hidden" name="script[statistics_inline]" value="0"/>
			
			<fieldset>
				<legend>{$SET_GENERAL}</legend>			

				<div class="form_row"><div>{$SET_GEOIP_LANGUAGE}: </div> <input type="checkbox" name="script[geoip_inline]" {if $i.geoip}checked{/if}/>{$SET_GEOIP_LANGUAGE_DESC}</div>
				<div class="form_row"><div>{$SET_GEOIP_IPV6}: </div> <input type="checkbox" name="script[geoipipv6_inline]" {if $i.geoipipv6}checked{/if}/>{$SET_GEOIP_IPV6_DESC}</div>
				<div class="form_row"><div>{$SET_SMARTY_CACHING}: </div> <input type="checkbox" name="script[caching_inline]"  {if $i.caching}checked{/if}/>{$ENABLED}</div>
				<div class="form_row"><div>{$SET_SHOW_STATS}: </div> <input type="checkbox" name="script[statistics_inline]"   {if $i.statistics}checked{/if}/>{$ENABLED}</div>
			</fieldset>
{/nocache}				
			<div class="clearfix"></div>
												
			<input type="submit" value="{$SAVE}" />			
		</form>
	</div>
	
	<div class="clear"></div>
	
{/block}