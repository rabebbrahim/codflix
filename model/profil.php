<?php

require_once( 'database.php' );

class profil {

  protected $id;
  protected $name;
  protected $type;
  protected $email;

  public function __construct( $profil = null ) {

    $this->setId( isset( $profil->id ) ? $profil->id : null );
    $this->setName(isset( $profil->name)?$profil->name:"" );
    $this->setEmail( $profil->email );
    $this->setType(isset( $profil->type)? $profil->type :1  );
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setName( $genre_id ) {
    $this->genre_id = $genre_id;
  }
  public function setEmail( $email ) {

    if ( !filter_var($email, FILTER_VALIDATE_EMAIL)):
      throw new Exception( 'Email incorrect' );
    endif;

    $this->email = $email;

  }
  public function setType( $type ) {
    $this->type = $type;
  }



  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getType() {
    return $this->type;
  }
  public function getEmail() {
    return $this->email;
  }



  /***************************
  * -------- GET LIST --------
  ***************************/

  public static function getAllprofil(){
    $db = init_db();
    $req  = $db->query( "SELECT *,t.name as type,u.id as id ,u.name as name FROM profils u INNER JOIN type t ON u.typ_id = t.id" );

    return $req->fetchAll();
}
  
public function createProfilByAdmin() {
  $avatar = 'http://localhost/codFix/public/img/avatar.png';
    // Open database connection
    $db   = init_db();

    // Check if email already exist
    $req  = $db->prepare( "SELECT * FROM user WHERE email = ?" );
    $req->execute( array( $this->getEmail() ) );

    if( $req->rowCount() > 0 ) :
      return false;
      else : 
    // Insert new user
    $req->closeCursor();

    $req  = $db->prepare( "INSERT INTO user ( email,  password, active ) VALUES (:email, :password, :active)" );
    $req->execute(array(
      'email'     => $this->getEmail(),
      'password'  => $this->hash($this->getPassword()),
      'active' => 0,
      ));
      $req  = $db->prepare( "INSERT INTO profils ( name,email,typ_id,avatar ) VALUES (:name,:email,:typ_id , :avatar)" );
  $req->execute(array(
    'name'     =>  $this->getName() ,
    'email'     => $this->getEmail() ,
    'typ_id'      =>  $this->getType(),
    'avatar' => $avatar
    ));
      return true;
    endif;

}

//get information profil by id

public static function getProfilById( $id ) {

  // Open database connection
  $db   = init_db();

  $req  = $db->prepare( "SELECT * FROM profils WHERE id = ?" );
  $req->execute( array( $id ));

  // Close databse connection
  $db   = null;

  return $req->fetch();
}

//delete profil

public static function deletprofil( $email ) {

  $db   = init_db();

  $req  = $db->prepare( "DELETE FROM  profils  WHERE  email  = ?" );
  $req->execute( array( $email ));

  $req->closeCursor();
  
  $req  = $db->prepare( "DELETE FROM  user  WHERE  email  = ?" );
  $req->execute( array( $email ));



}
public static  function getAllType() {
  $db   = init_db();

  $req  = $db->query( "SELECT * FROM type " );

  return $req->fetchAll();
}
public static  function getAllGenre() {
  $db   = init_db();

  $req  = $db->query( "SELECT * FROM genre " );

  return $req->fetchAll();
}
public static function saveprofil($id, $name, $typ_id,$email){
  $db   = init_db();
  $req  = $db->prepare( "UPDATE profils SET email = ? , typ_id =?, name=? WHERE id = ?");
  $datas = $req->execute(array($email,$typ_id ,$name, $id));  
  return $datas;
}
}
