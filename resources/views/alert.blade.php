@extends('layouts.default')
<style>
  .container {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
  }

  .top__button {
    width: 160px;
    font-size: 20px;
    display: block;
    background-color: black;
    color: white;
    border-radius: 7px;
    margin: 0 auto;
    margin-top: 50px;
  }
</style>
@section('content')
  <div class="container">
    <p>ご意見いただきありがとうございました</p>
    <button class="top__button">トップページへ</button>
  </div>
@endsection