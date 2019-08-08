<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{
    /**
     * @Route({
     *     "es": "/sobre-nosotros",
     *     "en": "/about-us"
     * }, name="about_us")
     */
    public function about()
    {
        //...
    }
}