<?php 
    namespace Models;

    class Company
    {
        private $name;
        private $cuit;
        private $location;
        private $phoneNumber;
        private $companyId;
    
        public function __construct($name = NULL, $cuit = NULL, $location = NULL, $phoneNumber = NULL, $companyId = NULL)
        {
            $this->name = $name;
            $this->cuit = $cuit;
            $this->location = $location;
            $this->phoneNumber = $phoneNumber;
            $this->companyId = $companyId;
        }

        public function getName(){ return $this->name; }
        public function setName($name): self { $this->name = $name; return $this; }

        public function getCuit(){ return $this->cuit; }
        public function setCuit($cuit): self { $this->cuit = $cuit; return $this; }

        public function getLocation(){ return $this->location; }
        public function setLocation($location): self { $this->location = $location; return $this; }

        public function getPhoneNumber(){ return $this->phoneNumber; }
        public function setPhoneNumber($phoneNumber): self { $this->phoneNumber = $phoneNumber; return $this; }


        public function getCompanyId(){ return $this->companyId; }
        public function setCompanyId($companyId): self { $this->companyId = $companyId; return $this; }
    }
?>