<?php

namespace App\Controller;

use App\Entity\Track;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $homepage = file_get_contents('https://api.deezer.com/search/?q=artist:%22damso%22&index=0&limit=0&output=json');
        $obj = json_decode($homepage,true);
        $obj_array = array();
        $max = sizeof($obj['data']);
        for ($i = 0; $i < $max; $i++) {
            $track = new Track();
            $track->setId($obj['data'][$i]['id']);
            $track->setTitle($obj['data'][$i]['title']);
            array_push($obj_array, $track);
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'obj' => $obj_array,
        ]);
    }
}
