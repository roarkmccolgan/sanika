<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_currency_values_are_stored_as_cents(): void
    {
        $this->assertSame('R 5 483,00', zar(548300));
    }
}
