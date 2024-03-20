@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

<div class="confirm__content">
    <div class="confirm__heading">
    <h2>Confirm</h2>
    </div>
    <form action="/thanks" class="form" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text confirm-name">
                        <input type="hidden" id="last-name" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                        <input type="hidden" id="first-name" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                        <p>{{ $contact['last_name'] }}</p>
                        <p>{{ $contact['first_name'] }}</p>
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                            @if($contact['gender'] === "1")
                            <p>男性</p>
                            @elseif($contact['gender'] === "2")
                            <p>女性</p>
                            @else
                            <p>その他</p>
                            @endif
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header"></th>
                    <td class="confirm-table__text">
                    <input type="hidden" name="email" value="{{ $contact['email'] }}" readonly />
                    <p>{{ $contact['email'] }}</p>
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header"></th>
                    <td class="confirm-table__text">
                    <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}" 
                    readonly />
                    <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}" 
                    readonly />
                    <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}" 
                    readonly />
                    @php
                        $tell = $contact['tel1'] . $contact['tel3'] . $contact['tel3']
                    @endphp
                    <input type="hidden" name="tell" value="{{ $tell }}" readonly />
                    <p>{{ $tell }}</p>
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header"></th>
                    <td class="confirm-table__text">
                    <input type="hidden" name="address" value="{{ $contact['address'] }}" readonly />
                    <p>{{ $contact['address'] }}</p>
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header"></th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="building" value="{{ $contact['building'] }}" readonly />
                        <p>{{ $contact['building'] }}</p>
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header"></th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly />
                        @foreach ($categories as $category =>$value )
                            @if($value['id'] == $contact['category_id'])
                                <p>{{ $value['content'] }}</p>
                            @endif
                        @endforeach
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header"></th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" readonly />
                        <p>{{ $contact['detail'] }}</p>
                    </td>
                </tr>

            </table>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit" name="approve" value="1">送信</button>
            <button class="form__button-reject" type="submit" name="reject" value="1">修正</button>
        </div>
    </form>

</div>
@endsection