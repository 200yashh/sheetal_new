<?php

use App\Http\Controllers\Frontend\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get all cities from master Table
Route::post('/get_city', [ApiController::class, 'sendCityData']);

// Get all Agent Packages Based on City Id
Route::post('/get_agents_packages', [ApiController::class, 'sendAgentPackageData']);

// Get most popular agent packages based on the number of enquiries
Route::post('/get_popular_agents_packages', [ApiController::class, 'sendPopularAgentPackageData']);

// Save Enquiries data
Route::post('/save_enquiry', [ApiController::class, 'saveEnquiryData']);

// Contact Us API
Route::post('/contact_us', [ApiController::class, 'contactUs']);

// Testimonials API
Route::post('/testimonials', [ApiCOntroller::class, 'testimonials']);
