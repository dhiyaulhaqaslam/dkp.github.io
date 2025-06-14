<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chatbot; // Pastikan model Chatbot diimpor

class ChatbotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // GENERAL
        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa Tujuan Dinas Ketahanan Pangan Bergerak?'],
            ['jawaban' => 'Tujuan Dinas Ketahanan Pangan adalah terwujudnya kedaulatan pangan masyarakat melalui ketersediaan (produksi dan cadangan pangan), keterjangkauan, konsumsi pangan dan gizi serta keamanan pangan berbasis bahan baku, sumber daya dan kearifan lokal.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa Tujuan DKP Bergerak?'],
            ['jawaban' => 'Tujuan Dinas Ketahanan Pangan adalah terwujudnya kedaulatan pangan masyarakat melalui ketersediaan (produksi dan cadangan pangan), keterjangkauan, konsumsi pangan dan gizi serta keamanan pangan berbasis bahan baku, sumber daya dan kearifan lokal.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa Tujuan DKP?'],
            ['jawaban' => 'Tujuan Dinas Ketahanan Pangan adalah terwujudnya kedaulatan pangan masyarakat melalui ketersediaan (produksi dan cadangan pangan), keterjangkauan, konsumsi pangan dan gizi serta keamanan pangan berbasis bahan baku, sumber daya dan kearifan lokal.']
        );

        // KETAPANG
        Chatbot::updateOrCreate(
            ['pertanyaan' => 'apa itu ketahanan pangan?'],
            ['jawaban' => 'Ketahanan Pangan merupakan kemampuan suatu bangsa untuk menjamin seluruh penduduknya memperoleh pangan dalam jumlah yang cukup, mutu yang layak, aman, dan juga halal, yang didasarkan pada optimalisasi pemanfaatan dan berbasis pada keragaman sumber daya domestik']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'apa itu dkp?'],
            ['jawaban' => 'Dinas Ketahanan Pangan adalah lembaga teknis daerah yang bertugas melaksanakan urusan pemerintahan di bidang ketahanan pangan.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'apa itu Dinas Ketahanan Pangan?'],
            ['jawaban' => 'Dinas Ketahanan Pangan adalah lembaga teknis daerah yang bertugas melaksanakan urusan pemerintahan di bidang ketahanan pangan.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'apa saja manfaat konsumsi pangan lokal?'],
            ['jawaban' => 'Manfaat konsumsi pangan lokal antara lain mendukung ketahanan pangan, menjaga keberagaman pangan, dan mengurangi ketergantungan pada impor pangan.']
        );

        // PENGEMBANG/PEMBUAT
        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Siapa yang mengembangkan web ini?'],
            ['jawaban' => 'Dhiyaulhaq Aslam Muhammad N.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Siapa pengembang web ini?'],
            ['jawaban' => 'Dhiyaulhaq Aslam Muhammad N.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Siapa pembuat web ini?'],
            ['jawaban' => 'Dhiyaulhaq Aslam Muhammad N.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Siapa yang membuat web ini?'],
            ['jawaban' => 'Dhiyaulhaq Aslam Muhammad N.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Siapa yang buat web ini?'],
            ['jawaban' => 'Dhiyaulhaq Aslam Muhammad N.']
        );

        // BIDANG DKP
        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Ada berapa bidang dalam DKP Kota Makassar?'],
            ['jawaban' => 'Ada 4 Bidang dalam DKP (Dinas Ketahanan Pangan Kota Makassar) di antaranya adalah Bidang Ketersediaan dan Produksi Pangan, Bidang Kerawanan Distribusi dan Cadangan Pangan, Bidang Konsumsi dan Penganekaragaman Pangan, dan Bidang Keamanan Pangan.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Ada berapa bidang di DKP?'],
            ['jawaban' => 'Ada 4 Bidang dalam DKP (Dinas Ketahanan Pangan Kota Makassar) di antaranya adalah Bidang Ketersediaan dan Produksi Pangan, Bidang Kerawanan Distribusi dan Cadangan Pangan, Bidang Konsumsi dan Penganekaragaman Pangan, dan Bidang Keamanan Pangan.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Ada berapa bidang dalam DKP?'],
            ['jawaban' => 'Ada 4 Bidang dalam DKP (Dinas Ketahanan Pangan Kota Makassar) di antaranya adalah Bidang Ketersediaan dan Produksi Pangan, Bidang Kerawanan Distribusi dan Cadangan Pangan, Bidang Konsumsi dan Penganekaragaman Pangan, dan Bidang Keamanan Pangan.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Ada berapa bidang dalam DKP?'],
            ['jawaban' => 'Ada 4 Bidang dalam DKP (Dinas Ketahanan Pangan Kota Makassar) di antaranya adalah Bidang Ketersediaan dan Produksi Pangan, Bidang Kerawanan Distribusi dan Cadangan Pangan, Bidang Konsumsi dan Penganekaragaman Pangan, dan Bidang Keamanan Pangan.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Ada berapa bidang dalam Dinas Ketahanan Pangan Kota Makassar?'],
            ['jawaban' => 'Ada 4 bidang yaitu Bidang Ketersediaan dan Produksi Pangan, Bidang Kerawanan Distribusi dan Cadangan Pangan, Bidang Konsumsi dan Penganekaragaman Pangan, dan Bidang Keamanan Pangan.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa saja Bidang di dkp?'],
            ['jawaban' => 'Ada 4 bidang yaitu Bidang Ketersediaan dan Produksi Pangan, Bidang Kerawanan Distribusi dan Cadangan Pangan, Bidang Konsumsi dan Penganekaragaman Pangan, dan Bidang Keamanan Pangan.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa saja Bidang di dkp Makassar?'],
            ['jawaban' => 'Ada 4 bidang yaitu Bidang Ketersediaan dan Produksi Pangan, Bidang Kerawanan Distribusi dan Cadangan Pangan, Bidang Konsumsi dan Penganekaragaman Pangan, dan Bidang Keamanan Pangan.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa saja Bidang di dkp Kota Makassar?'],
            ['jawaban' => 'Ada 4 bidang yaitu Bidang Ketersediaan dan Produksi Pangan, Bidang Kerawanan Distribusi dan Cadangan Pangan, Bidang Konsumsi dan Penganekaragaman Pangan, dan Bidang Keamanan Pangan.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa saja Bidang di Dinas Ketahanan Pangan?'],
            ['jawaban' => 'Di dalam DKP Kota Makassar Ada 4 bidang yaitu Bidang Ketersediaan dan Produksi Pangan, Bidang Kerawanan Distribusi dan Cadangan Pangan, Bidang Konsumsi dan Penganekaragaman Pangan, dan Bidang Keamanan Pangan.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa saja Bidang di Dinas Ketahanan Pangan Kota Makassar?'],
            ['jawaban' => 'Ada 4 bidang yaitu Bidang Ketersediaan dan Produksi Pangan, Bidang Kerawanan Distribusi dan Cadangan Pangan, Bidang Konsumsi dan Penganekaragaman Pangan, dan Bidang Keamanan Pangan.']
        );

        // LONGWIS
        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa itu Longwis?'],
            ['jawaban' => 'Lorong wisata (Longwis) merupakan salah satu program unggulan yang digagas Wali Kota Makassar Moh Ramdhan Pomanto. Longwis hadir bukan hanya untuk destinasi wisata baru semata, namun memiliki manfaat yang lebih luas. Mulai dari mendorong peningkatan ekonomi Kota Makassar khususnya masyarakat lorong, dengan memberdayakan Usaha Mikro Kecil Menengah (UMKM). Longwis ini juga mengeksplor berbagai kuliner khas']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Jelaskan lebih lengkap terkait program longwis?'],
            [
                'jawaban' => '1) Pembuatan Materi Promosi
                Brosur, video, atau konten media sosial yang memperkenalkan daya tarik lorong wisata.
                2) Pengadaan Event Wisata
                Acara seperti festival budaya, bazar, atau pentas seni untuk menarik wisatawan.
                3)Kemitraan dengan Agen Wisata
                Bekerja sama dengan biro perjalanan untuk memasarkan lorong wisata sebagai destinasi..'
            ]
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa yang dilakukan dalam program longwis?'],
            ['jawaban' => 'Program Longwis (Lorong Wisata) melibatkan berbagai kegiatan yang bertujuan untuk memberdayakan masyarakat lokal, mempromosikan potensi wisata, dan meningkatkan perekonomian daerah.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa saja yang dilakukan dalam program longwis?'],
            ['jawaban' => 'Program Longwis (Lorong Wisata) melibatkan berbagai kegiatan yang bertujuan untuk memberdayakan masyarakat lokal, mempromosikan potensi wisata, dan meningkatkan perekonomian daerah.']
        );

        Chatbot::updateOrCreate(
            ['pertanyaan' => 'Apa saja yang dilakukan dalam program lorong wisata?'],
            ['jawaban' => 'Program Longwis (Lorong Wisata) melibatkan berbagai kegiatan yang bertujuan untuk memberdayakan masyarakat lokal, mempromosikan potensi wisata, dan meningkatkan perekonomian daerah.']
        );
    }

}

