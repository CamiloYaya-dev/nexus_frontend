<?php

namespace App\Controllers;

class UserController extends BaseController
{
    protected $apiKey;
    protected $url;

    public function __construct()
    {
        $this->apiKey = 'tuB20yGzdLhPQkcI9WxNvcAfJqOD5w3m';
        $this->url = 'http://localhost/nexus_backend/public/api/';
    }

    public function index()
    {
        // Cargar el servicio curlrequest
        $curl = service('curlrequest');

        // Configurar las opciones de la solicitud en un array
        $options = [
            'headers' => [
                'X-API-Key' => $this->apiKey,
            ],
        ];
        
        // Realizar una solicitud GET a la API
        $response = $curl->get('http://localhost/nexus_backend/public/api/user', $options);

        // Verificar si la solicitud fue exitosa y manejar la respuesta
        if ($response->getStatusCode() === 200) {
            $responseBody = $response->getBody(); // Obtener el cuerpo de la respuesta como cadena
            $data = json_decode($responseBody, true); // Decodificar la respuesta JSON a un arreglo asociativo

            // Verificar si se pudo decodificar el JSON correctamente
            if ($data !== null) {
                return view('user/index', ['users' => $data]);
            }
        } else {
            // Manejar el error de solicitud HTTP
            var_dump($response);
        }
    }

    public function show($id)
    {
        // Cargar el servicio curlrequest
        $curl = service('curlrequest');

        // Configurar las opciones de la solicitud en un array
        $options = [
            'headers' => [
                'X-API-Key' => $this->apiKey, // Tu clave API
            ],
        ];

        // Realizar una solicitud GET a la API
        $response = $curl->get('http://localhost/nexus_backend/public/api/user/' . $id, $options);

        return $response;
    }


    public function create()
    {
        // Obtener el cuerpo de la solicitud en formato JSON
        $jsonData = $this->request->getJSON();
    
        // Realizar una solicitud POST a la API para crear el usuario
        $curl = service('curlrequest');

        // Configurar las opciones de la solicitud en un array
        $options = [
            'headers' => [
                'X-API-Key' => $this->apiKey, // Tu clave API
                'Content-Type' => 'application/json', // Tipo de contenido JSON
            ],
            'json' => $jsonData, // Datos a enviar en la solicitud en formato JSON
        ];

        // Realizar una solicitud POST a la API
        $response = $curl->post('http://localhost/nexus_backend/public/api/user', $options);

        return $response;
    }

    public function update($id)
    {
        // Obtener el cuerpo de la solicitud en formato JSON
        $jsonData = $this->request->getJSON();

        // Agregar el ID del usuario a actualizar en los datos
        $jsonData->id = $id;

        // Realizar una solicitud PUT a la API para actualizar los datos
        $curl = service('curlrequest');

        // Configurar las opciones de la solicitud en un array
        $options = [
            'headers' => [
                'X-API-Key' => $this->apiKey, // Tu clave API
                'Content-Type' => 'application/json', // Tipo de contenido JSON
            ],
            'json' => $jsonData, // Datos a enviar en la solicitud en formato JSON
        ];

        // Realizar una solicitud PUT a la API
        $response = $curl->put('http://localhost/nexus_backend/public/api/user/' . $id, $options);

        return $response;
    }

    public function delete($id)
    {
        // Cargar el servicio curlrequest
        $curl = service('curlrequest');

        // Configurar las opciones de la solicitud en un array
        $options = [
            'headers' => [
                'X-API-Key' => $this->apiKey, // Tu clave API
            ],
        ];

        // Realizar una solicitud DELETE a la API
        $response = $curl->delete('http://localhost/nexus_backend/public/api/user/' . $id, $options);

        // Verificar si la solicitud fue exitosa y manejar la respuesta
        return $response;
    }

}
