<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
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
    // 修正ボタンが押されたとき
    if ($request->has('back')) {
        return redirect('/')
            ->withInput(); // old() に値を保存して入力画面に戻す
    }

    // 確認画面用データ作成
    $contact = $request->only([
        'first_name', 'last_name', 'gender', 'email',
        'tel1', 'tel2', 'tel3', 'address', 'building',
        'category_id', 'detail'
    ]);

    $category = Category::find($contact['category_id']);
    $contact['category_name'] = $category ? $category->content : '';

    return view('confirm', compact('contact'));
}



// 確認画面の入力値をテーブルに追加してサンクスページへ移動
  public function store(Request $request)
  {
    $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address','building', 'category_id', 'detail', ]);
    Contact::create($contact);
    return view('thanks');
  }

//   ログイン後の管理画面の表示
  public function admin(Request $request)
  { 
    $contacts = Contact::with('category')->paginate(7);
    $categories = Category::all();
    return view('admin', compact('contacts', 'categories'));
  }

  //   登録後の管理画面の表示
   public function adminaftreregister(Request $request)
   { 
     $contacts = Contact::with('category')->paginate(7);
     $categories = Category::all();
     return view('admin', compact('contacts', 'categories'));
   }

//   管理画面での検索機能
public function search(Request $request)
{
    $contacts = Contact::with('category')
        ->KeywordSearch($request->keyword)
        ->GenderSearch($request->gender)
        ->CategorySearch($request->category_id)
        ->DateSearch($request->created_at)
        ->paginate(7); 

    $categories = Category::all();

    return view('admin', compact('contacts', 'categories'))
        ->with([
            'keyword' => $request->keyword,
            'gender' => $request->gender,
            'category_id' => $request->category_id,
            'created_at' => $request->created_at,
        ]);
}

// 削除機能
public function destroy(Request $request)
{
    Contact::find($request->id)->delete();
    return redirect('/admin');
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
