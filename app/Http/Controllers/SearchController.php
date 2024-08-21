<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobList;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Example search logic, replace with your own
        $results = JobList::where('Job_title', 'LIKE', "%{$query}%")
            ->orWhere('company', 'LIKE', "%{$query}%")
            ->orWhere('location', 'LIKE', "%{$query}%")
            ->orWhere('skills_required', 'LIKE', "%{$query}%")
            ->paginate(9);

            $results->appends(['query' => $query]);

        return view('results', compact('results'));
    }
}