<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait HandleFile
{
    public function uploadFile($file, $path): string
    {
        $filename = time() . '.' . $file->extension();
        $file->move(public_path($path), $filename);

        return $filename;
    }

    public function deleteFile($path): void
    {
        File::delete(public_path($path));
    }
}
