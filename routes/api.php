<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin;
use App\Http\Controllers\currencyController;

Route::group(["prefix"=>"admin"],function(){



    Route::post("/login",[admin::class,"login"])->middleware("throttle:login");
    Route::post("/getresetmessage",[admin::class,"getresetmessage"])->middleware("throttle:reset");
    Route::post("/verifiedcode",[admin::class,"verifiedcode"])->middleware(["throttle:reset","auth:reset_admin"]);



    Route::apiResource("currency",currencyController::class);




    Route::group(["middleware"=>"auth:api"],function(){

        // password authentication
        Route::post("/refreshtoken",[admin::class,"refreshtoken"]);
        Route::post("/logout",[admin::class,"logout"]);
        Route::post("/changepassword",[admin::class,"changepassword"])->middleware(["throttle:reset"]);








    });





});
