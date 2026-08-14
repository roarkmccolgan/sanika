<?php

namespace Tests\Feature;

use App\Notifications\EnquirySent;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_it_uses_the_configured_contact_recipient(): void
    {
        Notification::fake();
        $this->withoutMiddleware(PreventRequestForgery::class);
        config()->set('mail.contact.to', 'website@example.com');

        $this->postJson('/contact', [
            'fullname' => 'Ada Lovelace',
            'email' => 'ada@example.com',
            'telephone' => '0123456789',
            'subject' => 'Waterproofing enquiry',
            'message' => 'Please contact me.',
        ])->assertOk()->assertJson(['result' => 'success']);

        Notification::assertSentOnDemand(
            EnquirySent::class,
            fn ($notification, $channels, $notifiable) => $notifiable->routes['mail'] === 'website@example.com'
        );
    }
}
