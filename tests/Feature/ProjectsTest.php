<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker;

   public function test_a_user_can_create_a_project()
   {
       $this->withoutExceptionHandling();

       $user = User::factory()->create();

       $attributes = [
               'title' => $this->faker->title,
               'description' => $this->faker->paragraph,
               'user_id' =>  1
           ];



       $this->post('/project', $attributes);

       $this->assertDatabaseHas('projects', $attributes);

       $this->get('/project')->assertSee($attributes);
   }

   public function test_a_project_requires_a_title()
   {
       $attributes = Project::factory()->raw(['title' => '']);
       $this->post('/project', $attributes)->assertSessionHasErrors('title');
   }

    public function test_a_project_requires_a_description()
    {
        $attributes = Project::factory()->raw(['description' => '']);
        $this->post('/project', [])->assertSessionHasErrors('description');
    }
}
