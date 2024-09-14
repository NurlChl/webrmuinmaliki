<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AspirationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberCategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\RuleCategoryController;
use App\Http\Controllers\RuleController;
use App\Http\Middleware\HasRoleAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('members', [MemberController::class, 'index'])->name('members.index');
Route::get('rules', [RuleController::class, 'index'])->name('rules.index');
Route::get('abouts', [AboutController::class, 'index'])->name('abouts.index');
Route::get('extracurriculars', [ExtracurricularController::class, 'index'])->name('extracurriculars.index');

Route::resource('aspirations', AspirationController::class)->except('index', 'show');
Route::resource('recommendations', RecommendationController::class)->except('index', 'show');
Route::resource('comments', CommentController::class)->only(['store', 'destroy']);


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('verified')->group(function () {

        Route::middleware(HasRoleAdminMiddleware::class)->group(function () {
            Route::get('/dashboard', DashboardController::class)->name('dashboard');

            Route::resource('posts', PostController::class)->except(['index', 'show']);
            Route::resource('members', MemberController::class)->except(['index', 'show']);
            Route::resource('rules', RuleController::class)->except(['index', 'show']);
            Route::resource('galleries', GalleryController::class)->except(['index', 'show']);
            Route::resource('faculties', FacultyController::class)->except(['show']);
            Route::resource('member_categories', MemberCategoryController::class)->except(['show']);
            Route::resource('rule_categories', RuleCategoryController::class)->except(['show']);
            Route::resource('abouts', AboutController::class)->except(['index', 'show']);
            Route::resource('extracurriculars', ExtracurricularController::class)->except(['index', 'show']);

            Route::delete('bulk-delete/posts', [PostController::class, 'bulkDelete'])->name('posts.bulkDelete');
            Route::delete('bulk-delete/members', [MemberController::class, 'bulkDelete'])->name('members.bulkDelete');
            Route::delete('bulk-delete/rules', [RuleController::class, 'bulkDelete'])->name('rules.bulkDelete');

            Route::get('aspirations', [AspirationController::class, 'index'])->name('aspirations.index');
            Route::get('recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');
            Route::get('galleries', [GalleryController::class, 'index'])->name('galleries.index');

            Route::get('dashboard/posts', [PostController::class, 'dashboard'])->name('posts.dashboard');
            Route::get('dashboard/rules', [RuleController::class, 'dashboard'])->name('rules.dashboard');
            Route::get('dashboard/members', [MemberController::class, 'dashboard'])->name('members.dashboard');
            Route::get('dashboard/abouts', [AboutController::class, 'dashboard'])->name('abouts.dashboard');
            Route::get('dashboard/extracurriculars', [ExtracurricularController::class, 'dashboard'])->name('extracurriculars.dashboard');
            
            Route::get('dashboard/members?category={category:slug}', [MemberController::class, 'category'])->name('members.dashboardCategory');
            Route::get('dashboard/posts?category={category:slug}', [PostController::class, 'category'])->name('posts.dashboardCategory');
        });
    });



    
});


Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts?category={category:slug}', [PostController::class, 'category'])->name('posts.category');
Route::get('members?category={category:slug}', [MemberController::class, 'category'])->name('members.category');


require __DIR__ . '/auth.php';
