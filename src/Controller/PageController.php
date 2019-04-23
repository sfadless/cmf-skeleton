<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * PageController
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class PageController
{
    public function page()
    {
        return new Response(123);
    }
}