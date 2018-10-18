<?php

use Faker\Factory as Faker;
use App\Models\transaksi_obat;
use App\Repositories\transaksi_obatRepository;

trait Maketransaksi_obatTrait
{
    /**
     * Create fake instance of transaksi_obat and save it in database
     *
     * @param array $transaksiObatFields
     * @return transaksi_obat
     */
    public function maketransaksi_obat($transaksiObatFields = [])
    {
        /** @var transaksi_obatRepository $transaksiObatRepo */
        $transaksiObatRepo = App::make(transaksi_obatRepository::class);
        $theme = $this->faketransaksi_obatData($transaksiObatFields);
        return $transaksiObatRepo->create($theme);
    }

    /**
     * Get fake instance of transaksi_obat
     *
     * @param array $transaksiObatFields
     * @return transaksi_obat
     */
    public function faketransaksi_obat($transaksiObatFields = [])
    {
        return new transaksi_obat($this->faketransaksi_obatData($transaksiObatFields));
    }

    /**
     * Get fake data of transaksi_obat
     *
     * @param array $postFields
     * @return array
     */
    public function faketransaksi_obatData($transaksiObatFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kd_obat' => $fake->randomDigitNotNull,
            'qty' => $fake->word,
            'satuan' => $fake->randomDigitNotNull,
            'total_harga' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $transaksiObatFields);
    }
}
