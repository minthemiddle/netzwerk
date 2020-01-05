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

    /** @test */
    public function user_can_show_edit_note_view()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $contact = factory(Contact::class)->create();
        $note = factory(Note::class)->create([
            'contact_id' => $contact->id,
        ]);

        $response = $this->actingAs($user)->get(route('note.edit', $note->id));
        $response->assertViewIs('note.edit');
        $response->assertSee($note->body);
    }

    /** @test */
    public function user_can_update_note()
    {
        $user = factory(User::class)->create();
        $contact = factory(Contact::class)->create();
        $note = factory(Note::class)->create([
            'contact_id' => $contact->id,
        ]);

        $response = $this->actingAs($user)->patch(route('note.update', $note->id), array_merge($this->noteData($contact), [
            'body' => 'Updated body',
        ]));
        $response->assertRedirect();
        $this->assertDatabaseHas('notes', [
            'id' => $note->id,
            'body' => 'Updated body',
        ]);
    }

    public function noteData($contact) {
        return [
            'contact_id' => $contact->id,
            'type' => NoteType::Interaction,
            'body' => 'Some funky content',
        ];
    }
}
