<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function show()
    {
        $data = BlogModel::orderBy("id", "desc")->paginate(4);
        return view("blog", compact("data"));
    }
    public function more($id)
    {
        $data = BlogModel::find($id);
        return view("read-more-blog", compact("data"));
    }
    public function blog_page()
    {
        $lists = BlogModel::orderBy("id", "desc")->get();
        return view("admin.blog", compact('lists'));
    }
    public function add_blog(Request $request)
    {
        $vail = validator($request->all(), [
            'title' => 'required',
            'short_title' => 'required',
            'about' => 'required',
            'image' => 'required|file|mimes:jpeg,png,jpg,webp',
            'date' => 'required',
            'long_about' => 'required',
        ]);
        if ($vail) {
            $file = $request->file('image');


            $targetDirectory = 'uploads/Blog Images/';


            $targetPath = $targetDirectory . $file->getClientOriginalName();
            $fileName =  $file->getClientOriginalName();
            print_r($targetPath);

            $file->move(public_path($targetDirectory), $file->getClientOriginalName());

            BlogModel::create([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'about' => $request->about,
                'image' => $fileName,
                'date' => $request->date,
                'long_about' => $request->long_about,
            ]);
            return redirect()->back()->with('success', 'Blog Added successfully.');
        }
    }
    public function update_blog_page($id)
    {
        $blog = BlogModel::find($id);
        return view("admin.update_blog", compact('blog'));
    }
    public function update_blog(Request $request, $id)
    {
        $vail = validator($request->all(), [
            'title' => 'required',
            'short_title' => 'required',
            'about' => 'required',
            'image' => 'required|file|mimes:jpeg,png,jpg,webp',
            'date' => 'required',
            'long_about' => 'required',
        ]);
        $blog = BlogModel::find($id);
        if ($vail) {
            // Upload and save the new image
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $targetDirectory = 'uploads/Blog Images/';
            $file->move(public_path($targetDirectory), $fileName);
            $blog->image = $fileName;

            $blog->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'about' => $request->about,
                'date' => $request->date,
                'long_about' => $request->long_about,
            ]);
        }
        return redirect()->route('adm.blog.page')->with('success', 'Blog Updated successfully.');
    }

    public function delete_blog($id)
    {
        $blog = BlogModel::find($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Blog Deleted successfully.');
    }
}
