<?php
global $smarty;
include('../../config/config.inc.php');
include('../../header.php');
 
$smarty->display(dirname(__FILE__).'/paypay_page.tpl');
 
include('../../footer.php');
?>