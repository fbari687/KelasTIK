<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ReviewSeeder::class
        ]);

        // $role = Role::create([
        //     'name' => 'super_admin'
        // ]);
        $pengajar = Role::create([
            'name' => 'pengajar'
        ]);
        $mahasiswa = Role::create([
            'name' => 'mahasiswa'
        ]);

        // $superAdmin = User::create([
        //     'name' => "admin",
        //     'email' => "admin@pnj.ac.id",
        //     'nim' => "9999999999",
        //     'password' => bcrypt('admin1234'),
        //     'prodi' => 'other',
        //     'semester' => 5,
        //     'image' => 'default-profile.webp'
        // ]);

        $azzuri = User::create([
            'name' => "Azzuri Putra Mahendra",
            'email' => "azzuri@stu.pnj.ac.id",
            'nim' => "2407123123",
            'bio' => 'Cyber Security Handal',
            'password' => bcrypt('azzuri1234'),
            'prodi' => 'TMJ',
            'semester' => 5,
            'image' => '/profile/azzuri.png'
        ]);

        $azzuri->assignRole('pengajar');

        $randy = User::create([
            'name' => "Randy Ananda",
            'email' => "randy@stu.pnj.ac.id",
            'nim' => "2407122122",
            'bio' => "Wakil Ketua Himatik",
            'password' => bcrypt('randy1234'),
            'prodi' => 'TI',
            'semester' => 5,
            'image' => '/profile/randy.png'
        ]);

        $randy->assignRole('pengajar');

        $bimo = User::create([
            'name' => "M. Bimo Ariotedjo",
            'email' => "bimo@stu.pnj.ac.id",
            'nim' => "2407121121",
            'bio' => "Ketua Himatik",
            'password' => bcrypt('bimo1234'),
            'prodi' => 'TI',
            'semester' => 5,
            'image' => '/profile/bimo.png'
        ]);

        $bimo->assignRole('pengajar');

        Category::create([
            'name' => "Pemrograman Dasar",
            'slug' => "pemrograman-dasar"
        ]);
        Category::create([
            'name' => "Pemrograman Project Based",
            'slug' => "pemrograman-project-based"
        ]);
        Category::create([
            'name' => "Cyber Security",
            'slug' => "cyber-security"
        ]);
        Category::create([
            'name' => "UI UX",
            'slug' => "ui-ux"
        ]);

        $cpp = Course::create([
            'title' => "Belajar C++",
            'sub_title' => "Belajar C++ Dari Awal Sampai OOP",
            'slug' => "belajar-cpp",
            'description' => "C++ adalah bahasa pemrograman komputer yang merupakan evolusi dari keluarga bahasa C yang sudah ada. Sebagai bahasa yang berorientasi pada objek yang memberikan struktur jelas pada program dan memungkinkan kode untuk digunakan ulang, C++ dapat menurunkan biaya pengembangan.

            Contoh program C++ bisa ditemukan dalam sistem operasi yang kita kenal sekarang karena C++ adalah pemrograman yang bersifat portabel dan bisa digunakan untuk menciptakan berbagai aplikasi yang bisa beradaptasi dengan beragam platform.",
            'category_id' => Category::where('slug', 'pemrograman-dasar')->first()->id,
            'level' => 1,
            'id_pengajar' => $randy->id,
            'image' => "/course/cpp.jpg"
        ]);

        $kaliLinux = Course::create([
            'title' => "Belajar Kali Linux",
            'sub_title' => "Belajar Kali Linux Dari Awal Sampai Pro",
            'slug' => "belajar-kali-linux",
            'description' => "Linux adalah sistem operasi open-source yang telah dikenal selama bertahun-tahun karena keamanannya yang kuat. Dalam artikel ini, kamu akan mempelajari beberapa keunggulan Linux dalam hal keamanan cyber dan mengapa sistem operasi ini merupakan pilihan yang tepat bagi organisasi dan individu yang ingin melindungi data mereka dari serangan cyber.

            Dalam era digital seperti saat ini, keamanan cyber bukanlah hal yang bisa diabaikan begitu saja. Peningkatan keamanan di Linux dengan menggunakan fitur-fitur keamanan yang tersedia dapat membantu melindungi data dan sistem dari serangan cyber. Oleh karena itu, sangat penting bagi kamu sebagai pengguna Linux untuk memahami dan mengimplementasikan langkah-langkah keamanan yang tepat.",
            'category_id' => Category::where('slug', 'cyber-security')->first()->id,
            'level' => 1,
            'id_pengajar' => $azzuri->id,
            'image' => "/course/kali.jpg"
        ]);

        $figma = Course::create([
            'title' => "Belajar Auto Layouting Figma",
            'sub_title' => "Belajar Auto Layout figma sampai jadi pro",
            'slug' => "belajar-auto-layouting-figma",
            'description' => "Tahukah kamu bahwa salah satu kunci utama dalam merancang user interface (UI) yang responsif dan efisien adalah menggunakan fitur Auto Layout di Figma? Auto Layout adalah alat yang sangat berguna dalam pembuatan/pengembangan desain, yang memungkinkan elemen-elemen dalam suatu frame beradaptasi dengan baik saat ukuran atau kontennya berubah.",
            'category_id' => Category::where('slug', 'ui-ux')->first()->id,
            'level' => 1,
            'id_pengajar' => $bimo->id,
            'image' => "/course/figma.jpeg"
        ]);

        $instalcpp = Module::create([
            'title' => "1. Penginstalan",
            'description' => 'Penginstal',
            'course_id' => $cpp->id,
            'order' => 1
        ]);

        $proceduralcpp = Module::create([
            'title' => "2. C++ Procedural",
            'description' => 'Kode C++ dengan gaya procedural',
            'course_id' => $cpp->id,
            'order' => 2
        ]);

        Lesson::create([
            'title' => "Install Codeblocks",
            'module_id' => $instalcpp->id,
            'video_url' => "https://www.youtube.com/embed/KSMQXpoBfzY?si=j6dz4TekiVTxn6t_"
        ]);
        Lesson::create([
            'title' => "Install Visual Studio 2022",
            'module_id' => $instalcpp->id,
            'video_url' => "https://www.youtube.com/embed/UUX1vHGIcNQ?si=4451jLusIguCvj-8"
        ]);
        Lesson::create([
            'title' => "Alur Kerja C++",
            'module_id' => $proceduralcpp->id,
            'video_url' => "https://www.youtube.com/embed/Wzxknjyd3hE?si=5h9--oetCYlQPF6l"
        ]);
        Lesson::create([
            'title' => "Printing Console",
            'module_id' => $proceduralcpp->id,
            'video_url' => "https://www.youtube.com/embed/Bt7xPtON9NE?si=f38B-dn0IFqyZHoY"
        ]);
        Lesson::create([
            'title' => "Variable",
            'module_id' => $proceduralcpp->id,
            'video_url' => "https://www.youtube.com/embed/vnYWr7jFl5M?si=f5rscordzHxPa9I7"
        ]);

        $installLinux = Module::create([
            'title' => "1. Penginstalan",
            'description' => "Penginstal",
            'course_id' => $kaliLinux->id,
            'order' => 1
        ]);

        Lesson::create([
            'title' => "Penginstalan Kali Linux di Virtual Box",
            'module_id' => $installLinux->id,
            'video_url' => "https://www.youtube.com/embed/gsZxuiU0uZ4?si=cfGuadCuNRWWK1Hl"
        ]);
        Lesson::create([
            'title' => "Penginstalan Kali Linux Dual Boot",
            'module_id' => $installLinux->id,
            'video_url' => "https://www.youtube.com/embed/tozCZZK-gAc?si=Jueu_GFDcQAlABJ8"
        ]);

        $pengenalanLinux = Module::create([
            'title' => "2. Pengenalan Lingkungan Linux",
            'description' => "Pengenalan Lingkungan Linux",
            'course_id' => $kaliLinux->id,
            'order' => 2
        ]);

        Lesson::create([
            'title' => "Pengenalan Terminal CLI Linux",
            'module_id' => $pengenalanLinux->id,
            'video_url' => "https://www.youtube.com/embed/ClbWfffCYf4?si=LfK_jgr2VK2566-B"
        ]);

        $penginstalanFigma = Module::create([
            'title' => "1. Penginstalan",
            'description' => "Penginstalan Figma",
            'course_id' => $figma->id,
            'order' => 1
        ]);

        Lesson::create([
            'title' => "Install Aplikasi Figma",
            'module_id' => $penginstalanFigma->id,
            'video_url' => 'https://www.youtube.com/embed/VHpPy8VL22I?si=E4d3_mfvuSUXEtcT'
        ]);

        $pengenalanFigma = Module::create([
            'title' => "2. Pengenalan Lingkungan Figma",
            'description' => "pengenalan tools dan lingkungan",
            'course_id' => $figma->id,
            'order' => 2
        ]);

        Lesson::create([
            'title' => "Pengenalan tools-tools Figma",
            'module_id' => $pengenalanFigma->id,
            'video_url' => "https://www.youtube.com/embed/Fjn6gitxlhs?si=8Hm_E1_w8eN30GaO"
        ]);
    }
}
