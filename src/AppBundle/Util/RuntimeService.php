<?php

namespace AppBundle\Util;

use GuzzleHttp\Client;

class RuntimeService implements RuntimeServiceInterface
{
    /**
     * @var string
     */
    private $runtimeServer;

    /**
     * @var Client
     */
    private $client;

    public function __construct($runtimeServer)
    {
        $this->runtimeServer = $runtimeServer;

        $this->client = new Client(['base_uri' => $this->runtimeServer]);
    }

    public function emit($requestJSONData)
    {
        $this->client->request('POST',
            '',
            [
                'json' => $requestJSONData,
            ]);
    }
}