<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
public  function index () {
    return view('contact.index');
}

public function complete() {
    return view('contact.complete');
}

//フォームリクエストを使用
// sail artisan make:request ContactRequestでクラスを作成
function sendMail(ContactRequest $request) {
    $validated = $request->validated();

    // これ以降の行は入力エラーがなかった場合のみ実行されます
    // 登録処理(実際はメール送信などを行う)
    Log::debug($validated['name']. 'さんよりお問い合わせがありました');
    return to_route('contact.complete');
}

}

