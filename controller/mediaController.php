<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {
  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $medias =  $search ? Media::filterMedias( $search ): Media::getAllMedia();
  // $medias = Media::getAllMedia();
  // print_r($list);
  require('view/mediaListView.php');

}
