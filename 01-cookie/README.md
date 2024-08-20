# HTTP cookie

## HTTP cookieとは

MDN: https://developer.mozilla.org/ja/docs/Web/HTTP/Cookies  
ブラウザとサーバー間でやり取りされる小さいデータのこと。
cookieのデータはブラウザ側に保存される。

- cookieの送信
    - WEBサイトにアクセス時、ブラウザにcookieが保存されていれば自動的にHTTPリクエストヘッダー付加して送信する。
- cookieの設定方法
    - HTTPレスポンスヘッダーの`Set-Cookie`でブラウザにcookieの保存を要求する。
    - javascriptでcookieを設定する。
    - ブラウザの機能(dev tools等)で設定する。
- cookieの利用用途
    - WEBセッションの識別 (`02-session`にて説明)
    - WEBサイトの設定の保存 (ex: 特定サイトでの文字サイズ、テーマ、設定などの保存)
    - トラッキング(広告などでの個人の追跡・分析を目的に利用されていたが、近年では規制や制約が強くなっている)
- WEB APIでの利用
    - 一般的にWEB APIではcookieを利用しない。代わりにアクセストークン等での認可を行う。

## Sample

### Usage

```bash
# 1. Docker(Docker Desktop)サービスを起動しておく

# 2. Nginxコンテナを起動する
cd <このフォルダ>
docker compose up -d

# 3. Nginxのログを監視
docker compose logs -f

# x. Nginxコンテナを停止+削除 (コンテナを残したい場合はdownではなくstop/startを利用)
docker compose down
```

### アクセス

http://localhost:60001/
