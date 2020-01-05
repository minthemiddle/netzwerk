<?php

namespace Tests\Feature\Http\Controllers;

use App\Contact;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_list_of_notes_for_contact()
    {
        $this->withoutExceptionHandling();
        $contact = factory(Contact::class)->create();
        $note = factory(Note::class)->create();

        $response = $this->get(route('contact.show', $contact));
        $response->assertSee(e($note->body));
    }

    /** @test */
    public function guest_cannot_see_list_of_notes_for_contact()
    {
        $contact = factory(Contact::class)->create();
        $note = factory(Note::class)->create();

        $response = $this->get(route('contact.show', $contact));
        $response->assertDontSee(e($note->body));
        $response->assertRedirect();
    }
}
