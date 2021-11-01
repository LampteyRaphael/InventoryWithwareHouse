<?php

use Modules\Locals\Http\Controllers\AttendanceCategoryController;
use Modules\Locals\Http\Controllers\AttendanceController;
use Modules\Locals\Http\Controllers\AuditTrailController;
use Modules\Locals\Http\Controllers\ChildrenMinistryAtLocalController;
use Modules\Locals\Http\Controllers\DashboardForLocalsController;
use Modules\Locals\Http\Controllers\DonationAndPledgeController;
use Modules\Locals\Http\Controllers\ErrorLogController;
use Modules\Locals\Http\Controllers\ExpenditureCategoryController;
use Modules\Locals\Http\Controllers\ExpenditureController;
use Modules\Locals\Http\Controllers\ExportController;
use Modules\Locals\Http\Controllers\IncomeCategoryController;
use Modules\Locals\Http\Controllers\IncomeController;
use Modules\Locals\Http\Controllers\LocalDeceasedChildrenController;
use Modules\Locals\Http\Controllers\LocalMembersSearchController;
use Modules\Locals\Http\Controllers\LocalNoneActiveUsersController;
use Modules\Locals\Http\Controllers\LocalsBirthdayController;
use Modules\Locals\Http\Controllers\LocalSMSController;
use Modules\Locals\Http\Controllers\MonthlyPdfController;
use Modules\Locals\Http\Controllers\NationShowCircularController;
use Modules\Locals\Http\Controllers\PostAttendanceController;
use Modules\Locals\Http\Controllers\PostCurrentController;
use Modules\Locals\Http\Controllers\PostDeceasedController;
use Modules\Locals\Http\Controllers\PostDistrictToLocalCircularController;
use Modules\Locals\Http\Controllers\PostLocalCircularController;
use Modules\Locals\Http\Controllers\PostMonthlyController;
use Modules\Locals\Http\Controllers\PostServicesController;
use Modules\Locals\Http\Controllers\PostSundayController;
use Modules\Locals\Http\Controllers\PostTitheController;
use Modules\Locals\Http\Controllers\RegisterLocalMembersController;
use Modules\Locals\Http\Controllers\SearchTitheController;
use Modules\Locals\Http\Controllers\ShowIndividualTitheAtLocalController;
use Modules\Locals\Http\Controllers\TextFieldController;
use Modules\Locals\Http\Controllers\TitheChartController;
use Modules\Locals\Http\Controllers\TitheController;
use Illuminate\Support\Facades\Route;
use Modules\Locals\Http\Controllers\PostYearController;

Route::prefix('locals')->group(function() {
    Route::get('/', 'LocalsController@index');


// Route::group(['middleware'=>'IsLocal'],function (){
    Route::prefix('/')->group(function(){
//        Route::resource('map-local',[MapController::class,'index']);
        Route::resource('dash/local',DashboardForLocalsController::class);
        Route::resource('nonactive',LocalNoneActiveUsersController::class);
        Route::resource('tithe',PostTitheController::class);
        Route::resource('services',PostServicesController::class);
        Route::resource('sunday',PostSundayController::class);
        Route::resource('income/category',IncomeCategoryController::class);
        Route::resource('income',IncomeController::class);
        Route::resource('expenditureC',ExpenditureCategoryController::class);
        Route::resource('expenditure',ExpenditureController::class);
        Route::resource('errorLog',ErrorLogController::class);
        Route::resource('localcircular',PostLocalCircularController::class);
        Route::resource('attendance',AttendanceController::class);
        Route::post('attendancePost',[AttendanceController::class,'store2'])->name('attendancePostCategory');
        Route::resource('audit-trail',AuditTrailController::class);
        Route::resource('titheCharts',TitheChartController::class);
        Route::resource('text',TextFieldController::class);
        Route::resource('localSms',LocalSMSController::class);
        Route::resource('LocalImport',ExportController::class);
    });

    Route::prefix('/')->group(function(){
        Route::resource('registration',RegisterLocalMembersController::class);

        Route::get('registration/create',[RegisterLocalMembersController::class,'create'])->name('registration.create');
        Route::post('registration',[RegisterLocalMembersController::class,'store'])->name('registration.store');


        Route::resource('children/ministry',ChildrenMinistryAtLocalController::class);
        Route::post('childrenR/ministryP',[ChildrenMinistryAtLocalController::class,'store2'])->name('cStore2');
        Route::get('deceased-children',[LocalDeceasedChildrenController::class,'index'])->name('deceased-children');
        Route::get('new/transfer',[LocalDeceasedChildrenController::class,'index2'])->name('transferLocal');
        Route::get('Release',[LocalDeceasedChildrenController::class,'index3'])->name('releases');
    });
    Route::prefix('/')->group(function(){
        Route::post('members-search',[LocalMembersSearchController::class,'store'])->name('members-search');
        Route::get('members-search',[LocalMembersSearchController::class,'store'])->name('members-search');
        Route::get('LocalSearchChildren',[LocalMembersSearchController::class,'childrenSearch'])->name('childrenSearch');
        Route::post('LocalSearchChildren',[LocalMembersSearchController::class,'childrenSearch'])->name('childrenSearch');
        Route::get('storeExcel',[LocalMembersSearchController::class,'storeExcel'])->name('storeExcel');
        Route::get('storeExcel2',[LocalMembersSearchController::class,'childrenExcel'])->name('childrenExcel');
    });
    Route::prefix('/')->group(function(){
        Route::post('currentSunday',[PostCurrentController::class,'request'])->name('current.post');
        Route::post('monthly',[PostMonthlyController::class,'index'])->name('monthly.index');
        Route::get('monthly/pdf/{id}',[PostMonthlyController::class,'store'])->name('monthlyPdf.index');
        Route::get('year',[PostYearController::class,'index'])->name('year.index');
        Route::get('{id}/dailyPdf',[PostYearController::class,'dailyPdf'])->name('dailyPdfs');
        Route::post('year/create',[PostYearController::class,'store'])->name('year.create');
        Route::post('addIncome',[PostYearController::class,'addIncome'])->name('addIncome.index');
        Route::post('addExpenditure',[PostYearController::class,'post'])->name('addexpenditure.post');
        Route::get('midyear',[PostYearController::class,'midyear'])->name('midyear.index');
        Route::get('midyear/pdf',[PostYearController::class,'midyearpdf'])->name('midyearPdf');
        Route::get('year/pdf/{post}',[PostYearController::class,'pdf'])->name('year.pdf');
        Route::get('printStatementY/{id}',[PostYearController::class,'printStatementY'])->name('printStatementY.pdf');
        Route::get('monthly/pdf',[MonthlyPdfController::class,'index'])->name('monthly.pdf');
        Route::get('monthlyStatement/{id}',[MonthlyPdfController::class,'monthlyStatement'])->name('monthlyStatement.pdf');
        Route::get('attendanceCategory',[AttendanceCategoryController::class,'index'])->name('attendanceCategory.index');
        Route::post('attendanceCategory',[AttendanceCategoryController::class,'store'])->name('attendanceCategory.store');


    });
    Route::prefix('/')->group(function(){
        Route::get('national/circular/show',[NationShowCircularController::class,'index'])->name('nationalcircular.index');
        Route::get('national/circular/{id}/show',[NationShowCircularController::class,'download'])->name('nationalcircular.get');
        Route::post('national/circular/show',[NationShowCircularController::class,'indexpost'])->name('storepost');
        Route::get('birthday',[LocalsBirthdayController::class,'index'])->name('birthday.index');

        Route::get('birthday-sunday',[LocalsBirthdayController::class,'sunday'])->name('sunday-birth.index');
        Route::get('birthday-monday',[LocalsBirthdayController::class,'monday'])->name('monday-birth.index');
        Route::get('birthday-tuesday',[LocalsBirthdayController::class,'tuesday'])->name('tuesday-birth.index');
        Route::get('birthday-wednesday',[LocalsBirthdayController::class,'wednesday'])->name('wednesday-birth.index');
        Route::get('birthday-thursday',[LocalsBirthdayController::class,'thursday'])->name('thursday-birth.index');
        Route::get('birthday-friday',[LocalsBirthdayController::class,'friday'])->name('friday-birth.index');
        Route::get('birthday-saturday',[LocalsBirthdayController::class,'saturday'])->name('saturday-birth.index');

        Route::get('birthday-january',[LocalsBirthdayController::class,'january'])->name('january.index');
        Route::get('birthday-february',[LocalsBirthdayController::class,'febuary'])->name('february.index');
        Route::get('birthday-march',[LocalsBirthdayController::class,'march'])->name('march.index');
        Route::get('birthday-april',[LocalsBirthdayController::class,'april'])->name('april.index');
        Route::get('birthday-may',[LocalsBirthdayController::class,'may'])->name('may.index');
        Route::get('birthday-june',[LocalsBirthdayController::class,'june'])->name('june.index');
        Route::get('birthday-july',[LocalsBirthdayController::class,'july'])->name('july.index');
        Route::get('birthday-august',[LocalsBirthdayController::class,'august'])->name('august.index');
        Route::get('birthday-september',[LocalsBirthdayController::class,'september'])->name('september.index');
        Route::get('birthday-october',[LocalsBirthdayController::class,'october'])->name('october.index');
        Route::get('birthday-november',[LocalsBirthdayController::class,'november'])->name('november.index');
        Route::get('birthday-december',[LocalsBirthdayController::class,'december'])->name('december.index');

        Route::get('deceased',[PostDeceasedController::class,'index'])->name('deceased.index');
        Route::get('district/locals/circular',[PostDistrictToLocalCircularController::class,'index'])->name('localdistrict.index');
        Route::post('district/locals/circular/post',[PostDistrictToLocalCircularController::class,'indexpost'])->name('localdistrictpost.index');
        Route::post('district/localMembers',[PostDistrictToLocalCircularController::class,'store'])->name('localMembers');
        Route::get('localPost',[PostDistrictToLocalCircularController::class,'localPost'])->name('localPost');
        Route::get('localAreaPost',[PostDistrictToLocalCircularController::class,'area'])->name('localAreaPost');
        Route::get('localAreaPost/{id}',[PostDistrictToLocalCircularController::class,'areashow'])->name('localAreaPostS');
        Route::post('localAreaPost',[PostDistrictToLocalCircularController::class,'areaPost'])->name('localAreaPostP');

        Route::post('attendancePost',[PostAttendanceController::class,'attendance'])->name('attendancePost');
        Route::get('attendExcel',[PostAttendanceController::class,'attendExcel'])->name('attendExcel');
        Route::get('dailyAttendance',[PostAttendanceController::class,'dailyAttendance'])->name('dailyAttendance');
        Route::get('dailyAttendance/{id}/edit',[PostAttendanceController::class,'edit'])->name('dailyAttendance.edit');
        Route::post('dailyAttendance/{id}',[PostAttendanceController::class,'destroy'])->name('dailyAttendance.destroy');
        Route::put('dailyAttendance/{name}',[PostAttendanceController::class,'update'])->name('dailyAttendance.post');
        Route::post('dailyAttendancePost',[PostAttendanceController::class,'dailyAttendancePost'])->name('dailyAttendancePost');
        Route::get('dailyAttendanceExcel/{id}',[PostAttendanceController::class,'dailyAttendanceExcel'])->name('dailyAttendanceExcel');

    });
    Route::prefix('/')->group(function(){
        Route::get('titheStatement',[TitheController::class,'store'])->name('titheStatement');
        Route::get('March-April',[TitheController::class,'month'])->name('titheMonthStatement');
        Route::get('january-February',[TitheController::class,'JF'])->name('titheYearStatement');
        Route::post('january-February',[TitheController::class,'JanuaryPost'])->name('januaryFebruary');
        Route::get('May-June',[TitheController::class,'mayjune'])->name('mayJune');
        Route::get('july-August',[TitheController::class,'julyAugust'])->name('julyAugust');
        Route::post('july-August',[TitheController::class,'julyAugustPost'])->name('julyAugustPost');
        Route::get('September-October',[TitheController::class,'septOctober'])->name('septOctober');
        Route::post('September-October',[TitheController::class,'septOctoberPost'])->name('septOctoberPost');
        Route::get('November-December',[TitheController::class,'novDecember'])->name('novDecember');
        Route::post('November-December',[TitheController::class,'novDecemberPost'])->name('novDecemberPost');
        Route::get('excelJanuary-Feb/{id}',[TitheController::class,'excel'])->name('excel');
        Route::get('excelMarch-April/{id}',[TitheController::class,'excelMA'])->name('excelMA');
        Route::post('excelMarch-April-Post',[TitheController::class,'excelMApost'])->name('excelMAPost');
        Route::get('excelMay-June/{id}',[TitheController::class,'excelMJ'])->name('excelMJ');
        Route::post('excelMay-June-Post',[TitheController::class,'excelMJpost'])->name('excelMJPost');
        Route::get('excelJuly-August/{id}',[TitheController::class,'excelJA'])->name('excelJA');
        Route::get('excelSep-October{id}',[TitheController::class,'excelSO'])->name('excelSO');
        Route::get('excelNov-December{id}',[TitheController::class,'excelND'])->name('excelND');
        Route::get('titheStatementPost',[TitheController::class,'midyear'])->name('titheMidYearStatement');
        Route::post('titheStatementPost',[TitheController::class,'storepost'])->name('titheStatementpost');
        Route::post('titheStatementsPost',[TitheController::class,'monthpost'])->name('titheMonthStatementpost');
        Route::post('titheStatementYPost',[TitheController::class,'yearpost'])->name('titheYearStatementpost');
        Route::post('titheSearch',[SearchTitheController::class,'search'])->name('searchTithe');
    });
    //excel export data to database
    Route::prefix('/')->group(function(){
        Route::post('excelData',[TitheController::class,'data'])->name('excelData');
        Route::get('titheSearch',[SearchTitheController::class,'search'])->name('searchTithe');
        Route::get('localIndividualT/{id}',[ShowIndividualTitheAtLocalController::class,'index'])->name('localIndividualT');
        Route::post('postdateTithes',[ShowIndividualTitheAtLocalController::class,'index2'])->name('postdateTithe');
        Route::get('donation/pledge',[DonationAndPledgeController::class,'index'])->name('donation/Pledge');
        Route::post('donation/pledge',[DonationAndPledgeController::class,'post'])->name('donation/Pledges');
        Route::get('onlyDonation',[DonationAndPledgeController::class,'onlyD'])->name('onlyDonation');
        Route::post('onlyDonationPost',[DonationAndPledgeController::class,'onlyDpost'])->name('onlyDonationPost');
        Route::get('onlyPledge',[DonationAndPledgeController::class,'onlyP'])->name('onlyPledge');
        Route::post('onlyPledgePost',[DonationAndPledgeController::class,'onlyPpost'])->name('onlyPledgePost');
        Route::post('donation/pledgeSearch',[DonationAndPledgeController::class,'search'])->name('donation/pledgeSearch');
        Route::post('titheChartsRange',[TitheChartController::class,'store2'])->name('titheChart-store');
    });
// });




});



