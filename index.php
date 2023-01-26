
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4eachblog 掲示板</title>

    <!-- リセットCSS　-->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="4eachblog_logo.jpg">
        </div>
        <nav id="global-nav">
            <ul class="global-nav__list">
                <li class="global-nav__item"><a href="#">トップ</a></li>
                <li class="global-nav__item"><a href="#">プロフィール</a></li>
                <li class="global-nav__item"><a href="#">4eachについて</a></li>
                <li class="global-nav__item"><a href="#">登録フォーム</a></li>
                <li class="global-nav__item"><a href="#">問い合わせ</a></li>
                <li class="global-nav__item"><a href="#">その他</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="contents-wrapper">
            <h1 class="title">プログラミングに役立つ掲示板</h1>

            <section class="section-wrapper">
                <h3 class="form-title">入力フォーム</h3>
                <form action="insert.php" method="post">
                    <label>
                        ハンドルネーム
                        <input name="handlename">
                    </label>

                    <label>
                        タイトル
                        <input name="title">
                    </label>

                    <label>
                        コメント
                        <textarea name="comments"></textarea>
                    </label>

                    <input type="submit" value="投稿する" class="btn">
                </form>
            </section>

            <ul>
                <?php
                    mb_internal_encoding("utf8");
                    $pdo = new PDO("mysql:host=localhost;dbname=lesson17", "root", "");
                    $postData = $pdo->query("select * from 4each_keijiban")->fetchAll();

                    foreach($postData as $data) :
                ?>
                    <li class="article section-wrapper">
                        <h3 class="article__title"><?= $data["title"] ?></h3>
                        <p class="article__comments">
                            <?= $data["comments"] ?>
                        </p>
                        <div class="article__handlename">posted by <?= $data["handlename"] ?></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <sidebar>
            <ul class="links-list">
                <li class="links-list__item">
                    <h2 class="links-title">人気の記事</h2>
                    <ul class="links">
                        <li class="links__item"><a href="#">PHPおすすめ本</a></li>
                        <li class="links__item"><a href="#">PHP MyAdminの使い方</a></li>
                        <li class="links__item"><a href="#">今人気のエディタ Top5</a></li>
                        <li class="links__item"><a href="#">HTMLの基礎</a></li>
                    </ul>
                </li>

                <li class="links-list__item">
                    <h2 class="links-title">オススメリンク</h2>
                    <ul class="links">
                        <li class="links__item"><a href="#">インターノウス株式会社</a></li>
                        <li class="links__item"><a href="#">XAMPPのダウンロード</a></li>
                        <li class="links__item"><a href="#">Eclipseのダウンロード</a></li>
                        <li class="links__item"><a href="#">Bracketsのダウンロード</a></li>
                    </ul>
                </li>

                <li class="links-list__item">
                    <h2 class="links-title">カテゴリ</h2>
                    <ul class="links">
                        <li class="links__item"><a href="#">HTML</a></li>
                        <li class="links__item"><a href="#">PHP</a></li>
                        <li class="links__item"><a href="#">MySQL</a></li>
                        <li class="links__item"><a href="#">JavaScript</a></li>
                    </ul>
                </li>
            </ul>
        </sidebar>
    </main>

    <footer>
        copyright &copy; internous | 4each blog the which provides A to Z about programming.
    </footer>
</body>
</html>