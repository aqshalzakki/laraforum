<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Discussion;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DiscussionsTest extends TestCase
{
    use RefreshDatabase,
        WithFaker;

    /**
     * A basic feature @test example.
     *
     * @return void
     */
    public function users_can_retrieve_list_of_discussions()
    {
        $response = $this->get(route('discussions.index'));

        $discussions = Discussion::all();
        $response->assertViewHas('discussions', $discussions);
    }

    /** @test */
    public function user_can_create_new_discussion()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->makeUser());

        $response = $this->post(route('discussions.store'), [
            'category_id' => $this->makeCategory()->id,
            'title' => $this->faker()->text(100),
            'body'  => $this->faker()->realText(100),
        ]);
        
        $this->assertCount(1, Discussion::all());
        $response->assertRedirect(route('discussions.index'));
    }

    /** @test */
    public function users_can_see_specific_discussion()
    {
        $discussion = Discussion::create([
            'user_id' => $this->makeUser()->id,
            'category_id' => $this->makeCategory()->id,
            'title' => 'Cool Discussion',
            'body' => 'how to do that guys?'
        ]);

        $response = $this->get(route('discussions.show', [
            $discussion->id, $discussion->slug
        ]));
        
        $response->assertViewHas('discussion', $discussion);
        $response->assertSeeText("discussed by {$discussion->user->name}");
    }



    private function makeUser(array $customAttributes = [])
    {
        return factory(User::class)
            ->create($customAttributes);
    }

    private function makeCategory(array $customAttributes = [])
    {
        return factory(Category::class)
            ->create($customAttributes);
    }
}
