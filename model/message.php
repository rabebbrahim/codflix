<?php

class Message
{
    protected $id;
    protected $user_id;
    protected $created_at;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */

    /**
     * Envoi à un user , un mail d'activation de compte
     * 
     * @param mixed
     * 
     */
    public static function sendActivationMail($email, $key){
        $destinataire = $email;
        $sujet = "Activer votre compte" ;
        $entete = "From: contact@CodFlix.com" ;
        $message = 'Bienvenue sur CodFlix
                    Nous vous remercions de votre confiance.
                    Veuillez confirmer votre adresse courriel en cliquant sur le lien suivant.
                    
                    http://localhost:8888/index.php?action=activate&email='.urlencode($email).'&key='.urlencode($key).'
                    
                    ---------------
                    Ceci est un mail automatique, Merci de ne pas y répondre.';
     
        //envoi du mail d'activation
        // mail($destinataire, $sujet, $message, $entete) ;
      }


      /**
     * permet a un user d'envoyer un mail de contact
     * 
     * @param mixed
     * 
     */
      public static function contactMail($email, $objet, $message){
        $destinataire = 'contact@CodFlix.fr';
        $objet = $objet ;
        $entete = "From: ".$email ;
        $message = $message;

        // mail($destinataire, $objet, $message, $entete);
      }


}
