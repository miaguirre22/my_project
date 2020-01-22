<?php

namespace App\Service;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SomeService
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    public function someMethod()
    {
        $url = $this->router->generate(
            'blog_show',
            ['slug' => 'my-blog-post']
        );

        // Generating URLs with Query Strings
        $url = $this->router->generate('blog', [
            'page' => 2,
            'category' => 'Symfony',
        ]);

        // ...
    }
}
