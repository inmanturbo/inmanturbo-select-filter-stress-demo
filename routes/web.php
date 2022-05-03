<?php

use App\Models\GeneralLedger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return view('tw');
});


Route::get('/my-table', function () {

    $columns = [
        (new \App\ColumnData('year', 'Year'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/year.php')))
            ->toArray(),
        (new \App\ColumnData('month', 'Month'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/month.php')))
            ->toArray(),
        (new \App\ColumnData('date', 'Date'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/date.php')))
            ->toArray(),
        (new \App\ColumnData('department', 'Department'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/department.php')))
            ->toArray(),
        (new \App\ColumnData('account_holder', 'Account Holder'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/account_holder.php')))
            ->toArray(),
        (new \App\ColumnData('status', 'Status'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/status.php')))
            ->toArray(),
        (new \App\ColumnData('transaction_type', 'Transaction Type'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/transaction_type.php')))
            ->toArray(),
        (new \App\ColumnData('check_number', 'Check Number'))
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/check_number.php')))
            ->toArray(),
        (new \App\ColumnData('payee', 'Payee'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/payee.php')))
            ->toArray(),
        (new \App\ColumnData('transaction_id', 'Transaction ID'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/transaction_id.php')))
            ->toArray(),
        (new \App\ColumnData('project', 'Project'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/project.php')))
            ->toArray(),
        (new \App\ColumnData('reference_number', 'Reference Number'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/reference_number.php')))
            ->toArray(),
        (new \App\ColumnData('division', 'Division'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/division.php')))
            ->toArray(),
        (new \App\ColumnData('account', 'Account'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/account.php')))
            ->toArray(),
        (new \App\ColumnData('memo', 'Memo'))
            ->class('text-xs p-2')
            ->headerClass('text-sm text-left')
            ->secondaryHeaderClass('justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/memo.php')))
            ->toArray(),
        (new \App\ColumnData('credit', 'Debit'))
            ->class('text-xs p-2, text-right text-red-500')
            ->headerClass('text-sm text-right')
            ->secondaryHeaderClass('flex items-center, justifty-end')
            ->toArray(),
        (new \App\ColumnData('debit', 'Credit'))
            ->class('text-xs p-2, text-right text-blue-500')
            ->headerClass('text-sm text-right')
            ->toArray(),
    ];

    $model = new GeneralLedger;



    return view('my-table', compact('columns', 'model'));
});