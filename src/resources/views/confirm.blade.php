@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')


<div class="confirm__content">
  <div class="confirm-form__heading">
    <h2>Confirm</h2>
  </div>

  
      {{-- <form class="form" action="/thanks" method="post">
      @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">
                <p>{{ $contact['first_name'] }}</p>
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}"/>
                <p>{{ $contact['last_name'] }}</p>
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}"/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">性別</th>
              <td class="confirm-table__text">
                <p>
                  @php
                  switch($contact['gender']){
                      case "1":
                      echo "男性";
                      break;
                      case "2":
                      echo "女性";
                      break;
                      case "3":
                      echo "その他";
                      break;
                  }
                  @endphp
                </p>
                  <input type="hidden" name="gender" value="{{ $contact['gender'] }}"/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                <p>{{ $contact['email'] }}</p>
                <input type="hidden" name="email" value="{{ $contact['email'] }}"/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">電話番号</th>
              <td class="confirm-table__text">
                <p>{{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}</p>
                <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}"/>
                <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}"/>
                <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}"/>

              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">住所</th>
              <td class="confirm-table__text">
                <p>{{ $contact['address'] }}</p>
                <input type="hidden" name="address" value="{{ $contact['address'] }}"/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">建物名</th>
              <td class="confirm-table__text">
                <p>{{ $contact['building'] }}</p>
                <input type="hidden" name="building" value="{{ $contact['building'] }}"/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせの種類</th>
              <td class="confirm-table__text">
                <p>{{ $category['content'] }}</p>
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">
                <p>{!! nl2br(e($contact['detail'])) !!}</p>
              <input type="hidden" name="detail" value="{{ $contact['detail'] }}"/>
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
          <a class="form__button-correction" href="#" onclick="event.preventDefault(); history.back();">修正</a>
        </div>
      </form>
    </div>
@endsection --}}


  <form method="get" action="/thanks">
  @csrf

  <div class="confirm-table">
    <table class="confirm-table__inner">
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お名前</th>
        <td class="confirm-table__text" >{{ $contact['last_name'].' '.$contact['first_name']}}
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}"/>
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}"/>
        </td>

      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">性別</th>
        <td>
        @if(isset($contact['gender']))
            @if($contact['gender'] == '1')
              <div class="confirm-table__text">男性</div>
            @elseif($contact['gender'] == '2')
              <div class="confirm-table__text">女性</div>
            @else
              <div class="confirm-table__text">その他</div>
            @endif
        @endif
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}"/>
      </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">メールアドレス</th>
        <td class="confirm-table__text" >{{$contact['email']}}
          <input type="hidden" name="email" value="{{ $contact['email'] }}"/>
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header" value="tell">電話番号</th>
        <td class="confirm-table__text" >{{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}
          {{-- <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}"/>
          <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}"/>
          <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}"/> --}}
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header" value="address">住所</th>
        <td class="confirm-table__text" >{{$contact['address']}}
          <input type="hidden" name="address" value="{{ $contact['address'] }}"/>
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header" value="building">建物名</th>
        <td class="confirm-table__text">{{$contact['building']}}
          <input type="hidden" name="building" value="{{ $contact['building'] }}"/>
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">カテゴリ</th>
        <td class="confirm-table__text">{{ $category->content }}
          <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">お問合せ内容</th>
        <td class="confirm-table__text">
          {!! nl2br(e($contact['detail'])) !!}
          <input type="hidden" name="detail" value="{{ $contact['detail'] }}"/>
        </td>
      </tr>

    </table>
  </div>
      <div class="confirm__button">
        <button class="confirm__button-submit" type="submit">送信</button>


      <a href="/" class="confirm__button-fix">修正</a>
      </div>

    </form>


@endsection



