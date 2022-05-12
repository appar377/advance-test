@extends('layouts.default')
<script>
</script>
<style>
  .management__ttl {
    text-align: center;
    margin: 30px 0;
  }

  .find__form {
    border: solid 1px black;
    padding: 20px;
  }

  .name__and__gender {
    width: 100%;
    display: flex;
  }

  .input-name,
  .input-gender {
    display: flex;
    align-items: center;
  }

  .input-name {
    display: flex;
  }

  .input-gender {
    width: 370px;
    display: flex;
    margin-left: 30px;
  }

  .input-gender label {
    width: 100%;
    font-size: 17px;
  }

  .created__at,
  .input__email {
    display: flex;
    align-items: center;
  }

  .find__button {
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

  .resset__link {
    padding-top: 5px;
    text-decoration: underline;
    display: block;
    text-align: center;
  }

  .resset__link:visited {
    color: black;
  }

  input {
    width: 300px;
    height: 30px;
  }

  .label {
    font-size: 17px;
    width: 220px;
    font-weight: bold;
  }

  .item__all,
  .item__now {
    display: inline-block;
  }

  .item__table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
  }

  th {
    border-bottom: solid 1px black;
  }

  th,
  td {
    padding-left: 20px;
    text-align: left;
  }

  .gender {
    width: 50px;
  }

  .delete__form {
    display: inline-block;
  }

  .delete__button {
    width: 70px;
    padding: 5px 8px;
    background-color: black;
    color: white;
    border-radius: 5px;
  }

  svg.w-5.h-5 {  
    width: 30px;
    height: 30px;
  }




  .pagination__container {
    width: 80%;
    margin: 20px auto;
    display: flex;
    justify-content: space-between;
  }

  .pagination {
    list-style: none;
    display: flex;
    
  }

  .page-item {
    width: 20px;
    border: solid 1px #999999;
    text-align: center;
  }

  .page-link {
    text-decoration: none;
  }
</style>
@section('content')
  <h2 class="management__ttl">管理システム</h2>

  <form action="find" method="POST" class="find__form">
    @csrf
    <div class="name__and__gender">
      <div class="input-name">
        <p class="label">お名前</p>
        <input type="text" name="fullname">
      </div>

      <div class="input-gender">
        <p class="label">性別</p>
        <input type="radio" id="all" name="gender" value=3 checked>
        <label for="all">全て</label>
        <input type="radio" id="male" name="gender" value=1>
        <label for="male">男性</label>
        <input type="radio" id="female" name="gender" value=2>
        <label for="female">女性</label>
      </div>
    </div>

    <div class="created__at">
      <p class="label">登録日</p>
      <input type="date" name="created_start">
      <span>~</span>
      <input type="date" name="created_end">
    </div>

    <div class="input__email">
      <p class="label">メールアドレス</p>
      <input type="email" name="email">
    </div>

    <button type="submit" class="find__button">検索</button>
    <a class="resset__link" href="management">リセット</a>
  </form>

  <div class="pagination__container">
    @if (count($items) >0)
    <p class="pagination-total">全{{ $items->total() }}件中 
        {{  ($items->currentPage() -1) * $items->perPage() + 1}} - 
        {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件</p>
    @endif 
    
    @if ($items->lastPage() > 0)
    <ul class="pagination">
        <li class="page-item {{ ($items->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $items->url(1) }}">
                <span aria-hidden="true">«</span>
                {{-- Previous --}}
            </a>
        </li>
        @for ($i = 1; $i <= $items->lastPage(); $i++)
            <li class="page-item {{ ($items->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $items->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($items->currentPage() == $items->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $items->url($items->currentPage()+1) }}" >
                <span aria-hidden="true">»</span>
                {{-- Next --}}
            </a>
        </li>
    </ul>
    @endif
  </div>


  <table class="item__table">
    <tr>
      <th class="id">ID</th>
      <th class="name">お名前</th>
      <th class="gender">性別</th>
      <th class="email">メールアドレス</th>
      <th class="opinion">ご意見</th>
      <th class="button"></th>
    </tr>
    @foreach($items as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->fullname}}</td>
      <td class="gender">
        @if($item->gender == 1)
        男性
        @elseif($item->gender == 2)
        女性
        @endif
      </td>
      <td>{{$item->email}}</td>
      <td class="opinion">
        <?php 
          $text =  $item->opinion;
          echo mb_strimwidth($text,0,25,'...');
        ?>
      </td>
      <td>
        <form  class="delete__form" action="delete" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{$item->id}}">
          <button class="delete__button">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
@endsection