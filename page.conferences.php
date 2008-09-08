<?php /* $Id$ */
//Copyright (C) 2004 Coalescent Systems Inc. (info@coalescentsystems.ca)
//
//This program is free software; you can redistribute it and/or
//modify it under the terms of the GNU General Public License
//as published by the Free Software Foundation; either version 2
//of the License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.


isset($_REQUEST['action'])?$action = $_REQUEST['action']:$action='';
//the extension we are currently displaying
isset($_REQUEST['extdisplay'])?$extdisplay=$_REQUEST['extdisplay']:$extdisplay='';
$dispnum = "conferences"; //used for switch on config.php

//check if the extension is within range for this user
if (isset($account) && !checkRange($account)){
	echo "<script>javascript:alert('"._("Warning! Extension")." $account "._("is not allowed for your account.")."');</script>";
} else {
	
	//if submitting form, update database
	switch ($action) {
		case "add":

			$conflict_url = array();
			$usage_arr = framework_check_extension_usage($account);
			if (!empty($usage_arr)) {
				$conflict_url = framework_display_extension_usage_alert($usage_arr);
			} elseif (conferences_add($_REQUEST['account'],$_REQUEST['name'],$_REQUEST['userpin'],$_REQUEST['adminpin'],$_REQUEST['options'],$_REQUEST['joinmsg_id']) !== false) {
				needreload();
				redirect_standard();
			}
		break;
		case "delete":
			conferences_del($extdisplay);
			needreload();
			redirect_standard();
		break;
		case "edit":  //just delete and re-add
			conferences_del($_REQUEST['account']);
			conferences_add($_REQUEST['account'],$_REQUEST['name'],$_REQUEST['userpin'],$_REQUEST['adminpin'],$_REQUEST['options'],$_REQUEST['joinmsg_id']);
			needreload();
			redirect_standard('extdisplay');
		break;
	}
}

//get meetme rooms
//this function needs to be available to other modules (those that use goto destinations)
//therefore we put it in globalfunctions.php
$meetmes = conferences_list();
?>

</div>

<!-- right side menu -->
<div class="rnav"><ul>
    <li><a id="<?php echo ($extdisplay=='' ? 'current':'') ?>" href="config.php?display=<?php echo urlencode($dispnum)?>"><?php echo _("Add Conference")?></a></li>
<?php
if (isset($meetmes)) {
	foreach ($meetmes as $meetme) {
		echo "<li><a id=\"".($extdisplay==$meetme[0] ? 'current':'')."\" href=\"config.php?display=".urlencode($dispnum)."&extdisplay=".urlencode($meetme[0])."\">{$meetme[0]}:{$meetme[1]}</a></li>";
	}
}
?>
</ul></div>


<div class="content">
<?php
if ($action == 'delete') {
	echo '<br><h3>'._("Conference").' '.$extdisplay.' '._("deleted").'!</h3><br><br><br><br><br><br><br><br>';
} else {
	if ($extdisplay){ 
		//get details for this meetme
		$thisMeetme = conferences_get($extdisplay);
		$options     = $thisMeetme['options'];
		$userpin     = $thisMeetme['userpin'];
		$adminpin    = $thisMeetme['adminpin'];
		$description = $thisMeetme['description'];
		$joinmsg_id  = $thisMeetme['joinmsg_id'];
	} else {
		$options     = "";
		$userpin     = "";
		$adminpin    = "";
		$description = "";
		$joinmsg_id  = "";
	}

?>
<?php		if ($extdisplay){ ?>
	<h2><?php echo _("Conference:")." ". $extdisplay; ?></h2>
<?php
					$delURL = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&action=delete';
					$tlabel = sprintf(_("Delete Conference %s"),$extdisplay);
					$label = '<span><img width="16" height="16" border="0" title="'.$tlabel.'" alt="" src="images/core_delete.png"/>&nbsp;'.$tlabel.'</span>';
?>
					<a href="<?php echo $delURL ?>"><?php echo $label; ?></a><br />
<?php
					$usage_list = framework_display_destination_usage(conferences_getdest($extdisplay));
					if (!empty($usage_list)) {
?>
						<a href="#" class="info"><?php echo $usage_list['text']?>:<span><?php echo $usage_list['tooltip']?></span></a>
<?php
					}
?>

<?php		} else { ?>
	<h2><?php echo _("Add Conference"); ?></h2>
<?php		}
				if (!empty($conflict_url)) {
					echo "<h5>"._("Conflicting Extensions")."</h5>";
					echo implode('<br .>',$conflict_url);
				}
?>
	<form autocomplete="off" name="editMM" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return checkConf();">
	<input type="hidden" name="display" value="<?php echo $dispnum?>">
	<input type="hidden" name="action" value="<?php echo ($extdisplay ? 'edit' : 'add') ?>">
	<table>
	<tr><td colspan="2"><h5><?php echo ($extdisplay ? _("Edit Conference") : _("Add Conference")) ?><hr></h5></td></tr>
	<tr>
<?php		if ($extdisplay){ ?>
		<input type="hidden" name="account" value="<?php echo $extdisplay; ?>">
<?php		} else { ?>
		<td><a href="#" class="info"><?php echo _("Conference Number:")?><span><?php echo _("Use this number to dial into the conference.")?></span></a></td>
		<td><input type="text" name="account" value="" tabindex="<?php echo ++$tabindex;?>"></td>
<?php		} ?>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("Conference Name:")?><span><?php echo _("Give this conference a brief name to help you identify it.")?></span></a></td>
		<td><input type="text" name="name" value="<?php echo $description; ?>" tabindex="<?php echo ++$tabindex;?>"></td>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("User PIN:")?><span><?php echo _("You can require callers to enter a password before they can enter this conference.<br><br>This setting is optional.<br><br>If either PIN is entered, the user will be prompted to enter a PIN.")?></span></a></td>
		<td><input size="8" type="text" name="userpin" value="<?php echo $userpin; ?>" tabindex="<?php echo ++$tabindex;?>"></td>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("Admin PIN:")?><span><?php echo _("Enter a PIN number for the admin user.<br><br>This setting is optional unless the 'leader wait' option is in use, then this PIN will identify the leader.")?></span></a></td>
		<td><input size="8" type="text" name="adminpin" value="<?php echo $adminpin; ?>" tabindex="<?php echo ++$tabindex;?>"></td>
	</tr>

	<input type="hidden" name="options" value="<?php echo $options; ?>">
	
	<tr><td colspan="2"><br><h5><?php echo _("Conference Options")?><hr></h5></td></tr>
<?php if(function_exists('recordings_list')) { //only include if recordings is enabled?>
	<tr>
		<td><a href="#" class="info"><?php echo _("Join Message:")?><span><?php echo _("Message to be played to the caller before joining the conference.<br><br>To add additional recordings please use the \"System Recordings\" MENU to the left")?></span></a></td>
		<td>
			<select name="joinmsg_id" tabindex="<?php echo ++$tabindex;?>">
			<?php
				$tresults = recordings_list();
				echo '<option value="">'._("None")."</option>";
				if (isset($tresults[0])) {
					foreach ($tresults as $tresult) {
						echo '<option value="'.$tresult['id'].'"'.($tresult['id'] == $joinmsg_id ? ' SELECTED' : '').'>'.$tresult['displayname']."</option>\n";
					}
				}
			?>		
			</select>		
		</td>
	</tr>
<?php }	else { ?>
	<tr>
		<td><a href="#" class="info"><?php echo _("Join Message:")?><span><?php echo _("Message to be played to the caller before joining the conference.<br><br>You must install and enable the \"Systems Recordings\" Module to edit this option")?></span></a></td>
		<td>
			<input type="hidden" name="joinmsg_id" value="<?php echo $joinmsg_id; ?>"><?php echo ($joinmsg_id != '' ? $joinmsg_id : 'None'); ?>
		</td>
	</tr>
<?php } ?>
	<tr>
		<td><a href="#" class="info"><?php echo _("Leader Wait:")?><span><?php echo _("wait until the conference leader (admin user) arrives before starting the conference")?></span></a></td>
		<td>
			<select name="opt#w" tabindex="<?php echo ++$tabindex;?>">
			<?php
				$optselect = strpos($options, "w");
				echo '<option value=""' . ($optselect === false ? ' SELECTED' : '') . '>'._("No") . '</option>';
				echo '<option value="w"'. ($optselect !== false ? ' SELECTED' : '') . '>'._("Yes"). '</option>';
			?>		
			</select>		
		</td>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("Quiet Mode:")?><span><?php echo _("Quiet mode (do not play enter/leave sounds)")?></span></a></td>
		<td>
			<select name="opt#q" tabindex="<?php echo ++$tabindex;?>">
			<?php
				$optselect = strpos($options, "q");
				echo '<option value=""' . ($optselect === false ? ' SELECTED' : '') . '>'._("No") . '</option>';
				echo '<option value="q"'. ($optselect !== false ? ' SELECTED' : '') . '>'._("Yes"). '</option>';
			?>		
			</select>		
		</td>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("User Count:")?><span><?php echo _("Announce user(s) count on joining conference")?></span></a></td>
		<td>
			<select name="opt#c" tabindex="<?php echo ++$tabindex;?>">
			<?php
				$optselect = strpos($options, "c");
				echo '<option value=""' . ($optselect === false ? ' SELECTED' : '') . '>'._("No") . '</option>';
				echo '<option value="c"'. ($optselect !== false ? ' SELECTED' : '') . '>'._("Yes"). '</option>';
			?>		
			</select>		
		</td>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("User join/leave:")?><span><?php echo _("Announce user join/leave")?></span></a></td>
		<td>
			<select name="opt#i" tabindex="<?php echo ++$tabindex;?>">
			<?php
				$optselect = strpos($options, "i");
				echo '<option value=""' . ($optselect === false ? ' SELECTED' : '') . '>'._("No") . '</option>';
				echo '<option value="i"'. ($optselect !== false ? ' SELECTED' : '') . '>'._("Yes"). '</option>';
			?>		
			</select>		
		</td>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("Music on Hold:")?><span><?php echo _("Enable Music On Hold when the conference has a single caller")?></span></a></td>
		<td>
			<select name="opt#M" tabindex="<?php echo ++$tabindex;?>">
			<?php
				$optselect = strpos($options, "M");
				echo '<option value=""' . ($optselect === false ? ' SELECTED' : '') . '>'._("No") . '</option>';
				echo '<option value="M"'. ($optselect !== false ? ' SELECTED' : '') . '>'._("Yes"). '</option>';
			?>		
			</select>		
		</td>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("Allow Menu:")?><span><?php echo _("Present Menu (user or admin) when '*' is received ('send' to menu)")?></span></a></td>
		<td>
			<select name="opt#s" tabindex="<?php echo ++$tabindex;?>">
			<?php
				$optselect = strpos($options, "s");
				echo '<option value=""' . ($optselect === false ? ' SELECTED' : '') . '>'._("No") . '</option>';
				echo '<option value="s"'. ($optselect !== false ? ' SELECTED' : '') . '>'._("Yes"). '</option>';
			?>		
			</select>		
		</td>
	</tr>

	<tr>
		<td><a href="#" class="info"><?php echo _("Record Conference:")?><span><?php echo _("Record the conference call")?></span></a></td>
		<td>
			<select name="opt#r" tabindex="<?php echo ++$tabindex;?>">
				<?php
				$optselect = strpos($options, "r");
				echo '<option value=""' . ($optselect === false ? ' SELECTED' : '') . '>'._("No") . '</option>';
 				echo '<option value="r"'. ($optselect !== false ? ' SELECTED' : '') . '>'._("Yes"). '</option>';
				?>
			</select>
		</td>
	</tr>

	</table>
<?php
	// implementation of module hook
	// object was initialized in config.php
	echo $module_hook->hookHtml;
?>
	<h6><input name="Submit" type="submit" value="<?php echo _("Submit Changes")?>" tabindex="<?php echo ++$tabindex;?>"></h6>
<script language="javascript">
<!--

var theForm = document.editMM;

if (theForm.account.value == "") {
	theForm.account.focus();
} else {
	theForm.name.focus();
}

function checkConf()
{
	var msgInvalidConfNumb = "<?php echo _('Please enter a valid Conference Number'); ?>";
	var msgInvalidConfName = "<?php echo _('Please enter a valid Conference Name'); ?>";
	var msgNeedAdminPIN = "<?php echo _('You must set an admin PIN for the Conference Leader when selecting the leader wait option'); ?>";
	
	defaultEmptyOK = false;
	if (!isInteger(theForm.account.value))
		return warnInvalid(theForm.account, msgInvalidConfNumb);
		
	if (!isAlphanumeric(theForm.name.value))
		return warnInvalid(theForm.name, msgInvalidConfName);
		
	// update $options
	var theOptionsFld = theForm.options;
	theOptionsFld.value = "";
	for (var i = 0; i < theForm.elements.length; i++)
	{
		var theEle = theForm.elements[i];
		var theEleName = theEle.name;
		if (theEleName.indexOf("#") > 1)
		{
			var arr = theEleName.split("#");
			if (arr[0] == "opt")
				theOptionsFld.value += theEle.value;
		}
	}

	// not possible to have a 'leader' conference with no adminpin
	if (theForm.options.value.indexOf("w") > -1 && theForm.adminpin.value == "")
		return warnInvalid(theForm.adminpin, msgNeedAdminPIN);
		
	return true;
}

//-->
</script>
	</form>
<?php		
} //end if action == delGRP
?>
