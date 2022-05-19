<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create([
            'title' => 'Donasi gempa sulbar',
            'description' => 'Himpunan Pemuda Pelajar Mahasiswa Indonesia Maros (HPPMI Maros) menggalang donasi untuk korban gempa bumi di Sulawesi Barat. Ketua HPPMI Maros Kom. UMI, Ervan Prakasa mengatakan, setelah mendapatkan informasi mengenai adanya korban gempa, mereka kemudian mengadakan rapat koordinasi untuk merespon peristiwa tersebut.',
            'image' => 'photos/blog/sedekah.jpeg'
        ]);

        Blog::create([
            'title' => 'Donasi korban gempa bumi',
            'description' => 'Saat ini korban gempa bumi di Pulau Lombok terus membutuhkan bantuan. Para relawan #PemudaLumajangPeduliNTB mengumpulkan donasi agar bisa kita sumbangkan kepada mereka. Mari ringankan beban duka mereka dengan donasi kita. Tidak ada yang terlambat untuk berbuat baik. Mari dukung langkah kami.',
            'image' => 'photos/blog/images.jpg'
        ]);

        BLog::create([
            'title' => 'Darurat Bencana Alam',
            'description' => 'Dimasa tanggap darurat yang melanda Majene Sulawesi Barat dan Kalimantan Selatan, sejumlah gerakan galang dana dilakukan oleh banyak public figure dan komunitas. Satu dari sejumlah gerakan penggalangan dana untuk penyintas gempa Majene dan Banjir Kalimantan Selatan dilakukan oleh komunitas Superhero Beramal Surabaya.',
            'image' => 'photos/blog/kisah-keajaiban-sedekah.jpeg'
        ]);
    }
}