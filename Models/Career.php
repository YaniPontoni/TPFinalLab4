<?php 
    namespace Models;

    class Career
    {   
        private $careerId;
        private $description;
        private $active;

        function __construct($careerId = NULL, $description = NULL, $active = NULL)
        {
            $this->careerId = $careerId;
            $this->description = $description;
            $this->active = $active;
        }

        public function getCareerId(){ return $this->careerId; }
        public function setCareerId($careerId): self { $this->careerId = $careerId; return $this; }

        public function getDescription(){ return $this->description; }
        public function setDescription($description): self { $this->description = $description; return $this; }

        public function getActive(){ return $this->active; }
        public function setActive($active): self { $this->active = $active; return $this; }
    }
?>