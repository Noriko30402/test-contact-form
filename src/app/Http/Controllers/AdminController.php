<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::all();

        // $contacts = Contact::paginate(7);
    
        return view('admin', compact('categories', 'contacts'));
    }
    

    public function search(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category_id', null);
        $keyword = $request->input('keyword');
        $createdAt = $request->input('created_at');
        $gender = $request->input('gender');
    
        // 名前またはメールアドレスで検索
        $contacts = Contact::where(function($query) use ($request) {
            $query->where('last_name', 'LIKE', '%' . $request->input('query') . '%')
                  ->orWhere('first_name', 'LIKE', '%' . $request->input('query') . '%')
                  ->orWhere('email', 'LIKE', '%' . $request->input('query') . '%');
        });
    
        // カテゴリとキーワードでフィルタリング
        if ($categoryId) {
            $contacts = $contacts->where('category_id', $categoryId);
        }
        if ($gender) {
            $contacts = $contacts->where('gender', $gender);
        }

        // 日付でフィルタリング
        if ($createdAt) {
            $contacts = $contacts->whereDate('created_at', $createdAt);
        }
    
        $contacts = $contacts->with('category')->get();
        $categories = Category::all();
    
        return view('admin', compact('contacts', 'categories'));
    }
    }






