<?php

use App\Models\dataobat;
use App\Repositories\dataobatRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class dataobatRepositoryTest extends TestCase
{
    use MakedataobatTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var dataobatRepository
     */
    protected $dataobatRepo;

    public function setUp()
    {
        parent::setUp();
        $this->dataobatRepo = App::make(dataobatRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedataobat()
    {
        $dataobat = $this->fakedataobatData();
        $createddataobat = $this->dataobatRepo->create($dataobat);
        $createddataobat = $createddataobat->toArray();
        $this->assertArrayHasKey('id', $createddataobat);
        $this->assertNotNull($createddataobat['id'], 'Created dataobat must have id specified');
        $this->assertNotNull(dataobat::find($createddataobat['id']), 'dataobat with given id must be in DB');
        $this->assertModelData($dataobat, $createddataobat);
    }

    /**
     * @test read
     */
    public function testReaddataobat()
    {
        $dataobat = $this->makedataobat();
        $dbdataobat = $this->dataobatRepo->find($dataobat->id);
        $dbdataobat = $dbdataobat->toArray();
        $this->assertModelData($dataobat->toArray(), $dbdataobat);
    }

    /**
     * @test update
     */
    public function testUpdatedataobat()
    {
        $dataobat = $this->makedataobat();
        $fakedataobat = $this->fakedataobatData();
        $updateddataobat = $this->dataobatRepo->update($fakedataobat, $dataobat->id);
        $this->assertModelData($fakedataobat, $updateddataobat->toArray());
        $dbdataobat = $this->dataobatRepo->find($dataobat->id);
        $this->assertModelData($fakedataobat, $dbdataobat->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedataobat()
    {
        $dataobat = $this->makedataobat();
        $resp = $this->dataobatRepo->delete($dataobat->id);
        $this->assertTrue($resp);
        $this->assertNull(dataobat::find($dataobat->id), 'dataobat should not exist in DB');
    }
}
