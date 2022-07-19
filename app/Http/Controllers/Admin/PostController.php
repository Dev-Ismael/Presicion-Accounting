<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perPage( $num=10 )
    {
        // Dynamic pagination
        $posts = Post::orderBy('id','desc')->paginate( $num );
        return view("admin.posts.index",compact("posts"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate( 10 );
        return view("admin.posts.index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $requestData = $request->all();
        // Hash Password
        $requestData['password'] = Hash::make($request->password);

        // Store in DB
        try {
            $post = Post::create( $requestData );
                return redirect() -> route("admin.posts.index") -> with( [ "success" => " Post added successfully"] ) ;
            if(!$post)
                return redirect() -> route("admin.posts.index") -> with( [ "failed" => "Error at added opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.posts.index") -> with( [ "failed" => "Error at added opration"] ) ;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find id in Db With Error 404
        $post = Post::findOrFail($id);
        return view("admin.posts.show" , compact("post") ) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find id in Db With Error 404
        $post = Post::findOrFail($id);
        return view("admin.posts.edit" , compact("post") ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        // find id in Db With Error 404
        $post = Post::findOrFail($id);
        $requestData = $request->all();

        // Hash Password
        if( $requestData['password'] == '' ){
            $requestData['password'] = $post->password;
        }else{
            $requestData['password'] = Hash::make($request->password);
        }

        // Update Record in DB
        try {
            $update = $post-> update( $requestData );
                return redirect() -> route("admin.posts.index") -> with( [ "success" => " Post updated successfully"] ) ;
            if(!$update)
                return redirect() -> route("admin.posts.index") -> with( [ "failed" => "Error at update opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.posts.index") -> with( [ "failed" => "Error at update opration"] ) ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find id in Db With Error 404
        $post = Post::findOrFail($id);

        // Delete Record from DB
        try {
            $delete = $post->delete();
                return redirect() -> route("admin.posts.index") -> with( [ "success" => " Post deleted successfully"] ) ;
            if(!$delete)
                return redirect() -> route("admin.posts.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.posts.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        }
    }



    public function multiAction(Request $request)
    {

        // Validator at action
        $validator = Validator::make($request->all(),[
            "action" => 'required | string',
        ]);

        // Check If request->id exist
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        // Check If request->id exist & add validation Msg
        if( !$request->has('id') ){
            $validator->getMessageBag()->add('action', 'Please select rows..');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If Action is Delete
        if( $request->action == "delete" ){
            try {
                $delete = Post::destroy( $request->id );
                    return redirect() -> route("admin.posts.index") -> with( [ "success" => " Posts deleted successfully"] ) ;
                if(!$delete)
                    return redirect() -> route("admin.posts.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.posts.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            }
        }

    }


}
