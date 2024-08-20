
// DOMロード完了時に実行される処理
document.addEventListener('DOMContentLoaded', () => {
    displayName();
    displayCookie();

    // ボタンにイベントを設定
    document.getElementById('btn-set-username-cookie').addEventListener('click', setUsernameCookie);
    document.getElementById('btn-clear-cookie').addEventListener('click', clearCookie);
});


/**
 * cookie[username]を表示
 */
const displayName = () => {
    const elmName = document.getElementById('name');
    if (!elmName) {
        return;
    }

    // Cookieにusernameが保存されていればその値を表示する。ない場合は「名無し」を表示する。
    const savedName = Cookies.get('username') || '名無し';
    elmName.innerText = savedName;
}

/**
 * document.cookie(Cookieに格納されている全データ)を表示
 */
const displayCookie = () => {
    const elmCookie = document.getElementById('cookie');
    if (!elmCookie) {
        return;
    }

    elmCookie.innerText = document.cookie;
}

/**
 * cookie[username]をセット & 表示を更新
 * 素のJavaScriptでCookieをセットするのは面倒なので、js-cookieライブラリを使用している。
 */
const setUsernameCookie = () => {
    const name = document.getElementById('input-name').value;
    if (!name) {
        return;
    }

    // Cookieの属性指定 ()
    cookieOptions = {
        expires: 7, // Cookieの有効期限(7日). 未指定の場合はブラウザを閉じるまで有効。
        // domain: '', // Cookieの有効ドメイン
        // path: '/', // Cookieの有効範囲
        // secure: true, // HTTPSでのみ有効
        // sameSite: 'Strict', // SameSite属性をStrictに設定
        // httpOnly: true, // JavaScriptからのアクセスを禁止
    };

    Cookies.set('username', name, cookieOptions);
    displayName();
    displayCookie();
};

/**
 * cookieを全削除 & 表示を更新
 */
const clearCookie = () => {
    Object.keys(Cookies.get()).forEach(function (cookieName) {
        var neededAttributes = {};
        Cookies.remove(cookieName, neededAttributes);
    });

    // 画面表示を更新
    displayName();
    displayCookie();
};
