<?php
    namespace Models;

    class Student
    {
        private $studentId;
        private $careerId;
        private $firstName;
        private $lastName;
        private $dni;
        private $fileNumber;
        private $gender;
        private $birthDate;
        private $email;
        private $phoneNumber;
        private $active;
        
        function __construct($studentId = NULL, $careerId = NULL, $firstName = NULL, $lastName = NULL, $dni = NULL, $fileNumber = NULL, $gender = NULL, $birthDate = NULL, $email = NULL, $phoneNumber = NULL, $active = NULL)
        {
            $this->studentId = $studentId;
            $this->careerId = $careerId;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->dni = $dni;
            $this->fileNumber = $fileNumber;
            $this->gender = $gender;
            $this->birthDate = $birthDate;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            $this->active = $active;
        }

        public function getStudentId(){ return $this->studentId; }
        public function setStudentId($studentId): self { $this->studentId = $studentId; return $this; }

        public function getCareerId(){ return $this->careerId; }
        public function setCareerId($careerId): self { $this->careerId = $careerId; return $this; }

        public function getFirstName(){ return $this->firstName; }
        public function setFirstName($firstName): self { $this->firstName = $firstName; return $this; }

        public function getLastName(){ return $this->lastName; }
        public function setLastName($lastName): self { $this->lastName = $lastName; return $this; }

        public function getDni(){ return $this->dni; }
        public function setDni($dni): self { $this->dni = $dni; return $this; }

        public function getFileNumber(){ return $this->fileNumber; }
        public function setFileNumber($fileNumber): self { $this->fileNumber = $fileNumber; return $this; }

        public function getGender(){ return $this->gender; }
        public function setGender($gender): self { $this->gender = $gender; return $this; }

        public function getBirthDate(){ return $this->birthDate; }
        public function setBirthDate($birthDate): self { $this->birthDate = $birthDate; return $this; }

        public function getEmail(){ return $this->email; }
        public function setEmail($email): self { $this->email = $email; return $this; }

        public function getPhoneNumber(){ return $this->phoneNumber; }
        public function setPhoneNumber($phoneNumber): self { $this->phoneNumber = $phoneNumber; return $this; }

        public function getActive(){ return $this->active; }
        public function setActive($active): self { $this->active = $active; return $this; }
    }
?>