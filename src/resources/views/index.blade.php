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
          <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}" />
          <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}" />
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
          <label> <input type="radio" name="gender" value="男" checked> 男</label>
          <label> <input type="radio" name="gender" value="女"> 女</label>
          <label> <input type="radio" name="gender" value="その他"> その他</label>

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
          <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
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
          <input type="tell" name="tel1" placeholder="090" value="{{ old('tel1') }}" /> -
          <input type="tell" name="tel2" placeholder="1234" value="{{ old('tel2') }}" > -
          <input type=" tell" name="tel3" placeholder="5678" value="{{ old('tel3') }}">

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
          <input type="text" name="address" placeholder="例:東京都千代田区千駄ケ谷マンション1-2-3" value="{{ old('address') }}" />
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
          <input type="text" name="building" placeholder="例:千駄ケ谷マンション101" value="{{ old('building') }}" />
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
            <option value="{{ $category->id }}"> {{$category->content}}</option>
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
          <textarea name="detail" placeholder="お問合せ内容をご記載ください">{{ old('detail') }}</textarea>
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
