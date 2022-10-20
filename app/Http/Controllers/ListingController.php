<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //show all listing
 public function index()
 {
    return view('listings.index',[
        'listings' => Listing::latest()->filter(request(['tag','search']))->get(),
    ]);
 }

 //show single listing
 public function show(Listing $listing)
 {
    return view('listings.show',[
        'listing' => $listing
    ]);
 }
 // create single listing
    public function create()
    {
        return view('listings.create');
        # code...
    }
}
