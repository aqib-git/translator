<?php

namespace App\Services;

use App\Services\Contracts\TranslateClientContract;
use Google\Cloud\Translate\TranslateClient;
use Log;

class TranslateClientService implements TranslateClientContract
{
    /**
     * Google translator.
     *
     * @var TranslateClient
     */
    protected $translator;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->translator = new TranslateClient([
            'key' => config('translator.google_api_key'),
        ]);
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
        $error = [
            'success' => false,
            'error' => 'Something went wrong, please try again.',
        ];

        try {
            $result = $this->translator->translate($text, [
                'target' => $target,
            ]);

            if (empty($result)) {
                return $error;
            }

            return [
                'success' => true,
                'translation' => $result['text'],
            ];
        } catch (\Exception $e) {
            return $error;
        }
    }
}
