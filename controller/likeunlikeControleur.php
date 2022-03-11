<?php
function index ($post){

    require_once( 'model/media.php' );
// require "./model/media.php'";

$type = $_POST['type'];
$media = $_POST['media'];
Media::setReact( $type, $_SESSION['user_id'],$media );

}

