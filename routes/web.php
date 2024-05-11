<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ContactController;

Route::get("/",[HomeController::class,'index']);
Route::get("/san-pham",[ProductController::class,'index']);
Route::get("/chi-tiet-san-pham/{slug}",[ProductController::class,'product_detail']);
Route::get("/lien-he",[ContactController::class,'index']);