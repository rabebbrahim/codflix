<?php

require_once( 'model/favoris.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function getfavoris() {

  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( $user_id ):
    $user = new Favoris( $user_id ); 
    
    $medias  = $user->getfavoris($user_id);
    require('view/EnvieListView.php');
  else:
    require('view/homeView.php');
  endif;

}
function addfavoris($post) {
  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
  $media_id    = $post['id'];
  $user = new Favoris( $user_id ); 
    
  $user->addfavoris($user_id, $media_id);
  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $medias =  $search ? Media::filterMedias( $search ): Media::getAllMedia();
  // $medias = Media::getAllMedia();
  // print_r($list);
  require('view/mediaListView.php');
}



