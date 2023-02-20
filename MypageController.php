<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ValidRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Score;
use App\User;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{

    //ハイスコア表示
    public function highscore(){

      //idを変数に
      $id = Auth::user()->id;

      //DBに保存されているハイスコアを取得する

      //ユーザーの名前
      $name = User::find($id)->value('name');
      //30秒のスコア
      $score_30 = (Score::find($id) !== null)? Score::find($id)->value('30s_score') : 0;
      //60秒のスコア
      $score_60 = (Score::find($id) !== null)? Score::find($id)->value('60s_score') : 0;
      //称号
        $total_score = $score_30 + $score_60;

        switch($total_score){

            case 0:
                $shogo = '名無し';
            break;

            case 500 < $total_score:
                $shogo = '神話級の人斬り';
            break;

            case 350 < $total_score:
                $shogo = '斬り捨て教の教祖';
            break;

            case 250 < $total_score:
                $shogo = '斬りスター';
            break;

            case 150 < $total_score:
                $shogo = '斬り捨て師範代';
            break;

            case 80 < $total_score:
                $shogo = '斬り捨て修行中';
            break;

            case 50 < $total_score:
                $shogo = '斬り捨て見習い';
            break;

            case 0 < $total_score:
                $shogo = '通行人';
            break;

            default:
              $shogo = '名無し';
        }


      //viewでメソッドを使えるようにする
      return view('mypage', compact('id', 'name', 'score_30', 'score_60', 'shogo'));
    }

    //登録情報更新
    public function edit(){
        //idをもとに登録情報を取得
        $user = User::find(Auth::user()->id);

        return view('edit', compact('user'));
    }

    public function update(ValidRequest $request){

        //idを変数に
        $id = Auth::user()->id;


        //パラメーターを先にチェック
        if(!is_numeric($id)){
            return redirect('/home')->with('flash_message', '不正な操作です');
        }

        //idをもとに登録されているuser情報を取得
        $user = User::find(Auth::user()->id);

        //フォームの内容をDBに登録（アップデート）
        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //リダイレクト
        return redirect('/mypage')->with('flash_message', '登録情報を更新しました');


        //MEMO
        //多言語対応できない。jsonじゃなくてもいいけど、日本語表記で表示する→エラー欄のスタイル等もまだ

    }

    public function delete(){}
}
