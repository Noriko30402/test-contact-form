<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index(){

        $categories = Category::all();

    return   view('index',compact('categories'));
    }


    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['category_id', 'first_name','last_name','gender','building',
                                    'email', 'tell','tel1', 'tel2', 'tel3','address','detail']);
        $category = Category::find($contact['category_id']);
        $request->merge([ 'tell' => $request->input('tel1') . $request->input('tel2') . $request->input('tel3'), ]);


    return view('confirm', compact('contact','category'));
    }


    public function store(Request $request)
    {

        $contact = $request->only(['first_name', 'last_name','gender','email','tell', 'tel1','tel2','tel3', 'address','building','category_id','detail']);

        $contact['tell'] = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        unset($contact['tel1'], $contact['tel2'], $contact['tel3']);
        Contact::create($contact);
        return view('thanks');
    }

} 

        // $tell = $contact['tel1'].$contact['tel2'].$contact['tel3'];
        // $contact['tell'] = $tell;
        // Contact::create($contact);
