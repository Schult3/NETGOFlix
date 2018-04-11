<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Film;
use App\Entity\Genre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;


class VerwaltungController extends Controller
{
    public function entry()
    {
        $repository = $this->getDoctrine()->getRepository(Film::class);
        $filme = $repository->findAll();
        
        //Genre zuordnen
        $repository = $this->getDoctrine()->getRepository(Genre::class);
        foreach($filme as $f) {
            $f->setGenre($repository->find($f->getGenre())->getGenre());
        }

        return $this->render('verwaltung.html.twig', array(
            'filme' => $filme
        ));
    }
}