<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class DefaultController extends AbstractController
{
    /**
     * Page d'Accueil
     * @return Response
     */
    #[Route('/', name:'default_home', methods:'GET')]
    public function home(): Response
    {
        return $this->render('default/home.html.twig');

    }
    /**
     * Page Catégorie
     * @return Response
     */
    #[Route('/{slug}', name: 'default_category', methods: 'GET')]
    public function category(Categorie $categorie): Response
    {
//         dump($categorie);
        return $this->render('default/category.html.twig', [
            'categorie' => $categorie
        ]);
    }

    /**
     * Page Article
     * ex. https://localhost:8000/politique/greve-sncf_1.html
     * @param $alias
     * @param $id
     * @param $category
     * @return Response
     */
    #[Route('/{category}/{alias}_{id<\d+>}.html', name: 'default_post', methods: 'GET')]
    public function post($alias, $id, $category): Response
    {
        return $this->render('default/post.html.twig', [
            'alias' => $alias,
            'id' => $id,
            'category' => $category,
        ]);
    }
    /**
     * Page Contact
     * @return Response
     */
    #[Route('/contact', name:'default_contact', methods:'GET')]
    public function contact(): Response
    {
        return new Response('<h1>Page Contact</h1>');
    }
}