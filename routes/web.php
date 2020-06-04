<?php

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


//\MS\Core\Helper\Comman::loadBack();


//
//
//    return view("MS::core.layouts.login");
//
//   // dd(config());
//    $code=\MS\Core\Helper\Comman::random(40,5);
//    $m=new MS\Core\Helper\MSDB("B\MAS",1,["test","2110"]) ;
//    $m2=new MS\Core\Helper\MSDB("B\MAS",1,["test","210"]);
//  //  dd(\MS\Core\Helper\MSDB::dropTable("B\MAS",1,["test","210"]));
//    // dd($m2->rowAdd(['TestColumnText'=>"mitul"]));
//    dd($m2->getAllTable("B\MAS",1));
//    // $code="mitul123!_123";
//
//    //dd(\MS\Core\Helper\Comman::encode($code));
//    //    dd(\MS\Core\Helper\Comman::decode(\MS\Core\Helper\Comman::encode ($code)));
//
//
//    dd(\MS\Core\Helper\Comman::random(40,5));
//    return view('welcome');
//});

Route::get('/', '\MS\Mod\B\Panel4O3\C@MaintainaceDashboard');
//
//Route::post('/webwhatsapp/{from}/{msg}',function ($from,$msg){
//    return response()->json(['msg'=>'I am Bot Created By Million Solutions LLP and Your OTP is : '.\MS\Core\Helper\Comman::random(18,4,1,[$from])]);
//});
//
Route::get('/test',function (){
    dd(ms()->version());
});
