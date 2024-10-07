<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{ 
    public function showBlogs(){
        $blogsList = DB::table('blogs')->paginate(3);
        if($blogsList){
            return view('home', ['blogs'=> $blogsList]);
        }
        else{
            return with('error', 'Failed to fetch blog. Please try again.')->withInput();
        }
    }


    public function createBlog(){
        return view('blog');
    }


    public function viewSingleBlog($id){
        $blog = DB::table('blogs')->find($id);
        if($blog){
            $comments = DB::table('comments')->where('blog_id', '=', $id)->get();
            return view('singleBlog', ['content' => $blog, 'comments' => $comments]);
        }else{
        return redirect()->back()->with('error', 'Failed to fetch blog. Please try again.')->withInput();
        }
    }

    // public function searchBlogs(){
    //     return view('searchBlog');
    // }

    public function searchBlogs(){
        return view('searchBlog');
    }

    // public function search(Request $req){
    //     $query = $req->input('query');
    //     $blogs = DB::table('blogs')->where('name', 'LIKE', '%'. $query. '%')->paginate(3);
    //     return view('searchBlog', compact('blogs', 'query'));
    // }

    public function search(Request $req){
        $query = $req->input('query');
        $blogs = Blog::where('title', 'like', '%' . $query . '%')
                      ->orWhere('blog', 'like', '%' . $query . '%')
                      ->orWhere('name', 'like', '%' . $query . '%')
                      ->paginate(3);
                      return view('searchBlog', compact('blogs', 'query'));
    // dd($blogs);
        // Return the results as a JSON response
        // return response()->json($blogs);
    }

    public function addBlog(Request $req){
       $req->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'title' => 'required|max:150',
        'blog' => 'required|string|min:50'
       ]); 
      $blog =  blog::create([
        'name' => $req->name,
        'email' => $req->email,
        'title' => $req->title,
        'blog' => $req->blog,
       ]);
       if($blog){
        return redirect('/')->with('success', 'Blog published successfully!');
       }else{
        return redirect()->back()->with('error', 'Failed to publish blog. Please try again.')->withInput();
       }

    }
    
    public function editPage($id){
    $blog = DB::table('blogs')->find($id);
    if($blog){
       return view('editPage', ['content' => $blog]);
    }else{
       return redirect()->back()->with('error', 'Failed to fetch blog. Please try again.')->withInput();
}
    }


    public function updateBlog(Request $req, $id){
$req->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'title' => 'required|max:150',
        'blog' => 'required|string|min:50'
]);
   $blog = blog::findOrFail($id);
   $blog->name = $req->name;
   $blog->email = $req->email;
   $blog->title = $req->title;
   $blog->blog = $req->blog;
   $blog->save();
if($blog){
    return redirect('/')->with('success', 'Blog updated successfully!');
}else{
    return redirect()->back()->with('Error', 'There is a problem in updating blog!');
}

    }


    public function deleteBlog($id){
        $blog = blog::find($id);
        if($blog){
            $blog->delete();
            return redirect('/')->with('success', 'Blog deleted successfully!');
        }else{
            return redirect()->back()->with('Error', 'There is a problem in deleting blog!');
        }

    }
}
