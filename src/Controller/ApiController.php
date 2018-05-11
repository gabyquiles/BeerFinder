<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 4/7/18
 * Time: 10:30 AM
 */

namespace App\Controller;


use App\Doctrine\Type\Point;
use App\Model\DistancedBrewery;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends FOSRestController
{
    /**
     * * @QueryParam(name="lat", requirements="\d+", default="0", description="Latitude")
     * * @QueryParam(name="lon", requirements="\d+", default="0", description="Longitude")
     * * @QueryParam(name="radius", requirements="\d+", default="5", description="Radius to search")
     */
    public function getBreweriesAction(Request $request)
    {
        $latitude = $request->get("lat");
        $longitude = $request->get("lon");
        $radiusOfSearch = $request->get("radius");
        $centerOfSearch = new Point($latitude, $longitude);

        $repository = $this->getDoctrine()->getRepository('App:Brewery');

        $breweries = $repository->getBreweriesWithinRadius($centerOfSearch, $radiusOfSearch);

        $breweries = array_map(function ($result) {
            $distance = array_pop($result);
            $brewery = array_pop($result);
            return new DistancedBrewery($brewery, $distance);
        }, $breweries);

        $view = $this->view($breweries, 200);
        return $this->handleView($view);
    }
}