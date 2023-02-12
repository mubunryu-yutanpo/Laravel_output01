<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    // DBで間違っても変更させたくないカラム（ユーザーID、管理者権限など）にはロックをかけておくことができる
    // ロックの掛け方にはfillableかguardedの2種類がある。
    // ↑は、どちらかしか指定できない

    // モデルがその属性以外を持たなくなる（fillメソッドに対応しやすいが、カラムが増えるほど足して行く必要がある）
    // fillableは「変更してもいい」カラムを指定する
    protected $fillable = ['user_id', '30s_score', '60s_score'];

  // モデルからその属性が取り除かれる（カラムが増えてもほとんど変更しなくて良い）
  // guardedは「絶対に変更したくない」カラムを指定する
  // protected $guarded = ['id'];

    public function user(){
        return $this->belongTo('App\User');
    }
}
