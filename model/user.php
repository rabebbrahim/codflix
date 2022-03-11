<?php

require_once( 'database.php' );

class User {

  protected $id;
  protected $email;
  protected $key;
  protected $password;
  protected $msg;
  protected $name;


  public function __construct( $user = null ) {

    if( $user != null ):
      $this->setId( isset( $user->id ) ? $user->id : null );
      $this->setEmail( $user->email );
      $this->setKey( isset($user->key) ? $user->key  : null);
      $this->setPassword( $user->password, isset( $user->password_confirm ) ? $user->password_confirm : false );
      $this->setName( isset( $user->name ) ? $user->name : "inconnu" );

    endif;
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }


  public function setEmail( $email ) {

    if ( !filter_var($email, FILTER_VALIDATE_EMAIL)):
      throw new Exception( 'Email incorrect' );
    endif;

    $this->email = $email;

  }
  public function setName( $name ) {

    $this->name = $name;

  }
  public function setKey($key)
  {
      $this->key = $key;
  }

  public function setPassword( $password, $password_confirm = false ) {

    if( $password_confirm && $password != $password_confirm ):
      $this->msg ='Vos mots de passes sont différents' ;
    endif;

    $this->password = $password;
  }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }
 
  public function getMsg() {
    return $this->msg;
  }
  public function getName() {

    return $this->name;
  }
  public function getKey()
  {
      return $this->key;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getPassword() {
    return $this->password;
  }

  /***********************************
  * -------- CREATE NEW USER ---------
  ************************************/

  public function createUser() {
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

    $req  = $db->prepare( "INSERT INTO user ( email,  password, activation_key, active ) VALUES (:email, :password, :key, :active)" );
    $req->execute(array(
      'email'     => $this->getEmail(),
      'password'  => $this->hash($this->getPassword()),
      'key' => $this->getKey(),
      'active' => 0,
      ));
      $req  = $db->prepare( "INSERT INTO profils ( name,email,typ_id,avatar ) VALUES (:name,:email,:typ_id , :avatar)" );
  $req->execute(array(
    'name'     => $this->getName() ,
    'email'     => $this->getEmail() ,
    'typ_id'      => 1,
    'avatar' => $avatar
    ));
      return true;
    endif;

  }
    /***********************************
  *   Gener key 
  ************************************/
  public static function generateKey(){
    $db = init_db();

    $generateKey = md5(microtime(TRUE)*1000);
    return $generateKey;
  }
  
      //function of hachage password
      public static function hash($password) {
        $begin_password = substr($password, 3, strlen($password));
        $end_password   = substr($password, 0,3);
    
        $salt = $begin_password.$password.$end_password;
        return hash('sha256', $salt);
      }

  /**************************************
  * -------- GET USER DATA BY ID --------
  ***************************************/

  public static function getUserById( $id ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM user WHERE id = ?" );
    $req->execute( array( $id ));

    // Close databse connection
    $db   = null;

    return $req->fetch();
  }

  /***************************************
  * ------- GET USER DATA BY EMAIL -------
  ****************************************/

  public function getUserByEmail() {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM user WHERE email = ?" );
    $req->execute( array( $this->getEmail() ));

    // Close databse connection
    $db   = null;

    return $req->fetch();
  }
  /***************************************
    * ------- GET All Type of user -------
    ****************************************/
    public static  function getAllType() {
      $db   = init_db();
    
      $req  = $db->query( "SELECT * FROM type " );
    
      return $req->fetchAll();
    }
    
  public static function saveprofil($id,$name,$typ_id){
    $db   = init_db();
    $req  = $db->prepare( "UPDATE `user` SET `typ_id`=?,`name`=? WHERE `id` = ? " );
    $datas = $req->execute(array($typ_id ,$name, $id));  
    return $datas;
  }


  
}

