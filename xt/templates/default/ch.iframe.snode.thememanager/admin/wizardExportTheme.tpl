{literal}
<style type="text/css">
@import url("{/literal}{$XT_STYLES}{literal}installer/default.css");
#introduction {
    width: 100%;
}
</style>
{/literal}
<form method="post" name="slave1">
{include file="ch.iframe.snode.installer/admin/hiddenValues.tpl"}
<div id="content">
<h1>{"<b>Export</b> a theme"|translate}</h1>
<p id="introduction">{"Which theme should be exported?"|translate}</p>
<br />
<div id="form" style="margin-bottom: 0px;">
<label for="x{$BASEID}_theme_title" style="padding-left: 0px;">{"Choose theme"|translate}</label>
<select name="x{$BASEID}_theme_title">
{foreach from=$THEMES item=THEME}
<option>{$THEME}</option>
{/foreach}
</select>
</div>
</div>
<div id="control">
<input type="image" onclick="this.form.x{$BASEID}_action.value='ExportTheme';this.form.submit();" name="x{$BASEID}_wizard_submit" src="{$XT_IMAGES}installer/de/weiter.gif" />
</div>
</form>
