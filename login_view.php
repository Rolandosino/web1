 <?php
 //session_start();

 require('config/database.php') ;
 require('includes/functions.php');

    if(isset($_POST['login'])){

    	if(not_empty(['password','pseudo'])){
        
          extract($_POST); 

          $pseudo = $_POST['pseudo'];
          $password = $_POST['password'];
        
          $requete = $db->prepare("SELECT * FROM users WHERE pseudo =:pseudo and matricule =:password");
          $requete->bindParam('pseudo' , $pseudo);
          $requete->bindParam('password' , $password);
          //var_dump($requete->execute());
          $resultat = $requete->fetch();
         // var_dump($resultat);

          if (!empty($resultat))
          {
            $_SESSION['pseudo']=$pseudo;
            $_SESSION['password']=$password;
            $_SESSION['birthday']=$resultat['birthday'];
          }
          else {
            $login_error = "Mauvais pseudo ou numéro matricule";
          }
      }
      else{
      	    save_input_data();
			$login_error = "Veuillez remplir tous les champs! ";
      }
        header('Location:index.php');

   }
?>
