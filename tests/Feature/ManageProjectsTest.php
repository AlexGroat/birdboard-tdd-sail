<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_user_can_create_project()
    {
        $this->withoutExceptionHandling();
        
        $attributes = [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph()
        ];

        /* if i make a post request to the projects endpoint and I
           and I send the necessary data, I assert that I should
           see it in the database and see it in the brower */
        $this->post('/projects', $attributes);

        /* assert the database has a projects table, which includes
           the attributes sent in the post request  */
        $this->assertDatabaseHas('projects', $attributes);
    }
}
