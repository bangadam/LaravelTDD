<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;
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

    public function test_a_user_can_create_post() {
        $this->withoutExceptionHandling();
        // create guest
        $guest = factory('App\User')->create();
        // guest become user
        $user = $this->be($guest);
        // create Post
        $post = factory('App\Post')->make();
        // user create post
        $this->post('/post',$post->toArray());
        // saat user visit
        $response = $this->get('/blog/'.$post->id);
        // saat User melihat user
        $response->assertSee($post->title);
    }

    public function test_a_guest_can_not_create_post() {
        $this->withoutExceptionHandling();
        // expect thrown exception
        $this->expectException('Illuminate\Auth\AuthenticationException');
        // given guest
        $guest = factory('App\User')->create();
        // given post object
        $post = factory('App\Post')->make();
        // when the usesr create post
        $this->post('/post', $post->toArray());
    }

    public function test_a_guest_can_not_access_create_post_page() {
        $this->get('/create')
             ->assertRedirect('/login');
    }
}
