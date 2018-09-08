<?php
namespace Test\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

Class CreateCategoryTest extends \Tests\TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_create_category()
    {
        $response = $this->post('/cat', [
            'parentId' => 0,
            'name' => 'Category-name',
            'description' => 'some description'
        ]);

        $this->assertDatabaseHas('category', [
            'name' => 'Category-name'
        ]);

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('cat'));

        $this->get('/cat')->assertSee('Category-name');
    }

    /** @test */
    public function not_create_if_invalid_data()
    {
        $response = $this->post('/cat', ['parentId', 'name', 'description']);
        $response->assertSessionHasErrors(['parentId']);
    }

    /** @test */
    public function not_create_if_wrong_type_data()
    {
        $response = $this->post('/cat', [
            'parentId' => 'string',
            'name' => 3,
            'description' => 3
        ]);

        $response->assertSessionHasErrors(['parentId', 'name', 'description']);
    }
}
