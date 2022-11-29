{extends file='../admin/_global.tpl'}

{block name=title}{$PRINT_TITLE}{/block}

{block name=body}
<br />
{nocache}
{if isset($redirect)}
	<script type="text/JavaScript">
		setTimeout("location.href = '{$goto}'; ",{if isset($time)}'{$time}'{else}'2800'{/if});
	</script>
{/if}
					
<!-- When using custom template always use "error" class for error as that's pre-set -->					
<div class="{$PRINT_CSS}">		
	<h2>{$PRINT_TITLE}</h2>
	<p>{$PRINT_MSG}</p>		
</div>	
			
{/nocache}
{/block}