@extends('layouts.default')
<style>
  .confirm__ttl {
    text-align: center;
    margin: 50px;
    font-size: 30px;
  }

  .confirm__form {
    width: 60%;
    margin: 0 auto;
    margin-bottom: 30px;
  }
  
  table {
    width: 100%;
    text-align: left;
  }

  th,
  td {
    padding: 25px 0;
  }

  th {
    font-weight: bold;
    width: 20%;
  }

  .submit__button {
    width: 160px;
    font-size: 20px;
    display: block;
    background-color: black;
    color: white;
    border-radius: 7px;
    margin: 0 auto;
    margin-top: 40px;
    padding: 5px 0;
  }

  .fix__link {
    padding-top: 5px;
    text-decoration: underline;
    display: block;
    text-align: center;
  }

  .fix__link:visited {
    color: black;
  }
</style>
@section('content')
<h2 class="confirm__ttl">内容確認</h2>
<form class="confirm__form" action="/alert" method="POST">
  <table>
  @csrf
    <tr>
      <th>お名前</th>
      <td>{{$items['topname'].$items['undername']}}</td>
      <input type="hidden" value="{{$items['topname'].$items['undername']}}" name="fullname">
    </tr>
    <tr>
      <th>性別</th>
      <td>
        @if($items['gender'] == 1)
        男性
        @else
        女性
        @endif
        <input type="hidden" value="{{$items['gender']}}" name="gender">
      </td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td>{{$items['email']}}</td>
      <input type="hidden" value="{{$items['email']}}" name="email">
    </tr>
    <tr>
      <th>郵便番号</th>
      <td>{{$items['postcode']}}</td>
      <input type="hidden" value="{{$items['postcode']}}" name="postcode">
    </tr>
    <tr>
      <th>住所</th>
      <td>{{$items['address']}}</td>
      <input type="hidden" value="{{$items['address']}}" name="address">
    </tr>
    <tr>
      <th>建物名</th>
      <td>{{$items['building_name']}}</td>
      <input type="hidden" value="{{$items['building_name']}}" name="building_name">
    </tr>
    <tr>
      <th>ご意見</th>
      <td>{{$items['opinion']}}</td>
      <input type="hidden" value="{{$items['opinion']}}" name="opinion">
    </tr>
  </table>
  
  <button class="submit__button" type="submit">送信</button>

  <a class="fix__link" href="/">修正する</a>
</form>
@endsection