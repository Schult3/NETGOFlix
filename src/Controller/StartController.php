<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Film;
use App\Entity\Genre;
use App\Entity\Favorit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;


class StartController extends Controller
{
    public function entry()
    {
        $repositoryFilm = $this->getDoctrine()->getRepository(Film::class);
        $filmeObj = $repositoryFilm->findAll();
        
        //Genre zuordnen und ablegen
        $filme = array();
        $repositoryGenre = $this->getDoctrine()->getRepository(Genre::class);
        $repositoryFavorit = $this->getDoctrine()->getRepository(Favorit::class);
        foreach($filmeObj as $f) {
            $favorit = $repositoryFavorit->findBy(
                ['filmid' => $f->getId(), 'userid' => $this->getUser()->getId()]
            );

            if(count($favorit) > 0) {
                $filme[0]["GENRE_TITEL"] = "Favoriten";
                $filme[0]["FILME"][] = array("TITEL" => $f->getTitel(), "JAHR" => $f->getJahr(), "ID" => $f->getId(), "FLG_FAVORIT" => true, "POSTERURL" => $f->getPosterurl());
            }
            
            $filme[$f->getGenre()]["GENRE_TITEL"] = $repositoryGenre->find($f->getGenre())->getGenre();
            $filme[$f->getGenre()]["FILME"][] = array("TITEL" => $f->getTitel(), "JAHR" => $f->getJahr(), "ID" => $f->getId(), "FLG_FAVORIT" => count($favorit) > 0, "POSTERURL" => $f->getPosterurl());
                
        }
        
        ksort($filme);
       


        return $this->render('start.html.twig', array(
            'filme' => $filme,
        ));
    }
}