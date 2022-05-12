<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AdvanceTest</title>
  
  <!--　住所検索 -->
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

  </script>
</head>
<body>
  <div class="content">
    @yield('content')
  </div>
  <script>
  function ztoh(te) {
    var ts = te.value;
    ts = ts.replace( /[０-９Ａ-Ｚａ-ｚ]/g, function(es) {
        return String.fromCharCode(es.charCodeAt(0) - 65248);
    });
    te.value = ts;
  }
  </script>
</body>
</html>