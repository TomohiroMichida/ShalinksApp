<?php

use Illuminate\Database\Seeder;
use illuminate\Database\Eloquent\Model;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            $post = new Post;
            $post->target = 'skillexample'.$i.'.com';
            $post->user_id = 1;
            $post->title = '便利なurl'.$i;
            $post->content = 'phpのコードが確認できます';
            $post->save();
        }
    }
}
