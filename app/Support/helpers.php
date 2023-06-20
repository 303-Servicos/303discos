<?php

use App\Models\User;

function user(): ?User
{
    if (auth()->check()) {
        return auth()->user();
    }

    return null;
}

/**
 * @param array<string> $dictionary
 */
function generateSlug(string $string, string $language = 'pt_BR', array $dictionary = ['.' => '-']): string
{
    return Str::slug($string, language: $language, dictionary: $dictionary);
}
