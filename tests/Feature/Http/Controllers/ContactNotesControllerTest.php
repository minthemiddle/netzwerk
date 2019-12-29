<?php

namespace Tests\Feature\Http\Controllers;

use App\Contact;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactNotesControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function user_can_add_note_to_contact()
    {
        $user = factory(User::class)->create();
        $contact = factory(Contact::class)->create();

        $this->actingAs($user)->get(route('contact.note.store', $this->noteData($contact)));
        $this->assertDatabaseHas('notes', $this->noteData($contact));
    }

    public function noteData($contact) {
        return [
            'contact_id' => $contact,
            'type' => NoteType::Contact,
            'text' => $this->faker->sentence,
        ];
    }
}
