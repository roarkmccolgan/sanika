<?php

namespace Tests\Feature;

use App\Notifications\EnquirySent;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\Mailer\Bridge\Postmark\Transport\PostmarkApiTransport;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_the_postmark_transport_can_be_created(): void
    {
        config()->set('services.postmark.token', 'test-server-token');

        $transport = app('mail.manager')->mailer('postmark')->getSymfonyTransport();

        $this->assertInstanceOf(PostmarkApiTransport::class, $transport);
    }

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
