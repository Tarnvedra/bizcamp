<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

   public function test_a_user_can_create_a_project()
   {
       $this->actingAs(User::factory()->create());
       $attributes = [
               'title' => $this->faker->title,
               'description' => $this->faker->sentence,

           ];

       $this->post('/project/store', $attributes);

       $this->assertDatabaseHas('projects', $attributes);

   }

   public function test_a_project_requires_a_title()
   {

       $attributes = Project::factory()->raw(['title' => '']);
       $this->post('/project/store', $attributes)->assertSessionHasErrors('title');
   }

    public function test_a_project_requires_a_description()
    {
        $this->actingAs(User::factory()->create());
        $attributes = Project::factory()->raw(['description' => '']);
        $this->post('/project/store', $attributes)->assertSessionHasErrors('description');
    }

    public function test_project_creation_requires_a_user_to_create_and_are_authenticated()
    {
        $attributes = Project::factory()->raw();
        $this->post('/project/store', $attributes)->assertRedirect('login');
    }


    public function test_project_model_has_path()
    {
        $project = Project::factory()->create();

        $this->assertEquals('/project/'. $project->id, $project->path());
    }
}
