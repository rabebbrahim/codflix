<?php
require_once( 'model/message.php' );

function contactPage(){
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id']  : '';
    
    if(isset($user_id)){
        $datas = User::getUserById($user_id);
        $mail = $datas['email'];
    }
    require('view/contactView.php');
}

function sendMessage($post){

        if(!empty($post['expediteur']) && !empty($post['object']) && !empty($post['message'])){

            $expediteur =  $post['expediteur'];
            $objet =  $post['object'];
            $message =  $post['message'];
            $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : 0;

            //envoi d'un message 
            if(Message::contactMail($expediteur, $objet, $message)){
                
                $msg = 'Votre message est envoyé';
            }else{
                $msg = 'Votre message nous est bien parvenu';
            }
        }else{
            $msg = 'Veuillez remplir tous les champs';
        }
        require('view/contactView.php');
}