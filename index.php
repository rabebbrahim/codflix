<?php

date_default_timezone_set('Europe/Paris');

require_once( 'controller/homeController.php' );
require_once( 'controller/loginController.php' );
require_once( 'controller/signupController.php' );
require_once( 'controller/mediaController.php' );
require_once( 'controller/ProfilController.php' );
require_once( 'controller/modifierProfilController.php' );
require_once( 'controller/favorisController.php' );
require_once( 'controller/contactController.php' );

/**************************
* ----- HANDLE ACTION -----
***************************/

if ( isset( $_GET['action'] ) ):

  switch( $_GET['action']):

    case 'login':

      if ( !empty( $_POST ) ) login( $_POST );
      else loginPage();

    break;

    case 'signup':
    if ( !empty( $_POST ) ) signUp( $_POST );
      signupPage();

    break;

    case 'logout':

      logout();

    break;

    case 'profil':

    profilPage();
    
    break;

    case 'updateprofil':

    updateprofil($_GET['id']);
    
    break;
    case 'updatemyprofil':

    UpdateMyProfile();
    
    break;

    case 'deletprofil':

    deletprofil($_GET['email']);
    
    break;
    case 'Saveprofil':

    if ( !empty( $_POST ) ) saveprofil( $_POST );
    
    break;
    case 'addProfil':

   addProfil();
    
    break;

    case 'profilSaveAdd':

    if ( !empty( $_POST ) ) profilSaveAdd( $_POST );
    
    break;

    case 'enveie':

    getfavoris();
    
    break;

    case 'addfavoris':

    addfavoris(( $_POST ));
    
    break;

    case 'contact':
    contactPage();
    
  break;

    case 'envoyerMessage':
      if(!empty($_POST)){
          sendMessage($_POST);
      }
    
  break;

  endswitch;

else:

  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( $user_id ):
    mediaPage();
  else:
    homePage();
  endif;

endif;
