<?php

namespace Tests\Feature\Http\Controllers;

use App\Note;
use App\User;
use App\Contact;
use Tests\TestCase;
use App\Enums\NoteType;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NoteControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function user_can_add_note_to_contact()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $contact = factory(Contact::class)->create();

        $this->actingAs($user)->post(route('note.store', $this->noteData($contact)));
        $this->assertEquals(1, $contact->notes()->count());
        $this->assertDatabaseHas('notes', $this->noteData($contact));
    }

    public function noteData($contact) {
        return [
            'contact_id' => $contact->id,
            'type' => NoteType::Interaction,
            'body' => 'Some funky content',
        ];
    }
}
