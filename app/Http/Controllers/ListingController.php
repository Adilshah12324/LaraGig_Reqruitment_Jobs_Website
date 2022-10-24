<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Auth\Events\Validated;

class ListingController extends Controller
{
    //show all listing
 public function index()
 {
    return view('listings.index',[
        'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(4),
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
    // store listing data
    public function store(Request $request)
    {
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => 'required',
            'tags' => 'required',
            'description' => 'required',

        ]);
        Listing::create($formFields);
        return redirect('/')->with('message','Listing Created Successfully..!');
        # code...
    }
}
