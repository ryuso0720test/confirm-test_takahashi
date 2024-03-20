<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Contact;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function search(Request $request)
    {
        $contacts=Contact::all();
        $result_contacts=NULL;

        /* テーブルから全てのレコードを取得する */
        $AllContact = Contact::query();

        /* キーワードから検索処理 */
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $AllContact->where('first_name', 'LIKE', "%{$keyword}%")
                ->orWhere("last_name", "like", "%".$keyword."%")
                ->orWhere("email", "like", "%".$keyword."%")->get();
        }
        
        $contacts = $AllContact->paginate(7);

        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
}
