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
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MediaShareController;
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
use App\Http\Controllers\ManageFakeNewInfoController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProvinceController;

Route::get('/data', [NewsController::class, 'index']);
Route::get('/Adm_News_request', [NewsController::class, 'index']);
Route::post('/Adm_News_upload', [NewsController::class, 'upload']);

Route::get('/Adm_Article_request', [ArticleController::class, 'index']);
Route::post('/Adm_Article_upload', [ArticleController::class, 'upload']);

Route::get('/Adm_MdShare_request', [MediaShareController::class, 'index']);
Route::post('/Adm_MdShare_upload', [MediaShareController::class, 'upload']);

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
Route::get('/Manage_Fake_Info_request', [ManageFakeNewInfoController::class, 'index']);
Route::get('/Province_request', [ProvinceController::class, 'index']);

//show_manage_content
Route::get('/FakeNewsInfo_show/{id}', [FakeNewsInfoController::class, 'show']);
Route::get('/AmUser', [UsersController::class, 'index']);
Route::get('/ManageInfo_request', [FakeNewsInfoController::class, 'index']);

Route::get('/News_request', [NewsController::class, 'index']);
Route::get('/News_show/{id}', [NewsController::class, 'show']);

Route::get('/Article_request', [ArticleController::class, 'index']);
Route::get('/Article_show/{id}', [ArticleController::class, 'show']);

Route::get('/MdShare_request', [MediaShareController::class, 'index']);
Route::get('/MdShare_show/{id}', [MediaShareController::class, 'show']);

Route::get('/Manage_Fake_Info_show/{id}', [ManageFakeNewInfoController::class, 'show']);

//update_manage_content
Route::post('/FakeNewsInfo_update/{id}', [FakeNewsInfoController::class, 'update']);
Route::post('/User_update/{id}', [AuthController::class, 'update']);

//edit_manage_content
Route::get('/FakeNewsInfo_edit/{id}', [FakeNewsInfoController::class, 'edit']);
Route::get('/User_edit/{id}', [AuthController::class, 'edit']);

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
Route::post('/updateFakeNewsStatus/{id}', [FakeNewsInfoController::class, 'UpStatus']);
Route::post('/Manage_Fake_Info_upload', [ManageFakeNewInfoController::class, 'upload']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);

});