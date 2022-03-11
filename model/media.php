<?php

require_once( 'database.php' );

class Media {

  protected $id;
  protected $genre_id;
  protected $title;
  protected $type;
  protected $status;
  protected $release_date;
  protected $summary;
  protected $trailer_url;

  public function __construct( $media = null ) {

    $this->setId( isset( $media->id ) ? $media->id : null );
    $this->setGenreId( $media->genre_id );
    $this->setTitle( $media->title );
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setGenreId( $genre_id ) {
    $this->genre_id = $genre_id;
  }

  public function setTitle( $title ) {
    $this->title = $title;
  }

  public function setType( $type ) {
    $this->type = $type;
  }

  public function setStatus( $status ) {
    $this->status = $status;
  }

  public function setReleaseDate( $release_date ) {
    $this->release_date = $release_date;
  }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getGenreId() {
    return $this->genre_id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getType() {
    return $this->type;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getReleaseDate() {
    return $this->release_date;
  }

  public function getSummary() {
    return $this->summary;
  }

  public function getTrailerUrl() {
    return $this->trailer_url;
  }

  /***************************
  * -------- GET LIST --------
  ***************************/

  public static function filterMedias( $title ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM media WHERE title LIKE ? ORDER BY release_date DESC" );
    $req->execute( array( '%' . $title . '%' ));

    // Close databse connection
    $db   = null;

    return $req->fetchAll();

  }
  public static function getAllMedia(){
    $db = init_db();
    $req  = $db->query( "SELECT * FROM media " );

    return $req->fetchAll();
}

// update react like or ulike for user

  public static function setReact($type,$id_user,$id_media){
  
    $db = init_db();
    // Check if media and user already exist
    $req  = $db->prepare( "SELECT * FROM reaction WHERE id_user = ? AND  id_media = ? " );
        $req->execute(array($id_user,$id_media));
        $req->closeCursor();
    if( $req->rowCount() > 0 ) :
      $req  = $db->prepare(" UPDATE reaction SET react = ? WHERE id_user = ? AND  id_media = ?" );
      $req->execute(array($type,$id_user,$id_media));  
      $req->closeCursor();
      else : 
        $req  = $db->prepare( "INSERT INTO  reaction  ( id_media ,  id_user ,  react ) VALUES ( :id_media ,  :id_user ,  :react) " );
        $req->execute(array(
          'id_media'     => $id_media,
          'id_user'  => $id_user,
          'react' => $type,

          ));
          return true;
    endif;
  }

}
