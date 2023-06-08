<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/clear', function() {
    Artisan::call('optimize:clear');
    return redirect()->back()->with("successc","cache clear successfully");
});

Auth::routes();
route::get('/',[BaseController::class,'index']);
route::get('/signin',[BaseController::class,'signin']);
Route::post('/custom-login',[BaseController::class,'custom_login']);
// Login Check Middleware Start
Route::middleware(['logincheck'])->group(function () {


// USER Admin Middleware Code Start
Route::middleware(['isadmin'])->group(function () {
Route::post("/newvisitor",[BaseController::class, 'newvisitor'])->name("front.newvisitor");
Route::post('/search-visitor', [BaseController::class, 'searchuser'])->name("front.search-visitor");
Route::get('/visitor-result', [BaseController::class, 'visitorresult'])->name("visitorresulti");
Route::get('newvisitor',[BaseController::class,"newregister"]);
Route::post("/uservisitsave",[BaseController::class, "uservisitsave"])->name("front.uservisitsave");
Route::get('/current-guest',[AdminController::class, "current_guest"]);
Route::get ('visitor-out/{id}',[AdminController::class,"visitor_out"])->name('visitorexit');
});
// USER Admin Middleware Routes Ends


//MODERATOR MIDDLEWARE CODE START
Route::middleware(['moderator'])->group(function () {
Route::get('/addvisitor',[AdminController::class,"addvisitor"])->name("admin.addvisitor");
Route::post('/entervisitor',[AdminController::class, 'addvisitordata'])->name("admin.entervisitor");
Route::get('/upload-excel',[AdminController::class, 'excel_upload'])->name('admin.excel');
Route::post('/excel-input',[AdminController::class,'excel_input'])->name('admin.excel_input');
});
//MODERATOR MIDDLEWARE CODE END


// SUPER ADMIN MIDDLEWARE CODE START
Route::middleware(['superadmin'])->group(function () {
Route::get('/all-visitors',[AdminController::class,'all_visitor']);
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/visit-history',[AdminController::class, "visit_history"]);
Route::get('uservisitdetail/{id}/{cnic}',[AdminController::class, "uservisitdetail"]);
Route::get('visitor-delete/{id}',[AdminController::class,'visitordelete']);
Route::get('edit-visitor/{id}',[AdminController::class,'editvisitor']);
Route::post('visitoreditsave',[AdminController::class,'visitoreditsave']);
Route::get('/user-details/{id}',[AdminController::class,'user_details']);
});
// SUPER ADMIN MIDDLEWARE CODE END


});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// LoginCheck Middleware Ends
