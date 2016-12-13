<!DOCTYPE HTML PUBLIC “-//W3C//DTD HTML 4.01 Transitional//EN” “http://www.w3.org/TR/html4/loose.dtd”>
<meta http-equiv=”content-type” content=”text/html; charset=utf-8″ />
<?php
#Include the FirePHP class
require_once(‘FirePHPCore/FirePHP.class.php‘);
#Start buffering the output. Not required if output_buffering is set on in php.ini file
ob_start();
#get a firePHP variable reference
$firephp = FirePHP::getInstance(true);
# we log today’s date as an example. you could log whatever variable you want to
$todays_date = date(‘l jS of F Y h:i:s A‘);
$firephp->log($todays_date, ‘Date‘);
?>