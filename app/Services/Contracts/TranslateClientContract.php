<?php

namespace App\Services\Contracts;

interface TranslateClientContract
{
    public function translate(string $text, string $target): array;
}
