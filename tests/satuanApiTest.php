<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class satuanApiTest extends TestCase
{
    use MakesatuanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesatuan()
    {
        $satuan = $this->fakesatuanData();
        $this->json('POST', '/api/v1/satuans', $satuan);

        $this->assertApiResponse($satuan);
    }

    /**
     * @test
     */
    public function testReadsatuan()
    {
        $satuan = $this->makesatuan();
        $this->json('GET', '/api/v1/satuans/'.$satuan->id);

        $this->assertApiResponse($satuan->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesatuan()
    {
        $satuan = $this->makesatuan();
        $editedsatuan = $this->fakesatuanData();

        $this->json('PUT', '/api/v1/satuans/'.$satuan->id, $editedsatuan);

        $this->assertApiResponse($editedsatuan);
    }

    /**
     * @test
     */
    public function testDeletesatuan()
    {
        $satuan = $this->makesatuan();
        $this->json('DELETE', '/api/v1/satuans/'.$satuan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/satuans/'.$satuan->id);

        $this->assertResponseStatus(404);
    }
}
