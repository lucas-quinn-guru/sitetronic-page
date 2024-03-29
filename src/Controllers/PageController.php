<?php

namespace LucasQuinnGuru\SitetronicPage\Controllers;

use Illuminate\Http\Request;

use LucasQuinnGuru\SitetronicPage\Models\Page;
use Auth;
use Session;

class PageController extends Controller
{
    public function __construct() {
        $this->middleware(['web'])->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::where('slug', 'index')->first(); //Find page of id = $id
        if( $page == null ) {
            return view( 'welcome' );
        }
        return view ('sitetronic-page::pages.show', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sitetronic-page::pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating title and body field
        $this->validate(
            $request,
            [
                'title'=>'required|max:100',
                'body' =>'required',
            ]
        );

        $title = $request['title'];
        $content = $request['content'];

        $page = Page::create($request->only('title', 'content'));

        //Display a successful message upon save
        return redirect()
            ->route('pages.index')
            ->with('flash_message', 'Page, '. $page->title.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first(); //Find page of id = $id

        return view ('sitetronic-page::pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('sitetronic-page::pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required|max:100',
            'content'=>'required',
        ]);

        $page = Page::findOrFail($id);
        $page->title = $request->input('title');
        $page->body = $request->input('content');
        $page->save();

        return redirect()
            ->route('pages.show', $page->id)
            ->with('flash_message',  'Page, '. $page->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()
            ->route('pages.index')
            ->with('flash_message', 'Page successfully deleted');
    }
}
