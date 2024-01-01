<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function certificate()
    {
        return view('certificate_view');
    }

    public function certificateSearch(Request $request)
    {

        $request->validate([
            'query_param'  => 'required',
        ], [
            'query_param' => 'Enter your roll number or full name.'
        ]);

        $partialFileName = Str::snake(Str::lower($request->query_param));

        $folder = 'Certificates';

        $storage = app('firebase.storage');
        $defaultBucket = $storage->getBucket();
        $objects = $defaultBucket->objects(['prefix' => $folder]);
        $certificateFiles = [];

        foreach ($objects as $key=> $object) {
            // Check if the file name contains the partialFileName
            if (strpos($object->name(), $partialFileName) !== false) {
                // Found a matching file, you can return the URL or do other actions
                $certificateFiles[$key]['certificate'] = $object->signedUrl(new \DateTime('2030-01-01T00:00:00Z'));
                $certificateFiles[$key]['name']        = explode('/',$object->name())[1];
            }
        }
        // return $certificateFiles;
        return view('certificate_view')->with('certificateFiles', $certificateFiles);
    }
}
