<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Artikel
{
    public static function getAll()
    {
        $data = DB::table('artikel')->get();
        return $data;
    }

    public static function findById($id)
    {
        $data = DB::table('artikel')->where('id', $id)->first();
        return $data;
    }

    public static function insert($data)
    {
        $slug = Str::slug($data['judul']);
        $artikel = DB::table('artikel')
            ->insert([
                'judul' => $data['judul'],
                'isi' => $data['isi'],
                'slug' => $slug
            ]);
        if ($data['tag'] != '') {
            $tags = explode('#', $data['tag']);
            $artikel_id = DB::table('artikel')->latest()->first()->id;
            foreach ($tags as $tag) {
                $insert_tag = DB::table('tag')->insert([
                    'tag' => $tag,
                    'artikel_id' => $artikel_id
                ]);
            }
        }
        return $artikel;
    }

    public static function getTags($id)
    {
        $tags = DB::table('tag')->where('artikel_id', $id)->get();
        return $tags;
    }

    public static function update($id, $data)
    {
        $slug = Str::slug($data['judul']);
        $artikel_update = DB::table('artikel')->where('id', $id)
            ->update([
                'judul' => $data['judul'],
                'isi' => $data['isi'],
                'slug' => $slug
            ]);
        // Cara tidak efektif (jangan ditiru)
        // Cukup sulit updating jika tag disendirikan dalam tabel sendiri
        $delete_all = DB::table('tag')->where('artikel_id', $id)->delete();
        if ($data['tag'] != '') {
            $tags = explode('#', $data['tag']);
            foreach ($tags as $tag) {
                $insert_tag = DB::table('tag')->insert([
                    'tag' => $tag,
                    'artikel_id' => $id
                ]);
            }
        }
        return $artikel_update;
    }

    public static function delete($id)
    {
        $delete = DB::table('artikel')->where('id', $id)->delete();
        return $delete;
    }
}
