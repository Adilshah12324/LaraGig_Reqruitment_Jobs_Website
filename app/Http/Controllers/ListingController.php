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
        'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6),
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
            // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => 'required',
            'tags' => 'required',
            'description' => 'required',

        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos','public');
            # code...
        }
        Listing::create($formFields);
        return redirect('/')->with('message','Listing Created Successfully..!');
        # code...
    }
    public function edit(Listing $listing)
    {
        return view('listings.edit',['listing'=> $listing]);
        # code...
    }
    public function update(Request $request,Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required',
            'tags' => 'required',
            'description' => 'required',

        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos','public');
            # code...
        }
        
        $listing->update($formFields);
        
        return back()->with('message','Listing updated Successfully..!');
        # code...
    }
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message','Listing Deleted Successfully..!');
        
        # code...
    }
}
