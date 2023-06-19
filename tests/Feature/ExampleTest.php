<?php

namespace Tests\Feature;

use Osteel\OpenApi\Testing\ValidatorBuilder;
use Tests\TestCase;

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

        $validator = ValidatorBuilder::fromYamlFile(storage_path('api-docs/api-docs.yaml'))->getValidator();

        $result = $validator->validate($response->baseResponse, '/test', 'get');

        $this->assertTrue($result);
    }
}
