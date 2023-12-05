<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- ヘッダー情報 -->
</head>
<body>
    <div id="app">
        <hello-world></hello-world>
        <hello-japan></hello-japan>
        <message-component></message-component>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
