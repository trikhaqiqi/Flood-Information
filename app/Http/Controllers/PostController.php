<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('approve', '=', 1)->orderBy('id', 'desc')->SimplePaginate(6);
        return view('posts.index', compact('posts'));
    }

    public function indexWaiting()
    {
        $posts = Post::all()->where('approve', '=', 0);
        return view('dashboard.PostApprove.waitingApprove', compact('posts'));
    }

    public function indexApprove()
    {
        $posts = Post::all()->where('approve', '=', 1);
        return view('dashboard.PostApprove.indexPost', compact('posts'));
    }

    public function location()
    {
        $posts = Post::all();
        return view('home', compact('posts'));
    }

    public function show($title)
    {
        $post = Post::where('slug', $title)->first();
        $posts = Post::where('category_id', $post->category_id)->latest()->limit(4)->get();


        //! ini kalau halamannya tidak ditemukan dan akan ke halaman 404
        if ($post == null)
            abort(404);

        return view('posts.single', compact('post', 'posts'));
    }

    public function create()
    {
        return view('posts.create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'mimes::jpeg,png,jpg',
            'title' => 'required|max:255|min:3',
            'category' => 'required',
            'tags' => 'array|required',
            'subject' => 'required|min:10',
            'location' => 'required|max:255',
            'thumbnail' => 'required'
        ]);

        $imgName = null;
        if ($request->thumbnail) {
            $imgName = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('image'), $imgName);
        }

        //! menggunakan mass assignment
        //! pastikan guarded di models Postnya
        $posts = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'category_id' => $request->category,
            'user_id' => auth()->id($request->user_id),
            'location' => $request->location,
            'subject' => $request->subject,
            'thumbnail' => $imgName
        ]);

        $posts->tags()->attach(request('tags'));
        $posts->save();

        $posts->notify(new \App\Notifications\PostPublished());

        session()->flash('success', 'The post was created');

        return redirect('post');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        //! ini menggunakan update biasa
        // $post = Post::find($id);
        // $post->title =  $request->title;
        // $post->subject =  $request->subject;
        // $post->save();

        //! ini adalah policy
        $request->validate([
            'title' => 'required|max:255|min:3',
            'subject' => 'required|min:10',
            'approve' => 'required',
            'location' => 'required|max:255|min:3'
        ]);

        $imgName = null;
        if ($request->thumbnail) {
            $imgName = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('image'), $imgName);
        }


        $post = Post::find($id)->update([
            // $this->authorize('update', $post),
            'title' => $request->title,
            'subject' => $request->subject,
            'approve' => $request->approve,
            'category_id' => $request->category,
            'location' => $request->location,
            'thumbnail' => $imgName
        ]);


        session()->flash("success", "The post was updated");
        // $post->tags()->sync(request('tags'));
        return redirect('/post');
    }

    public function destroy($id)
    {
        // dd('hapus' . $id);

        // if (auth()->user()->is($post->author)) {

        Post::find($id)->delete();

        session()->flash("success", "The post was deleted");
        // $this->authorize('delete', $post);
        return redirect('/post');
        // } else {
        //     session()->flash("success", "It wasn't your post");

        //     return redirect('/post');
        // }


        // Post::find($id)->delete();

        // session()->flash("success", "The post was deleted");

        // return redirect('/post');
    }
}
