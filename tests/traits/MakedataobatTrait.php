<?php

use Faker\Factory as Faker;
use App\Models\dataobat;
use App\Repositories\dataobatRepository;

trait MakedataobatTrait
{
    /**
     * Create fake instance of dataobat and save it in database
     *
     * @param array $dataobatFields
     * @return dataobat
     */
    public function makedataobat($dataobatFields = [])
    {
        /** @var dataobatRepository $dataobatRepo */
        $dataobatRepo = App::make(dataobatRepository::class);
        $theme = $this->fakedataobatData($dataobatFields);
        return $dataobatRepo->create($theme);
    }

    /**
     * Get fake instance of dataobat
     *
     * @param array $dataobatFields
     * @return dataobat
     */
    public function fakedataobat($dataobatFields = [])
    {
        return new dataobat($this->fakedataobatData($dataobatFields));
    }

    /**
     * Get fake data of dataobat
     *
     * @param array $postFields
     * @return array
     */
    public function fakedataobatData($dataobatFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_obat' => $fake->word,
            'id_satuan' => $fake->randomDigitNotNull,
            'jumlah' => $fake->word,
            'harga' => $fake->word,
            'kode_obat' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $dataobatFields);
    }
}
