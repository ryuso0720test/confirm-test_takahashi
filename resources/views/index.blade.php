@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
    <h2>Contact</h2>
    </div>

    <form class="form"  action="/confirm" method="post">
        @csrf
    <!-- 名前入力 -->
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text input-name">
                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例：山田" /> -
                <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例：太郎" />
            </div>
            <div class="form__error">
                @error('last_name')
                    {{ $message }}
                @enderror
                @error('first_name')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <!-- 性別入力 -->
    <div class="form__group">
        <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--radio">
                <div class="form__input-gender">
                    <input type="radio" name="gender" id="gender1" value="1" @if( old('gender') === '1' ) checked @endif />
                    <label for="gender1" class="form-check-label">男性</label>
                </div>
                <div class="form__input-gender gender-r">
                    <input type="radio" name="gender" id="gender2" value="2" @if( old('gender') === '2' ) checked @endif />
                    <label for="gender2" class="form-check-label">女性</label>
                </div>
                <div class="form__input-gender gender-r">
                    <input type="radio" name="gender" id="gender3" value="3" @if( old('gender') === '3' ) checked @endif />
                    <label for="gender3" class="form-check-label">その他</label>
                </div>
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
        <div class="form__input--text mail-area">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com" />
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
        <div class="form__input--text tell-area">
            <input type="tel" name="tel1" value="{{ old('tel1') }}" placeholder="090" />
            <span>-</span>
            <input type="tel" name="tel2" value="{{ old('tel2') }}" placeholder="1234" />
            <span>-</span>
            <input type="tel" name="tel3" value="{{ old('tel3') }}" placeholder="5678" />
        </div>
        <div class="form__error">
            @if($errors->has('tel1'))
                @error('tel1')
                    {{ $message }}
                @enderror
            @elseif($errors->has('tel2'))
                @error('tel2')
                    {{ $message }}
                @enderror
            @elseif($errors->has('tel3'))
                @error('tel3')
                    {{ $message }}
                @enderror
            @endif
        </div>
        </div>
    </div>

    <!-- 住所入力 -->
    <div class="form__group">
        <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text address-area">
                <input type="text" name="address" value="{{ old('address') }}" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" />
            </div>
            <div class="form__error">
                @error('address')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <!-- 建物入力 -->
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">建物</span>
            <span class="form__label--required"></span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text building-area">
                <input type="text" name="building" value="{{ old('building') }}" placeholder="例：千駄ヶ谷マンション101" />
            </div>
        </div>
    </div>

    <!-- お問い合わせ種類入力 -->
    <div class="form__group group-select">
        <div class="form__group-title">
            <span class="form__label--item">お問い合わせの種類</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text select-area">
                <select class="create-form__item-select" name="category_id">
                    <option hidden  value="">選択してください</option>
                    @foreach ($categories as $category )
                        <option value="{{ $category['id'] }}" @if( old('category_id') == $category->id ) selected @endif>{{ $category['content'] }}</option>
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
                <textarea name="detail" value="{{ old('detail') }}" placeholder="お問い合わせ内容を記載してください">{{ old('detail') }}</textarea>
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