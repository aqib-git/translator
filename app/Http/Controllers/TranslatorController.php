<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\TranslatorService;

class TranslatorController extends Controller
{
    /**
     * Translator service instance
     *
     * @var TranslatorService
     */
    private $translatorService;

    /**
     * Constructor.
     *
     * @param TranslatorService $translatorService
     */
    public function __construct(TranslatorService $translatorService)
    {
        $this->translatorService = $translatorService;
    }

    /**
     * Translate string.
     *
     * @param string $text Text to be translated.
     * @param string $target Target language.
     * @return JsonResponse
     */
    public function translate(string $text, string $target = null) : JsonResponse
    {
        if (is_null($target)) {
            $target = config('translator.translator_target_language');
        }

        $result = $this->translatorService->translate($text, $target);

        return response()->json($result);
    }
}
