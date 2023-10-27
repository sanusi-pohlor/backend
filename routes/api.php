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
use App\Http\Controllers\AuthController;
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
use App\Http\Controllers\VolunteerMembersController;
use App\Http\Controllers\FakeNewsInfoController;
use App\Http\Controllers\ImageController;

Route::get('/data', [NewsController::class, 'index']);
Route::post('/upload', [NewsController::class, 'upload']);
// Route::post('/register', [RegisterController::class, 'Register']);
// Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth.bearer')->group(function () {
    // เส้นทาง API ที่ต้องการให้มีการ Authentication
});

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
Route::get('/VolunteerMembers_request', [VolunteerMembersController::class, 'index']);
Route::get('/FakeNewsInfo_request', [FakeNewsInfoController::class, 'index']);

//show_manage_content
Route::get('/FakeNewsInfo_show/{id}', [FakeNewsInfoController::class, 'show']);

//update_manage_content
Route::post('/FakeNewsInfo_update/{id}', [FakeNewsInfoController::class, 'update']);

//edit_manage_content
Route::get('/FakeNewsInfo_edit/{id}', [FakeNewsInfoController::class, 'edit']);

//delete_manage_content
Route::delete('FakeNewsInfo_delete/{id}', [FakeNewsInfoController::class, 'destroy']);

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
Route::post('/VolunteerMembers_upload', [VolunteerMembersController::class, 'upload']);
Route::post('/FakeNewsInfo_upload', [FakeNewsInfoController::class, 'upload']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);

});
Route::get('image-upload', [ImageController::class, 'index'])->name('image.upload');
Route::post('image-upload', [ImageController::class, 'store'])->name('image.upload.store');