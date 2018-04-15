<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Film;
use App\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FilmFormularController extends Controller
{
    public function entry(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        
        if($request->query->get('filmid') !== null) {
            $repository = $this->getDoctrine()->getRepository(Film::class);
            $film = $repository->find($request->query->get('filmid'));
            if(boolval($request->query->get('loeschen'))) {
                $entityManager->remove($film);
                $entityManager->flush();
                return $this->redirectToRoute('app_verwaltung');
            }
        } else {
            $film = new Film();
        }
        
        //make choices Array
        $repository = $this->getDoctrine()->getRepository(Genre::class);
        $genres = $repository->findAll();
        foreach($genres as $g) $choices[$g->getGenre()] = $g->getId();
        
        $form = $this->createFormBuilder($film)
            ->add('titel', TextType::class)
            ->add('jahr', TextType::class)
            ->add('genre', ChoiceType::class, array(
                'choices'  => $choices
                ))
            ->add('Imdbid', TextType::class)
            ->add('PosterUrl', TextType::class)

            //->add('save', SubmitType::class, array('label' => 'Speichern'))
            ->getForm();
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $film = $form->getData();
            $film->setUserid($this->getUser()->getId());
            
            $entityManager->persist($film);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
            return $this->redirectToRoute('app_verwaltung');
        }

        return $this->render('formular.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}