<?php

namespace Tests;

use Osteel\OpenApi\Testing\ValidatorBuilder;

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

        $validator = ValidatorBuilder::fromYaml(storage_path('api-docs/api-docs.yaml'))->getValidator();

        $result = $validator->get($response->baseResponse, '/test');

        $this->assertTrue($result);
    }
}
