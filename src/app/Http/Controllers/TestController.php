<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use App\Models\Contact;
use App\Models\Category;

class TestController extends Controller
{
    // 入力画面表示
    public function index()
  {
    $categories = Category::all();
    return view('index', compact('categories'));
  }

    //   確認画面表示・入力画面のデータ受け取り
  public function confirm(TestRequest $request)
  {
    $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
    $category = Category::find($contact['category_id']);
    $contact['category_name'] = $category ? $category->content : '';
    return view('confirm', compact('contact'));
  }

      // 入力値をセッションに保存して入力画面へ戻す
  public function edit(Request $request)
{
    return redirect()->route('form.index')->withInput();
}

// 確認画面の入力値をテーブルに追加してサンクスページへ移動
  public function store(Request $request)
  {
    $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address','building', 'category_id', 'detail', ]);
    Contact::create($contact);
    return view('thanks');
  }

//   管理画面の表示
  public function admin()
  { 
    $contacts = Contact::with('category')->get();
    return view('admin', compact('contacts'));
  }




  public function register()
  {
    return view('register');
  }

  public function login()
  {
    return view('login');
  }
}
