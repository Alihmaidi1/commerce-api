<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin;


Route::group(["prefix"=>"admin"],function(){


    Route::post("/login",[admin::class,"login"])->middleware("throttle:login");
    Route::post("/getresetmessage",[admin::class,"getresetmessage"])->middleware("throttle:reset");

    Route::group(["middleware"=>"auth:api"],function(){

        Route::post("/refreshtoken",[admin::class,"refreshtoken"]);
        Route::post("/logout",[admin::class,"logout"]);


    });




});