<?php
if(!XT::hasErrors()){
    XT::query("DELETE FROM " . $GLOBALS['plugin']->getTable('discounts') . " WHERE id = " . $GLOBALS['plugin']->getValue('id'),__FILE__,__LINE__);
    XT::query("DELETE FROM " . $GLOBALS['plugin']->getTable('discounts_details') . " WHERE id = " . $GLOBALS['plugin']->getValue('id'),__FILE__,__LINE__);
    XT::query("DELETE FROM " . $GLOBALS['plugin']->getTable('discounts_articles') . " WHERE discount_id = " . $GLOBALS['plugin']->getValue('id'),__FILE__,__LINE__);
    XT::log("Value " . $GLOBALS['plugin']->getValue('id') . " has been deleted.",__FILE__,__LINE__,XT_INFO);
}

?>
