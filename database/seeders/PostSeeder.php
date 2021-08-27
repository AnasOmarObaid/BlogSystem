<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [1,2,3,4,5,6,7,8,9, 10, 11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,65,84,74,78,97];
        foreach ($ids as $id){
            DB::table('posts')->insert([
                'id'    =>$id,
                'slug' => Str::remove("/", bcrypt(now())),
                'title' => Str::random(10),
                'excerpt'   =>  'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora, repudiandae, reprehenderit eaque Lorem ipsum dolor sit, amet consectetur',
                'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora, repudiandae, reprehenderit eaque autem praesentium laboriosam modi provident tenetur harum, possimus asperiores distinctio quibusdam obcaecati pariatur. Dicta, perspiciatis placeat. Fugiat, quos. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora, repudiandae, reprehenderit eaque autem praesentium laboriosam modi provident tenetur harum, possimus asperiores distinctio quibusdam obcaecati pariatur. Dicta, perspiciatis placeat. Fugiat, quos.',
                'category_id'   => 1,
                'user_id'   =>  1,
                'thumbnail' =>  'images\thumbnails\default.png'
            ]);
        }
    }
}
