<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	public function index(){
		$posts = Post::all();
		if ($posts){
			return response()->json([
				'data' => $posts,
				'status' => 200
			]);
		} else {
			return response()->json([
				'message' => "Incapaz de pegar livros!",
				'status' => 400
			]);
		}
	}

	public function show($id){
		$post = Post::findOrFail($id);
		if ($post){
			return response()->json([
				'data' => $post,
				'status' => 200
			]);
		} else {
			return response()->json([
				'message' => "Livro em questão não foi encontrado!",
				'status' => 400
			]);
		}
	}

	public function store(Request $req){
		$post = new Post();
		$post->insertPost($req);
		if ($post){
			return response()->json([
				'data' => $post,
				'status' => 200
			]);
		} else {
			return response()->json([
				'message' => "Incapaz de atualizar o livro!",
				'status' => 400
			]);
		}
	}

	public function update(Request $req, $id){
		$post = Post::findOrFail($id);
		$post->updatePost($req);
		return response()->json([
			'data' => $post,
			'status' => 200
		]);
	}

	public function destroy($id){
		$post = Post::findOrFail($id);
		$post = Post::destroy($id);
		if ($post){
			return response()->json([
				'data' => $post,
				'status' => 200
			]);
		} else {
			return response()->json([
				'message' => "Post é imortal!",
				'status' => 400
			]);
		}
	}
}
