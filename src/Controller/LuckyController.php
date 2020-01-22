<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Psr\Log\LoggerInterface;

//use Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures\AbstractClassController;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max?}", name="app_lucky_number", requirements={"max"="\d+"})
     */
    public function number($max, LoggerInterface $logger)
    {
        //$url = $this->generateUrl('app_lucky_number', ['max' => 45]);

        $logger->info('Estamos logueados!');

        $number = random_int(0, $max);

        //return new Response('<html><body>Lucky number: '.$number.'</body></html>');

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
            //'logger' => $logger
        ]
        );
    }

}
