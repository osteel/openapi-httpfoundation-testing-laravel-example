<?php

namespace Tests;

use Osteel\OpenApi\Testing\ResponseValidatorBuilder;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/api/test');

        $validator = ResponseValidatorBuilder::fromYaml(storage_path('api-docs/api-docs.yaml'))->getValidator();

        $result = $validator->get('/test', $response->baseResponse);

        $this->assertTrue($result);
    }
}
