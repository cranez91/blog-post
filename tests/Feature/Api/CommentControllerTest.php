<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Comment;

class CommentControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_get_list_of_comments()
    {
        Comment::factory()->count(5)->create(); // Creates 5 comments for testing

        $response = $this->getJson('/api/comments');

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => [['id', 'owner', 'content', 'replies']]]); // Make sure the comments have the expected strucutre
    }

    public function test_can_create_comment()
    {
        $commentData = [
            'owner' => 'John Doe',
            'content' => 'This is a test comment',
        ];

        $response = $this->postJson('/api/comments', $commentData);

        $response->assertStatus(200)
        ->assertJsonStructure(['data' => [['id', 'owner', 'content', 'replies']]]); // Make sure the comment has the expected strucutre
    }
}
