<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class StartController extends Controller
{
    public function entry()
    {
        $number = mt_rand(0, 100);

       return $this->render('start.html.twig', array(
            'number' => $number,
        ));
    }
}