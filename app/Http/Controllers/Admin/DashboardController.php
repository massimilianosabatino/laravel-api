<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Functions\RssReader;

class DashboardController extends Controller
{
    public function index()
    {
        //Get total project number
        $countProjectTotal = DB::table('projects')->count('id');

        //Get statistic
        $countMaxOnCategory = DB::table('projects')->select(DB::raw('count(id) as number, type_id'))->groupBy('type_id')->get();
        $getMaxCategory = max($countMaxOnCategory->all());
        $getMaxCategoryName = DB::table('types')->find($getMaxCategory->type_id);
        
        //Get feed
        $news = RssReader::readUrl("https://feed.laravel-news.com/", 3);

        return view('admin.dashboard', compact('countProjectTotal', 'getMaxCategory', 'getMaxCategoryName', 'news'));
    }
}
