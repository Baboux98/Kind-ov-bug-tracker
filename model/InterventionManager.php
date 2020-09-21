<?php
    require_once ('model/Manager.php');
    
    class InterventionManager extends Manager
    {
        public function addIntervention($traineeNumber, $id)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('INSERT INTO interventions(trainee_number, id_ticket, date_intervention)VALUES(?,?,NOW())');      
            return $req->execute(array($traineeNumber, $id));
        }

        public function getTicketInterventions($idTicket)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('SELECT * FROM interventions 
            WHERE id_ticket = ?');
            $req->execute(array($idTicket));
            $tickets = $req;
            return $tickets;
        }

        public function addReport($statut,$report, $id)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('UPDATE interventions SET statut = ?, report = ? WHERE id_ticket= ? AND statut = "attribuée" ');      
            return $req->execute(array($statut,$report,$id));
        }

        public function addReportWithFile($statut,$report,$target,$id)
        {
            $db= $this->dbconnect();
            $req=$db->prepare('UPDATE interventions SET statut = ?, report = ?, file_ = ? WHERE id_ticket= ? AND statut = "attribuée" ');      
            return $req->execute(array($statut,$report,$target,$id));
        }
    }