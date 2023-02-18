<?php

namespace Mastashake\LaravelOpenaiApi\Http\Controllers;
use Illuminate\Http\Request;
use Mastashake\LaravelOpenaiApi\LaravelOpenaiApi;
class PromptController extends Controller
{
    //
    function generateResult(Request $request) {

      $ai = new LaravelOpenaiApi();
      $prompt = $ai->generate($request->type, $request->all());
      return response()->json($prompt);
    }
}
