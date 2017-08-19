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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    // Admin routes
    Route::group(
        ['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function () {

        Route::get('/dashboard', 'AdminDashboardController@index')->name('dashboard');


        Route::get('clients/export', ['uses' => 'ManageClientsController@export'])->name('clients.export');
        Route::get('clients/data', ['uses' => 'ManageClientsController@data'])->name('clients.data');
        Route::resource('clients', 'ManageClientsController');

        Route::get('employees/tasks/{userId}/{hideCompleted}', ['uses' => 'ManageEmployeesController@tasks'])->name('employees.tasks');
        Route::get('employees/time-logs/{userId}', ['uses' => 'ManageEmployeesController@timeLogs'])->name('employees.time-logs');
        Route::get('employees/data', ['uses' => 'ManageEmployeesController@data'])->name('employees.data');
        Route::get('employees/export', ['uses' => 'ManageEmployeesController@export'])->name('employees.export');
        Route::post('employees/assignRole', ['uses' => 'ManageEmployeesController@assignRole'])->name('employees.assignRole');
        Route::resource('employees', 'ManageEmployeesController');

        Route::get('projects/export', ['uses' => 'ManageProjectsController@export'])->name('projects.export');
        Route::get('projects/data', ['uses' => 'ManageProjectsController@data'])->name('projects.data');
        Route::resource('projects', 'ManageProjectsController');

        Route::resource('projectCategory', 'ManageProjectCategoryController');

        Route::get('notices/data', ['uses' => 'ManageNoticesController@data'])->name('notices.data');
        Route::resource('notices', 'ManageNoticesController');

        Route::get('settings/change-language', ['uses' => 'OrganisationSettingsController@changeLanguage'])->name('settings.change-language');
        Route::resource('settings', 'OrganisationSettingsController', ['only' => ['edit', 'update', 'index', 'change-language']]);
        Route::group(
            ['prefix' => 'settings'], function () {
            Route::post('email-settings/updateMailConfig', ['uses' => 'EmailNotificationSettingController@updateMailConfig'])->name('email-settings.updateMailConfig');
            Route::resource('email-settings', 'EmailNotificationSettingController');
            Route::resource('profile-settings', 'AdminProfileSettingsController');
            Route::resource('module-settings', 'ModuleSettingsController');
            Route::resource('currency', 'CurrencySettingController');
            Route::resource('theme-settings', 'ThemeSettingsController');
            Route::resource('payment-gateway-credential', 'PaymentGatewayCredentialController');
        });

        Route::group(
            ['prefix' => 'projects'], function () {
            Route::resource('project-members', 'ManageProjectMembersController');

            Route::post('tasks/sort', ['uses' => 'ManageTasksController@sort'])->name('tasks.sort');
            Route::post('tasks/change-status', ['uses' => 'ManageTasksController@changeStatus'])->name('tasks.changeStatus');
            Route::resource('tasks', 'ManageTasksController');

            Route::get('files/download/{id}', ['uses' => 'ManageProjectFilesController@download'])->name('files.download');
            Route::resource('files', 'ManageProjectFilesController');

            Route::get('invoices/download/{id}', ['uses' => 'ManageInvoicesController@download'])->name('invoices.download');
            Route::get('invoices/create-invoice/{id}', ['uses' => 'ManageInvoicesController@createInvoice'])->name('invoices.createInvoice');
            Route::resource('invoices', 'ManageInvoicesController');

            Route::resource('issues', 'ManageIssuesController');

            Route::post('time-logs/stop-timer/{id}', ['uses' => 'ManageTimeLogsController@stopTimer'])->name('time-logs.stopTimer');
            Route::get('time-logs/data/{id}', ['uses' => 'ManageTimeLogsController@data'])->name('time-logs.data');
            Route::resource('time-logs', 'ManageTimeLogsController');
        });

        Route::group(
            ['prefix' => 'clients'], function() {
            Route::get('projects/{id}', ['uses' => 'ManageClientsController@showProjects'])->name('clients.projects');
            Route::get('invoices/{id}', ['uses' => 'ManageClientsController@showInvoices'])->name('clients.invoices');

            Route::get('contacts/data/{id}', ['uses' => 'ClientContactController@data'])->name('contacts.data');
            Route::resource('contacts', 'ClientContactController');
        });

        // task calendar routes
        Route::resource('task-calendar', 'AdminCalendarController');

        // All invoices list routes
        Route::get('all-invoices/data', ['uses' => 'ManageAllInvoicesController@data'])->name('all-invoices.data');
        Route::get('all-invoices/download/{id}', ['uses' => 'ManageAllInvoicesController@download'])->name('all-invoices.download');
        Route::resource('all-invoices', 'ManageAllInvoicesController');

        //Payments routes
        Route::get('payments/data', ['uses' => 'ManagePaymentsController@data'])->name('payments.data');
        Route::resource('payments', 'ManagePaymentsController');

        Route::get('all-issues/data', ['uses' => 'ManageAllIssuesController@data'])->name('all-issues.data');
        Route::resource('all-issues', 'ManageAllIssuesController');


        Route::get('all-time-logs/data/{startDate?}/{endDate?}/{projectId?}', ['uses' => 'ManageAllTimeLogController@data'])->name('all-time-logs.data');
        Route::resource('all-time-logs', 'ManageAllTimeLogController');


        Route::get('all-tasks/data/{startDate?}/{endDate?}/{hideCompleted?}/{projectId?}', ['uses' => 'ManageAllTasksController@data'])->name('all-tasks.data');
        Route::get('all-tasks/members/{projectId}', ['uses' => 'ManageAllTasksController@membersList'])->name('all-tasks.members');
        Route::resource('all-tasks', 'ManageAllTasksController');

        Route::resource('sticky-note', 'ManageStickyNotesController');


        Route::resource('reports', 'TaskReportController', ['only' => ['edit', 'update', 'index']]); // hack to make left admin menu item active
        Route::group(
            ['prefix' => 'reports'], function () {
            Route::resource('task-report', 'TaskReportController');
            Route::resource('time-log-report', 'TimeLogReportController');
            Route::resource('finance-report', 'FinanceReportController');
        });

        Route::resource('search', 'AdminSearchController');

        // Estimate routes
        Route::get('estimates/data', ['uses' => 'ManageEstimatesController@data'])->name('estimates.data');
        Route::get('estimates/download/{id}', ['uses' => 'ManageEstimatesController@download'])->name('estimates.download');
        Route::resource('estimates', 'ManageEstimatesController');

    }
    );

    // Employee routes
    Route::group(
        ['namespace' => 'Member', 'prefix' => 'member', 'as' => 'member.', 'middleware' => ['role:employee']], function () {

        Route::get('dashboard', ['uses' => 'MemberDashboardController@index'])->name('dashboard');

        Route::resource('profile', 'MemberProfileController');

        Route::get('projects/data', ['uses' => 'MemberProjectsController@data'])->name('projects.data');
        Route::resource('projects', 'MemberProjectsController');

        Route::group(
            ['prefix' => 'projects'], function () {
            Route::resource('project-members', 'MemberProjectsMemberController');

            Route::post('tasks/sort', ['uses' => 'MemberTasksController@sort'])->name('tasks.sort');
            Route::post('tasks/change-status', ['uses' => 'MemberTasksController@changeStatus'])->name('tasks.changeStatus');
            Route::resource('tasks', 'MemberTasksController');

            Route::get('files/download/{id}', ['uses' => 'MemberProjectFilesController@download'])->name('files.download');
            Route::resource('files', 'MemberProjectFilesController');

            Route::get('time-log/show-log/{id}', ['uses' => 'MemberTimeLogController@showTomeLog'])->name('time-log.show-log');
            Route::get('time-log/data/{id}', ['uses' => 'MemberTimeLogController@data'])->name('time-log.data');
            Route::resource('time-log', 'MemberTimeLogController');
        });

        //sticky note
        Route::resource('sticky-note', 'MemberStickyNoteController');

        // User message
        Route::post('message-submit', ['as' => 'user-chat.message-submit', 'uses' => 'MemberChatController@postChatMessage']);
        Route::get('user-search', ['as' => 'user-chat.user-search', 'uses' => 'MemberChatController@getUserSearch']);
        Route::resource('user-chat', 'MemberChatController');

        //Notice
        Route::resource('notices', 'MemberNoticesController');

        Route::resource('task-calendar', 'MemberCalendarController');

    });

    // Client routes
    Route::group(
        ['namespace' => 'Client', 'prefix' => 'client', 'as' => 'client.', 'middleware' => ['role:client']], function () {

        Route::resource('dashboard', 'ClientDashboardController');

        Route::resource('profile', 'ClientProfileController');

        // Project section
        Route::get('projects/data', ['uses' => 'ClientProjectsController@data'])->name('projects.data');
        Route::resource('projects', 'ClientProjectsController');

        Route::group(
            ['prefix' => 'projects'], function () {

            Route::resource('project-members', 'ClientProjectMembersController');

            Route::resource('issues', 'ClientIssuesController');

            Route::get('files/download/{id}', ['uses' => 'ClientFilesController@download'])->name('files.download');
            Route::resource('files', 'ClientFilesController');

            Route::get('time-log/data/{id}', ['uses' => 'ClientTimeLogController@data'])->name('time-log.data');
            Route::resource('time-log', 'ClientTimeLogController');

            Route::get('project-invoice/download/{id}', ['uses' => 'ClientProjectInvoicesController@download'])->name('project-invoice.download');
            Route::resource('project-invoice', 'ClientProjectInvoicesController');

        });
        //sticky note
        Route::resource('sticky-note', 'ClientStickyNoteController');

        // Invoice Section
        Route::get('invoices/download/{id}', ['uses' => 'ClientInvoicesController@download'])->name('invoices.download');
        Route::resource('invoices', 'ClientInvoicesController');

        // Estimate Section
        Route::get('estimates/download/{id}', ['uses' => 'ClientEstimateController@download'])->name('estimates.download');
        Route::resource('estimates', 'ClientEstimateController');

        // Issues section
        Route::get('my-issues/data', ['uses' => 'ClientMyIssuesController@data'])->name('my-issues.data');
        Route::resource('my-issues', 'ClientMyIssuesController');


        // route for view/blade file
        Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
// route for post request
        Route::get('paypal/{invoiceId}', array('as' => 'paypal','uses' => 'PaypalController@paymentWithpaypal',));
// route for check status responce
        Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));

    });

    // Project Admin routes
    Route::group(
        ['namespace' => 'ProjectAdmin', 'prefix' => 'project-admin', 'as' => 'project-admin.', 'middleware' => ['role:project_admin']], function () {

        Route::get('/dashboard', 'ProjectAdminDashboardController@index')->name('dashboard');

        Route::resource('projectCategory', 'ProjectAdminProjectCategoryController');

        Route::get('projects/export', ['uses' => 'ProjectAdminProjectsController@export'])->name('projects.export');
        Route::get('projects/data', ['uses' => 'ProjectAdminProjectsController@data'])->name('projects.data');
        Route::resource('projects', 'ProjectAdminProjectsController');

        Route::group(
            ['prefix' => 'projects'], function () {
            Route::resource('project-members', 'ProjectAdminProjectMembersController');

            Route::post('tasks/sort', ['uses' => 'ProjectAdminTasksController@sort'])->name('tasks.sort');
            Route::post('tasks/change-status', ['uses' => 'ProjectAdminTasksController@changeStatus'])->name('tasks.changeStatus');
            Route::resource('tasks', 'ProjectAdminTasksController');

            Route::get('files/download/{id}', ['uses' => 'ProjectAdminProjectFilesController@download'])->name('files.download');
            Route::resource('files', 'ProjectAdminProjectFilesController');

            Route::get('invoices/download/{id}', ['uses' => 'ProjectAdminInvoicesController@download'])->name('invoices.download');
            Route::get('invoices/create-invoice/{id}', ['uses' => 'ProjectAdminInvoicesController@createInvoice'])->name('invoices.createInvoice');
            Route::resource('invoices', 'ProjectAdminInvoicesController');

            Route::resource('issues', 'ProjectAdminIssuesController');

            Route::post('time-logs/stop-timer/{id}', ['uses' => 'ProjectAdminTimeLogsController@stopTimer'])->name('time-logs.stopTimer');
            Route::get('time-logs/data/{id}', ['uses' => 'ProjectAdminTimeLogsController@data'])->name('time-logs.data');
            Route::resource('time-logs', 'ProjectAdminTimeLogsController');
        });

        // task calendar routes
        Route::resource('task-calendar', 'ProjectAdminCalendarController');

        Route::get('all-issues/data', ['uses' => 'ProjectAdminAllIssuesController@data'])->name('all-issues.data');
        Route::resource('all-issues', 'ProjectAdminAllIssuesController');

        Route::get('all-time-logs/data/{startDate?}/{endDate?}/{projectId?}', ['uses' => 'ProjectAdminAllTimeLogController@data'])->name('all-time-logs.data');
        Route::resource('all-time-logs', 'ProjectAdminAllTimeLogController');

        Route::get('all-tasks/data/{startDate?}/{endDate?}/{hideCompleted?}/{projectId?}', ['uses' => 'ProjectAdminAllTasksController@data'])->name('all-tasks.data');
        Route::get('all-tasks/members/{projectId}', ['uses' => 'ProjectAdminAllTasksController@membersList'])->name('all-tasks.members');
        Route::resource('all-tasks', 'ProjectAdminAllTasksController');

        Route::resource('search', 'ProjectAdminSearchController');

        Route::resource('reports', 'ProjectAdminTaskReportController', ['only' => ['edit', 'update', 'index']]); // hack to make left project admin menu item active
        Route::group(
            ['prefix' => 'reports'], function () {
            Route::resource('task-report', 'ProjectAdminTaskReportController');
            Route::resource('time-log-report', 'ProjectAdminTimeLogReportController');
        });
    }
    );


    // Mark all notifications as read
    Route::post('mark-notification-read', ['uses' => 'NotificationController@markAllRead'])->name('mark-notification-read');
    Route::get('show-all-member-notifications', ['uses' => 'NotificationController@showAllMemberNotifications'])->name('show-all-member-notifications');
    Route::get('show-all-client-notifications', ['uses' => 'NotificationController@showAllClientNotifications'])->name('show-all-client-notifications');
    Route::get('show-all-admin-notifications', ['uses' => 'NotificationController@showAllAdminNotifications'])->name('show-all-admin-notifications');



});