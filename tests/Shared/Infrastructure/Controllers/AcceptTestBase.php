<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\Controllers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Config;
use Illuminate\Testing\TestResponse;
use Src\User\Infrastructure\Persistence\ORM\UserORMModel;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class AcceptTestBase extends TestCase
{
    use WithoutMiddleware;

    protected Generator $faker;

    protected function setUp(): void
    {
        parent::setUp();

        if (Config::get('app.env') == 'production' || Config::get('app.accept_test') == false) {
            $this->markTestSkipped('Those tests are NOT activated, check config file');
        }

        $this->faker = Factory::create();
    }

    protected function httpAction($action, $url, $params = null): TestResponse
    {
        return $this->httpActionResponse($action, $url, $params);
    }

    private function httpActionResponse($action, $url, $params = null): TestResponse
    {
        $url = Config::get('app.url_test') .
            DIRECTORY_SEPARATOR .
            'api' .
            DIRECTORY_SEPARATOR .
            $url;

        return match ($action) {
            'get' => $this->withHeaders($this->createHeaders())
                ->getJson(
                    $url
                ),
            'post' => $this->withHeaders($this->createHeaders())
                ->postJson(
                    $url,
                    $params,
                    $this->createHeaders()
                ),
            'put' => $this->withHeaders($this->createHeaders())
                ->putJson(
                    $url,
                    (!$params) ? [] : $params,
                    $this->createHeaders()
                ),
            'delete' => $this->withHeaders($this->createHeaders())
                ->deleteJson(
                    $url,
                    (!$params) ? [] : $params,
                    $this->createHeaders()
                ),
        };
    }

    protected function createParams($object_mother)
    {
        return $object_mother::random();
    }

    private function createHeaders(): array
    {
        return [
            'Authentication' => 'Bearer ' . $this->generateToken()
        ];
    }

    private function generateToken()
    {
        $user = UserORMModel::first();
        return JWTAuth::fromUser($user);
    }
}
