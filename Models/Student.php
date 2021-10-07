<?php
    namespace Models;

    use Models\User as User;

    class Student extends User
    {
        private $studentId;
        private $careerId;
        
        function __construct($firstName, $lastName, $dni, $gender, $birthDate, $email, $phoneNumber, $active, $studentId, $careerId)
        {
            parent::__construct($firstName, $lastName, $dni, $gender, $birthDate, $email, $phoneNumber, $active);
            $this->studentId = $studentId;
            $this->careerId = $careerId;
        }

        public function getStudentId(){ return $this->studentId; }
        public function setStudentId($studentId): self { $this->studentId = $studentId; return $this; }

        public function getCareerId(){ return $this->careerId; }
        public function setCareerId($careerId): self { $this->careerId = $careerId; return $this; }
    }
?>

