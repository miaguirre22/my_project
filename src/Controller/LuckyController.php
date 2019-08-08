<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

//use Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures\AbstractClassController;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max?}", name="app_lucky_number", requirements={"max"="\d+"})
     */
    public function number($max)
    {
        //$url = $this->generateUrl('app_lucky_number', ['max' => 45]);

        $number = random_int(0, $max);

        //return new Response('<html><body>Lucky number: '.$number.'</body></html>');

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]
        );
    }

// ...
    public function index()
    {
        // redirects to the "homepage" route
        return $this->redirectToRoute('homepage');

        // redirectToRoute is a shortcut for:
        // return new RedirectResponse($this->generateUrl('homepage'));

        // does a permanent - 301 redirect
        return $this->redirectToRoute('homepage', [], 301);

        // redirect to a route with parameters
        return $this->redirectToRoute('app_lucky_number', ['max' => 10]);

        // redirects to a route and maintains the original query string parameters
        return $this->redirectToRoute('blog_show', $request->query->all());

        // redirects externally
        return $this->redirect('http://symfony.com/doc');
    }

}
