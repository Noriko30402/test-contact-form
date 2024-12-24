@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
          <input class="search-filter__item-input" type="text" name="query" placeholder="名前やメールアドレスを入力してください" value="{{old('query')}}">

          <select class="search-filter__item-gender" name="gender">
            <option value="">性別</option>
              <option value="男">男性</option>
              <option value="女">女性</option>
              <option value="その他">その他</option>
            </select>

          <select name="category_id" class="search-filter__item-category">
            <option value="">お問合せの種類</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">
              {{ $category['content']}}</option>
            @endforeach
          </select>

          <div class="search-filter__item-date">
            <label> <input name="created_at" type="date" /></label>
          </div>

          <div class="search-filter__button">
            <button class="search-filter__button-submit" type="submit">検索</button>
            <button class="search-filter__button-reset" type="submit">リセット</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  {{-- <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
  {{-- <div class="pagination"> {{ $contacts->links('vendor.pagination.bootstrap-4') }} </div> --}}

   {{-- <div class="pagination"> {{ $contacts->links() }} </div>  --}}

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
            <td class="admin-form__item">{{$contact->gender}}</td>
            <td class="admin-form__item">{{$contact->email}}</td>
            <td class="admin-form__item">{{ $contact['category']['content'] }}</td> 
            <td class="admin-form__item"><a href="" class="admin-detail">詳細</a></td>
            {{-- <livewire:example-component /> --}}

          </tr>
      @endforeach
    </table>

  </div>
</div>
{{-- <x-guest-layout>
  <livewire:example-component />
</x-guest-layout> --}}

@endsection
