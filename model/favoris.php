<?php

require_once( 'database.php' );

class Favoris {

  protected $user_id;


  public function __construct( $user_id = null) {
    $this->setuser_id( isset( $user_id ) ? $user_id : null );
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setuser_id( $id ) {
    $this->id = $id;
  }


  /***************************
  * -------- GETTERS ---------
  ***************************/
  public function getuser_id() {
    return $this->user_id;
  }

  /***************************
  * -------- GET LIST --------
  ***************************/

  public static function getfavoris($user_id){
    $db = init_db();
    $req  = $db->prepare( "SELECT * FROM favoris f INNER JOIN media m on m.id= f. 	id_media  where f.id_user = ? " );
    $req->execute( array($user_id ));
    return $req->fetchAll();
}
  public static function addfavoris($user_id,$media_id){
    $db   = init_db();
    $req  = $db->prepare( "INSERT INTO  favoris ( id_media ,  id_user ) VALUES (:id_media ,:id_user )");
    $req->execute(array(
      'id_media'     => $media_id,
      'id_user'  => $user_id,
      ));
    return true;
}

// update react like or ulike for user


}
