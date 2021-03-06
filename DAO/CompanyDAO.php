<?php

    namespace DAO;

    use \Exception as Exception;
    use DAO\ICompanyDAO as ICompanyDAO;
    use Models\Company as Company;
    use DAO\Connection as Connection;

    class CompanyDAO implements ICompanyDAO
    {

        private $connection;
        private $tableName = "companies";

        public function add(Company $company)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (userId, zipCode, name, role, cuit, location, phoneNumber) VALUES (:userId, :zipCode, :name, :role, :cuit, :location, :phoneNumber);";
                
                $parameters["userId"] = $this->getNextId();
                $parameters["zipCode"] = $company->getZipCode();
                $parameters["name"] = $company->getName();
                $parameters["role"] = 'company';
                $parameters["cuit"] = $company->getCuit();
                $parameters["location"] = $company->getLocation();
                $parameters["phoneNumber"] = $company->getPhoneNumber();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        private function getNextId()
        {
            $id = 0;
            $userDAO = new UserDAO();
            $userList = $userDAO->getAll();

            foreach($userList as $user)
            {
                $id = ($user->getUserId() > $id) ? $user->getUserId() : $id;
            }

            return $id;
        }

        public function getAll()
        {
            try
            {
                $companyList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $company = new Company();
                    $company->setCompanyId($row["companyId"]);
                    $company->setUserId($row["userId"]);
                    $company->setZipCode($row["zipCode"]);
                    $company->setName($row["name"]);
                    $company->setRole($row["role"]);
                    $company->setCuit($row["cuit"]);
                    $company->setLocation($row["location"]);
                    $company->setPhoneNumber($row["phoneNumber"]);

                    array_push($companyList, $company);
                }

                return $companyList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function remove($companyId)
        {
            try
            {
                $remove = "DELETE FROM $this->tableName WHERE companyId = '$companyId'"; 
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($remove);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function search($companyId)
        {
            try
            {

                $search = "SELECT * FROM $this->tableName WHERE companyId = '$companyId'";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($search);
                
                foreach ($resultSet as $row)
                {                
                    $company = new Company();
                    $company->setZipCode($row["zipCode"]);
                    $company->setName($row["name"]);
                    $company->setCuit($row["cuit"]);
                    $company->setLocation($row["location"]);
                    $company->setPhoneNumber($row["phoneNumber"]);
                    $company->setcompanyId($row["companyId"]);
                }

                return $company;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function update($name, $cuit, $location, $phoneNumber, $zipCode, $companyId)
        {
            try
            {
                $query = "UPDATE $this->tableName SET name = '$name', cuit = '$cuit', location = '$location', phoneNumber = '$phoneNumber', zipCode = '$zipCode' WHERE companyId = '$companyId'";
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>