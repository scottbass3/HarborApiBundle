<?php

namespace Scottbass3\HarborApiBundle;

use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\AddPathPlugin;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Message\Authentication\BasicAuth;
use Nyholm\Psr7\Factory\Psr17Factory;
use Scottbass3\Harbor\Api\Client;


class HarborClient
{
    protected Client $client;

    public function __construct(array $config)
    {
        $this->client = Client::create(
            null,
            [
                new AddHostPlugin(
                    (new Psr17Factory())->createUri($config['base_uri'])
                ),
                new AddPathPlugin(
                    (new Psr17Factory())->createUri($config['base_uri'])
                ),
                new AuthenticationPlugin(
                    new BasicAuth(
                        $config['login'],
                        $config['password']
                    )
                )
            ]
        );
    }

    public function getHarborClient(): Client
    {
        return $this->client;
    }
}