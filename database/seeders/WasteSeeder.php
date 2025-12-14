<?php

namespace Database\Seeders;

use App\Models\WasteItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class WasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // WasteItem::create([
        //     'name' => 'Botol Plastik PET',
        //     'category' => 'anorganik',
        //     'description' => 'Botol plastik bekas minuman kemasan',
        //     'composition' => 'PET (Polyethylene Terephthalate)',
        //     'impact' => 'Membutuhkan 450 tahun untuk terurai',
        //     'handling' => 'Cuci bersih, pisahkan tutup, masukkan ke tempat sampah daur ulang',
        //     'recycling' => 'Dapat didaur ulang menjadi serat polyester atau botol baru',
        // ]);

        // WasteItem::create([
        //     'name' => 'Sisa Sayuran',
        //     'category' => 'organik',
        //     'description' => 'Potongan sayur dari dapur',
        //     'composition' => 'Bahan organik (selulosa, air)',
        //     'impact' => 'Menghasilkan gas metana di TPA',
        //     'handling' => 'Pisahkan dari sampah lain, buat kompos',
        //     'recycling' => 'Dapat dijadikan kompos untuk pupuk',
        // ]);

        // WasteItem::create([
        //     'name' => 'Baterai Bekas',
        //     'category' => 'b3',
        //     'description' => 'Baterai AA/AAA bekas',
        //     'composition' => 'Merkuri, timbal, kadmium',
        //     'impact' => 'Sangat berbahaya, mencemari tanah dan air',
        //     'handling' => 'JANGAN buang ke sampah biasa. Serahkan ke fasilitas B3',
        //     'recycling' => 'Dapat didaur ulang untuk ambil logam berharga',
        // ]);
        WasteItem::factory()->count(30)->create();
    }
}
