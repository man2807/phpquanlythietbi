<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Web\ViewController;
use App\Http\Controllers\Admin\SuppliesController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
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

Route::name('admin.') ->group(function(){
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::post('/login', [HomeController::class, 'ConfLogin'])->name('ConfLogin');
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
    //--------------------------------------
    Route::name('home.') ->group(function(){
        Route::get('/home', [HomeController::class, 'index'])->name('index');
    });
    Route::name('about.') ->group(function(){
        Route::get('/gioi-thieu', [HomeController::class, 'about'])->name('about');
    });
    Route::name('supplies.') ->group(function(){
        Route::get('/supplies', [SuppliesController::class, 'index'])->name('index');
        Route::get('/suppliests', [SuppliesController::class, 'indexts'])->name('indexts');
        Route::get('/create', [SuppliesController::class, 'create'])->name('create');
        Route::post('/supplies/create', [SuppliesController::class, 'createGV'])->name('upcreate');
        Route::get('/supplies/report', [SuppliesController::class, 'index'])->name('report');
        Route::get('/supplies/delete/{id}', [SuppliesController::class, 'delete'])->name('delete');

        Route::get('/supplies/muonvt', [SuppliesController::class, 'muonvt'])->name('muonvt');
        Route::post('/supplies/muonvt', [SuppliesController::class, 'postMuonvt'])->name('postMuonvt');
        Route::get('/supplies/travt', [SuppliesController::class, 'travt'])->name('travt');
        Route::post('/supplies/travt', [SuppliesController::class, 'postTravt'])->name('postTravt');

        Route::get('/supplies/muonts', [SuppliesController::class, 'muonts'])->name('muonts');
        Route::post('/supplies/muonts', [SuppliesController::class, 'postMuonts'])->name('postMuonts');
        Route::get('/supplies/trats', [SuppliesController::class, 'trats'])->name('trats');
        Route::post('/supplies/trats', [SuppliesController::class, 'postTrats'])->name('postTrats');

        Route::post('/supplies/postfiltermuontb', [SuppliesController::class, 'postFiltermuontb'])->name('postFiltermuontb');
        Route::post('/supplies/postfiltertratb', [SuppliesController::class, 'postFiltertratb'])->name('postFiltertratb');
        Route::post('/supplies/postfiltermuonts', [SuppliesController::class, 'postFiltermuonts'])->name('postFiltermuonts');
        Route::post('/supplies/postfiltertrats', [SuppliesController::class, 'postFiltertrats'])->name('postFiltertrats');
        Route::get('/supplies/nhapexcel', [SuppliesController::class, 'nhapexcel'])->name('nhapexcel');
        
        //Danh muc tai san
        Route::get('/supplies/export', [SuppliesController::class,'export'])->name('export');
        // Route::post('/supplies/import', [SuppliesController::class,'import'])->name('import');
        Route::get('/supplies/import', [SuppliesController::class,'import'])->name('import');
        Route::post('/supplies/import2', [SuppliesController::class,'import2'])->name('import2');

        //Tai san
        Route::get('/supplies/exportTaiSan', [SuppliesController::class,'exportTaiSan'])->name('exportTaiSan');
        // Route::post('/supplies/import', [SuppliesController::class,'import'])->name('import');
        Route::get('/supplies/importTaiSan', [SuppliesController::class,'importTaiSan'])->name('importTaiSan');
        Route::post('/supplies/importTaiSan2', [SuppliesController::class,'importTaiSan2'])->name('importTaiSan2');

        //Thiet Bi
        Route::get('/supplies/exportThietBi', [SuppliesController::class,'exportThietBi'])->name('exportThietBi');
        // Route::post('/supplies/import', [SuppliesController::class,'import'])->name('import');
        Route::get('/supplies/importThietBi', [SuppliesController::class,'importThietBi'])->name('importThietBi');
        Route::post('/supplies/importThietBi2', [SuppliesController::class,'importThietBi2'])->name('importThietBi2');

        //Giao vien
        Route::get('/supplies/importGiaoVien', [SuppliesController::class,'importGiaoVien'])->name('importGiaoVien');
        Route::post('/supplies/importGiaoVien2', [SuppliesController::class,'importGiaoVien2'])->name('importGiaoVien2');

    });
    Route::name('bill.') ->group(function(){
        Route::get('/bill', [BillController::class, 'index'])->name('index');
        Route::post('/bill/send', [BillController::class, 'sendUpdate'])->name('send');
        Route::get('/bill/custemer', [BillController::class, 'custemer'])->name('custemer');
        Route::post('/bill/custemer', [BillController::class, 'sendCustemer'])->name('pot.custemer');
        Route::get('/bill/update', [BillController::class, 'update'])->name('update');
        Route::post('/bill/update', [BillController::class, 'sendUpdateBill'])->name('pot.update');
    });
    Route::name('member.') ->group(function(){
        Route::get('/member', [UserController::class, 'index'])->name('index');
        Route::post('/member', [UserController::class, 'insert'])->name('send');
        Route::get('/member/newpass', [UserController::class, 'changepass'])->name('changepass');
        Route::post('/member/newpass', [UserController::class, 'sendNewPass'])->name('sendNewPass');
        Route::get('/member/update', [UserController::class, 'update'])->name('update');
        Route::post('/member/update', [UserController::class, 'sendUpdateBill'])->name('pot.update');
    });
    Route::name('category.') ->group(function(){
        Route::get('/category', [CategoryController::class, 'index'])->name('index');
        Route::post('/category', [CategoryController::class, 'insert'])->name('insert');
        Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });
});
Route::get('/check/{phone}', [BillController::class, 'getInfo'])->name('getInfo');
Route::get('/checkid/{id}', [BillController::class, 'getInfoWith'])->name('getInfoWith');
Route::get('/getbill/{start}/{end}', [HomeController::class, 'getListHoaDon'])->name('getListHoaDon');
Route::get('/hoadon/{mahoadon}', [BillController::class, 'mahoadon'])->name('mahoadon');
Route::get('/vattu/{mavattu}', [BillController::class, 'vattu'])->name('mavattu');
// Route::get('/product/{data}', [HomeController::class, 'viewAnymore'])->name('viewAnymore');

//Xuất vật tư 
Route::get('/product/{month}', [BillController::class, 'export'])->name('exportProduct');

// Route::get('/muon', [ViewController::class, 'updateSupplie']);

Route::get('/', [ViewController::class, 'index']);
Route::name('web.') ->group(function(){
    // Route::get('/login', [HomeController::class, 'login'])->name('login');
    // Route::post('/login', [HomeController::class, 'ConfLogin'])->name('ConfLogin');
    // Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
    //--------------------------------------
    Route::name('home.') ->group(function(){
        Route::get('/homepage', [HomeController::class, 'index'])->name('index');
    });
});