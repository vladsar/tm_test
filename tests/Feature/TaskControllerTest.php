<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use WithFaker;

    /**
     * A basic create test.
     */
    public function test_it_can_create_task()
    {
        $data = [
            'title'        => $this->faker->sentence,
            'description'  => $this->faker->paragraph,
            'is_completed' => $this->faker->boolean,
        ];

        $this->post(action('App\Http\Controllers\Api\TaskController@store'), $data)
            ->assertStatus(Response::HTTP_CREATED);
    }

    public function test_it_can_update_task()
    {
        $task = Task::factory()->create();

        $data = [
            'title'        => $this->faker->sentence,
            'description'  => $this->faker->paragraph,
            'is_completed' => $this->faker->boolean,
        ];

        $this->put(action('App\Http\Controllers\Api\TaskController@update', $task), $data)
            ->assertStatus(Response::HTTP_OK);
    }

    public function test_it_can_delete_task()
    {
        $task = Task::factory()->create();

        $this->delete(action('App\Http\Controllers\Api\TaskController@destroy', $task))
            ->assertStatus(Response::HTTP_OK);
    }
}
