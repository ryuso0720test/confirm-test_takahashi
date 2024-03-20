<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
         return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 
                                    'first_name',
                                    'gender',
                                    'email',
                                    'tel1',
                                    'tel2',
                                    'tel3',
                                     'address',
                                     'building',
                                     'category_id',
                                     'detail'
                                    ]);

        $categories = Category::all();


        return view('confirm', compact('contact','categories'));
    }

    public function store(ContactRequest $request) {

        //修正ボタンがクリックされた場合
        if (isset($request->reject))
        {
            return redirect('/')->withInput();
        }

        $contact = $request->only([
                                    'category_id',
                                    'first_name',
                                    'last_name', 
                                    'gender',
                                    'email',
                                     'tell', 
                                     'address',
                                     'building',
                                     'detail'
                                    ]);
        // dd($contact);
        Contact::create($contact);

        return view('thanks');
    }
}
