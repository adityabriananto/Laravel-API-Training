<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comments')->truncate();
 
        Comment::create(array(
            'author'=>'Agung Setiawan',
            'text'=>'The awesomeness of Laravel'
        ));
 
        Comment::create(array(
            'author'=>'Hauril Nisfari',
            'text'=>'PHP coding is fun again'
        ));
 
        Comment::create(array(
            'author'=>'Akhtar',
            'text'=>'Great framework btw'
        ));
    }
}
