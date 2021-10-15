<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $studentList = $this->studentDAO->GetAll();

            require_once(VIEWS_PATH."student-list.php");
        }

        public function Add($studentId, $firstName, $lastName, $dni, $gender, $birthDate, $email, $phoneNumber, $active)
        {
            $student = new Student();
            $student->setStudentId($studentId);
            $student->setfirstName($firstName);
            $student->setLastName($lastName);
            $student->setDni($dni);
            $student->setGender($gender);
            $student->setBirthDate($birthDate);
            $student->setEmail($email);
            $student->setPhoneNumber($phoneNumber);
            $student->setActive($active);

            $this->studentDAO->Add($student);

            $this->ShowAddView();
        }

        public function Login($email)
        {
            $user = $this->UserDAO->GetByEmail($email);

            if (($user != null)) {

                $userLogged = $user;

                $_SESSION["userLogged"] = $userLogged;

                $this->ShowListView();
            }
        }
    }
