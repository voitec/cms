<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'image',
        ]);
        if($request->hasFile('upload')) {
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = Storage::url($request->file('upload')->store('posts_content'));
            $msg = __('Image uploaded successfully');
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
