<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    // use RefreshDatabase;

    public function test_comment_should_has_creator() {
        // buat object comment
        $comment = factory('App\Comment')->create();
        // include user object
        $this->assertInstanceOf('App\User', $comment->creator);
    }
}
