<?php
namespace App\Models\Listing;

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Models\Listing;

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

//all listings
Route::get('/',[ListingController::class,'index']);
// {
    // return view('listings',[
    //     // 'heading' => 'Latest Listings', commentiing as it is of no use now
    //     'listings'=> Listing::all()
    // ]);
    //copied this whole line of code to ListingController 
// });

// create form
Route::get('/listings/create',[ListingController::class,'create']);
// store form
Route::post('/listings', [ListingController::class, 'store']);

//show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
// edit submit to update
Route::get('/listings/{listing}',[ListingController::class,'update']);

//single listing
// Route::get('/listings/{id}',function($id){
//     $listing = Listing::find($id);
//     if($listing){
//         return view('listing',[
//             'listing'=>$listing
//         ]);
//     }
//     else{
//         abort('404');
//     }
   
// });

//  this is the code of youtube
Route::get('/listings/{listing}',[ListingController::class,'show']);
// {
    // return view('listing',[
    //     'listing'=>$listing
    // ]);
    // copied this whole line of code to ListingController 
   
// });
