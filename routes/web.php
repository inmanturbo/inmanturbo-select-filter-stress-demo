<?php

use App\Http\Livewire\VOne;
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

Route::get('/v1', function () {

    $tHeadLeftClass = 'bg-[#BCD6A7] text-[#0000FF] uppercase text-sm text-left whitespace-nowrap';
    $tHeadRightClass = 'bg-[#BCD6A7] text-[#0000FF] uppercase text-sm text-right whitespace-nowrap';
    $columns = [
        (new \App\ColumnData('year', 'Year'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/year.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('month', 'Month'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/month.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('date', 'Date'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/date.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('department', 'Department'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/department.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('account_holder', 'Account Holder'))
            ->class('whitespace-nowrap text-xs tracking-tighter p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/account_holder.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('status', 'Status'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/status.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('transaction_type', 'Type'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/transaction_type.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('check_number', 'Check No.'))
            ->secondaryHeaderView('header-select')
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/check_number.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('payee', 'Payee'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/payee.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('transaction_id', 'Transaction ID'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/transaction_id.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('project', 'Project'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/project.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('reference_number', 'Reference No'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/reference_number.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('division', 'Division'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/division.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('account', 'Account'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/account.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('memo', 'Memo'))
            ->class('text-xs tracking-tighter p-1 whitespace-nowrap')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/memo.php')))
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('debit', 'Debit'))
            ->class('whitespace-nowrap text-xs text-right text-red-500 p-1')
            ->headerClass($tHeadRightClass)
            ->secondaryHeaderClass('whitespace-nowrap text-xs text-right text-red-500')
            ->footerClass('whitespace-nowrap text-xs text-right text-red-500')
            ->withTotal()
            ->sortable()
            ->searchable()
            ->toArray(),
        (new \App\ColumnData('credit', 'Credit'))
            ->class('whitespace-nowrap text-xs text-right text-blue-500')
            ->secondaryHeaderClass('whitespace-nowrap text-xs text-right text-blue-500')
            ->headerClass($tHeadRightClass)
            ->footerClass('whitespace-nowrap text-xs text-right text-blue-500')
            ->withTotal()
            ->sortable()
            ->searchable()
            ->toArray(),
    ];

    $model = new GeneralLedger;

    $row = (new \App\RowData)
        ->evenClass('bg-gray-100 border-red-500 border-b border-t')
        ->oddClass('bg-white border-gray-500 border-b border-t')
        ->toArray();

    $config = (new \App\DatatableConfig)
        ->withDateFilters('date')
        ->toolbarLeftEnd('livewire-tables.table-actions')
        ->evenClass('bg-gray-100 border-gray-500 border-b border-t')
        ->oddClass('bg-white border-gray-500 border-b border-t')
        ->tableClass('w-full')
        ->tBodyClass('bg-white')
        ->toArray();


    return view('v1', compact('columns', 'config'));
});

Route::get('/my-table', function () {
    $tHeadLeftClass = 'bg-[#BCD6A7] text-[#0000FF] uppercase text-sm text-left whitespace-nowrap';
    $tHeadRightClass = 'bg-[#BCD6A7] text-[#0000FF] uppercase text-sm text-right whitespace-nowrap';
    $columns = [
        (new \App\ColumnData('year', 'Year'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->secondaryHeaderSelect(include(base_path('bootstrap/cache/year.php')))
            ->toArray(),
        (new \App\ColumnData('month', 'Month'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/month.php')))
            ->toArray(),
        (new \App\ColumnData('date', 'Date'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/date.php')))
            ->toArray(),
        (new \App\ColumnData('department', 'Department'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/department.php')))
            ->toArray(),
        (new \App\ColumnData('account_holder', 'Account Holder'))
            ->class('whitespace-nowrap text-xs tracking-tighter p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/account_holder.php')))
            ->toArray(),
        (new \App\ColumnData('status', 'Status'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/status.php')))
            ->toArray(),
        (new \App\ColumnData('transaction_type', 'Type'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/transaction_type.php')))
            ->toArray(),
        (new \App\ColumnData('check_number', 'Check No.'))
            ->secondaryHeaderView('header-select')
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->withTotal()
            ->options(include(base_path('bootstrap/cache/check_number.php')))
            ->toArray(),
        (new \App\ColumnData('payee', 'Payee'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/payee.php')))
            ->toArray(),
        (new \App\ColumnData('transaction_id', 'Transaction ID'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/transaction_id.php')))
            ->toArray(),
        (new \App\ColumnData('project', 'Project'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/project.php')))
            ->toArray(),
        (new \App\ColumnData('reference_number', 'Reference No'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/reference_number.php')))
            ->toArray(),
        (new \App\ColumnData('division', 'Division'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/division.php')))
            ->toArray(),
        (new \App\ColumnData('account', 'Account'))
            ->class('whitespace-nowrap text-xs p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/account.php')))
            ->toArray(),
        (new \App\ColumnData('memo', 'Memo'))
            ->class('whitespace-nowrap text-xs tracking-tighter p-1')
            ->headerClass($tHeadLeftClass)
            ->secondaryHeaderClass('whitespace-nowrap justify-start')
            ->secondaryHeaderView('header-select')
            ->options(include(base_path('bootstrap/cache/memo.php')))
            ->toArray(),
        (new \App\ColumnData('debit', 'Debit'))
            ->class('whitespace-nowrap text-xs text-right text-red-500 p-1')
            ->headerClass('whitespace-nowrap bg-gray-50 text-sm text-right')
            ->secondaryHeaderClass('whitespace-nowrap text-xs text-right text-red-500')
            ->footerClass('whitespace-nowrap text-xs text-right text-red-500')
            ->withTotal()
            ->toArray(),
        (new \App\ColumnData('credit', 'Credit'))
            ->class('whitespace-nowrap text-xs text-right text-blue-500')
            ->secondaryHeaderClass('whitespace-nowrap text-xs text-right text-blue-500')
            ->headerClass('whitespace-nowrap bg-gray-50 text-sm text-right')
            ->footerClass('whitespace-nowrap text-xs text-right text-blue-500')
            ->withTotal()
            ->toArray(),
        // (new \App\ColumnData('', 'Manage'))
        //     ->class('whitespace-nowrap text-xs text-right text-blue-500')
        //     ->secondaryHeaderClass('whitespace-nowrap text-xs text-right text-blue-500')
        //     ->headerClass('whitespace-nowrap bg-gray-50 text-sm text-right')
        //     ->footerClass('whitespace-nowrap text-xs text-right text-blue-500')
        //     ->view('manage')
        //     ->toArray(),
    ];

    $model = new GeneralLedger;

    $row = (new \App\RowData)
        ->evenClass('bg-gray-100 border-gray-500 border-b border-t')
        ->oddClass('bg-white border-gray-500 border-b border-t')
        ->toArray();

    return view('my-table', compact('columns', 'row' ,'model'));
});