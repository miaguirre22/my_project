<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures\AbstractClassController;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number")
     */
    public function number()
    {
        $number = random_int(0, 100);

        //return new Response('<html><body>Lucky number: '.$number.'</body></html>'
        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]
        );
    }
}
