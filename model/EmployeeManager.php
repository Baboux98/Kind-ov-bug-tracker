<?php
    require_once ('model/Manager.php');
    
    class EmployeeManager extends Manager
    {
        public function getEmployee($employee_number)
        {
            $db= $this->dbconnect();
            $req = $db->prepare('SELECT * FROM employees WHERE employee_number = ?');
            $req->execute(array($employee_number));
            $employee = $req->fetch();
            return $employee;
        }


        public function checkEmployee($login, $password)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('SELECT employee_number,id_groupe FROM employees WHERE login_= ? AND pass = ?');
            $req->execute(array($login, $password));
            $result = $req->fetch();
            return $result;
        }

        public function getTrainees()
        {
            $db= $this->dbconnect();
            $req=$db->query('SELECT * FROM employees WHERE id_groupe = 3');
            return $trainees=$req;
        }
        
    }