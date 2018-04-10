<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Film;
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
        // creates a task and gives it some dummy data for this example
        $film = new Film();

        $form = $this->createFormBuilder($film)
            ->add('titel', TextType::class)
            ->add('jahr', TextType::class)
            ->add('genre', ChoiceType::class, array(
                'choices'  => array(
                    'Action' => 0,
                    'Romantik' => 1,
                    'Drama' => 2,
                    'Romantikkomödie' => 3
                )))
            //->add('save', SubmitType::class, array('label' => 'Speichern'))
            ->getForm();
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $film = $form->getData();
            
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