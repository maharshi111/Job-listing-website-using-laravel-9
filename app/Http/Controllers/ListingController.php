<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index(){
        // dd(request('tag'));
        return view('listings.index',[
            // 'heading' => 'Latest Listings', commentiing as it is of no use now
            // 'listings'=> Listing::latest()->filter((request(['tag','search'])))->get() changed to below
            'listings'=> Listing::latest()->filter((request(['tag','search'])))->paginate(6)
        ]);
    }
    //show single listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing'=>$listing
        ]);
    }
    //show form
    public function create(){
        return view('listings.create');
    }
    // store listing data
    public function store(Request $request){
      
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if($request->hasFile('logo')){
            $formFields['logo']=$request->file('logo')->store('logos','public');
        }

        Listing::create($formFields);

       return redirect('/')->with('message','Listing created successfully!');
    } 
    // $request->validate([...]) is used to validate the incoming form data. The validation rules are defined as an associative array, where each field name corresponds to a rule or an array of rules. Here's what each validation rule does:

    //     'title' => 'required': The 'title' field is required, meaning the user must provide a value for it.

    // Rule::unique('listings', 'company') means listings table ka company coloumn unique hona chhaiye
    //return redirect('/'); it means after succesfull processing of form or data it will redirect  the user  to the '/' that is the home page
    public function edit(Listing $listing){
      
        return view('listings.edit',['listing'=>$listing]);
    }
} 
