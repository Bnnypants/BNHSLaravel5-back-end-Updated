<?php

use Illuminate\Support\Facades\Route;

use Admin\UserController;
use Admin\AdminAppeals;
use Admin\Reason;
use Admin\Records;
use Admin\Birthcertificate;
use Admin\Reportcard;
use Admin\Rejected;
use Admin\Accepted;
use Admin\Updated;
use Admin\AnnouncementsController;
use Admin\IssueReports;
use Admin\IssueReportsView;
use Admin\Statistics;
use Admin\ListGenerator;
use Admin\Management;
use Admin\DisabledAdmin;
use Admin\PDFController;
use Admin\Old;
use Admin\PrintList;
use Admin\PrintAnalysis;
use Admin\AcceptedAppeals;
use Admin\RejectedAppeals;
use Admin\ViewRejectionMessage;

use User\Profile;
use User\Verification;
use User\Resend;
use User\VerifyConfirm;
use User\About;
use User\Contact;
use User\RequestUser;
use User\AppealView;
use User\AppealSave;
use User\EmailUpdate;
use User\EmailView;

use Student\RegisterUser;
use Student\UpdateUser;
use Student\RegisterVerify;
use Student\RegisterView;
use Student\SurveyController;
use Student\SurveyView;
use Student\Reset;
use Student\ResetView;
use Student\StudentSectionView;
use Student\StudentAnnouncement;
use Student\StudentProfileView;
use Student\StudentIssueReport;
use Student\StudentIssueView;
use Student\StudentPrint;

use FacultyLoading\SchoolYearController;
use FacultyLoading\TeacherController;
use FacultyLoading\TeacherDeleteView;
use FacultyLoading\InactiveTeachers;

use FacultyLoading\SubjectController;
use FacultyLoading\SubjectDeleteView;
use FacultyLoading\SectionController;
use FacultyLoading\SectionDeleteView;

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

Route::get('/', function () {
    return view('index');
});

Route::get('index', function () {
    return view('index');
});


Route::post('/register', 'Auth\RegisteredUserController@store')->middleware('signed');

//User routes 
Route::prefix('user')->name('user.')->group(function(){

    Route::get('profile/{id}', Profile::class)->name('profile')->middleware('signed');
    Route::get('verifyconfirm', VerifyConfirm::class)->name('verifyconfirm')->middleware('signed');
    Route::get('verify', Verification::class)->name('verify');
    Route::get('resend', Resend::class)->name('resend');
    Route::get('about', About::class)->name('about');
    Route::get('contact', Contact::class)->name('contact');
    Route::post('requestuser', RequestUser::class)->name('requestuser');
    Route::get('appeals', AppealView::class)->name('appeals')->middleware('signed');
    Route::post('appealsave', AppealSave::class)->name('appealsave');
    Route::resource('email_update',EmailUpdate::class);
    Route::get('email_view', EmailView::class)->name('email_view')->middleware('signed');
  
  
 
});

//Admin routes

Route::prefix('admin')->middleware(['auth','auth.isAdmin','verified'])->name('admin.')->group(function(){

    Route::resource('users',UserController::class);
    Route::get('disabled_admin', DisabledAdmin::class)->name('disabled_admin');
    Route::resource('management',Management::class);
    Route::resource('appeals',AdminAppeals::class);
    Route::get('accepted_appeals', AcceptedAppeals::class)->name('accepted_appeals');
    Route::get('rejected_appeals', RejectedAppeals::class)->name('rejected_appeals');
    Route::resource('issue_reports',IssueReports::class);
    Route::resource('issue_reports_view',IssueReportsView::class);
    Route::resource('announcements',AnnouncementsController::class);
    Route::get('reason/{id}', Reason::class)->name('reason');
    Route::get('reportcard/{id}',Reportcard::class)->name('reportcard');
    Route::get('records/{id}',Records::class)->name('records');
    Route::get('birthcertificate/{id}',Birthcertificate::class)->name('birthcertificate');
    Route::get('rejected', Rejected::class)->name('rejected');
    Route::get('accepted', Accepted::class)->name('accepted');
    Route::get('updated', Updated::class)->name('updated');
    Route::get('statistics', Statistics::class)->name('statistics');
    Route::get('print/{id}', PDFController::class)->name('print');
    Route::get('old/{id}', Old::class)->name('old');
    Route::get('list', ListGenerator::class)->name('list');
    Route::post('print_list', PrintList::class)->name('print_list');
    Route::post('print_analysis', PrintAnalysis::class)->name('print_analysis');
    Route::get('rejection_message/{id}',ViewRejectionMessage::class)->name('rejection_message');
  

});

Route::prefix('faculty')->middleware(['auth','auth.isAdmin','verified'])->name('faculty.')->group(function(){

 Route::resource('teachers',TeacherController::class);
 Route::get('delete/{id}', TeacherDeleteView::class)->name('delete');
  Route::get('inactive', InactiveTeachers::class)->name('inactive');
 Route::resource('subjects',SubjectController::class);
Route::get('deletesubject/{id}', SubjectDeleteView::class)->name('deletesubject');
 Route::resource('sections',SectionController::class);
 Route::get('deletesection/{id}', SectionDeleteView::class)->name('deletesection');
  Route::resource('schoolyear',SchoolYearController::class);
});

//Student routes

Route::prefix('enrolledstudent')->middleware(['auth','verified'])->name('enrolledstudent.')->group(function(){

Route::get('studentsectionview', StudentSectionView::class)->name('studentsectionview');
Route::get('studentprofile', StudentProfileView::class)->name('studentprofile');
Route::resource('student_announcement', StudentAnnouncement::class);
Route::resource('student_issue_report', StudentIssueReport::class);
Route::resource('student_issue_view',StudentIssueView::class);
Route::get('student_print', StudentPrint::class)->name('student_print');
});    

Route::prefix('student')->name('student.')->group(function(){


 Route::post('enroll',RegisterUser::class)->name('enroll');
 Route::resource('check', RegisterVerify::class);
  Route::post('update_user',UpdateUser::class)->name('update_user');
 Route::get('registerview',RegisterView::class)->name('registerview')->middleware('signed');
// Route::resource('survey', SurveyController::class);
 Route::get('surveyview', SurveyView::class)->name('surveyview')->middleware('signed');
 Route::get('resetview', ResetView::class)->name('resetview')->middleware('signed');
Route::put('reset', Reset::class)->name('reset');

});