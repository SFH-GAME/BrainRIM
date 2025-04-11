<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO оптимизация -->
    <title>Зона роста - Статьи для саморазвития</title>
    <meta name="description"
        content="Узнайте, как развивать память, интеллект, внимательность и другие навыки с нашими статьями для саморазвития.">
    <meta name="keywords" content="саморазвитие, рост, интеллект, память, внимательность, мотивация">
    <meta name="author" content="Романовский Порфирий">

    <!-- Open Graph для соцсетей -->
    <meta property="og:title" content="Зона роста - Статьи для саморазвития">
    <meta property="og:description" content="Лучшие техники и советы для личностного роста.">
    <meta property="og:image" content="/img/app_icon_with_larger_area_1024x1024.png">
    <meta property="og:url" content="https://brainrim.site/articles">
    <meta property="og:type" content="article">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Зона роста - Статьи для саморазвития">
    <meta name="twitter:description" content="Лучшие техники и советы для личностного роста.">
    <meta name="twitter:image" content="/img/app_icon_with_larger_area_1024x1024.png">

    <!-- Дополнительные метатеги -->
    <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
    <link rel="manifest" href="/manifest.json">
    <meta name="application-name" content="BrainRim">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="BrainRim">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" href="/img/app_icon_with_larger_area_1024x1024.png">
	<link rel="stylesheet" href="/system/css/global.css?v=1.0">
    <link rel="stylesheet" href="/pages/ImproveFunctional/Articles/css/ArticleMain.css">
    <script src="/pages/ImproveFunctional/Articles//js/ArticleMain.js" defer></script>
</head>

<!-- Этот код нужен для предварительного запуска темы(чтобы не было вспышки)-->
<script>
		(function () {
		try {
			const userPref = localStorage.getItem('theme');
			let theme;
			if (userPref) {
				theme = userPref;
			} else {
				theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
			}
			document.documentElement.setAttribute('data-theme', theme);
		} catch (e) { }
		})();
</script>

<body>
    <header>
        <a class="comeback-button" href="/index.php"><img src="/img/icons/arrow-back-outline.svg" class="img-icon" alt="иконка-назад" title="иконка-назад"></a>
    </header>

    <main>
        <div class="article-container">
            <h3 class="head-title">Зона роста</h3>
            <div class="variants">
                <div class="button" data-filter="all">Все</div>
                <div class="button" data-filter="memory">Память</div>
                <div class="button" data-filter="attention">Внимательность</div>
                <div class="button" data-filter="intelligence">Интеллект</div>
                <div class="button" data-filter="reaction">Реакция</div>
                <div class="button" data-filter="news">Новости</div>  <!--Наверное, стоит убрать некоторые, заменив на психология, еда и т.д. -->
                <div class="button" data-filter="articles">Статьи</div>
                <div class="button" data-filter="health">Здоровье</div>
                <div class="button" data-filter="recommended">Рекомендации</div>
                <div class="button" data-filter="science">Наука</div>
                <div class="button" data-filter="important">Важно знать</div>
            </div>

            <div class="block-articles">
                <a href="/pages/ImproveFunctional/Articles/Pages/Article/Anxiety.php" class="block" data-category="articles important">
                    <div class="block-title">Борьба c тревожностью😟</div>
                    <div class="description">Как побороть тревожность за три простых шага.</div>
                    <div class="block-picture"><img src="/pages/ImproveFunctional/Articles/images/article1.svg" alt="">
                    </div>
                    <div class="block-tags">#Статья #Здоровье</div>
                </a>

                <a href="/pages/ImproveFunctional/Articles/Pages/Article/Sleep.php" class="block" data-category="articles health">
                    <div class="block-title">Методы хорошего сна😴</div>
                    <div class="description">Как засыпать если у тебя рой мыслей в голове и сон просто не идёт.</div>
                    <div class="block-picture"><img src="/pages/ImproveFunctional/Articles/images/article2.svg" alt="">
                    </div>
                    <div class="block-tags">#Статья #Здоровье</div>
                </a>

                <a href="/pages/ImproveFunctional/Articles/Pages/Article/Smoking.php" class="block" data-category="articles health">
                    <div class="block-title">Почему курение убивает?🚬</div>
                    <div class="description">Учёные из Гарварда рассказали про эксперимент с курящими. <p class="smoke">В конце выжил
                        лишь 1% курящих.</p></div>
                    <div class="block-picture"><img src="/pages/ImproveFunctional/Articles/images/Article3.svg" alt="">
                    </div>
                    <div class="block-tags">#Статья #Здоровье</div>
                </a>

				<a href="/pages/ImproveFunctional/Articles/Pages/Article/Things.php" class="block" data-category="articles recommended">
                    <div class="block-title">Хватит откладывать дела📋</div>
                    <div class="description">Секреты хорошей продуктивности🤫</div>
                    <div class="block-picture"><img src="/pages/ImproveFunctional/Articles/images/Things.svg" alt="">
                    </div>
                    <div class="block-tags">#Статья #Рекомендации</div>
                </a>

				<a href="/pages/ImproveFunctional/Articles/Pages/Article/SayNO.php" class="block" data-category="articles important">
                    <div class="block-title">Научись говорить "нет"🚫</div>
                    <div class="description">Искусство личных границ</div>
                    <div class="block-picture"><img src="/pages/ImproveFunctional/Articles/images/SayNO.svg" alt="">
                    </div>
                    <div class="block-tags">#Статья #Важно знать</div>
                </a>

				<a href="/pages/ImproveFunctional/Articles/Pages/Article/Finances.php" class="block" data-category="articles recommended">
                    <div class="block-title">Финансовая грамотность💵</div>
                    <div class="description">Что это и почему важно?</div>
                    <div class="block-picture"><img src="/pages/ImproveFunctional/Articles/images/Finances.svg" alt="">
                    </div>
                    <div class="block-tags">#Статья #Рекомендации</div>
                </a>

				<a href="/pages/ImproveFunctional/Articles/Pages/Article/Fears.php" class="block" data-category="articles recommended">
                    <div class="block-title">Страхи👻</div>
                    <div class="description">Как преодолевать страхи?</div>
                    <div class="block-picture"><img src="/pages/ImproveFunctional/Articles/images/Fears.svg" alt="">
                    </div>
                    <div class="block-tags">#Статья #Рекомендации</div>
                </a>
				
				<a href="/pages/ImproveFunctional/Articles/Pages/Article/Food.php" class="block" data-category="articles health">
                    <div class="block-title">Еда😋</div>
                    <div class="description">Как найти баланс между вкусом и пользой?</div>
                    <div class="block-picture"><img src="/pages/ImproveFunctional/Articles/images/Food.svg" alt="">
                    </div>
                    <div class="block-tags">#Статья #Рекомендации</div>
                </a>

				<a href="/pages/ImproveFunctional/Articles/Pages/Article/BadHabits.php" class="block" data-category="articles recommended">
                    <div class="block-title">Вредные привычки</div>
                    <div class="description">Как от них избавиться?</div>
                    <div class="block-picture"><img src="/pages/ImproveFunctional/Articles/images/BadHabits.svg" alt="">
                    </div>
                    <div class="block-tags">#Статья #Рекомендации</div>
                </a>

				<a href="/pages/ImproveFunctional/Articles/Pages/Article/Stress.php" class="block" data-category="articles recommended">
                    <div class="block-title">Стресс и выгорание</div>
                    <div class="description">Как сохранить баланс?</div>
                    <div class="block-picture"><img src="/pages/ImproveFunctional/Articles/images/Stress.svg" alt="">
                    </div>
                    <div class="block-tags">#Статья #Рекомендации</div>
                </a>

            </div>
        </div>
    </main>
</body>
<script src="/system/js/global.js"></script>
</html>