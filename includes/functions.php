<?php 
	include_once('config/database.php');
	
	
 	if(!defined('not_empty')){
 		function not_empty($fields){
 		    if(count($fields) != 0){
 		          foreach ($fields as $field){
 			          if(empty($_POST[$field]) || trim($_POST[$field]) == ""){
 				         return false;
 			          }
 		          }

 		        return true;
 		    } 
 		}
 	
    }
    

    if (!defined('is_already_in_use') ) {
    	function is_already_in_use($field, $value, $table) {
    		global $db;

    		$q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
    		$q->execute([$value]);
    		$count = $q->rowCount();
    		$q->closeCursor();

    		return $count;
    	}
	}
	
	/**
	 * Verifie si l'utilisateur est connecté ou pas
	 * Return true si oui
	 * 		  false si non
	 */
	if (!defined('isLogged')) {
		function isLogged() {
			if (isset($_SESSION)) {
				// Il s'agit des données qui ont été stockées depuis le login/register
				$requirements = array(
					'pseudo',
					'password',
					'name',
					'surname',
					'sexe',
					'birthday',
				);

				foreach ($requirements as $req) {
					// Si un seul manque il n'y a pas eu de login
					if (!isset($_SESSION[$req]) OR empty($_SESSION[$req])) {
						return false;
					}
				}
				return true;
			}
			// Si la variable $_SESSION n'existe pas
			return false;
		}
	}

	/**
	 * Encapsule la fonction isLogged
	 * si oui ne fait rien
	 * si non redirige a la page de connexion
	 */
	if (!defined('checkLogin')) {
		function checkLogin() {
			if (!isLogged()) {
				// redirection sur la page d'acceuil avec un message
				$login_error = 'Vous devez vous connecter pour accéder à cette page';
				header('Location:index.php?login_error=' . $login_error);
			}
		}
	}

	/**
	 * Verifie s'il y a eu une erreur et l'affiche
	 */
	if (!defined('checkError')) {
		function checkError($source) {
			if(isset($_GET[$source])){
				echo'<div class="text-center alert alert-danger alert-rounded">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
					<p>' . $_GET[$source] . '</p>
				</div>';
			}
		}
	}

	/**
	 * Recupere tous les posts et les retourne dans un tableau
	 * La recuperation utiliser un Fetch Lazy
	 */
	if (!defined('getPosts')) {
		function getPosts() {
			global $db;
			$response = $db->query('SELECT * FROM posts P ORDER BY P.created_at DESC;');
			$posts = $response->fetchAll();
			$response->closeCursor();
			return $posts;
		}
	}

	/**
	 * Recupere tous les commentaires d'un posts
	 */
	if (!defined('getComments')) {
		function getComments($id) {
			global $db;
			$query = $db->prepare('SELECT * FROM comments C WHERE C.post_id = :post_id;');
			$query->bindParam('post_id', $id);
			$query->execute();
			$comments = $query->fetchAll();
			$query->closeCursor();
			return $comments;
		}
	}

	/**
	 * Recupere l'utilisateur d'un post/comment
	 */
	if (!defined('getOwner')) {
		function getOwner($target, $id) {
			global $db;
			$query = $db->prepare('
							SELECT * FROM users U 
							INNER JOIN ' .$target. ' T ON T.user_id = U.id
							WHERE T.id = :target_id;
						');
			$query->bindParam('target_id', $id);
			$query->execute();
			$user = $query->fetch();
			$query->closeCursor();
			return $user;
		}
	}

	/**
	 * Recupere l'id courant depuis les info de session
	 */
	if (!defined('getUserId')) {
		function getUserId() {
			if (isset($_SESSION)) {
				global $db;
				$query = $db->prepare('SELECT U.id FROM users U WHERE U.pseudo = :pseudo AND U.password = :pass;');
				$query->bindParam('pseudo', $_SESSION['pseudo']);
				$query->bindParam('pass', $_SESSION['password']);
				$query->execute();
				$id = $query->fetchColumn();
				$query->closeCursor();
				return $id;
			}
		}
	}

	/**
	 * Recupere l'info d'un autre utilisateur
	 */
	if (!defined('getUserInfo')) {
		function getUserInfo($id) {
			if (isset($_SESSION)) {
				global $db;
				$query = $db->prepare('SELECT * FROM users U WHERE U.id = :id ');
				$query->bindParam('id', $id);
				$query->execute();
				$userInfo = $query->fetch();
				$query->closeCursor();
				return $userInfo;
			}
		}
	}

	/**
	 * Recupere l' id des correspondants de l'utilisateur
	 */
	if (!defined('getUserContacts')) {
		function getUserContacts($id = null) {
			global $db;
			if (null === $id)
				$id = getUserId();

			$query = $db->prepare('
							SELECT DISTINCT U.id FROM users U
							INNER JOIN chats C ON (C.sender_id = :id AND C.receiver_id = U.id) OR (C.sender_id = U.id AND C.receiver_id = :id)
							ORDER BY C.created_at DESC
						');
			$query->bindParam('id', $id);
			$query->execute();
			$contacts = $query->fetchAll();
			$query->closeCursor();
			return $contacts;
		}

		/**
		 * Recupere les chats de l'utilisateur
		 */
		if (!defined('getUserChatsWith')) {
			function getUserChatsWith($contact_id) {
				global $db;
				$id = getUserId();
				$query = $db->prepare('
								SELECT * FROM chats C
								WHERE (C.sender_id = :my_id AND C.receiver_id = :contact_id) OR
									(C.receiver_id = :my_id AND C.sender_id = :contact_id)
								ORDER BY C.created_at ASC
							');
				$query->bindParam('my_id', $id);
				$query->bindParam('contact_id', $contact_id);
				$query->execute();
				$contacts = $query->fetchAll();
				$query->closeCursor();
				return $contacts;
			}
		}
	}
?>
