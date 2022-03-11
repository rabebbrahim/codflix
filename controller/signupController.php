<?php

require_once( 'model/user.php' );
require_once( 'model/profil.php' );
require_once( 'model/message.php' );

/****************************
* ----- LOAD SIGNUP PAGE -----
****************************/

function signupPage() {

  $user     = new stdClass();
  $user->id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( !$user->id ):
    require('view/auth/signupView.php');
  else:
    require('view/homeView.php');
  endif;

}

/***************************
* ----- SIGNUP FUNCTION -----
***************************/
function signUp( $post ) {

  $data           = new stdClass();
  $data->email    = $post['email'];
  $data->password = $post['password'];
  $data->password_confirm  = $post['password_confirm'];
  $data->key = htmlspecialchars(strip_tags(User::generateKey()));
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
  $msg ="Vous allez recevoir un mail pour activer votre compte";
}else{

  $msg ="Ce compte existe déjà";
}
  require('view/auth/signupView.php');

}