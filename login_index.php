<?php
require_once 'login_controller.php';
$controller = new MemberController($_GET['action']);
$controller->run();
exit;
?>