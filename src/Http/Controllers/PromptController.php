<?php

namespace Mastashake\LaravelOpenaiApi\Http\Controllers;
use Illuminate\Http\Request;
use Mastashake\LaravelOpenaiApi\LaravelOpenaiApi;
class PromptController extends Controller
{
    //
    function generateResult(Request $request) {

      $ai = new LaravelOpenaiApi();
      $prompt = $ai->generateResult($request->type, $request->except(['type']));
      return response()->json([
        'data' => $prompt
      ]);
    }
}
