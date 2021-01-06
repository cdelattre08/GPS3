<?php 
include("database.php");
// On include le fichier contenant la connexion à la Base de données

    class user 
    {
        private $_db;
        private $_nom;
        private $_prenom;
        private $_login;
        private $_password;
        private $_administrateur;  

        public function __construct($db)
        {      
            $this->_db = $db;
        }

        public function newUser($login, $password, $nom, $prenom) // Ajoute un utilisateur dans la Base de données
        {   
            $registre = $this->_db->prepare("INSERT INTO `user`(`id`, `password`, `prenom`, `nom`, `login`, `Administrateur`) VALUES (null,:pass,:prenom,:nom,:user,0)"); // Requête qui insert en base les informations de l'utilisateur
            $registre->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'user' => $login,
                'pass' => $password
            ]);
        }

        public function Connexion($login, $password) // Permet à l'utilisateur de se connecter au site
        {   
            $con = $this->_db->prepare("SELECT * FROM user WHERE user = :lolo AND  password = :pass"); // Requête qui vérifie les informations de l'utilisateur lors de sa connexion
            $con->execute([
                'lolo' => $login,
                'pass' => $password
            ]);
            $con = $con->fetch();
                // on envoi les informations de la requête dans les variables de la classe pour le traitement
            $this->_id = $con['id_user'];
            $this->_nom = $con['nom'];
            $this->_prenom = $con['prenom'];
            $this->_login = $con['user'];
            $this->_password = $con['password'];
            $this->_administrateur = $con['Administrateur'];
        }
        
        public function compare($login, $password) // Retourne true si le Login et le Mot de passe sont correct sinon retourne false
        {   

            if ($login == $this->_login) 
            {
                
                if ($password == $this->_password) 
                {
                    
                    return true;
                }
                
            }
        return false;
        }

        public function verifUser(){ //Fonction vérifiant si les champs sont remplis correctement
            if (!empty($this->_login)) {
                if(!empty($this->_password)){
                    $requeteUser = $this->_db->prepare("SELECT * FROM user WHERE login = ? AND password = ?");
                    $requeteUser->execute(array($this->_login, $this->_password));
                    $userExist = $requeteUser->rowCount();
                    if($userExist == 1){ //Test vérifiant si l'utilisateur correspondant aux coordonnées rentrées par l'utilisateur existe
                        $donneesUser = $requeteUser->fetch();
                        session_start();
                        $_SESSION['logged'] = true;
                        $_SESSION['id'] = $donneesUser['id_user'];
                        $_SESSION['login'] = $donneesUser['login'];
                        header('Location: index.php');

                        return "succes";
                    }
                    else{
                        return "userNoExist";
                    }
                }
                else{
                    return "mdpVide";
                }
            }
            else{
                return "invalidName";
            }
        }
        
        public function Suppression_user($id) // Cette fonction permet à l'administrateur de supprimer les utilisateurs inscrits en base
        {  
            $delete = $this->_db->prepare("DELETE FROM `user` WHERE `id_user` = :id"); // Requête qui supprime un utilisateur dans la BDD
            $delete->execute([
                'id' => $id
            ]);
        }

        public function Modif_user($id,$login, $password) // Cette fonction permet à l'utilisateur de modifier son profil
        {    
            $update = $this->_db->prepare("UPDATE `user` SET `user`=:lolo,`password`= :pass WHERE `id_user` = :id"); // Requête qui modiifie un utilisateur
            $update->execute([
                'lolo' => $login,
                'pass' => $password,
                'id' => $id
            ]); 
        }

        public function getId()
        {   
            return $this->_id;
        }
        public function getNom()
        {   
            return $this->_nom;
        }

        public function getPrenom()
        {   
            return $this->_prenom;
        }
        public function getLogin()
        {   
            return $this->_login;
        }

        public function getPassword()
        {   
            return $this->_password;
        }

        public function getAdmin()
        {
            return $this->_administrateur;
        }

        public function erreur($erreur){ //Fonction affichant l'erreur dans le formulaire si erreur il y a
            if($erreur == "invalidName"){
                echo "<p class='red-text'>Le nom est invalide</p>";
            }
            if($erreur == "mdpVide"){
                echo "<p class='red-text'>Merci de remplir le champ mot de passe</p>";
            }
            if($erreur == "userNoExist"){
                echo "<p class='red-text'>E-mail ou mot de passe incorrect</p>";
            }
            if($erreur == "succes"){
                echo "<p class='green-text'>Connecté!</p>";
            }
        }

    }
?>