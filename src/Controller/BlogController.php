<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class BlogController extends AbstractController
{

    /**
     * @Route("/blog/{page?}", name="blog_list", requirements={"page"="\d+"})
     */
    public function list($page)
    {
        //...
    }

    /**
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function show($slug)
    {
        // e.g. at /blog/yay-routing, then $slug='yay-routing'

        // /blog/my-blog-post
        $url = $this->generateUrl(
            'blog_show',
            ['slug' => 'my-blog-post']
        );
    }

}