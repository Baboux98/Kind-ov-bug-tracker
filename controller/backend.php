<?php

    require_once ('model/EmployeeManager.php');
    require_once ('model/InterventionManager.php');
    require_once ('model/EmployeeManager.php');
   // include ('view/fonctions.php');
#############################################################################

    
    function dealingWithTheCookieShit()
    {
        $employeeManager = new EmployeeManager();


        $theRightEmployee = $employeeManager->getEmployee($_COOKIE['employeeNumber']);

        $_SESSION['employeeNumber']= $theRightEmployee['employee_number'];
    
        $_SESSION['role']=$theRightEmployee['id_groupe'];

        header('Location: index.php');

    }
#############################################################################

    function checkconnexion()
    {
        $employeeManager = new EmployeeManager();
        
        $theRightEmployee = $employeeManager->checkEmployee($_POST['login'], $_POST['password']);
        
        if(!$theRightEmployee)
            {
                header('Location: index.php?error=Mauvais identifiant ou mot de passe');
            }
            else
            {
                if ($_POST['rememberMe'])
                {
                    setcookie('employeeNumber',$theRightEmployee['employee_number'],time()+24*5,null,null,false,true);
                }

                $_SESSION['employeeNumber']= $theRightEmployee['employee_number'];
    
                $_SESSION['role']=$theRightEmployee['id_groupe'];
                
                header('Location: index.php?action=listTickets');
            }
    }
#############################################################################

    function openTicket()
    {
        $ticketManager = new TicketManager();

        
        if(isset($_FILES['theFile']) AND $_FILES['theFile']['error'] == 0)
        {
            
            $target="public/Uploads/" . basename($_FILES['theFile']['name']);

            move_uploaded_file($_FILES['theFile']['tmp_name'], $target);

            $affectedLines = $ticketManager->addTicketWithFile($_SESSION['employeeNumber'],$_POST['type'],$_POST['title'],$_POST['description'],$_POST['priority'], $target);
        }
        else
        {
            
            $affectedLines = $ticketManager->addTicket($_SESSION['employeeNumber'],$_POST['type'],$_POST['title'],$_POST['description'],$_POST['priority']);
        }

       header('Location: index.php?action=listTickets&success=Ticket Ouvert');
    }
#############################################################################

#############################################################################

    function deconnexion()
    {
        unset($_SESSION['employeeNumber']);

        setcookie('employeeNumber','');
        header('Location: index.php');
    }
#############################################################################

    function doEditing()
    {
        $ticketManager = new TicketManager();

        $interventionManager = new InterventionManager();

       
        if($_POST['assignement']!="null")
        {
            $affectedLinesOneOne = $ticketManager->makeEditWithAssignement($_POST['type'], $_POST['priority'],$_POST['assignement'], $_SESSION['employeeNumber'],$_GET['id']);
            
            $affectedLinesTwo = $interventionManager->addIntervention($_POST['assignement'],$_GET['id']);

            // envoi de mail pour les interventions

            $email = getEmail($_POST['assignement']);
    
            $headers = "From: gesIntervention@BOA.com";

            $success = mail($email,"Nouvelle attribution d'interventions","Une nouvelle intervention vous à été attribuer veuillez la consulter",$headers);

            if (!$success) 
            {
                $errorMessage = error_get_last()['message'];
                
                throw new Exception('error viens du mail affectation d\'un stagiaire');
            }

        }
        else
        {
            
           $affectedLinesOne = $ticketManager->makeEdit($_POST['type'], $_POST['priority'], $_GET['id']);

        }

        
        header('Location: index.php?action=listTickets&success=Ticket affecté et/ou edité');
    }
#############################################################################
function commenting()
{
    $ticketManager = new TicketManager();
 

    $affectedLines = $ticketManager->addComment($_POST['comment'],$_GET['id']);


    header('Location: index.php?action=details&id='.$_GET['id']);
}
#############################################################################

function closeTicket()
{
    $ticketManager = new TicketManager();
 
   
    $affectedLines = $ticketManager->changeTicketStatut($_GET['id']);

    // envoi un mail pour la fermeture du ticket
    $ticket = $ticketManager->getTicket($_GET['id']);

    $email = getEmail($ticket['employee_number']);
    
    $headers = "From: gesIntervention@BOA.com";
    
    $success = mail($email,"Fermeture de ticket","La Panne que vous avez déclarer à été résolu",$headers);

    if (!$success) 
    {
        $errorMessage = error_get_last()['message'];

       throw new Exception('error viens du mail fermeture de ticket');
    }
    //*******************************************************/
    header('Location: index.php?action=details&id='.$_GET['id']);
}

#############################################################################

function reporting()
{
    $interventionManager = new InterventionManager();
    
    $ticketManager = new TicketManager();

    if(isset($_FILES['theFile']) AND $_FILES['theFile']['error'] == 0)
    {
        
        $target="public/Uploads/" . basename($_FILES['theFile']['name']);

        move_uploaded_file($_FILES['theFile']['tmp_name'], $target);

        $affectedLines = $interventionManager->addReportWithFile($_POST['statut'], $_POST['report'], $target, $_GET['id']);
    }
    else
    {
        
        $affectedLines = $interventionManager->addReport($_POST['statut'], $_POST['report'], $_GET['id']);
    }
    //envoi de mail pour le rapport
    $ticket = $ticketManager->getTicket($_GET['id']);

    $email = getEmail($ticket['admin_number']);
    
    $headers = "From: gesIntervention@BOA.com";
    
    $success = mail($email,"Nouveau rapport","Un rapport d'intervention à été envoyé",$headers);

    if (!$success) 
    {
        $errorMessage = error_get_last()['message'];

       throw new Exception('error viens du mail pour la confirmation du rapport');
    }
    //*******************************************************/
    header('Location: index.php?action=listTickets&success=rapport envoyé');
}