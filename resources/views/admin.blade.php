@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<script src="https://cdn.tailwindcss.com"></script>
@endsection

@php
$gender = ['男' => 1, '女' => 2, 'その他' => 3];
@endphp

@section('content')
<h2 class="contact__title">Admin</h2>
<div class="option">
    <form class="search-form" action="/admin/search" method="get">
        @csrf
        <div class="search">
            <input type="text" class="search__item-word" name=" keyword" placeholder="名前やメールアドレスを入力してください入力してください" value="{{ $params['keyword'] ?? null }}" />
            <select class="search__item-gender" name="gender" >
                <option type="hidden" selected="selected" value="" >性別</option>
                    @foreach($gender as $key => $value)
                        <option value="{{ $value }}" {{ isset($params['gender']) && $params['gender'] == $value ? 'selected': null }}>
                            {{ $key }}
                        </option>
                    @endforeach
            </select>
            <select class="search__item-category" name="category_id" id="">
                <option type="hidden" value="">お問い合わせの種類</option>
                @foreach ($categories as $category )
                    <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                @endforeach
            </select>
            <input type="date" class="search__item-date" name="date" placeholder="名前やメールアドレスを入力してください入力してください" />
            <button class="search__btn">検索</button>
            <button class="search__reset">リセット</button>
        </div>
    </form>
</div>

<div class="other">
    <form action="">
        <button class="export">エクスポート</button>
    </form>
    <div class="page">{{ $contacts->onEachSide(0)->links('vendor.pagination.tailwind') }}</div>
</div>

<div class="contact__admin">
    <table class="contact-table" >
        <tr class="contact__header">
            <th class="contact-table__header-name">お名前</th>
            <th class="contact-table__header">性別</th>
            <th class="contact-table__header">メールアドレス</th>
            <th class="contact-table__header">お問い合わせの種類</th>
            <th class="contact-table__header"></th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <form action="">
            <td class="contact-table__row item-name">
                <p class="contact-table__item-input">{{ $contact['last_name'] }}</p>
                <p class="contact-table__item-input item-first_name">{{ $contact['first_name'] }}</p>
            </td>
            <td class="contact-table__row">
                @if($contact['gender'] === 1)
                    <p class="contact-table__item-input">男性</p>
                @elseif($contact['gender'] === 2)
                    <p class="contact-table__item-input">女性</p>
                @else
                    <p class="contact-table__item-input">その他</p>
                @endif
            </td>
            <td class="contact-table__row">
                <p class="contact-table__item-input">{{ $contact['email'] }}</p>
            </td>
            <td class="contact-table__row">
                @foreach ($categories as $category =>$value )
                            @if($value['id'] == $contact['category_id'])
                                <p class="contact-table__item-input">{{ $value['content'] }}</p>
                            @endif
                @endforeach
            </td>
            <td class="show-btn">
                <button class="detail-btn">詳細</button>
            </td>
            </form>
        </tr>
        @endforeach
    </table>
</div>

@endsection