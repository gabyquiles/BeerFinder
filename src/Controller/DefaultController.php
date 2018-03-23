<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 3/22/18
 * Time: 9:36 PM
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }
}