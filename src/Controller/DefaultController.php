<?php

namespace Malvor\Bundle\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}", defaults={"name" = "stranger"})
     */
    public function indexAction($name)
    {
        return $this->render('@MalvorDemo/Default/index.html.twig', array('name' => $name));
    }
}
