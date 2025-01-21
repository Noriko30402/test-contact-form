<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->paginate(7);
        $csvData = Contact::all();
        $categories = Category::all();

        return view('admin', compact('categories', 'contacts', 'csvData'));
    }


    public function search(Request $request)
    {
        if ($request->has('reset')) {
            return redirect('/admin')->withInput();
        }

        $query = Contact::query();
        $query = $this->getSearchQuery($request, $query);

        $contacts = $query->paginate(7);
        $csvData = $query->get();
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories', 'csvData'));
    }

        // $query = $request->input('query');
        // $categoryId = $request->input('category_id', null);
        // $keyword = $request->input('keyword');
        // $createdAt = $request->input('created_at');
        // $gender = $request->input('gender');

        // $contacts = Contact::where(function($query) use ($request) {
        //     $query->where('last_name', 'LIKE', '%' . $request->input('query') . '%')
        //           ->orWhere('first_name', 'LIKE', '%' . $request->input('query') . '%')
        //           ->orWhere('email', 'LIKE', '%' . $request->input('query') . '%');
        // });

        // if ($categoryId) {
        //     $contacts = $contacts->where('category_id', $categoryId);
        // }
        // if ($gender) {
        //     $contacts = $contacts->where('gender', $gender);
        // }
        // if ($createdAt) {
        //     $contacts = $contacts->whereDate('created_at', $createdAt);
        // }
        // $contacts = $contacts->paginate(7)->appends($request->except('page'));
        // $categories = Category::all();

        // return view('admin', compact('contacts', 'categories'));



    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    private function getSearchQuery($request, $query)
    {
        if(!empty($request->keyword)) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }
        if (!empty($request->gender)) {
            $query->where('gender', '=', $request->gender);
        }
        if (!empty($request->category_id)) {
            $query->where('category_id', '=', $request->category_id);
        }
        if (!empty($request->date)) {
            $query->whereDate('created_at', '=', $request->date);
        }
        return $query;
    }


    public function export(Request $request)
    {
        $query = Contact::query();
        $query = $this->getSearchQuery($request, $query);
        $csvData = $query->get()->toArray();
        $csvHeader = [
            'id', 'category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail', 'created_at', 'updated_at'
        ];
        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $createCsvFile = fopen('php://output', 'w');

            mb_convert_variables('SJIS-win', 'UTF-8', $csvHeader);

            fputcsv($createCsvFile, $csvHeader);

            foreach ($csvData as $csv) {
                $csv['created_at'] = Date::make($csv['created_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
                $csv['updated_at'] = Date::make($csv['updated_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
                fputcsv($createCsvFile, $csv);
            }

            fclose($createCsvFile);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);

        return $response;
    }
}