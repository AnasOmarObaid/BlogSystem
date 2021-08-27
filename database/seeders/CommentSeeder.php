<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        foreach ($ids as $id) {
            DB::table('comments')->insert([
                [
                    'id'    => $id,
                    'comment'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus nihil amet eos ex velit blanditiis voluptates debitis molestiae dignissimos illum accusantium mollitia praesentium, facilis dolor possimus ipsa deserunt unde repudiandae.',
                    'user_id'   =>  1,
                    'post_id'   => 1
                ]
            ]);
        }
    }
}
