<?php

namespace Juiko\PhosphorIcon;

use Juiko\PhosphorIcon\Models\PhosphorIcon;
use Illuminate\Support\Facades\File;

class PhosphorIconConsole
{
    public function import()
    {
        $files = File::files(__DIR__.'/../database/imports');

        foreach ($files as $file) {
            if (strtolower($file->getExtension()) === 'json') {
                $fileNameWithoutExtension = $file->getBasename('.' . $file->getExtension());
                $fileContent = File::get($file);

                PhosphorIcon::create([
                    'icon_name' => $fileNameWithoutExtension,
                    'icon_defs' => $fileContent,
                ]);
            }
        }
    }
}
