<?php

namespace App\Services;

use Google\Cloud\Translate\TranslateClient;
use App\Services\Contracts\TranslateClientContract;
use Log;

class TranslatorService
{
    /**
     * Translate service.
     *
     * @var TranslateClientContract
     */
    protected $translateClientService;

    /**
     * Constructor.
     */
    public function __construct(TranslateClientContract $translateClientService)
    {
        $this->translateClientService = $translateClientService;
    }

    /**
     * Translate string.
     *
     * @param string $text Text to be translated.
     * @param string $target Target Language.
     * @return array
     */
    public function translate(string $text, string $target) : array
    {
        return $this->translateClientService->translate($text, $target);
    }
}
