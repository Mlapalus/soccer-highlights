<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    private HttpClientInterface $client;

    /**
     * HomeController constructor.
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    /**
     * @return Response
     */
    public function index(): Response
    {

        $response = $this->client->request(
            'GET',
            'https://www.scorebat.com/video-api/v1/'
        );

      return  $this->render('index.html.twig', [
          'videos' => $response->toArray()
      ]);
    }


}