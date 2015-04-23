<?php
require_once('../../src/libsse.php');
session_start();

class Progress extends SSEEvent {
	public function update(){

        //$_SESSION['pushProgress'] = 'http://'.$_SERVER[HTTP_HOST].'/examples/basic/index.html?success=true'; //$_SERVER[REQUEST_URI]
        $_SESSION['pushProgress'] = true;
        if($_SESSION['pushProgress'] !== true){
            return json_encode(array('url'=>$_SESSION['pushProgress']));
        }
        else{
            return json_encode(array('url'=>true));
        }

		//return date('l, F jS, Y, h:i:s A');
	}
}

$sse = new SSE();
$sse->exec_limit=10;
$sse->addEventListener('time',new Progress());
$sse->start();
?>