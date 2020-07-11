<?php

namespace App\Http\Controllers;

use App\Author;
use App\Phrase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhraseController extends Controller
{
    /**
     * 一覧取得
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request): JsonResponse
    {
        $phrases = Phrase::with('author')->paginate(10);

        return response()->json($phrases);
    }

    /**
     * 名言登録
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $params = $request->all();

        DB::transaction(function () use ($params) {

            // 作者が重複しないようにする
            // 既に存在している場合は取得、存在しない場合は新規登録する
            $author = Author::firstOrCreate(
                ['name' => $params['author_name']],
                ['details' => $params['author_details']]
            );
    
            $author->phrases()->create([
                'id' => \Str::uuid(),
                'content' => $params['phrase_content']
            ]);
        });

        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function show(Phrase $phrase)
    {
        // $phrase = $phrase->author;

        // \Log::debug($phrase);

        // return response()->json([
        //     'phrase' => $phrase
        // ]);
    }

    /**
     * 名言更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phrase $phrase)
    {
        //
    }

    /**
     * 削除
     *
     * @param  \App\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function delete(Phrase $phrase): JsonResponse
    {
        $phrase->delete();

        return response()->json();
    }
}
