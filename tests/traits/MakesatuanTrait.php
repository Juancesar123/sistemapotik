<?php

use Faker\Factory as Faker;
use App\Models\satuan;
use App\Repositories\satuanRepository;

trait MakesatuanTrait
{
    /**
     * Create fake instance of satuan and save it in database
     *
     * @param array $satuanFields
     * @return satuan
     */
    public function makesatuan($satuanFields = [])
    {
        /** @var satuanRepository $satuanRepo */
        $satuanRepo = App::make(satuanRepository::class);
        $theme = $this->fakesatuanData($satuanFields);
        return $satuanRepo->create($theme);
    }

    /**
     * Get fake instance of satuan
     *
     * @param array $satuanFields
     * @return satuan
     */
    public function fakesatuan($satuanFields = [])
    {
        return new satuan($this->fakesatuanData($satuanFields));
    }

    /**
     * Get fake data of satuan
     *
     * @param array $postFields
     * @return array
     */
    public function fakesatuanData($satuanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_satuan' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $satuanFields);
    }
}
