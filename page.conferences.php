<?php /* $Id$ */
//	License for all code of this FreePBX module can be found in the license file inside the module directory
//	Copyright 2015 Sangoma Technologies.
//
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }
$dispnum = "conferences"; //used for switch on config.php
$tabindex = 0;
$request = $_REQUEST;

$heading = _("Conferences");
$request['view'] = !empty($request['view']) ? $request['view'] : "";
switch($request['view']){
	case "form":
		if($request['extdisplay'] != ''){
			$heading .= ": "._("Edit")." " . $request['extdisplay'];
		}else{
			$heading .= ": "._("Add");
		}
		$content = load_view(__DIR__.'/views/form.php', array('request' => $request));
	break;
	default:
		$content = load_view(__DIR__.'/views/grid.php');
	break;
}

?>
<div class="container-fluid">
	<h1><?php echo $heading ?></h1>
	<div class = "display">
		<div class="row">
			<div class="<?php echo $request['fw_popover']?'col-sm-12':'col-sm-9'?>">
				<div class="fpbx-container">
					<div class="display <?php echo ($request['view'] == "form") ? "full" : "no"?>-border">
						<?php echo $content ?>
					</div>
				</div>
			</div>
			<div class="col-sm-3 hidden-xs bootnav <?php echo $request['fw_popover']?'hidden':''?>">
				<div class="list-group">
					<?php echo load_view(__DIR__.'/views/bootnav.php', array('request' => $request));?>
				</div>
			</div>
		</div>
	</div>
</div>
