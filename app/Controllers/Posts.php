<?php

namespace App\Controllers;

class Posts extends BaseController
{
    public function index()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://jsonplaceholder.typicode.com/posts',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type : application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        header('Content-Type: application/json');

        return $this
            ->getResponse(
                json_decode($response)
            );
    }
}