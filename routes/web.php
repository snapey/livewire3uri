<?php

use App\Models\Region;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TalksController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FiltersController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SpeakerNewsController;
use App\Http\Controllers\Admin\PhotosController;
use App\Http\Controllers\SpeakerAdminController;
use App\Http\Controllers\SpeakerLoginController;
use App\Http\Controllers\SpeakerAffirmController;
use App\Http\Controllers\DonationsReceiptController;
use App\Http\Controllers\Admin\ImpersonateController;

Route::get('/test', function(){

    $regions = Region::where('childOf',0)->with('children.children')->get();

    return view ('guest.test')->withRegions('regions');
} );

Route::get('/', [WelcomeController::class, 'home']);
Route::get('pages/privacy', [WelcomeController::class, 'privacy'])->name('pages.privacy');
Route::get('pages/terms', [WelcomeController::class, 'terms'])->name('pages.terms');
Route::get('pages/speaker', [WelcomeController::class, 'speaker'])->name('pages.speaker');

Route::get('pages/contact', [EnquiriesController::class, 'showContact'])->name('pages.contact');
Route::post('pages/contact', [EnquiriesController::class, 'contact'])->name('pages.contact.post');

Route::view('donations', 'guest.donations')->name('donations');

Route::get('/news',[BlogController::class, 'index'])->name('news');
Route::get('/news/{post}',[BlogController::class, 'show'])->name('news.show');

//Routes for which the user must be logged in
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [SpeakerAdminController::class, 'index'])->name('dashboard');
    Route::get('speaker/exit', [SpeakerAdminController::class, 'exit'])->name('speaker.exit');
    Route::delete('speaker/exit', [SpeakerAdminController::class, 'destroyAsUser'])->name('speaker.destroyAsUser');
    
    Route::group(['middleware' => ['onlyYou']], function () {
        Route::get('speaker/{speaker}/edit', [SpeakerAdminController::class, 'edit'])->name('speaker.profile.edit');
        Route::get('speaker/{speaker}/email/edit', [SpeakerAdminController::class, 'emailEdit']);
        Route::patch('speaker/{speaker}/email/edit', [SpeakerAdminController::class, 'emailUpdate']);
        Route::post('speaker/{speaker}', [SpeakerAdminController::class, 'update'])->name('speaker.edit');

        Route::get('speaker/{speaker}/photo', [PhotoController::class, 'speakerUpload'])->name('speaker.photo.form');
        Route::post('speaker/{speaker}/photo', [PhotoController::class, 'speakerPost'])->name('speaker.photo.post');
        Route::delete('speaker/{speaker}/photo', [PhotoController::class, 'speakerDelete'])->name('speaker.photo.delete');
        Route::get('speaker/{speaker}/photoCrop', [PhotoController::class, 'speakerCrop'])->name('speaker.photo.crop');
        Route::post('speaker/{speaker}/photoCrop', [PhotoController::class, 'speakerFinal'])->name('speaker.photo.final');
        Route::get('speaker/{speaker}/enquiries', [EnquiriesController::class, 'show'])->name('speaker.enquiries');
        
    });
    
    Route::post('talk/store', [TalksController::class, 'store']);
    Route::get('talk/create', [TalksController::class, 'create']);
    Route::get('talk/{talk}/edit', [TalksController::class, 'edit'])->name('talk.edit');
    Route::get('talk/{talk}/preview', [TalksController::class, 'preview']);
    Route::patch('talk/{talk}', [TalksController::class, 'update']);
    Route::patch('talk/{id}/hide', [TalksController::class, 'hide']);
    Route::patch('talk/{id}/restore', [TalksController::class, 'restore']);
    Route::delete('talk/{id}/photo/', [PhotoController::class, 'talkDelete'])->name('talk.photo.delete');
    Route::delete('talk/{id}', [TalksController::class, 'destroy']);
    Route::get('talk/{id}/photoCrop', [PhotoController::class, 'talkCrop'])->name('talk.photo.crop');
    Route::post('talk/{id}/photoCrop', [PhotoController::class, 'talkFinal'])->name('talk.photo.final');

    Route::group(['middleware' => ['admin']], function () {
        // admin routes
        Route::get('admin/photos', [PhotosController::class, 'index'])->name('admin.photos');
        Route::post('admin/impersonate', [ImpersonateController::class, 'store'])->name('admin.impersonate.store');

        Route::delete('user/exit', [SpeakerAdminController::class, 'destroy'])->name('speaker.destroy');
    });

    Route::delete('admin/impersonate', [ImpersonateController::class, 'destroy'])->name('admin.impersonate.destroy');
});

Route::get('talks', [TalksController::class, 'index'])->name('talks.index');
Route::get('talks/category/{category}/{slug?}', [TalksController::class, 'category'])->name('talks.category');
Route::get('talks/tagged/{tag}', [TalksController::class, 'tagged'])->name('talks.tagged');
Route::get('talks/untag', [TalksController::class, 'untag']);
Route::get('talk/{talk}/{slug?}', [TalksController::class, 'show'])->name('talk.show');
Route::post('talk/{id}/enquiry', [TalksController::class, 'enquiry']);

Route::get('map', [MapController::class, 'index']);
Route::get('map/speakers', [MapController::class, 'speakers'])->name('map.getSpeakers');
Route::get('map/speaker/{speaker}', [MapController::class, 'show']);
Route::get('map/speaker/s/{speaker}', [MapController::class, 'showSpecific'])->name('map.showSpecific');
Route::get('map/specific/{speaker}', [MapController::class, 'specific'])->name('map.getSpecificSpeaker');
Route::get('map/untag', [MapController::class, 'untag']);
Route::get('map/recenter', [MapController::class, 'recenter'])->name('map.recenter');

Route::post('filter', [FiltersController::class, 'create'])->name('filter.create');
Route::delete('removefilter/{filter}', [FiltersController::class, 'destroy'])->name('filter.destroy');

Route::get('tagged', [TagController::class, 'index'])->name('tagged');
Route::get('tagged/{category}/{tag}', [TagController::class, 'show'])->name('tagged.show');
Route::get('tagged/{tag}', [TagController::class, 'nocategory'])->name('tagged.nocategory');

// Route::get('/categories','CategoryController@index');

Route::get('search', [SearchController::class, 'index'])->name('search');

Route::get('enquiryfeedback/speaker/{token}', [EnquiriesController::class, 'feedback']);

Route::get('login', [SpeakerLoginController::class, 'login'])->name('login.speaker');
Route::post('logout', [SpeakerLoginController::class, 'logout'])->name('logout');
Route::post('login', [SpeakerLoginController::class, 'register']);
Route::get('login/authenticate/{token}', [SpeakerLoginController::class, 'authenticate']);
Route::get('login/confirmNewAccount', [SpeakerLoginController::class, 'confirm'])->name('newAccount.confirm');
Route::post('login/confirmNewAccount', [SpeakerLoginController::class, 'confirmed'])->name('newAccount.confirmed');

Route::get('speaker/{speaker}/{slug?}', [SpeakerController::class, 'show'])->name('speaker.show');

Route::get('speaker-affirm/{token}', function ($token) {  // retained for people that have emails pending action
    return redirect(route('speaker.affirm.login', $token));
});
Route::get('speaker-affirm-login/{token}', [SpeakerAffirmController::class, 'tokenLoginRequest'])->name('speaker.affirm.login');
Route::post('speaker-affirm/{user}', [SpeakerAffirmController::class, 'affirm'])->name('speaker.affirm.post');

Route::post('newsletter', [NewsletterController::class, 'store'])->name('newsletter');
Route::get('newsletter/block', [NewsletterController::class, 'blocked'])->name('blocked');
Route::post('newsletter/block', [NewsletterController::class, 'blockedResponse'])->name('blocked.post');

Route::post('speakernews', [SpeakerNewsController::class, 'store'])->name('speakernews.store');

Route::post('donations-receipt', [DonationsReceiptController::class, 'create'])->name('donations.receipt');

Route::get('clearbasic', function () {
    auth()->logout();
    abort(401);
});
