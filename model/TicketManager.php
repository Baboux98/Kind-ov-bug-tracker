<?php
    require_once ('model/Manager.php');
    
    class TicketManager extends Manager
    {
        public function getTickets()
        {
            $db= $this->dbconnect();
            $req=$db->query('SELECT * 
            FROM tickets');
            return $tickets=$req;
        }

        public function getTicket($idTicket)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('SELECT * FROM tickets WHERE id = ?');
            $req->execute(array($idTicket));
            $ticket = $req->fetch();
            return $ticket;
        }

        public function getMyTickets($myNumber)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('SELECT * FROM tickets 
            WHERE employee_number = ?');
            $req->execute(array($myNumber));
            $tickets = $req;
            return $tickets;
        }

        public function getMyTicketsForTrainee($myNumber)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('SELECT * FROM tickets 
            WHERE trainee_number = ?');
            $req->execute(array($myNumber));
            $tickets = $req;
            return $tickets;
        }

        public function addTicket($employeeNumber, $type, $title, $description, $priority)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('INSERT INTO tickets(employee_number, type_, title, description_, priority, date_ticket)VALUES(?,?,?,?,?,NOW())');      
            return $req->execute(array($employeeNumber, $type, $title, $description, $priority));
        }

        public function makeEdit($type,$priority,$trainee_number, $admin_number,$id)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('UPDATE tickets SET type_ = ?, priority = ?, trainee_number = ?, admin_number = ? WHERE id = ?');      
            return $req->execute(array($type, $priority,$trainee_number,$admin_number, $id));
        }

        public function addComment($comment, $id)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('UPDATE tickets SET comment = ? WHERE id = ?');      
            return $req->execute(array($comment, $id));
        }
        
        public function changeTicketStatut($id)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('UPDATE tickets SET statut = "close" WHERE id = ?');      
            return $req->execute(array($id));
        }

        public function makeAssignement($traineeNumber, $id)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('UPDATE tickets SET trainee_number = ? WHERE id = ?');      
            return $req->execute(array($traineeNumber, $id));
        }

        public function addFile($target,$id)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('UPDATE tickets SET file_ = ? WHERE id = ?');      
            return $req->execute(array($target, $id));
        }
    }