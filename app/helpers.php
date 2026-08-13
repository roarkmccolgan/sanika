<?php

use Illuminate\Support\Number;

if (! function_exists('zar')) {
    function zar(int|float|string|null $cents): string
    {
        return Number::currency(((float) $cents) / 100, in: 'ZAR', locale: 'en_ZA');
    }
}
