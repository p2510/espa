<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\ImpactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\InterestedController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\CategoryBlogController;

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

Route::get('/', [HomeController::class, '__invoke'])->name('home');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('course.details');
Route::get('/course/{res}', [CourseController::class, 'showByName'])->name('course.byname');
Route::get('/courses', [CourseController::class, 'index'])->name('course.index');
Route::get('/cycle', [DegreeController::class, 'index'])->name('degree.index');
Route::get('/cycle/{res}', [DegreeController::class, 'show'])->name('degree.show');
Route::post('/interested/{id}', [InterestedController::class, '__invoke'])->name('interested');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/post', [ContactController::class, 'store'])->name('contact.store');
Route::resource('/blog', BlogController::class);
Route::get('/categories-blog/{id}', [CategoryBlogController::class, '__invoke'])->name('categoryblog.show');
Route::get('/evenement', [EvenementController::class, 'index'])->name('evenement.index');
Route::get('/evenement/{id}', [EvenementController::class, 'show'])->name('evenement.show');
Route::post('/evenement/{id}', [EvenementController::class, 'signIn'])->name('evenement.signin');
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');


Route::get('/about', [AboutController::class, '__invoke'])->name('about.index');
Route::get('/responsable', [ResponsableController::class, '__invoke'])->name('responsable.index');
Route::get('/responsable', [ResponsableController::class, '__invoke'])->name('responsable.index');
Route::get('/media', [MediaController::class, '__invoke'])->name('media.index');

// static 

Route::get('/recherche', [SearchController::class, '__invoke'])->name('search.index');
Route::get('/centre-excellence', [CenterController::class, '__invoke'])->name('center.index');
Route::get('/ferme-experiementale', [ExperienceController::class, '__invoke'])->name('experience.index');
Route::get('/impact-cluster', [ImpactController::class, '__invoke'])->name('impact.index');
Route::get('/agri-business', [BusinessController::class, '__invoke'])->name('business.index');