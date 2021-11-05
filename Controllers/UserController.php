<?php
    namespace Controllers;

    use \Exception as Exception;
    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function showRegisterView()
        {
            require_once(VIEWS_PATH . "register.php");
        }

        public function add($email, $password){
            //$alert = new Alert();
            try{
                $user = new User;
                $user->setEmail($email);
                $user->setPassword($password);
                $user->setRole('user');
                $this->userDAO->add($user);
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function login($email, $password)
        {
            $user = $this->userDAO->GetByEmail($email, $password);

            if (($user != null)) {
                session_start();

                $_SESSION["userLogged"] = $user;

                require_once(VIEWS_PATH . "home.php");
            }
            else
            {
                    echo "<script> if(confirm('El Usuario no se encuentra registrado, registrese para iniciar sesion.'));";
                    echo "window.location = '../Home';
                   </script>";
            }
        }
    }
?>