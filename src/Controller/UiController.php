<?php
// src/AppBundle/Controller/UiController.php
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UiController extends Controller
{
    
    /**
    * @Route("/user", name="UserInterface")
    **/
    public function showIndex()
    {
        
         return $this->render('UI/index.html.twig');
    
    }   
}
