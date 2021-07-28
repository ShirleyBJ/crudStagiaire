<?php 
namespace App\Service;
class FullnameService
{
    function getFullName(string $prenom, string $nom)
    {
        return $prenom . ' ' . $nom;
    }
}

?>