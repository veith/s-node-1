<?php
$perms = 0;
foreach($GLOBALS['plugin']->getValue('perms') as $key => $value){
    if($value == 1){
        $perms = $GLOBALS['perm']->addPerm($perms, $key);
    }
}

// Set principal type: 1 user, 2 group, 3 role
$principal_type = 2;

// chek if data can be updated (save button can update data, language switching can only update if not inherited)
foreach ($GLOBALS['cfg']->getLangs() as $language => $val ){
    // Delete previously defined permissions
    XT::query("
    DELETE FROM 
        " . $GLOBALS['cfg']->get("database", "prefix") . "perms 
    WHERE 
        base_id = " . $GLOBALS['plugin']->getSessionValue("base_id") . "
        AND principal_id = " . $GLOBALS['plugin']->getValue("group_id") . "
        AND principal_type = " . $principal_type . "
        AND lang = '" . $language . "'
    ",__FILE__,__LINE__);

    XT::query("
    INSERT INTO 
        " . $GLOBALS['cfg']->get("database", "prefix") . "perms 
    (
        base_id,
        principal_id,
        principal_type,
        perms,
        lang
    ) VALUES (
        " . $GLOBALS['plugin']->getSessionValue("base_id") . ",
        " . $GLOBALS['plugin']->getValue("group_id") . ",
        " . $principal_type . ",
        " . $perms . ",
        '" . $language . "'
    )",__FILE__,__LINE__);
}
?>
