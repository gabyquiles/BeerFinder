<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 4/7/18
 * Time: 10:30 AM
 */

namespace App\Controller;


use FOS\RestBundle\Controller\FOSRestController;

class ApiController extends FOSRestController
{
    public function getBreweriesAction()
    {
        $repository = $this->getDoctrine()->getRepository('App:Brewery');
        $breweries = $repository->findAll();

        $view = $this->view($breweries, 200);
        return $this->handleView($view);
    }
}