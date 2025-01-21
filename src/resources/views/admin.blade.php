@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <input class="header__link" type="submit" value="logout">
</form>
@endsection


@section('content')

<div class="Admin__content">
  <div class="Admin-form__heading">
    <h2>Admin</h2>
  </div>

  <div class="filter">
    <div class="filter__inner">
      <form action="/search" method="get" class="search-filter">
        @csrf
        <div class="search-filter__item">
          <input class="search-filter__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{request('query')}}">

          <select class="search-filter__item-gender" name="gender">

            <option disabled selected>性別</option>
            <option value="1" @if( request('gender')==1 ) selected @endif>男性</option>
            <option value="2" @if( request('gender')==2 ) selected @endif>女性</option>
            <option value="3" @if( request('gender')==3 ) selected @endif>その他</option>
          </select>

          <select name="category_id" class="search-filter__item-category">
            <option value="">お問合せの種類</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if( request('category_id')==$category->id ) selected @endif
              >{{$category->content }}
            </option>
            @endforeach
          </select>

          <div class="search-filter__item-date">
            <label> <input name="created_at" type="date" value="{{request('date')}}"/></label>
          </div>

          <div class="search-filter__button">
            <button class="search-filter__button-submit" type="submit">検索</button>
            <button class="search-filter__button-reset" type="submit" name="reset">リセット</button>
          </div>
        </div>
      </form>
    </div>
  </div>


  <div class="export-form">
    <form action="{{'/export?'.http_build_query(request()->query())}}" method="post">
      @csrf
      <input class="export__btn btn" type="submit" value="エクスポート">
    </form>
    {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
  </div>


  <div class="admin-table">
    <table class="admin-table__inner">
      <tr class="admin-table__row">
        <th class="admin-table__header">お名前</th>
        <th class="admin-table__header">性別</th>
        <th class="admin-table__header">メールアドレス</th>
        <th class="admin-table__header">お問合せの種類</th>
        <th class="admin-table__header"></th>
      </tr>

      @foreach ($contacts as $contact) 
        <tr class="admin-form__row">
            <td class="admin-form__item">{{ $contact->last_name }}{{ $contact->first_name }}</td>
            <td class="admin-form__item">
            @if($contact->gender == 1)
            男性
            @elseif($contact->gender == 2)
            女性
            @else
            その他
            @endif
            </td>
            <td class="admin-form__item">{{$contact->email}}</td>
            <td class="admin-form__item">{{ $contact['category']['content'] }}</td> 
            <td class="admin-form__item"><a href="#{{$contact->id}}" class="admin-detail">詳細</a></td>
            {{-- <livewire:example-component /> --}}
          </tr>

          {{-- モーダル --}}
            <div class="modal" id="{{$contact->id}}">
            <a href="#!" class="modal-overlay"></a>
            <div class="modal__inner">
              <div class="modal__content">
                <form class="modal__detail-form" action="/delete" method="post">
                  @csrf
                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">お名前</label>
                    <p>{{$contact->first_name}}{{$contact->last_name}}</p>
                  </div>

                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">性別</label>
                    <p>
                      @if($contact->gender == 1)
                      男性
                      @elseif($contact->gender == 2)
                      女性
                      @else
                      その他
                      @endif
                    </p>
                  </div>

                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">メールアドレス</label>
                    <p>{{$contact->email}}</p>
                  </div>
    
                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">電話番号</label>
                    <p>{{$contact->tell}}</p>
                  </div>
    
                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">住所</label>
                    <p>{{$contact->address}}</p>
                  </div>
    
                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">お問い合わせの種類</label>
                    <p>{{$contact->category->content}}</p>
                  </div>
    
                  <div class="modal-form__group">
                    <label class="modal-form__label" for="">お問い合わせ内容</label>
                    <p>{{$contact->detail}}</p>
                  </div>
                  <input type="hidden" name="id" value="{{ $contact->id }}">
                  <input class="modal-form__delete-btn btn" type="submit" value="削除">
    
                </form>
              </div>
    
              <a href="#" class="modal__close-btn">×</a>
            </div>
          </div>

      @endforeach
    </table>

  </div>
</div>
@endsection
