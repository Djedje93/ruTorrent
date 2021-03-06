<?php
require_once( 'unpack.php' );

ignore_user_abort(true);
set_time_limit(0);
$ret = array();

if(isset($_REQUEST['cmd']))
{
	$cmd = $_REQUEST['cmd'];
	switch($cmd)
	{
		case "set":
		{
			$up = rUnpack::load();
			$up->set();
			CachedEcho::send($up->get(),"application/javascript");
			break;
		}
		case "unpack":
		{
			$up = rUnpack::load();
			$ret = $up->startTask( $_REQUEST['hash'], $_REQUEST['dir'], $_REQUEST['mode'], $_REQUEST['no'] );
			break;
		}
	}
}

CachedEcho::send(JSON::safeEncode($ret),"application/json");
