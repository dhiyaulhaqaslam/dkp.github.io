<?php

use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LongwisController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\SocialMediaController;

Route::get('/register', function () {
    abort(404); // Menampilkan halaman 404
})->name('register');

Route::resource('program', ProgramController::class);

Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');
Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('informasi', InformasiController::class)->except(['show']);
    Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
    Route::get('/preference', [PreferenceController::class, 'index'])->name('preference.index');
    Route::post('/preference', [PreferenceController::class, 'store'])->name('preference.store');
    Route::post('/preference/update', [PreferenceController::class, 'updatePreference'])->name('preference.update');
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');
    Route::get('/attendance/list', [AttendanceController::class, 'listPerHari'])->name('attendance.list');
    Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
    Route::get('/chatbot/create', [ChatbotController::class, 'create'])->name('chatbot.create');
    Route::post('/chatbot', [ChatbotController::class, 'store'])->name('chatbot.store');
    Route::get('/chatbot/{id}/edit', [ChatbotController::class, 'edit'])->name('chatbot.edit');
    Route::put('/chatbot/{id}', [ChatbotController::class, 'update'])->name('chatbot.update');
    Route::delete('/chatbot/{id}', [ChatbotController::class, 'destroy'])->name('chatbot.destroy');
    Route::get('priority', [PriorityController::class, 'index'])->name('priority.index');
    Route::get('priority/create', [PriorityController::class, 'create'])->name('priority.create');
    Route::post('priority', [PriorityController::class, 'store'])->name('priority.store');
    Route::get('priority/{id}/edit', [PriorityController::class, 'edit'])->name('priority.edit');
    Route::put('priority/{id}', [PriorityController::class, 'update'])->name('priority.update');
    Route::delete('priority/{id}', [PriorityController::class, 'destroy'])->name('priority.destroy');
    Route::get('/social-media', [SocialMediaController::class, 'edit'])->name('social_media.edit');
    Route::put('/social-media', [SocialMediaController::class, 'update'])->name('social_media.update');
    Route::put('/preference/update-social-media', [PreferenceController::class, 'updateSocialMedia'])->name('preference.update-social-media');
});

// ==============================================CHATBOT==============================================
Route::get('/chatbot/ask', [ChatbotController::class, 'ask'])->name('chatbot.ask');
Route::post('/chatbot/chat', [ChatbotController::class, 'chat'])->name('chatbot.chat');
Route::post('/chatbot/bulk-delete', [ChatbotController::class, 'bulkDelete'])->name('chatbot.bulk-delete');

// ===============================================NAVBAR===============================================

Route::get('/about', [InformasiController::class, 'about'])->name('about.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store')
    ->middleware('throttle:3,1'); // Maks 3 kiriman per menit per IP
Route::get('/feedbacks', [ContactController::class, 'showFeedbacks'])->name('feedbacks.index');


Route::resource('article', ArticleController::class)->except(['show']);
Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::resource('longwis', LongwisController::class);
Route::get('/longwis/{id}/download-pdf', [LongwisController::class, 'downloadPdf'])->name('longwis.download.pdf');
Route::resource('projects', ProjectController::class);


Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/set-theme', function (Request $request) {
    $theme = $request->input('theme', 'light');
    session(['theme' => $theme]);
    return redirect()->back();
});

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::ResetLinkSent
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PasswordReset
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');


require __DIR__ . '/auth.php';
