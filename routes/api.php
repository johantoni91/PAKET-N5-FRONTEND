<?php

use App\Http\Controllers\API\KartuController;
use App\Http\Controllers\API\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/nfc', function (Request $request) {
    $uid = $request->input('uid');
    // Process the UID, e.g., store it in the database
    return response()->json(['success' => true, 'uid' => $uid]);
});
