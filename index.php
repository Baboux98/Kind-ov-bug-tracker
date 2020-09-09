<?php
    session_start();
    //$_COOKIE;
   // print_r($_SESSION);
    include ('controller/frontend.php');
    include ('controller/backend.php');

    try
    {
        if($_GET['action'] == 'checkconnexion')    
        {
            checkconnexion();
        }

        if(!empty($_COOKIE['employeeNumber']))    
        {
            dealingWithTheCookieShit();
        }
        
        if(isset($_SESSION['employeeNumber']))
        {
            if($_GET['action'] == 'listTickets')    
            {
                listTickets();
            }
            elseif($_GET['action'] == 'makeTicket')
            {
                makeTicket();
            }
            elseif($_GET['action'] == 'openTicket')
            {
                openTicket();
            }
            elseif($_GET['action'] == 'editTicket')
            {
                editTicket();
            }
            elseif($_GET['action'] == 'doEditing')
            {
                doEditing();
            }
            elseif($_GET['action'] == 'details')
            {
                details();
            }
            elseif($_GET['action'] == 'commenting')
            {
                commenting();
            }
            elseif($_GET['action'] == 'closeTicket')
            {
                closeTicket();
            }
            elseif($_GET['action'] == 'reporting')
            {
                reporting();
            }
            elseif($_GET['action'] == 'deconnexion')
            {
                deconnexion();
            }
            else
            {
                listTickets();
            }
        }
        else
        {
            connexion();
        }
    }
    catch(Exception $e)
    {
        
        die('Erreur and fuck fatal error : '.$e->getMessage());
        require ('view/errorView.php');
        
    }
