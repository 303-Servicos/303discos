<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;

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

function fileUpload(UploadedFile $file, string $path, string $filename = null, string $disk = 'public'): string
{
    if (!$filename) {
        $filename = substr($file->getClientOriginalName(), 0, strrpos($file->getClientOriginalName(), '.'));
    }

    $filename = generateSlug($filename) . '.' . $file->getClientOriginalExtension();

    $file->storeAs($path, $filename, $disk);

    return $filename;
}
