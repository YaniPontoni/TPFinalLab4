<?php
    namespace DAO;

   
    use DAO\StudentDAO as StudentDAO;
    use DAO\AdminDAO as AdminDAO;

    class userDAO 
    {
        private $studentDAO;
        private $adminDAO;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
            $this->adminDAO = new AdminDAO();
        }
        
         public function getByEmail($email)
        {
            $studentList = $this->studentDAO->getStudentList();
            $adminList = $this->adminDAO->getAdminList();
            //$this->studentDAO->getStudentsFromAPI(); comento esto porque ya lo cargo una vez 

            foreach ($studentList as $student) {
                if ($student->getEmail() == $email) {
                    return $student;
                }
            }

            foreach ($adminList as $admin) {
                if ($admin->getEmail() == $email) {
                    return $admin;
                }
            }

            return NULL;
        }
    }
?>