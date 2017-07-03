<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->with('author')->get();
        
        return $articles; // @TODO: create and load view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
	
	/**
	 * Display the specified resource.
	 *
	 * @param Article $article
	 *
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
    public function show(Article $article)
    {
	    return $article; // @TODO: create and load view
    }
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Article $article
	 *
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
    public function edit(Article $article)
    {
        //
    }
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param Article $article
	 *
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
    public function update(Request $request, Article $article)
    {
        //
    }
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Article $article
	 *
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
    public function destroy(Article $article)
    {
        //
    }
}
