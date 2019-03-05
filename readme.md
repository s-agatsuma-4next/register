## 概要
POSレジアプリケーション

## 機能
- ログイン
- ログアウト
- ユーザー登録（機能制限）
- お会計
- 販売データ修正（機能制限）
- 売り上げ検索
- 商品登録（機能制限）

## 利用ライブラリ
- https://www.epson.jp/dl_soft/readme/26661.htm
- ライブラリ利用に必要なものはepos-2.9.0.jsのみ（public/jsに配置）
- 利用マニュアルはePOS_SDK_JavaScript_um_ja_revI.pdf

## .envの中身
```
APP_NAME=Leo
APP_ENV=local
APP_KEY=base64:meY5AEd92X2puoyeWDBUQNTuAToz29s+iP/Iv2UFw+M=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=leo
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```