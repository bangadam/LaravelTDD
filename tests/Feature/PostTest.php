<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_guest_can_access_blog_index() {
        // Membuat data faker pada post
        $post = factory('App\Post')->create();
        // user mengakses blog
        $response = $this->get('/blog');
        // lalu user melihat judul post yang telah dibuat
        $response->assertSee($post->title);
    }

    public function test_a_guest_can_see_single_post() {
        // Membuatdata faker pada post
        $post = factory('App\Post')->create();
        // user mengakses blog/{id}
        $response = $this->get('/blog/'.$post->id);
        // user melihat judul
        $response->assertSee($post->title);
    }

    public function test_a_guest_can_see_comment_when_visit_single_post() {
        // membuat data post
        $post = factory('App\Post')->create();
        // post yang memiliki komen
        $comment = factory('App\Comment')->create(['post_id'=>$post->id]);
        // user saat masuk halaman single post
        $response = $this->get('/blog/'.$post->id);
        // lalu melihat komen
        $response->assertSee($comment->body);
    }
}
