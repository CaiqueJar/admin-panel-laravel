<?php

namespace App\Http\Controllers\Adm;

use App\Classes\ImageHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    private $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->blog
                    ->selectRaw("*, DATE_FORMAT(published_at, '%d/%m/%Y %H:%i') AS published_at")
                    ->paginate(12);

        return view('admin.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        if(!$request->hasFile('image')) {
            return redirect()->back()->withErrors('Nenhuma imagem foi anexada.')->withInput();
        }

        $image_name = ImageHandler::saveImage($request->file('image'), $request->input('convert-to-webp'), 'upload/blog');

        $date = $request->date ?? date('Y-m-d');
        $time = $request->time ?? date('H:i');
        $datePost = Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $time)->setTimezone('America/Sao_Paulo');

        $this->blog->create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'author_id' => Auth::user()->id,
            'published_at' => $datePost,
            'status' => $request->status,
            'featured_image' => $image_name,
            'tags' => $request->tags,
            'meta_description' => $request->meta_description
        ]);

        return redirect()->route('blog.index')->with(['success' => 'Postagem cadastrada com sucesso!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->blog
                    ->selectRaw("*, DATE_FORMAT(published_at, '%Y-%m-%d') AS date, DATE_FORMAT(published_at, '%H:%i') AS time")
                    ->find($id);

        if(!$post) {
            return redirect()->route('blog.index')->withErrors('Postagem não encontrada!');
        }

        return view('admin.blog.edit', compact('post'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
