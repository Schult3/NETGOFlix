<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class VerwaltungController extends Controller
{
    public function entry()
    {

       return $this->render('verwaltung.html.twig', array());
    }
}