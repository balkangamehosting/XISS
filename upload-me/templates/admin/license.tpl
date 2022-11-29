{extends file='../admin/_global.tpl'}

{block name=title}{$UTILITIES} :: {$LICENSE}{/block}

{block name=header}
<link rel="stylesheet" href="{$systemplate}css/license.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}
	
	<div class="main_full">
		<h1>{$INFORMATION}</h1>
{nocache}
{assign var=i value=$data}					
		<div class="form_row"><div>{$LICENSE}: </div> {$i.username} ({$i.firstname}, {$i.lastname})</div>
		<div class="form_row"><div>{$PAC_TYPE}: </div> {if $i.package_unlimited}{$PAC_UNLIMITED}{else}{$i.package_type|sortBlank}{/if}</div>
		<div class="form_row"><div>{$ALLOWED_BOXES}: </div> {if $i.package_unlimited}{$PAC_UNLIMITED}{else}{$i.package_boxes} ({$USED}: {$i.used_boxes}) {/if}</div>		
		<div class="form_row"><div>{$PAC_SERVERS}: </div> {if $i.package_unlimited}{$PAC_UNLIMITED}{else}{$i.package_servers} ({$USED}: {$i.used_servers}){/if}</div>
		<div class="form_row"><div>{$PAC_CLIENTS}: </div> {if $i.package_unlimited}{$PAC_UNLIMITED}{else}{$i.package_clients} ({$USED}: {$i.used_clients}){/if}</div>
		<div class="form_row"><div>{$PAC_EXPIRES}: </div> {$i.package_expires}</div>
		
		<!--
		<div class="form_row"><div>{$LICENSE}: </div> Valid</div>
		<div class="form_row"><div>{$TYPE}: </div> Single </div>
		<div class="form_row"><div>{$ALLOWED_BOXES}: </div> 10 ({$USED}: 1)</div>
		<div class="form_row"><div>{$BRANDING}: </div> None</div>
		<div class="form_row"><div>{$VALID_DOMAIN}: </div> www.sdas.ss </div>
		<div class="form_row"><div>{$VALID_IP}: </div> xxx.xxx.xxx.xxx</div>
		<div class="form_row"><div>{$CREATED}: </div> 10/10/2013</div>
		<div class="form_row"><div>{$EXPIRES}: </div> 10/10/2014</div>
		<div class="form_row"><div>{$VERSION}: </div> 0.9a</div>
		<div class="form_row"><div>{$LAST_UPDATE}: </div> 12/12/2013</div>
		-->
{/nocache}
	</div>
	
	<div class="clear"></div>
	
{/block}