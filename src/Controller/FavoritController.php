<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\Entity\Favorit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class FavoritController extends Controller
{
    public function entry(Request $request)
    {   
        $entityManager = $this->getDoctrine()->getManager();
        if($request->request->get('flgfavorit') == "true"){
            $favorit = new Favorit();
            $favorit->setFilmid($request->request->get('filmid'));
            $favorit->setUserid($this->getUser()->getId());
            $entityManager->persist($favorit);
        } else {
            $repository = $this->getDoctrine()->getRepository(Favorit::class);
            $favorit = $repository->findBy(
                ['filmid' => $request->request->get('filmid'), 'userid' => $this->getUser()->getId()]
            );
            
            foreach($favorit as $f) $entityManager->remove($f); 
        }
        $entityManager->flush();
        return new Response(
            'success'
        );
        
    }
}