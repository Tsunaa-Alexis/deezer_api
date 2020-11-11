<?php

namespace App\Controller;

use App\Entity\Track;
use App\Entity\Artist;
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
        $homepage = file_get_contents('https://api.deezer.com/artist/9197980/top?limit=1000');
        $artist_data = file_get_contents('https://api.deezer.com/artist/9197980');
        $obj = json_decode($homepage,true);
        $artist_data = json_decode($artist_data,true);
        $obj_array = array();
        $max = sizeof($obj['data']);
        for ($i = 0; $i < $max; $i++) {
            $track = new Track();
            $track->setId($obj['data'][$i]['id']);
            $track->setTitle($obj['data'][$i]['title']);
            array_push($obj_array, $track);
        }

        $artist = new Artist();
        $artist->setId($artist_data['id']);
        $artist->setName($artist_data['name']);
        $artist->setLink($artist_data['link']);
        $artist->setShare($artist_data['share']);
        $artist->setPicture($artist_data['picture']);
        $artist->setPictureSmall($artist_data['picture_small']);
        $artist->setPictureMedium($artist_data['picture_medium']);
        $artist->setPictureBig($artist_data['picture_big']);
        $artist->setPictureXl($artist_data['picture_xl']);
        $artist->setNmAlbum($artist_data['nb_album']);
        $artist->setNbFan($artist_data['nb_fan']);
        $artist->setRadio($artist_data['radio']);
        $artist->setTracklist($artist_data['tracklist']);



        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'obj' => $obj_array,
            'artist' => $artist,
        ]);
    }
}
