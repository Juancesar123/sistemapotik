<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class transaksi_obatApiTest extends TestCase
{
    use Maketransaksi_obatTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatetransaksi_obat()
    {
        $transaksiObat = $this->faketransaksi_obatData();
        $this->json('POST', '/api/v1/transaksiObats', $transaksiObat);

        $this->assertApiResponse($transaksiObat);
    }

    /**
     * @test
     */
    public function testReadtransaksi_obat()
    {
        $transaksiObat = $this->maketransaksi_obat();
        $this->json('GET', '/api/v1/transaksiObats/'.$transaksiObat->id);

        $this->assertApiResponse($transaksiObat->toArray());
    }

    /**
     * @test
     */
    public function testUpdatetransaksi_obat()
    {
        $transaksiObat = $this->maketransaksi_obat();
        $editedtransaksi_obat = $this->faketransaksi_obatData();

        $this->json('PUT', '/api/v1/transaksiObats/'.$transaksiObat->id, $editedtransaksi_obat);

        $this->assertApiResponse($editedtransaksi_obat);
    }

    /**
     * @test
     */
    public function testDeletetransaksi_obat()
    {
        $transaksiObat = $this->maketransaksi_obat();
        $this->json('DELETE', '/api/v1/transaksiObats/'.$transaksiObat->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/transaksiObats/'.$transaksiObat->id);

        $this->assertResponseStatus(404);
    }
}
