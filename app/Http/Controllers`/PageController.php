<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getThreads()
    {
        return [
            [
                'title' => 'Pertanyaan mengenai cara kerja aplikasi',
                'content' => 'Permisi, kalo boleh tau, gimana si cara pake aplikasinya? kalo saya misalnya punya UMKM dan pengen melakukan pengajuan pembuatan  logo gimana?',
                'replies' => [
                    [
                        'name' => 'Yosia',
                        'content' => 'Kalo seperti itu, Bapak/Ibu bisa daftar sebagai pengguna jasa, lalu bisa membuat sebuah proyek pembuatan logo di menu profil -> buat post baru'
                    ],
                    [
                        'name' => 'Andre',
                        'content' => 'Baik, terimakasih ya atas jawabannya'
                    ]
                ]
            ],
            [
                'title' => 'Mencari seorang freelancer di bidang pembuatan logo',
                'content' => 'Halo, nama saya Bejo. Saya memiliki UMKM yang bergerak di bidang makanan dan minuman (F&B), sekarang saya sedang mencari seorang freelancer yang bergerak di bidang pembuatan logo. Jika Anda merasa skill anda mumpuni dan sesuai dengan kebutuhan, tolong ajukan lamaran terhadap post yang telah saya buat. Pengajuan lamaran akan saya jawab secepatnya selama jam kerja.',
                'replies' => []
            ],
            [
                'title' => 'Pertanyaan mengenai mekanisme pemberian rating',
                'content' => 'Selamat pagi, perkenalkan nama saya Udin. Saya telah membuat post dan mendapatkan freelancer yang sesuai. Namun, hasil kerja dari freelancer tidak sesuai seperti kesepakatan yang telah disepakati sebelumnya, apakah saya bisa memberikan rating bagi freelancer bersangkutan? agar nantinya pihak Market\'In dapat menindak freelancer tersebut lebih lanjut',
                'replies' => [
                    [
                        'name' => 'Jack L.',
                        'content' => 'Selamat siang Bapak Udin, tentu Anda bisa memberikan rating bagi freelancer bersangkutan dengan cara memasuki menu profil -> riwayat -> lalu klik icon bintang pada proyek yang telah diselesaikan freelancer bersangkutan.'
                    ],
                ]
            ],
        ];
//        return [
//            [
//                'title' => 'Thread 1',
//                'content' => 'Lorem ipsum dolor sit amet',
//                'replies' => [
//                    [
//                        'name' => 'Yosia',
//                        'content' => 'Bangke'
//                    ],
//                    [
//                        'name' => 'Andre',
//                        'content' => 'Noob'
//                    ]
//                ]
//            ],
//            [
//                'title' => 'Thread 2',
//                'content' => 'Lorem ipsum dolor sit amet',
//                'replies' => []
//            ],
//            [
//                'title' => 'Thread 3',
//                'content' => 'Lorem ipsum dolor sit amet',
//                'replies' => []
//            ],
//            [
//                'title' => 'Thread 1',
//                'content' => 'Lorem ipsum dolor sit amet',
//                'replies' => []
//            ],
//            [
//                'title' => 'Thread 2',
//                'content' => 'Lorem ipsum dolor sit amet',
//                'replies' => []
//            ],
//            [
//                'title' => 'Thread 4',
//                'content' => 'Lorem ipsum dolor sit amet',
//                'replies' => []
//            ],
//        ];
    }

    public function getProjects()
    {
        return [
            [
                'image' => 'rice-bowl.jpg',
                'name' => 'Makmur Rice Bowl',
                'type' => 'Logo',
                'category' => 'Makanan dan Minuman',
                'description' => 'Dicari seorang Freelancer di bidang desain untuk membuat logo dengan nama projek "Makmur Rice Bowl"',
                'work_period' => '1 Minggu',
                'budget' => 100000,
                'status' => 'mencari'
            ],
            [
                'image' => 'apotik.jpg',
                'name' => 'Apotik Express Jatinegara',
                'type' => 'Logo',
                'category' => 'Farmasi dan Kesehatan',
                'description' => 'Dicari seorang Freelancer di bidang seni dan desain. Tidak ada minimal pengalaman, tunjukkan portofolio Anda setelah apply di email apotikexpress@gmail.com',
                'work_period' => '2 Minggu',
                'budget' => 550000,
                'status' => 'menunggu'
            ],
            [
                'image' => 'rempah.jpg',
                'name' => 'Aneka Tambang Lima Delima',
                'type' => 'Narasi',
                'category' => 'Hasil Bumi dan Bahan Tambang',
                'description' => 'Dicari seorang freelancer di bidang desain. Minimal gelar Sarjana DKV (S. Ds.), pernah menangani pembuatan logo di bidang otomotif. Jika ada pertanyaan dapat ditanyakan ke email bengkeljatiwarna@gmail.com',
                'work_period' => '1 Bulan',
                'budget' => 1250000,
                'status' => 'selesai'
            ],
            [
                'image' => 'boba.jpeg',
                'name' => 'Boba Asik Warna Warni',
                'type' => 'Logo',
                'category' => 'Makanan dan Minuman',
                'description' => 'Dicari seorang freelancer untuk melakukan pembuatan logo. Kirimkan portfoliomu di bobawarnawarni@gmail.com.',
                'work_period' => '2 Minggu',
                'budget' => 700000,
                'status' => 'dibayar'
            ]
        ];
    }

    public function getFeedback()
    {
        return collect([
            (object)[
                'name' => 'Itto',
                'content' => 'Apa yang dikerjakan sudah cukup baik, hasilnya sesuai ekspetasi',
                'rating' => 4,
                'created_at' => Carbon::now()->subDays(rand(1, 40))
            ],
            (object)[
                'name' => 'Yosia',
                'content' => 'Hasil logo yang dibuat sudah bagus, dan diselesaikan sebelum deadline',
                'rating' => 4,
                'created_at' => Carbon::now()->subDays(rand(1, 40))
            ],
            (object)[
                'name' => 'Chris',
                'content' => 'Hasilnya sudah cukup memenuhi minumum',
                'rating' => 3,
                'created_at' => Carbon::now()->subDays(rand(1, 40))
            ],
            (object)[
                'name' => 'Andreawan',
                'content' => 'Proyek yang diberikan tidak sesuai dengan ketentuan yang diinginkan',
                'rating' => 2,
                'created_at' => Carbon::now()->subDays(rand(1, 40))
            ],
            (object)[
                'name' => 'Jack',
                'content' => 'Narasi yang dibuat sangat baik dan projeknya diselesaikan dengan cepat.',
                'rating' => 5,
                'created_at' => Carbon::now()->subDays(rand(1, 40))
            ],
        ]);
    }

    public function home()
    {
        $types = Type::get();
        $categories = Type::get();
        $projects = $this->getProjects();

        return view('home', compact('types', 'categories', 'projects'));
    }

    public function login()
    {
        return view('account.login');
    }

    public function register()
    {
        $roles = UserRole::get();

        return view('account.register', compact('roles'));
    }

    public function history()
    {
        return view('project.history');
    }

    public function profile()
    {
        $projects = $this->getProjects();

        return view('user.profile', compact('projects'));
    }

    public function forum()
    {
        $threads = $this->getThreads();

        return view('forum.index', compact('threads'));
    }

    public function forumCreate()
    {
        return view('forum.create');
    }

    public function project()
    {
        return view('project.index');
    }

    public function projectDetail($id)
    {
        $index = $id - 1;
        $projects = $this->getProjects();
        $project = array_splice($projects, $index, 1)[0];
        $threads = $this->getThreads();
        $threads = array_splice($threads, 0, 3);

        return view('project.detail', compact('project', 'threads', 'projects'));
    }

    public function projectCreate()
    {
        $types = Type::get();
        $categories = Category::get();

        return view('project.create', compact('types', 'categories'));
    }

    public function userDetail()
    {
        $feedback = $this->getFeedback();

        return view('user.detail', compact('feedback'));
    }
}
