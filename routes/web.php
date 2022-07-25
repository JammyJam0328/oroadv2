<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OauthController;
use App\Http\Controllers\Registrar\DashboardController;
use App\Http\Controllers\Registrar\RequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        switch ($role) {
            case 'admin':
            //    return view('admin.dashboard');
            break;
            case 'registrar':
            return redirect()->route('registrar.dashboard');
            break;
            case 'requestor':
            return redirect()->route('requestor.home');
            break;
     
       }
    })->name('dashboard');
});

// admin
Route::prefix('admin')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {
   
});
// registrar
Route::prefix('/0.1/registrar')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registrar'
])->group(function () {
    Route::get('/dashboard',\App\Http\Livewire\Pages\Registrar\Dashboard::class)->name('registrar.dashboard');
    Route::get('/request/pending',\App\Http\Livewire\Pages\Registrar\Pending::class)->name('registrar.pending-request');
    Route::get('/request/approved',\App\Http\Livewire\Pages\Registrar\Approved::class)->name('registrar.approved-request');
    Route::get('/request/payment-to-review',\App\Http\Livewire\Pages\Registrar\PaymentToReview::class)->name('registrar.payment-to-review');
    Route::get('/request/to-claim',\App\Http\Livewire\Pages\Registrar\ReadyToClaim::class)->name('registrar.to-claim');
    Route::get('/request/claimed',\App\Http\Livewire\Pages\Registrar\Claimed::class)->name('registrar.claimed');
    Route::get('/request/denied',\App\Http\Livewire\Pages\Registrar\Denied::class)->name('registrar.denied');
    Route::get('/request/documents',\App\Http\Livewire\Registrar\Documents::class)->name('registrar.documents');
    Route::get('/request/{id}/{action}/details',\App\Http\Livewire\Pages\Registrar\ViewRequest::class)->name('registrar.request.details');
    Route::get('/manage/campus/documents',\App\Http\Livewire\Pages\Registrar\ManageDocuments::class)->name('registrar.manage.campus.documents');
    Route::get('/reports',\App\Http\Livewire\Pages\Registrar\Reports::class)->name('registrar.reports');
    Route::get('/graphs',\App\Http\Livewire\Pages\Registrar\Graphs::class)->name('registrar.graphs');
    Route::get('/manage-users',\App\Http\Livewire\Pages\Registrar\ManageUsers::class)->name('registrar.manage-users');

    // 

});

Route::prefix('/0.2/registrar')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registrar'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('registrar.v2-dashboard');
    Route::get('/requests',[RequestController::class,'index'])->name('registrar.v2-requests');
    Route::get('/request/{id}/view',[RequestController::class,'view'])->name('registrar.v2-request.view');
    // 

});
// requestor
Route::prefix('requestor')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'requestor'
])->group(function () {
    Route::get('/home',\App\Http\Livewire\Requestor\Home::class)->name('requestor.home');
    Route::get('/request/{id}/finalize',\App\Http\Livewire\Requestor\FinalizeRequest::class)->name('requestor.finalize-request');
    Route::get('/view/request/{id}/details',\App\Http\Livewire\Requestor\ViewRequest::class)->name('requestor.view-request');
    Route::get('/update-information',\App\Http\Livewire\Requestor\UpdateInformation::class)->name('requestor.update-information');
});

Route::get('/set-up-information',\App\Http\Livewire\Requestor\SetUpInformation::class)->name('requestor.set-up-information')->middleware(['auth:sanctum']);

// google oauth
Route::get('auth/google', [OauthController::class, 'redirectGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [OauthController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [OauthController::class, 'facebookRedirect'])->name('facebook.redirect');
Route::get('auth/facebook/callback', [OauthController::class, 'handleFacebookCallback']);