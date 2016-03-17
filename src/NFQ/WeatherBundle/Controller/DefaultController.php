<?php

namespace NFQ\WeatherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/weather/{city}")
     */
    public function indexAction($city)
    {

        $json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&units=metric&appid=16eb031b01a789e52e9ad1ec4c292233");
        $decoded = json_decode($json, true);
        $temp = $decoded["main"]["temp"];
        $name = $decoded["name"];
        return $this->render('NFQWeatherBundle:Default:index.html.twig', ['name' => $name, 'temp' => $temp]);

    }
}
