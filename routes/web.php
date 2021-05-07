<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\ResetPasswordController;


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

// Route::get('/', function () {
//     return view('pages.index');
// });

        // Xử lý ở màn hình user

        Route::group(['prefix'=>'/'],function(){

             Route::get('/',[PageController::class, 'getIndex'])->name('index');

             Route::get('/blog',[PageController::class, 'getBlog'])->name('blog');

             Route::get('/contact',[PageController::class, 'getContact'])->name('contact');


                 // Xử lý phần profile

                 Route::get('/profile',[PageController::class, 'getProfile'])->name('profile');

                 Route::post('/profile',[PageController::class, 'postProfile'])->name('profile');

                 Route::get('/changePass',[PageController::class, 'getChange'])->name('change-password');

                 Route::post('/changePass',[PageController::class, 'postChange'])->name('change-password');

                 Route::post('/search',[PageController::class, 'postSearch'])->name('search');

                 // Xử lý ở phần login user

             Route::group(['prefix'=>'/signin'],function(){

                Route::get('/',[LoginController::class, 'getLogIn'])->name('signin');

                Route::post('/',[LoginController::class, 'postLogIn'])->name('signin');

                Route::get('/register',[LoginController::class, 'getRegister'])->name('registers');

                Route::post('/register',[LoginController::class, 'postRegister'])->name('registers.post');

                Route::get('/password',[LoginController::class, 'getPassword'])->name('password');

                Route::get('/signout',[LoginController::class, 'getLogOut'])->name('signout');

                Route::post('/reset-password', [ResetPasswordController::class, 'sendMail'])->name('reset-password');

                Route::put('/reset-password/{token}', [ResetPasswordController::class, 'reset']);

                Route::post('/confirm_user',[LoginController::class, 'postConfirm'])->name('confirm');

                Route::get('/redirect/{provider}',[LoginController::class, 'redirect'])->name('redirect');

             });

            Route::get('/callback/{provider}',[LoginController::class, 'callback'])->name('callback');


                 // Xử lý ở phần events

             Route::group(['prefix'=>'/event'],function(){

                Route::get('/',[PageController::class, 'getEvent'])->name('event');

                Route::get('/register/{id}',[PageController::class, 'getRegister'])->name('register_event');

                Route::post('/comfirm_register/{id}',[PageController::class, 'confirmRegisterEvent'])->name('comfirm_register_event');

                Route::post('/register/{id}',[PageController::class, 'postRegister'])->name('register_event');

             });


        });



        // Xử lý ở màn hình admin


    Route::group(['guard' => 'admin', 'prefix'=>'/admin'],function(){

            // Xử lý Admin

            Route::get('/adminlist',[AdminController::class, 'getIndex'])->name('admin_index')->middleware('can:admin-list');

            Route::get('/adminadd',[AdminController::class, 'getAddAdmin'])->name('admin_addadmin')->middleware('can:admin-add');

            Route::post('/confirmAdmin',[AdminController::class, 'postConfirm'])->name('admin_confirm')->middleware('can:admin-add');

            Route::post('/adminadd',[AdminController::class, 'postAddAdmin'])->name('admin_add_admin')->middleware('can:admin-add');

            Route::get('/updateAdmin/{id}',[AdminController::class, 'getUpdateAdmin'])->name('admin.update-admin')->middleware('can:admin-edit,id');

            Route::post('/updateAdmin/{id}',[AdminController::class, 'updateAdmin'])->name('admin.update-admin')->middleware('can:admin-edit,id');;

            Route::get('/deleteAdmin/{id}',[AdminController::class, 'deleteAdmin'])->name('admin.delete-admin')->middleware('can:admin-delete,id');;


            // Xử lý login

            Route::get('/login',[LoginAdminController::class, 'getLogin'])->name('admin_login');

            Route::post('/login',[LoginAdminController::class, 'postLogin'])->name('admin_login');

            Route::get('/logout',[LoginAdminController::class, 'getLogout'])->name('admin_logout');



                //Xử lý Event

                Route::get('/eventlist',[EventController::class, 'getIndex'])->name('admin.event-list')->middleware('can:role-list');

                Route::get('/eventadd',[EventController::class, 'getAdd'])->name('admin.event-add')->middleware('can:role-add');

                Route::post('/event_confirm',[EventController::class, 'postConfirm'])->name('admin.event-confirm')->middleware('can:role-add');

                Route::post('/cropper',[EventController::class, 'cropper'])->name('admin.cropper')->middleware('can:role-add');

                Route::post('/eventadd',[EventController::class, 'postAdd'])->name('admin.event.add')->middleware('can:role-add');

                Route::post('/import', [EventController::class, 'import'])->name('admin.event-import')->middleware('can:role-add');

                Route::get('/eventedit/{id}',[EventController::class, 'getEdit'])->name('admin.event-edit')->middleware('can:role-edit');

                Route::post('/eventedit/{id}',[EventController::class, 'postEdit'])->name('admin.event-edit')->middleware('can:role-edit');

                Route::get('/eventdelete/{id}',[EventController::class, 'getDelete'])->name('admin.event-delete')->middleware('can:role-delete');


                //Xử lý banner

                Route::get('/bannerlist',[BannerController::class, 'getIndex'])->name('admin.banner-list');

                Route::get('/banneradd',[BannerController::class, 'getAdd'])->name('admin.banner-add');

                Route::post('/banneradd',[BannerController::class, 'postAdd'])->name('admin.banner-add');

                Route::get('/banneredit/{id}',[BannerController::class, 'getEdit'])->name('admin.banner-edit');

                Route::post('/banneredit/{id}',[BannerController::class, 'postEdit'])->name('admin.banner-edit');

                Route::get('/bannerdelete/{id}',[BannerController::class, 'getDelete'])->name('admin.banner-delete');



                // Xử lý User
                Route::get('/userlist',[UserController::class, 'getIndex'])->name('admin.user-list')->middleware('can:user-list');

                Route::get('/useradd',[UserController::class, 'getAdd'])->name('admin.user-add')->middleware('can:user-add');

                Route::post('/useradd',[UserController::class, 'postAdd'])->name('admin.user-add')->middleware('can:user-add');

                Route::get('/userexport',[UserController::class, 'export'])->name('admin.user-export');

                Route::get('/useredit/{id}',[UserController::class, 'getEdit'])->name('admin.user-edit')->middleware('can:user-edit');

                Route::post('/useredit/{id}',[UserController::class, 'postEdit'])->name('admin.user-edit')->middleware('can:user-edit');

                Route::get('/userdelete/{id}',[UserController::class, 'getDelete'])->name('admin.user-delete')->middleware('can:user-delete');


                // Xử lý Role
                Route::get('/viewRole',[RoleController::class, 'getRole'])->name('admin.role-list')->middleware('can:role-list');

                Route::get('/addRole',[RoleController::class, 'addRole'])->name('admin.role-add')->middleware('can:role-add');

                Route::post('/addRole',[RoleController::class, 'postAddRole'])->name('admin.role-add')->middleware('can:role-add');

                Route::get('/updateRole/{id}',[RoleController::class, 'updateRole'])->name('admin.role-update')->middleware('can:role-edit');

                Route::post('/updateRole/{id}',[RoleController::class, 'postUpdateRole'])->name('admin.role-update')->middleware('can:role-edit');

                Route::get('/deleteRole/{id}',[RoleController::class, 'deleteRole'])->name('admin.role-delete')->middleware('can:role-delete');


    });


    Route::get('storage/{filename}', function ($filename)
    {
        $path = storage_path('app/public/images/' . $filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    });
