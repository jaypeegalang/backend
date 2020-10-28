<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');

})->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    // $request->user()->sendEmailVerificationNotification();
    $user = User::where('email', $request->email)->first();
    $user->sendEmailVerificationNotification();
    return response()->json(['message' => $user]);
});



Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
