<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Model\Blog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param DataTables $dataTables
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(DataTables $dataTables)
    {
        return $dataTables->eloquent(Blog::query())
            ->addColumn('actions', function (Blog $blog) {
                return
                    '<a href="' . action('BlogController@edit', ['id' => $blog->id]) . '" class="btn btn-secondary active" role="button">Edit</a>' .
                    '<button class="btn btn-danger" 
                                data-toggle="confirmation"
                                data-url="' . action('BlogController@destroy', ['blog' => $blog->id]) . '"
                        >Delete</button>';

            })
            ->rawColumns(['actions'])
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form', ['blog' => new Blog()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogStoreRequest $request
     * @return void
     */
    public function store(BlogStoreRequest $request)
    {
        if (Blog::create($request->only(['title', 'description'])))
            return back()->with('success', 'Blog successfully created.');
        return back()->with('error', 'Something went wrong in creating blog.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('form', ['blog' => Blog::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogStoreRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogStoreRequest $request, $id)
    {
        if (Blog::find($id)->update($request->only(['title', 'description'])))
            return back()->with('success', 'Blog successfully updated.');
        return back()->with('error', 'Something went wrong in updating blog.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Blog::destroy($id))
            return response()->json(['message' => 'Successfully deleted blog.'], 200);
        return response()->json(['message' => 'Successfully deleted blog.'], 422);
    }
}
