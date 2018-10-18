<?php

use App\Models\transaksi_obat;
use App\Repositories\transaksi_obatRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class transaksi_obatRepositoryTest extends TestCase
{
    use Maketransaksi_obatTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var transaksi_obatRepository
     */
    protected $transaksiObatRepo;

    public function setUp()
    {
        parent::setUp();
        $this->transaksiObatRepo = App::make(transaksi_obatRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatetransaksi_obat()
    {
        $transaksiObat = $this->faketransaksi_obatData();
        $createdtransaksi_obat = $this->transaksiObatRepo->create($transaksiObat);
        $createdtransaksi_obat = $createdtransaksi_obat->toArray();
        $this->assertArrayHasKey('id', $createdtransaksi_obat);
        $this->assertNotNull($createdtransaksi_obat['id'], 'Created transaksi_obat must have id specified');
        $this->assertNotNull(transaksi_obat::find($createdtransaksi_obat['id']), 'transaksi_obat with given id must be in DB');
        $this->assertModelData($transaksiObat, $createdtransaksi_obat);
    }

    /**
     * @test read
     */
    public function testReadtransaksi_obat()
    {
        $transaksiObat = $this->maketransaksi_obat();
        $dbtransaksi_obat = $this->transaksiObatRepo->find($transaksiObat->id);
        $dbtransaksi_obat = $dbtransaksi_obat->toArray();
        $this->assertModelData($transaksiObat->toArray(), $dbtransaksi_obat);
    }

    /**
     * @test update
     */
    public function testUpdatetransaksi_obat()
    {
        $transaksiObat = $this->maketransaksi_obat();
        $faketransaksi_obat = $this->faketransaksi_obatData();
        $updatedtransaksi_obat = $this->transaksiObatRepo->update($faketransaksi_obat, $transaksiObat->id);
        $this->assertModelData($faketransaksi_obat, $updatedtransaksi_obat->toArray());
        $dbtransaksi_obat = $this->transaksiObatRepo->find($transaksiObat->id);
        $this->assertModelData($faketransaksi_obat, $dbtransaksi_obat->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletetransaksi_obat()
    {
        $transaksiObat = $this->maketransaksi_obat();
        $resp = $this->transaksiObatRepo->delete($transaksiObat->id);
        $this->assertTrue($resp);
        $this->assertNull(transaksi_obat::find($transaksiObat->id), 'transaksi_obat should not exist in DB');
    }
}
