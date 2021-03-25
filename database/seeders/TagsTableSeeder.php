<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['Sampah', 'Gorong-gorong kecil', 'Luapan air sungai', 'Bendungan Pecah']);
        $tags->each(function ($c) {
            \App\Models\Tag::create([
                'name' => $c,
                'slug' => \Str::slug($c),
            ]);
        });
    }
}
