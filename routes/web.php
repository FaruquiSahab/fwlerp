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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/customer/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
Route::post('/customer/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');

Route::get('/logout','Auth\AdminLoginController@logout');

Route::get('/', function () 
{
    return view('welcome');
});


Route::get('/test' , 'CorporateController@index');
Route::POST('/check','WarehouseHeadController@checking')->name('checking');

//   Warehouse

Route::prefix('warehouse')->group(function()
{
	// warehouse space utilization
	Route::GET('/space','WarehouseController@space')->name('warehouse.space');
	//warehouse time utilization
	Route::GET('/time','CustomizeWarehouseManagementController@time')->name('warehouse.time');
	//Temporary Storage
	Route::resource('temp','TempStorageController');
	//warehouse head
	Route::resource('head','WarehouseHeadController');
	Route::GET('customer/product','WarehouseHeadController@index2')->name('head.index2');
	Route::GET('stock','WarehouseHeadController@stock')->name('head.stock');

	// pick order intra
	Route::POST('pickorder','WarehouseHeadController@pickorder')->name('head.pickorder');
	// pick order inter
	Route::POST('pickorderI','WarehouseHeadController@pickorderI')->name('head.pickorderI');
	//assign vehicle view intra
	Route::GET('assign/vehicle','WarehouseHeadController@assignVehicle')->name('head.assignvehicle');
	//assign vehicle view inter
	Route::GET('assign/vehicleI','WarehouseHeadController@assignVehicleI')->name('head.assignvehicleI');
	// assign vehicle "check" order
	Route::POST('assign/check','WarehouseHeadController@assigncheck')->name('head.check');
	// assign vehicle "uncheck" order
	Route::POST('assign/uncheck','WarehouseHeadController@assignuncheck')->name('head.uncheck');
	// vehcie mcr show
	Route::POST('vehiclemcr','WarehouseHeadController@showvehiclemcr')->name('vehiclemcr');
	//submit assign vehicle OR line haul
	Route::POST('submitassignvehicle','WarehouseHeadController@submitvehicle')->name('submitassignvehicle');
	// show mcr index
	Route::GET('mcr','WarehouseHeadController@showmcr')->name('mcrindex');
	// store mcr
	Route::POST('createmcr','WarehouseHeadController@storemcr')->name('mcr.store');
	//create manifest show
	Route::GET('manifest','WarehouseHeadController@manifest')->name('head.manifest');
	// cretae manifest on the fly
	Route::GET('manifest/{mcr_id}','WarehouseHeadController@manifest1')->name('manifest');


	Route::POST('head/add_customer','WarehouseHeadController@customerStore')->name('admin_customer.store');
	Route::POST('head/update_customer','WarehouseHeadController@customerUpdate')->name('admin_customer.update');
	//dispatch order warehouse head
	Route::GET('dispatch','WarehouseHeadController@showDispatch')->name('dispatch');
	Route::POST('dispatch','WarehouseHeadController@dispatchOrder')->name('dispatch.store');
	//recieve order warehouse head 
	Route::GET('recieve','WarehouseHeadController@showRecieve')->name('recieve');
	Route::POST('recieve','WarehouseHeadController@recieveOrder')->name('recieve.store');

	//request change inload
	Route::POST('head/changeIn/{id}','WarehouseHeadController@changeIn')->name('head.changeIn');
	//request change offload
	Route::POST('head/changeOff/{id}','WarehouseHeadController@changeOff')->name('head.changeOff');
	// show warehouse stock 
	Route::POST('stock/report','WarehouseHeadController@report')->name('head.report');
	// print one stock 
	Route::POST('stock/reportOne','WarehouseHeadController@reportOne')->name('head.reportOne');
	//print all stock
	Route::GET('stock/reportAll','WarehouseHeadController@reportAll')->name('head.reportAll');
	//print inoads single
	Route::POST('stock/inOne','WarehouseHeadController@inOne')->name('head.inOne');
	//print inloads all
	Route::GET('stock/inAll','WarehouseHeadController@inAll')->name('head.inAll');
	//print offloads intra-city singe
	Route::POST('stock/offOneIntra','WarehouseHeadController@offOneIntra')->name('head.offOneIntra');
	//print offloads inter-city singe
	Route::POST('stock/offOneInter','WarehouseHeadController@offOneInter')->name('head.offOneInter');
	//print offloads inter-city all
	Route::GET('stock/offAllIntra','WarehouseHeadController@offAllIntra')->name('head.offAllIntra');
	//print offloads inter-city all
	Route::GET('stock/offAllInter','WarehouseHeadController@offAllInter')->name('head.offAllInter');

	//get customer by order select
	Route::POST('head/order/customer','WarehouseHeadController@customerByOrder');
	//get product by order select
	Route::POST('head/order/product','WarehouseHeadController@productByOrder');
	//get product by customers
	Route::POST('head/customer/product','WarehouseHeadController@productByCustomer');
	//get quantity of order
	Route::POST('head/order/quantity','WarehouseHeadController@quantityByOrder');
	Route::POST('head/product/quantity','WarehouseHeadController@productBy');
	Route::GET('head/product/customer/{id}','WarehouseHeadController@customerProduct')->name('head.customer.product');

	//Warehouse CRUD Starts
	Route::GET('/' , 'WarehouseController@index')->name('warehouse.index');
	Route::POST('/update/{id}' , 'WarehouseController@update')->name('warehouse.update');
	Route::POST('/' , 'WarehouseController@store')->name('warehouse.store');
	Route::POST('/delete/{id}' , 'WarehouseController@destroy')->name('warehouse.destroy');
	//Warehouse CRUD Ends

//  Warehouse Management and Types
	Route::prefix('wm')->group(function()
	{
		Route::resource('/management','WarehouseManagementController');
		Route::resource('/standard','StandardWarehouseManagementController');
		Route::resource('/customize','CustomizeWarehouseManagementController');
		
	});
});


Route::prefix('admin')->group(function(){
	//Product 
	Route::resource('/product','ProductController');
	Route::POST('/add/product','ProductController@quantity')->name('product.quantity');
	Route::POST('product/quantity','ProductController@productBy');
	//Barcode
	Route::resource('/barcode', 'BarcodeController');
	//Distribution
	Route::resource('/distribution','DistributionController');
	//Distribution Detail Show  
	Route::GET('distributions/','DistributionController@details')->name('distribution.detail');
	//For Distribution Detail status update
	Route::POST('/distribution/setStatus','DistributionController@setStatus');
	//For Distribution Detail reRoute update
	Route::POST('/distribution/re_routed','DistributionController@setCheck');

	Route::resource('/distributormanagement','DistributorManagementController');
	//Only showing transaction index
	Route::GET('/transactions','TransactionController@index')->name('transaction.index');
	Route::GET('/transactions/view','TransactionController@view')->name('transaction.view');
});
//showing customize warehouse data 
Route::GET('customize/view','CustomizeWarehouseManagementController@details');
//update status of action in warehouses
Route::POST('customize_setaction','CustomizeWarehouseManagementController@setAction');

//get warehouse by city
Route::POST('/warehouse_location','TempStorageController@warehouseByCity');


//space by warehouse
Route::POST('/warehouse/space','TempStorageController@sapceByWarehouse');
//shelves by warehouse
Route::POST('/warehouse/shelve','TempStorageController@shelveByWarehouse');


Route::prefix('customer')->group(function(){
	Route::resource('/product','ProductController');
	Route::resource('/order_inload','OrderInLoadController');
	Route::resource('order_offload','OrderOffLoadController');
});
//product by order
Route::POST('/order/product','OrderOffLoadController@productByOrder');
//order by quantity
Route::POST('/order/quantity','OrderOffLoadController@quantityByOrder');
// old
Route::POST('/order/pkgs','OrderOffLoadController@pkgsByOrder');
// stock report old
Route::GET('/stock','OrderInLoadController@stock')->name('customer.stock');
//  logs old
Route::POST('/log','OrderInLoadController@log')->name('customer.log');
// logs all old
Route::GET('/logAll','OrderInLoadController@logAll')->name('customer.logAll');

Route::POST('stock/inOne','OrderInLoadController@inOne')->name('cust.inOne');
Route::GET('stock/inAll','OrderInLoadController@inAll')->name('cust.inAll');
Route::POST('stock/offOne','OrderOffLoadController@offOne')->name('cust.offOne');
Route::GET('stock/offAll','OrderOffLoadController@offAll')->name('cust.offAll');

Route::POST('stock/inOneOthers','OrderInLoadController@inOneOthers')->name('cust.inOneOthers');
Route::GET('stock/inAllOthers','OrderInLoadController@inAllOthers')->name('cust.inAllOthers');
Route::POST('stock/offOneOthers','OrderOffLoadController@offOneOthers')->name('cust.offOneOthers');
Route::GET('stock/offAllOthers','OrderOffLoadController@offAllOthers')->name('cust.offAllOthers');


Route::get('qr-code', function () {
    return view('qrcode');
});
Route::get('/simple', function () {
	$digits = 3;
	echo str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    // $ppp = uniqid('est');
    // return $ppp;
});

//check barcodes example
// Route::get('barcode', 'ProductController@barcode');















