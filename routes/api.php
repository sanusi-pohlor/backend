<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ActionTypeController;
use App\Http\Controllers\CheckingDataController;
use App\Http\Controllers\DataCharacteristicsController;
use App\Http\Controllers\DetailsNotiChannelsController;
use App\Http\Controllers\FormatDataController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\InspectionDetailsController;
use App\Http\Controllers\MediaChannelsController;
use App\Http\Controllers\MotivationController;
use App\Http\Controllers\ProblemManagementController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SubpointController;
use App\Http\Controllers\TypeInformationController;
use App\Http\Controllers\VolunteeMembersController;

use App\Http\Controllers\ActionTypeControllerr;

// Display data
Route::get('/action-types', [ActionTypeControllerr::class, 'index']);

// Add data (show a form)
Route::get('/action-types/create', [ActionTypeController::class, 'create']);

// Store data (handle form submission)
Route::post('/action-types', [ActionTypeController::class, 'store']);


Route::get('/data', [NewsController::class, 'index']);
Route::post('/upload', [NewsController::class, 'upload']);
Route::post('/register', [RegisterController::class, 'Register']);

//request_manage_content
Route::get('/ActionType_request', [ActionTypeController::class, 'index']);
Route::get('/CheckingData_request', [CheckingDataController::class, 'index']);
Route::get('/DataCharacteristics_request', [DataCharacteristicsController::class, 'index']);
Route::get('/DetailsNotiChannels_request', [DetailsNotiChannelsController::class, 'index']);
Route::get('/FormatData_request', [FormatDataController::class, 'index']);
Route::get('/Information_request', [InformationController::class, 'index']);
Route::get('/InspectionDetails_request', [InspectionDetailsController::class, 'index']);
Route::get('/MediaChannels_request', [MediaChannelsController::class, 'index']);
Route::get('/Motivation_request', [MotivationController::class, 'index']);
Route::get('/ProblemManagement_request', [ProblemManagementController::class, 'index']);
Route::get('/Publisher_request', [PublisherController::class, 'index']);
Route::get('/Subpoint_request', [SubpointController::class, 'index']);
Route::get('/TypeInformation_request', [TypeInformationController::class, 'index']);
Route::get('/VolunteeMembers_request', [VolunteeMembersController::class, 'index']);

//upload_manage_content
Route::post('/ActionType_upload', [ActionTypeController::class, 'upload']);
Route::post('/CheckingData_upload', [CheckingDataController::class, 'upload']);
Route::post('/DataCharacteristics_upload', [DataCharacteristicsController::class, 'upload']);
Route::post('/DetailsNotiChannels_upload', [DetailsNotiChannelsController::class, 'upload']);
Route::post('/FormatData_upload', [FormatDataController::class, 'upload']);
Route::post('/Information_upload', [InformationController::class, 'upload']);
Route::post('/InspectionDetails_upload', [InspectionDetailsController::class, 'upload']);
Route::post('/MediaChannels_upload', [MediaChannelsController::class, 'upload']);
Route::post('/Motivation_upload', [MotivationController::class, 'upload']);
Route::post('/ProblemManagement_upload', [ProblemManagementController::class, 'upload']);
Route::post('/Publisher_upload', [PublisherController::class, 'upload']);
Route::post('/Subpoint_upload', [SubpointController::class, 'upload']);
Route::post('/TypeInformation_upload', [TypeInformationController::class, 'upload']);
Route::post('/VolunteeMembers_upload', [VolunteeMembersController::class, 'upload']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
