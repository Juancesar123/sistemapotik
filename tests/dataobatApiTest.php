<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class dataobatApiTest extends TestCase
{
    use MakedataobatTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedataobat()
    {
        $dataobat = $this->fakedataobatData();
        $this->json('POST', '/api/v1/dataobats', $dataobat);

        $this->assertApiResponse($dataobat);
    }

    /**
     * @test
     */
    public function testReaddataobat()
    {
        $dataobat = $this->makedataobat();
        $this->json('GET', '/api/v1/dataobats/'.$dataobat->id);

        $this->assertApiResponse($dataobat->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedataobat()
    {
        $dataobat = $this->makedataobat();
        $editeddataobat = $this->fakedataobatData();

        $this->json('PUT', '/api/v1/dataobats/'.$dataobat->id, $editeddataobat);

        $this->assertApiResponse($editeddataobat);
    }

    /**
     * @test
     */
    public function testDeletedataobat()
    {
        $dataobat = $this->makedataobat();
        $this->json('DELETE', '/api/v1/dataobats/'.$dataobat->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/dataobats/'.$dataobat->id);

        $this->assertResponseStatus(404);
    }
}
