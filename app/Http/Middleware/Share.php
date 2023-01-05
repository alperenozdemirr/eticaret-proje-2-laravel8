<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
//use Illuminate\View\View;
use Illuminate\Support\Facades\View;

class Share
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $categories=Category::whereNull('category_id')->with('childrenCategories')->get();
        $data['categories']=$categories;
        $data['categories_all']=Category::all();
        View::share('data',$data);

        return $next($request);
    }
}
