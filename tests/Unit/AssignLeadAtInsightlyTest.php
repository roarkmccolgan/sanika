<?php

namespace Tests\Unit;

use App\Events\LeadGenerated;
use App\Listeners\AssignLeadAtInsightly;
use App\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use RuntimeException;
use Tests\TestCase;

class AssignLeadAtInsightlyTest extends TestCase
{
    public function test_it_uses_cached_config_and_normalizes_an_endpoint_without_a_scheme(): void
    {
        config()->set('services.insightly.endpoint', 'api.na1.insightly.com/v3.1');
        config()->set('services.insightly.key', 'secret-key');

        $history = [];
        $stack = HandlerStack::create(new MockHandler([new Response(201)]));
        $stack->push(Middleware::history($history));
        $listener = new AssignLeadAtInsightly(new Client(['handler' => $stack]));

        $listener->handle($this->event());

        $this->assertCount(1, $history);
        $request = $history[0]['request'];
        $this->assertSame('https://api.na1.insightly.com/v3.1/Leads', (string) $request->getUri());
        $this->assertSame('Basic '.base64_encode('secret-key:'), $request->getHeaderLine('Authorization'));
    }

    public function test_it_reports_a_clear_error_when_the_endpoint_is_missing(): void
    {
        config()->set('services.insightly.endpoint');
        config()->set('services.insightly.key', 'secret-key');

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('INSIGHTLY_API_ENDPOINT is not configured.');

        (new AssignLeadAtInsightly(new Client))->handle($this->event());
    }

    private function event(): LeadGenerated
    {
        $product = new Product;
        $product->insightly = [
            'LEAD_SOURCE_ID' => 123,
            'OWNER_USER_ID' => 456,
        ];

        return new LeadGenerated($product, 'Ada', 'Lovelace', 'ada@example.com', '0123456789');
    }
}
