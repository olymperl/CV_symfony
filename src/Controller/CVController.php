<?php

namespace App\Controller;

use App\Entity\Competences;
use App\Entity\Formations;
use App\Entity\Experiences;
use App\Entity\Contacts;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CVController extends AbstractController
{
     /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('cv/summary.html.twig');
    }

       /**
     * @Route("/learn_more/{type}", name="type_show")
     */
    public function show($type): Response
    {
        if($type === 'competences'){
            $repo = $this->getDoctrine()->getRepository(Competences::class);
        } else if($type === 'formations'){
            $repo = $this->getDoctrine()->getRepository(Formations::class);
        } else if($type === 'experiences'){
            $repo = $this->getDoctrine()->getRepository(Experiences::class);
        } else {
            return new RedirectResponse('/');
        }
        
        $list = $repo->findAll();

        return $this->render('cv/list.html.twig', [
            'list' => $list,
            'type' => $type
        ]
        );
    }


       /**
     * @Route("/show_details/{type}/{id}", name="details_show")
     */
    public function details($type, $id): Response
    {
        
        if($type === 'competences'){
            $repo = $this->getDoctrine()->getRepository(Competences::class);
        } else if($type === 'formations'){
            $repo = $this->getDoctrine()->getRepository(Formations::class);
        } else if($type === 'experiences'){
            $repo = $this->getDoctrine()->getRepository(Experiences::class);
        } else {
            return new RedirectResponse('/');
        }
        $details = $repo->find($id);

        return $this->render('cv/details.html.twig', [
            'details' => $details,
            'type' => $type
        ]
        );
    }


    /**
     * @Route("/contact", name="synthese_create")
     */
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contacts();
        $form = $this->createformBuilder($contact)
                ->add('nom')
                ->add('mail')
                ->add('message')
                ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contact->SetDate(new \Datetime());
            $entityManager->persist($contact);
            $entityManager->flush();
        }

        return $this->render('cv/contact.html.twig', [
            'formContact'=> $form->createView()
        ]);
    }

       /**
     * @Route("/contacts_show", name="contacts_show")
     */
    public function contacts(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Contacts::class);
       
        $contacts_list = $repo->findAll();

        return $this->render('cv/contacts_list.html.twig', [
            'contacts_list' => $contacts_list,
        ]
        );
    }

}


