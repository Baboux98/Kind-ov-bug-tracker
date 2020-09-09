<?php
    require_once ('model/EmployeeManager.php');
    require_once ('model/InterventionManager.php');
    require_once ('model/TicketManager.php');
    include ('view/fonctions.php');
#############################################################################

     function connexion()
     {
         require('view/connexionView.php');
     }

#############################################################################

     function listTickets()
    {
        //$interventionManager = new InterventionManager();

        //$employeeManager = new EmployeeManager();

        $ticketManager = new TicketManager();
       
        
        if($_SESSION['role'] == 1 )
        {
            $tickets = $ticketManager->getTickets();

            require('view/admin/listTicketsView.php');
        }
        elseif($_SESSION['role'] == 2)
        {
            $tickets = $ticketManager->getMyTickets($_SESSION['employeeNumber']);
            
            require('view/employee/listTicketsView.php');
        }
        elseif($_SESSION['role'] == 3)
        {
            $tickets = $ticketManager->getMyTicketsForTrainee($_SESSION['employeeNumber']);

           require('view/trainee/listTicketsView.php');
           
        }
       
    }
#############################################################################
    function editTicket()
    {

        $employeeManager = new EmployeeManager();

        $trainees = $employeeManager->getTrainees();

        $ticketManager = new TicketManager();

        $ticket = $ticketManager->getTicket($_GET['id']);

        require('view/admin/editTicketView.php');
    }

#############################################################################
    function makeTicket()
    {
        require('view/employee/makeTicketView.php');
    }
    
#############################################################################

    function details()
    {
        $ticketManager = new TicketManager();

        $interventionManager = new InterventionManager();

        if($_SESSION['role'] == 1 )
        {
            $interventions = $interventionManager->getTicketInterventions($_GET['id']);

            $ticket = $ticketManager->getTicket($_GET['id']);

            require('view/admin/detailsTicketView.php');
        }
        elseif($_SESSION['role'] == 2)
        {
            $ticket = $ticketManager->getTicket($_GET['id']);
            
            require('view/employee/detailsTicketView.php');
        }
        elseif($_SESSION['role'] == 3)
        {
            $ticket = $ticketManager->getTicket($_GET['id']);

           require('view/trainee/detailsTicketView.php');
           
        }
    }
#############################################################################
