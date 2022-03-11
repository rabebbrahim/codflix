<?php

require_once( 'model/profil.php' );
require_once( 'model/user.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function profilPage() {

  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( $user_id ):

    $list = Profil::getAllprofil();
    require('view/ProfilListView.php');
  else:
    require('view/homeView.php');
  endif;

}
function addProfil() {
  $types = User::getAllType();
  require('view/AddProfileView.php');
}
function profilSaveAdd($post) {
  $data           = new stdClass();
  $data->name  = $post['name'];
  $data->type  = $post['type'];
  $data->email    = $post['email'];
  $data->key = htmlspecialchars(strip_tags(User::generateKey()));
  $data->password = $post['password'];
  $data->password_confirm  = $post['password_confirm'];
 
  $user = new User( $data ); 
  $error_msg = $user->getMsg();
  if( !$error_msg) {

  
  if (strlen($data->password) <= 8) {
    $error_msg = "Votre password est ivalde Au moins 8 caractères";
}
if(!preg_match("#[0-9]{3,}+#",$data->password )) {
  $error_msg =$error_msg ."Votre password est ivalde au  moins 3 chiffres";
}
if(!preg_match("#[A-Z]{2,}+#",$data->password )) {
  $error_msg =$error_msg . "Votre password est ivalde au  2 lettres majuscules  ";
}
// if(!preg_match("#(#$%^&*()+=-[]';,./{}|:<>?~)#",$data->password )) {
//   $error_msg =$error_msg . "Votre password est ivalde au moins un symbole (! / @ / # / etc) ";
// } 
 
}
if($user->createUser()){
  Message::sendActivationMail($user->getEmail(), $user->getKey());
  $msg ="il va recevoir un mail pour activer votre compte";
}else{

  $msg ="Ce compte existe déjà";
}
$profil = new Profil( $data ); 
 
$profil->createProfilByAdmin();
$types = User::getAllType();
require('view/AddProfileView.php');
}
 //delete Profil 


function deletprofil($email) {

  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( $user_id ):

    $profil  = Profil::deletprofil( $email );

    $list = Profil::getAllprofil();
    require('view/ProfilListView.php');
  else:
    require('view/homeView.php');
  endif;

}

