@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>
  <form class="form" action="/confirm" method="post">
    @csrf

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--name">
          {{-- $contact['last_name'] ?? ''  $contact配列のlast_nameキーに対応する値を取得し、存在しない場合やnullの場合には空の文字列''を返す。 --}}
          <input type="text" name="last_name" placeholder="例：山田"  value="{{ old('last_name', $contact['last_name'] ?? '') }}">
          <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name', $contact['first_name'] ?? '') }}" />
        </div>
        @if ($errors->has('first_name') || $errors->has('last_name'))
          @if ($errors->has('first_name'))
            {{ $errors->first('first_name') }}
          @endif @if ($errors->has('last_name'))
            {{ $errors->first('last_name') }}
          @endif
        @endif
        </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--radio">
        {{-- $contact['gender'] ?? ''  $contact配列のgenderキーに対応する値を取得し、存在しない場合やnullの場合には空の文字列''を返します。
          == '1'は、その値が1であるかどうかをチェックします。
          ? 'checked' : ''は、条件が真の場合にchecked属性を追加し、偽の場合には何も追加しません。 --}}

          <label> <input type="radio" name="gender" value="1" {{ old('gender', $contact['gender'] ?? '') == '1' ? 'checked' : '' }}> 男</label>
          <label> <input type="radio" name="gender" value="2" {{ old('gender', $contact['gender'] ?? '') == '2' ? 'checked' : '' }}> 女</label>
          <label> <input type="radio" name="gender" value="3"{{ old('gender', $contact['gender'] ?? '') == '3' ? 'checked' : '' }}> その他</label>


        </div>
        <div class="form__error">
          @error('gender')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email', $contact['email'] ?? '') }}" />
        </div>
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">電話番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--tel">
          <input type="tell" name="tel1" placeholder="090" value="{{ old('tel1', $contact['tel1'] ?? '') }}" /> -
          <input type="tell" name="tel2" placeholder="1234" value="{{ old('tel2', $contact['tel2'] ?? '')  }}" > -
          <input type=" tell" name="tel3" placeholder="5678" value="{{ old('tel3', $contact['tel3'] ?? '') }}">

        </div>
      @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
      {{$errors->first('tel1') ?: $errors->first('tel2') ?: $errors->first('tel3')}}
      @endif
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" placeholder="例:東京都千代田区千駄ケ谷マンション1-2-3" value="{{ old('address', $contact['address'] ?? '') }}" />
        </div>
        <div class="form__error">
          @error('address')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building" placeholder="例:千駄ケ谷マンション101" value="{{ old('building', $contact['building'] ?? '') }}" />
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">問い合わせの種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--select">
          <select name="category_id">
            <option value="">選択してください</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}> {{$category->content}}</option>
            {{-- == $category->id 以前の入力値が現在のカテゴリIDと一致するか   ? 'selected' : '' 条件が真の場合にselected属性を追加し、偽の場合には何も追加しない --}}
            @endforeach
          </select>
        </div>
        <div class="form__error">
          @error('category_id')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>


    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
        <span class="form__label--required">※</span>

      </div>
      <div class="form__group-content">
        <div class="form__input--textarea">
          <textarea name="detail" placeholder="お問合せ内容をご記載ください">{{ old('detail', $contact['detail'] ?? '') }}</textarea>
        </div>
        <div class="form__error">
          @error('detail')
          {{ $message }}
          @enderror
      </div>
    </div>
  </div>

    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
</div>
@endsection
