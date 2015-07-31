<?php
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }
global $db;
global $amp_conf;

$fcc = new featurecode('conferences', 'conf_status');
$fcc->setDescription('Conference Status'); 
$fcc->setDefault('*87');
$fcc->update();
unset($fcc);

