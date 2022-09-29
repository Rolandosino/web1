<?php
require('config/database.php');
require('includes/functions.php');

    //Si le formulaire est soumis
    if(isset($_POST['register'])){

        //Si tous les champs sont remplis
        if(not_empty(['birthday', 'password', 'password_confirm','pseudo'])){

            extract($_POST); 

            $q = $db->prepare("SELECT * FROM users WHERE birthday =:birthday AND matricule =:password");
                $q->bindParam('birthday' , $birthday);
                $q->bindParam('password' , $password);
                $q->execute();
                //$userinfo = $q->fetch();
                $userIsFound = $q->rowCount();
                
           /* if(userIsFound == 0) {
                $register_errors = "<br/>Vous n'êtes pas élève au Lycée de Tokoin II"; 
            }      
*/
            if ($password  != $password_confirm) {   
                //save_input_data();    
                $register_errors = "<br>Veuillez saisir le même numéro matricule SVP!";
            }

            if (mb_strlen($pseudo) < 3) {
                //save_input_data();
                $register_errors = "<br>Pseudo trop court!(minimum 3 caractères)";
            }

            if(is_already_in_use('pseudo' , $pseudo , 'users')){
                //save_input_data();
                $register_errors = "<br>Pseudo déjà utilisé!";
            }

        }else {

            //save_input_data();
            $register_errors = "<br>Veuillez SVP remplir tous les champs!";
        }
        
        // Apres traitement
        if(!isset($register_errors)){
            
            $requete = $db->prepare("UPDATE users SET pseudo =:pseudo WHERE matricule =:password");
            $requete->bindParam('pseudo' , $pseudo);
            $requete->bindParam('password' , $password);

            if ($requete->execute())
            {
               echo 'Inscription réussie! <a href="index.php">Connectez-vous</a> ';
            }
            else
            {
               $register_errors[] = "Erreur lors de l'insertion";
            }

            header('location:index.php');
        }
        else {
            header('location:index.php?register_errors='.$register_errors);

        }

    }else{
        clear_input_data();
    }

?>





