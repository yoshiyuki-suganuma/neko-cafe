<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;

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
    // メールテスト
    // Log::debug($validated['name']. 'さんよりお問い合わせがありました');
    //http://localhost:8025/ でmailhogにアクセス、テストできる
    Mail::to('marshall@ezweb.ne.jp')->send(new ContactAdminMail($validated));
    return to_route('contact.complete');
}

}

