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
use Carbon\Carbon;
Route::get('/', function () {
	//session()->flash('flash', 'success');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('getFlash', function() {

	return 'status ok!';
});
Route::get('datetime', function() {
	Carbon::setWeekStartsAt(Carbon::SATURDAY);
	Carbon::setWeekEndsAt(Carbon::FRIDAY);
	$startOfWeek = Carbon::now()->startOfWeek();
	$endOfWeek = Carbon::now()->endOfWeek();
	//date('l', strtotime($endOfWeek->toDateString()));
	//date('l', strtotime($endOfWeek->addDays(1)->toDateString()));

	$dbblDatas = collect(dbblServerDataSet());
	dd($dbblDatas->groupBy('customer_mobile'));
	$filterPatients = [];
	foreach ($dbblDatas as $key => $data) {
		if((convertDateYmd($data['TXN_DATE']) < $startOfWeek->toDateString()) || (convertDateYmd($data['TXN_DATE']) > $endOfWeek->toDateString()) )
			continue;

		$filterPatients[] = [
			'txn_id' => $data['TRANSACTION_ID'],
			'txn_date' => convertDateYmd($data['TXN_DATE']),
			'amount' => $data['TXN_AMT']
		];
	}
	return $filterPatients;
	$currentWeekDays[] = $startOfWeek->toDateString();

	for ($i=1; $i <= 6 ; $i++) { 
		$plusDay = $startOfWeek->addDays(1)->toDateString();
		if($endOfWeek->toDateString() == $plusDay)
			$currentWeekDays[] = 'is friday booking';

		$currentWeekDays[] =  $plusDay;
	}
	return $currentWeekDays;
});

function bookingForFirday() {

}

function bookingForSaturday() {

}


function existsDataSet() {
	return [
		[
			'txn_id' => 600186902,
			'serial_no' => 1,
			'visit_day' => 'Friday',
			'visit_date' => '2017-10-20',
			'txn_amount' => 490,
			'blance_status' => 'Due10',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
		[
			'txn_id' => 600187841,
			'serial_no' => 2,
			'visit_day' => 'Friday',
			'visit_date' => '2017-10-20',
			'txn_amount' => 15000,
			'blance_status' => 'paid',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
		[
			'txn_id' => 600188775,
			'serial_no' => 3,
			'visit_day' => 'Friday',
			'visit_date' => '2017-10-20',
			'txn_amount' => 15000,
			'blance_status' => 'paid',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
		[
			'txn_id' => 600189445,
			'serial_no' => 4,
			'visit_day' => 'Friday',
			'visit_date' => '2017-10-20',
			'txn_amount' => 15000,
			'blance_status' => 'paid',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
		[
			'txn_id' => 600190423,
			'serial_no' => 5,
			'visit_day' => 'Friday',
			'visit_date' => '2017-10-20',
			'txn_amount' => 15000,
			'blance_status' => 'paid',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
		[
			'txn_id' => 600191084,
			'serial_no' => 6,
			'visit_day' => 'Friday',
			'visit_date' => '2017-10-20',
			'txn_amount' => 15000,
			'blance_status' => 'paid',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
		[
			'txn_id' => 600191717,
			'serial_no' => 7,
			'visit_day' => 'Friday',
			'visit_date' => '2017-10-20',
			'txn_amount' => 15000,
			'blance_status' => 'paid',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
		[
			'txn_id' => 600192716,
			'serial_no' => 120,
			'visit_day' => 'Friday',
			'visit_date' => '2017-10-20',
			'txn_amount' => 15000,
			'blance_status' => 'paid',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
		[
			'txn_id' => 600193604,
			'serial_no' => 121,
			'visit_day' => 'Saturday',
			'visit_date' => '2017-10-21',
			'txn_amount' => 15000,
			'blance_status' => 'paid',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
		[
			'txn_id' => 600194311,
			'serial_no' => 122,
			'visit_day' => 'Saturday',
			'visit_date' => '2017-10-21',
			'txn_amount' => 15000,
			'blance_status' => 'paid',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
		[
			'txn_id' => 600195014,
			'serial_no' => 123,
			'visit_day' => 'Saturday',
			'visit_date' => '2017-10-21',
			'txn_amount' => 15000,
			'blance_status' => 'paid',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
		[
			'txn_id' => 600196143,
			'serial_no' => 128,
			'visit_day' => 'Saturday',
			'visit_date' => '2017-10-21',
			'txn_amount' => 15000,
			'blance_status' => 'paid',
			'doctor_name' => 'Dr. A H M Kamal Ahmed FCPS -Eye',
			'doctor_designation' => 'Eye Specialist & Phaco Surgeon',
		],
	];
}

function dbblServerDataSet() {
	return [
		[
			'TRANSACTION_ID' => 600186902,
			'TXN_DATE' => '10/10/2017',
			'VALUE_DATE' => '10/10/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 490,
		],
		[
			'TRANSACTION_ID' => 600186902,
			'TXN_DATE' => '10/12/2017',
			'VALUE_DATE' => '10/12/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 490,
		],
		[
			'TRANSACTION_ID' => 600186902,
			'TXN_DATE' => '10/14/2017',
			'VALUE_DATE' => '10/14/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 490,
		],
		[
			'TRANSACTION_ID' => 600187841,
			'TXN_DATE' => '10/14/2017',
			'VALUE_DATE' => '10/14/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600188775,
			'TXN_DATE' => '10/14/2017',
			'VALUE_DATE' => '10/14/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600189445,
			'TXN_DATE' => '10/15/2017',
			'VALUE_DATE' => '10/15/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600190423,
			'TXN_DATE' => '10/16/2017',
			'VALUE_DATE' => '10/16/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600191084,
			'TXN_DATE' => '10/16/2017',
			'VALUE_DATE' => '10/16/2017',
			'customer_mobile' => 'KAMAL1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600191717,
			'TXN_DATE' => '10/17/2017',
			'VALUE_DATE' => '10/17/2017',
			'customer_mobile' => 'KAMAL1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600192716,
			'TXN_DATE' => '10/17/2017',
			'VALUE_DATE' => '10/17/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600193604,
			'TXN_DATE' => '10/17/2017',
			'VALUE_DATE' => '10/17/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600194311,
			'TXN_DATE' => '10/18/2017',
			'VALUE_DATE' => '10/18/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600195014,
			'TXN_DATE' => '10/18/2017',
			'VALUE_DATE' => '10/18/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600196143,
			'TXN_DATE' => '10/18/2017',
			'VALUE_DATE' => '10/18/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600196983,
			'TXN_DATE' => '10/18/2017',
			'VALUE_DATE' => '10/18/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 600197615,
			'TXN_DATE' => '10/18/2017',
			'VALUE_DATE' => '10/18/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601101536,
			'TXN_DATE' => '10/19/2017',
			'VALUE_DATE' => '10/19/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102265,
			'TXN_DATE' => '10/19/2017',
			'VALUE_DATE' => '10/19/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102266,
			'TXN_DATE' => '10/19/2017',
			'VALUE_DATE' => '10/19/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102267,
			'TXN_DATE' => '10/19/2017',
			'VALUE_DATE' => '10/19/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102268,
			'TXN_DATE' => '10/19/2017',
			'VALUE_DATE' => '10/19/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102269,
			'TXN_DATE' => '10/19/2017',
			'VALUE_DATE' => '10/19/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102270,
			'TXN_DATE' => '10/19/2017',
			'VALUE_DATE' => '10/19/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102271,
			'TXN_DATE' => '10/19/2017',
			'VALUE_DATE' => '10/19/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102272,
			'TXN_DATE' => '10/20/2017',
			'VALUE_DATE' => '10/20/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102273,
			'TXN_DATE' => '10/20/2017',
			'VALUE_DATE' => '10/20/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102274,
			'TXN_DATE' => '10/20/2017',
			'VALUE_DATE' => '10/20/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102277,
			'TXN_DATE' => '10/20/2017',
			'VALUE_DATE' => '10/20/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102276,
			'TXN_DATE' => '10/20/2017',
			'VALUE_DATE' => '10/20/2017',
			'customer_mobile' => 'KAMAL1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102278,
			'TXN_DATE' => '10/20/2017',
			'VALUE_DATE' => '10/20/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102279,
			'TXN_DATE' => '10/20/2017',
			'VALUE_DATE' => '10/20/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102280,
			'TXN_DATE' => '10/20/2017',
			'VALUE_DATE' => '10/20/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102285,
			'TXN_DATE' => '10/21/2017',
			'VALUE_DATE' => '10/21/2017',
			'customer_mobile' => '1558352301',
			'TXN_AMT' => 15000,
		],
		[
			'TRANSACTION_ID' => 601102288,
			'TXN_DATE' => '10/22/2017',
			'VALUE_DATE' => '10/22/2017',
			'customer_mobile' => 'KAMAL1558352301',
			'TXN_AMT' => 15000,
		],
	];
}

function convertDateYmd($date) {
	return date('Y-m-d', strtotime($date));
}
