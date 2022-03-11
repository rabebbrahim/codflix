<?php

require_once( 'model/profil.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function updateprofil($id) {
  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( $user_id ):

    $profil  = Profil::getProfilById( $id );
    $types = Profil::getAllType();
    require('view/UpdateProfileView.php');
  else:
    require('view/homeView.php');
  endif;

}
function UpdateMyProfile() {
 $user_id=  $_SESSION['user_id'];

print_r($user_id);
    $profil  = Profil::getProfilById( $user_id );
    $types = Profil::getAllGenre();
    require('view/UpdateMyProfileView.php');
  
 

}

function saveprofil( $post ){
  $id    = $post['id'];
  $name    = $post['name'];
  $typ_id = $post['type']; 
  $email = $post['email']; 
  Profil::saveprofil($id, $name, $typ_id,$email);
  updateprofil($id);
}
