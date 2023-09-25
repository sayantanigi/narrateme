<?php

// Page detection

/*$page = explode("/",$_SERVER['PHP_SELF']);

$pagetitle = "";



$page = explode(".",end($page));

$page = $page[0];*/



/*switch($page){

	case "dashboard":

		$group['dashboard'] = 'active open';

		$activepage[$page] = 'class="active"';

		$selected['dashboard'] = 'selected';

		$arrowopen['dashboard'] = 'open';

		$pagetitle = "Dashboard";

		break;

	

		

	case "cms":

		$group['cms'] = 'active open';

		$activepage[$page] = 'active open';

		$selected['cms'] = 'selected';

		$arrowopen['cms'] = 'open';

		$pagetitle = "CMS Page List";

		break;

		

	case "editcms":

		$group['cms'] = 'active open';

		$activepage['cms'] = 'active open';

		$selected['cms'] = 'selected';

		$arrowopen['cms'] = 'open';

		$pagetitle = "CMS Page Edit";

		break;

		

	case "addindividual":

		$group['addindividual'] = 'active open';

		$activepage['addindividual'] = 'active open';

		$selected['addindividual'] = 'selected';

		$arrowopen['addindividual'] = 'open';

		$pagetitle = "Add Individual";

		break;

	

	case "addsocialprofile":

		$group['social'] = 'active open';

		$activepage['addsocialprofile'] = 'active open';

		$selected['addsocialprofile'] = 'selected';

		$arrowopen['addsocialprofile'] = 'open';

		$pagetitle = "Add Social Individual";

		break;

		

	case "viewsocialprofile":

		$group['social'] = 'active open';

		$activepage['viewsocialprofile'] = 'active open';

		$selected['viewsocialprofile'] = 'selected';

		$arrowopen['viewsocialprofile'] = 'open';

		$pagetitle = "View Social Profile";

		break;	

		

	case "viewindividual":

		$group['addindividual'] = 'active open';

		$activepage['addindividual'] = 'active open';

		$selected['addindividual'] = 'selected';

		$arrowopen['addindividual'] = 'open';

		$pagetitle = "View Individual";

		break;	

	case "editindividual":

		$group['addindividual'] = 'active open';

		$activepage['addindividual'] = 'active open';

		$selected['addindividual'] = 'selected';

		$arrowopen['addindividual'] = 'open';

		$pagetitle = "Edit Individual";

		break;

	

	case "addnewsmedia":

		$group['newsmedia'] = 'active open';

		$activepage['addnewsmedia'] = 'active open';

		$selected['addnewsmedia'] = 'selected';

		$arrowopen['viewnewsmedia'] = 'open';

		$pagetitle = "Add Mews Media";

		break;

		

	case "viewnewsmedia":

		$group['newsmedia'] = 'active open';

		$activepage['viewnewsmedia'] = 'active open';

		$selected['viewnewsmedia'] = 'selected';

		$arrowopen['viewnewsmedia'] = 'open';

		$pagetitle = "View News Media";

		break;	

		

	case "editnewsmedia":

		$group['newsmedia'] = 'active open';

		$activepage['editnewsmedia'] = 'active open';

		$selected['editnewsmedia'] = 'selected';

		$arrowopen['editnewsmedia'] = 'open';

		$pagetitle = "Edit News Media";

		break;		

	

	case "addeduinstitute":

		$group['edu'] = 'active open';

		$activepage['addeduinstitute'] = 'active open';

		$selected['addeduinstitute'] = 'selected';

		$arrowopen['addeduinstitute'] = 'open';

		$pagetitle = "Add Educational Institute";

		break;

		

	case "vieweduinstitute":

		$group['edu'] = 'active open';

		$activepage['vieweduinstitute'] = 'active open';

		$selected['vieweduinstitute'] = 'selected';

		$arrowopen['vieweduinstitute'] = 'open';

		$pagetitle = "View Educational Institute";

		break;	

		

	case "editeduinstitute":

		$group['edu'] = 'active open';

		$activepage['editeduinstitute'] = 'active open';

		$selected['editeduinstitute'] = 'selected';

		$arrowopen['editeduinstitute'] = 'open';

		$pagetitle = "View Educational Institute";

		break;		

	

		

	

	case "tools":

		$group['tools'] = 'active';

		$activepage[$page] = 'class="active"';

		$selected['tools'] = 'selected';

		$arrowopen['tools'] = 'open';

		$pagetitle = "Tools Pages";

		break;

		

	case "settings":

		$group['tools'] = 'active open';

		$activepage[$page] = 'active open';

		$selected['tools'] = 'selected';

		$arrowopen['tools'] = 'open';

		$pagetitle = "Change Settings";

		break;	

		

	case "changepass":

		$group['tools'] = 'active open';

		$activepage[$page] = 'active open';

		$selected['tools'] = 'selected';

		$arrowopen['tools'] = 'open';

		$pagetitle = "Change Password";

		break;

		

	case "adminprofile":

		$group['tools'] = 'active open';

		$activepage[$page] = 'active open';

		$selected['tools'] = 'selected';

		$arrowopen['tools'] = 'open';

		$pagetitle = "Admin Profile";

		break;

		

	case "default":

		$activepage[$page] = '';

		break;}*/

// Load cookie

/*if(isset($_COOKIE['AdminCookie'])){

	$getcookie = $_COOKIE['AdminCookie'];

	$getcookie = explode("@@",$getcookie);

	

	$_SESSION['admin_id'] = $getcookie[0];

	$_SESSION['admin_username'] = $getcookie[1];}*/



// Session check

//if($_SESSION['admin_id'] == "")	header("location:index.php");

?>



<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

        <meta charset="utf-8" />

        <title><?php echo isset($title) ? $title : 'Default Title' ; ?> Admin  </title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <meta content="" name="description" />

        <meta content="" name="author" />

        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <link href="<?php echo base_url()?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url()?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url()?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url()?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url()?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url()?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url()?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->

        <link href="<?php echo base_url()?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />

        <link href="<?php echo base_url()?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />

        <!-- END THEME GLOBAL STYLES -->

        <!-- BEGIN PAGE LEVEL STYLES -->

        <link href="<?php echo base_url()?>assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL STYLES -->

        <!-- BEGIN THEME LAYOUT STYLES -->

        <!-- END THEME LAYOUT STYLES -->

        <link rel="shortcut icon" href="" />

        </head>

    <!-- END HEAD -->