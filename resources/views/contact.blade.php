@extends('layouts.default')
<style>
  .contact__ttl {
    text-align: center;
    margin: 50px;
    font-size: 30px;
  }

  .contact__form {
    width: 60%;
    margin: 0 auto;
  }
    
  .form__item {
    width: 100%;
    display: flex;
    align-items: center;
    margin-bottom: 25px;
  }

  .form__item__label {
    width: 20%;
  }

  .form__item__input {
    width: 100%;
  }

  .form__item__input-name {
    display: flex;
    justify-content: space-between;
  }

  .name-top {
    margin-right: 60px;
  }

  .name-top,
  .name-bottom {
    width: 100%;
    display: flex;
    flex-direction: column;
  }

  .name-top input,
  .name-bottom input {
    width: 100%;
  }

  .form__item__input-gender {
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }

  .form__item__input-gender input {
    width: 10%;
  }

  .form__item__input-gender label {
    margin-right: 25px;
  }

  .add__post-icon {
    display: flex;
  }

  .post-icon {
    font-size: 20px;
    line-height: 2;
    padding-right: 8px;
  }

  .confirm__button {
    width: 160px;
    font-size: 20px;
    display: block;
    background-color: black;
    color: white;
    border-radius: 7px;
    margin: 40px auto;
    padding: 5px 0;
  }

  .example {
    color: #888888;
    padding-left: 15px;
  }

  input {
    width: 100%;
    height: 45px;
    border-radius: 7px;
  }

  textarea {
    width: 100%;
    border-radius: 7px;
  }

  .require {
    color: red;
  }

  .error {
    color: red;
  }
</style>

@section('content')
<h2 class="contact__ttl">お問い合わせ</h2>
<form class="contact__form" id="form_1" action="/confirm" method="POST">
@csrf
  <div class="form__item-name form__item">

    <div class="form__item__input-name form__item__input">
      <div class="name-top">
        <input value="{{ session('topname') }}" type="text" name="topname">
        <small class="example__name-top example">例）山田</small>
      </div>
      
      <div class="name-bottom">
        <input value="{{ session('undername') }}" type="text" name="undername">
        <small class="example__name-bottom example">例）太郎</small>
      </div>
    </div>
  </div>
  @if (count($errors) > 0)
    @if ($errors->has('topname'))
    <p class="error">※ERROR {{$errors->first('topname')}}</p>
    @endif
  @endif
  
  <div class="form__item-gender form__item">
    <p class="form__item__label-gender form__item__label">性別<span class="require">※</span></p>

    <div class="form__item__input-gender form__item__input">
      <input type="radio" id="male" name="gender" value=1 checked>
      <label for="male">男性</label>

      <input type="radio" id="female" name="gender" value=2 {{ session('gender') == '2' ? 'checked' : '' }}>
      <label for="female">女性</label>
    </div>
  </div>
  @if (count($errors) > 0)
    @if ($errors->has('gender'))
    <p class="error">※ERROR {{$errors->first('gender')}}</p>
    @endif
  @endif

  <div class="form__item-email form__item">
    <p class="form__item__label-email form__item__label">メールアドレス<span class="require">※</span></p>

    <div class="form__item__input-email form__item__input">
      <input value="{{ session('email') }}" type="email" name="email">
      <small class="example__email example">例）test@example.com</small>
    </div>
  </div>
  @if (count($errors) > 0)
    @if ($errors->has('email'))
    <p class="error">※ERROR {{$errors->first('email')}}</p>
    @endif
  @endif

  <div class="form__item-post form__item">
    <p class="form__item__label-post form__item__label">郵便番号<span class="require">※</span></p>

    <div class="form__item__input-post form__item__input">
      <div class="add__post-icon">
        <span class="post-icon">〒</span>
        <input value="{{ session('postcode') }}" id="postcode" class="postcode" onblur="ztoh(this);" type="text" name="postcode" pattern="\d{3}-?\d{4}" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');">
      </div>
      <small class="example__post example">例）123-4567</small>
    </div>
  </div>
  @if (count($errors) > 0)
    @if ($errors->has('postcode'))
    <p class="error">※ERROR {{$errors->first('postcode')}}</p>
    @endif
  @endif

  <div class="form__item-address form__item">
    <p class="form__item__label-address form__item__label">住所<span class="require">※</span></p>

    <div class="form__item__input-address form__item__input">
      <input value="{{ session('address') }}" id="address" type="text" name="address">
      <small class="example__address example">例）東京都渋谷区千駄ヶ谷1-2-3</small>
    </div>
  </div>
  @if (count($errors) > 0)
    @if ($errors->has('address'))
    <p class="error">※ERROR {{$errors->first('address')}}</p>
    @endif
  @endif

  <div class="form__item-building form__item">
    <p class="form__item__label-building form__item__label">建物名</p>

    <div class="form__item__input-building form__item__input">
      <input value="{{ session('building_name') }}" type="text" name="building_name">
      <small class="example__building example">例）千駄ヶ谷マンション101</small>
    </div>
  </div>

  <div class="form__item-opinion form__item">
    <p class="form__item__label-opinion form__item__label">ご意見<span class="require">※</span></p>

    <div class="form__item__input-opinion form__item__input">
      <textarea name="opinion" id="" cols="50" rows="6" maxlength="120">{{ session('opinion') }}</textarea>
    </div>
  </div>
  @if (count($errors) > 0)
    @if ($errors->has('opinion'))
    <p class="error">※ERROR {{$errors->first('opinion')}}</p>
    @endif
  @endif

  <button type="submit" class="confirm__button">確認</button>
</form>
  <script>
    $(window).ready( function() {
      $('#postcode').jpostal({
        postcode : [
        '#postcode'
        ],
        address : {
        '#address' : '%3%4%5'
        }
      });
    });
  </script>
@endsection