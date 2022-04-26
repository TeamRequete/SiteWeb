<?php
session_start();
libxml_use_internal_errors(true);
require_once("controller/controller_admin.php");
require_once("controller/controller_editFormation.php");
require_once("controller/controller_followFormation.php");
require_once("controller/controller_formations.php");
require_once("controller/controller_forumLst.php");
require_once("controller/controller_forumShow.php");
require_once("controller/controller_forumThread.php");
require_once("controller/controller_index.php");
require_once("controller/controller_login.php");
require_once("controller/controller_mesFormation.php");
require_once("controller/controller_profile.php");
require_once("controller/controller_register.php");
require_once("controller/controller_showFormation.php");
require_once("controller/controller_switchStyle.php");
require_once("controller/controller_unFollowFormation.php");
require_once("controller/controller_upvoteFormation.php");
require_once("utils.php");

//model
require_once("model/model_includer.php");



?>
