<?php
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }
//	License for all code of this FreePBX module can be found in the license file inside the module directory
//	Copyright 2015 Sangoma Technologies.
//
$confs = conferences_list();
foreach ($confs as $conf) {
	$crows .= '<tr>';
	$crows .= '<td>';
	$crows .= $conf[0];
	$crows .= '</td>';
	$crows .= '<td>';
	$crows .= $conf[1];
	$crows .= '</td>';
	$crows .= '<td>';
	$crows .= '<a href="?display=conferences&view=form&extdisplay='.$conf[0].'">';
	$crows .= '<i class="fa fa-edit"></i>';
	$crows .= '</a>&nbsp;';
	$crows .= '<a href="?display=conferences&action=delete&extdisplay='.$conf[0].'">';
	$crows .= '<i class="fa fa-trash"></i>';
	$crows .= '</a>&nbsp;';
	$crows .= '</td>';
	$crows .= '</tr>';
}
?>

<table class="table table-striped">
<thead>
	<tr>
		<th><?php echo _("Conference")?></th>
		<th><?php echo _("Description")?></th>
		<th><?php echo _("Actions")?></th>
	</tr>	
</thead>
<tbody>
	<?php echo $crows ?>
</tbody>
</table>