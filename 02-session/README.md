# WEBセッション

- セッションデータはサーバー側に保存される。保存先は用途により様々。
    - WEBサーバーのファイル (データが少量かつ低負荷の場合。またはコスト重視の場合)
    - Redis, MemcachedなどのKVS (高負荷、低遅延、大規模での水平スケールなどを重視する場合)
    - DB (永続性を重視する場合)
- セッションデータの紐づけをするために、CookieにセッションIDを保存しておくのが一般的

## Sample

### Usage

```bash
# 1. Docker(Docker Desktop)サービスを起動しておく

# 2. PHP-CLI(ビルトインサーバー)コンテナを起動する
cd <このフォルダ>
docker compose up -d

# 3. PHP-CLI(ビルトインサーバー)のログを監視
docker compose logs -f

# x. PHP-CLI(ビルトインサーバー)コンテナを停止+削除 (コンテナを残したい場合はdownではなくstop/startを利用)
docker compose down
```

### アクセス

http://localhost:60002/
