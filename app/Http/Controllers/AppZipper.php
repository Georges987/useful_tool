<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;

class AppZipper extends Controller
{
    public function cypher()
    {
        $zip = new ZipArchive;
        $zipFileName = 'sample.zip';

        if ($zip->open(public_path($zipFileName), ZipArchive::CREATE) === TRUE) {
            $filesToZip = [
                public_path('file1.txt'),
                public_path('file2.txt'),
            ];

            foreach ($filesToZip as $file) {
                $zip->addFile($file, basename($file));
            }

            $zip->close();

            return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
        } else {
            return "Failed to create the zip file.";
        }
    }
}
