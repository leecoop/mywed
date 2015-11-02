<?php
function smarty_postfilter_angularjsescape($source, Smarty_Internal_Template $template)
{
    $source = str_replace('%AJSL%', '{{', $source);
    $source = str_replace('%AJSR%', '}}', $source);
    return $source;
}