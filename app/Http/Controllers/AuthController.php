<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
    {

        $categories = Category::all();
        $contacts = Contact::paginate(7);

        return view('admin', compact('contacts','categories'));
    }
    }
}
