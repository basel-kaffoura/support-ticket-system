<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendTicketTest extends TestCase
{
    use WithFaker;

    /**
     * Test sending a support ticket to the correct database.
     */
    public function test_can_send_ticket_to_correct_database()
    {
        // Fake request data
        $formData = [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'ticket_type' => 'technical',
            'subject' => $this->faker->sentence(5),
            'description' => $this->faker->sentence(10),
        ];

        // Send POST request
        $response = $this->post('/tickets/store', $formData);

        // Assert redirection after submit
        $response->assertRedirect();

        // Assert the ticket is stored in the correct database
        $this->assertDatabaseHas('tickets', [
            'name' => $formData['name'],
            'email' => $formData['email'],
            'ticket_type' => $formData['ticket_type'],
            'subject' => $formData['subject'],
            'description' => $formData['description'],
        ], 'technical');
    }
}
