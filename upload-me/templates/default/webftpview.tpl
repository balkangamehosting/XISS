{extends file='_global.tpl'}

{block name=title}{$SERVERS} :: {$WEBFTP}{/block}

{block name=header}
<link rel="stylesheet" href="{$template}css/webftp.css" type="text/css" media="screen" charset="utf-8" />
{/block}

{block name=lang}{/block}

{block name=body}
{nocache}
	<a class="butn" href="{$backto}">&lsaquo; {$BACK_TO_FTP}</a>
	
	<div class="main_full">
		<form method="post" action="{$url}server/ftp_actions/{$id}/save">
		
			<textarea name="content" class="editfile">{$content}</textarea>			
			<input type="hidden" name="holder" value="{$holder}"/>
			
			<div class="clearfix"></div>
			
			<span class="right"><input type="submit" name="submit" value="{$SAVE}" /></span>
		</form>
	</div>
{/nocache}

{/block}