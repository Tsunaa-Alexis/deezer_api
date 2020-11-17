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
        /*$em = $this->getDoctrine()->getManager();
        $em->persist($artist);
        $em->flush();*/
        return $this->render('Artistes/addArtist.html.twig', []);
    }

    /**
     * @Route("/search/{art}", name="search")
     */
    public function SearchArtist($art) {
        $artist_data = file_get_contents('https://api.deezer.com/search/artist/?q=artist:%22'.$art.'%22&index=0&limit=1000&output=json');
        $response = new Response($artist_data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/add/{id}", name="addArtist")
     */
    public function addArtist($id){
        $artist_data = file_get_contents('https://api.deezer.com/artist/'.$id);
        $artist_data = json_decode($artist_data,true);
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

        $em = $this->getDoctrine()->getManager();
        $em->persist($artist);
        $em->flush();

        return $this->redirectToRoute('home', [], 301);
    }

    /**
     * @Route("/newTrack/{id}", name="newTrack")
     */
    public function newTrack($id){
        $track_db = $this->getDoctrine()->getManager()->getRepository('App:Track')->findby(array('artist' => $id));
        $track_api = file_get_contents('https://api.deezer.com/artist/'.$id.'/top?limit=1000');
        $track_api = json_decode($track_api,true);
        $obj_array = array();
        $max = sizeof($track_api['data']);
        for ($i = 0; $i < $max; $i++) {
            $track = new Track();
            $track->setId($track_api['data'][$i]['id']);
            $track->setTitle($track_api['data'][$i]['title']);
            $track->setLink($track_api['data'][$i]['link']);
            $track->setDuration($track_api['data'][$i]['duration']);
            $track->setRank($track_api['data'][$i]['rank']);
            $track->setArtist($this->getDoctrine()->getManager()->getRepository('App:Artist')->find($id));
            array_push($obj_array, $track);
        }

        $idDb = array();
        foreach ( $track_db as $key ){
            array_push($idDb, $key->getId());
        }
        



        return $this->render('Track/newTrack.html.twig', ['track_db' => $track_db, 'track_api' => $obj_array, 'idDb' => $idDb]);

    }

    /**
     * @Route("/addtrack/{id}/{artist}", name="addTrack")
     */
    public function addTrack($id,$artist){
        $track_data = file_get_contents('https://api.deezer.com/track/'.$id);
        $track_data = json_decode($track_data,true);
        $track = new Track();
        $track->setId($track_data['id']);
        $track->setTitle($track_data['title']);
        $track->setLink($track_data['link']);
        $track->setDuration($track_data['duration']);
        $track->setRank($track_data['rank']);
        $track->setArtist($this->getDoctrine()->getManager()->getRepository('App:Artist')->find($artist));


        $em = $this->getDoctrine()->getManager();
        $em->persist($track);
        $em->flush();

        return $this->redirectToRoute('newTrack', ['id' => $artist], 301);
    }
}
