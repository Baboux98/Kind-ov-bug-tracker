<?php

   // require_once ('model/EmployeeManager.php');
#############################################################################

function getfirstnameAndLastname($employee_number)
{
    $employeeManager = new EmployeeManager();

    if($employee_number)
    {
        $employee = $employeeManager->getEmployee($employee_number);

        return $employee['lastname'].' '.$employee['firstname'];

    }
    else
    {
        return "Aucune";
    }
}

function getEmail($employee_number)
{
    $employeeManager = new EmployeeManager();

    if($employee_number)
    {
        $employee = $employeeManager->getEmployee($employee_number);

        return $employee['email'];
    }
}

function showComment($comment)
{
    $thingToShow = ($comment) ? $comment : "Aucun commentaire";

    return $thingToShow;
}

function exception($valueToCheck, $messageOfError)
{
    if(!$valueToCheck)
    {
        throw new Exception($messageOfError);
    }
}