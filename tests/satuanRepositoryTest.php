<?php

use App\Models\satuan;
use App\Repositories\satuanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class satuanRepositoryTest extends TestCase
{
    use MakesatuanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var satuanRepository
     */
    protected $satuanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->satuanRepo = App::make(satuanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesatuan()
    {
        $satuan = $this->fakesatuanData();
        $createdsatuan = $this->satuanRepo->create($satuan);
        $createdsatuan = $createdsatuan->toArray();
        $this->assertArrayHasKey('id', $createdsatuan);
        $this->assertNotNull($createdsatuan['id'], 'Created satuan must have id specified');
        $this->assertNotNull(satuan::find($createdsatuan['id']), 'satuan with given id must be in DB');
        $this->assertModelData($satuan, $createdsatuan);
    }

    /**
     * @test read
     */
    public function testReadsatuan()
    {
        $satuan = $this->makesatuan();
        $dbsatuan = $this->satuanRepo->find($satuan->id);
        $dbsatuan = $dbsatuan->toArray();
        $this->assertModelData($satuan->toArray(), $dbsatuan);
    }

    /**
     * @test update
     */
    public function testUpdatesatuan()
    {
        $satuan = $this->makesatuan();
        $fakesatuan = $this->fakesatuanData();
        $updatedsatuan = $this->satuanRepo->update($fakesatuan, $satuan->id);
        $this->assertModelData($fakesatuan, $updatedsatuan->toArray());
        $dbsatuan = $this->satuanRepo->find($satuan->id);
        $this->assertModelData($fakesatuan, $dbsatuan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesatuan()
    {
        $satuan = $this->makesatuan();
        $resp = $this->satuanRepo->delete($satuan->id);
        $this->assertTrue($resp);
        $this->assertNull(satuan::find($satuan->id), 'satuan should not exist in DB');
    }
}
