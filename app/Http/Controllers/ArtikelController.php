<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Artikel::getAll();
        return view('items.artikel.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $insert = Artikel::insert($data);
        return redirect('/artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Artikel::findById($id);
        $tags = Artikel::getTags($id);
        return view('items.artikel.show', compact('article', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Artikel::findById($id);
        $tags = Artikel::getTags($id);
        $new_tags = compact('tags');
        $result = '';
        foreach ($new_tags['tags'] as $key => $tag) {
            if ($key != 0) {
                $result .= '#';
            }
            $result .= $tag->tag;
        }
        $article_data  = [
            'id' => $article->id,
            'judul' => $article->judul,
            'isi' => $article->isi,
            'tag' => $result
        ];
        return view('items.artikel.edit', $article_data);
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
        $data = $request->all();
        unset($data['_token']);
        $insert = Artikel::update($id, $data);
        return redirect('/artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Artikel::delete($id);
        return redirect('/artikel');
    }
}
