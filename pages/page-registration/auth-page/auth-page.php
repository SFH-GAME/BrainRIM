<?php  
    include($_SERVER['DOCUMENT_ROOT']."/dataBase/controllers/users.php"); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/pages/page-registration/css/registration-page.css">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/system/css/global.css?v=1.0">
    <title>registration-page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <a class="skip-button" href="/index.php">Пропустить</a>
    </header>

	<div class="main">
        <div class="container">
            <div class="form signin">
                        <form action="auth-page.php" method="post">
						<h2>Авторизация</h2>
                        <div class="alerts-container err">
                            <span><?=$errorMsg?></span>
                        </div>
                        <div class="inputBox">
                            <input type="email" value="<?=$email?>" required="required" class="form-control" name="email" id="emailLog">
                            <i class="fa-regular fa-user"></i>
                            <span>Почта</span>
                        </div>
                        <div class="inputBox">
                        <input type="password" required="required" value = "" class="form-control" id="passLog" name="pass">
                            <i class="fa-sharp fa-solid fa-lock"></i>
                            <span>Пароль</span>
                        </div>
                        <div class="inputBox">
                        <button type="submit" name="button-log" class="btn btn-send">Войти</button>
                        </div>
                        </form>
                        <p>Не зарегистрированы? <a href="/pages/page-registration/registration-page.php" class="create">Создать аккаунт</a></p>
						<Span class="another-variants-text">Быстрый вход</Span>
				<div class="another-variants">
				<a class="google" href="/pages/page-registration/google-login.php">
					<svg class="google-img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 48 48">
					<path fill="#4285F4" d="M45.12 24.5c0-1.56-.14-3.06-.4-4.5H24v8.51h11.84c-.51 2.75-2.06 5.08-4.39 6.64v5.52h7.11c4.16-3.83 6.56-9.47 6.56-16.17z"></path>
					<path fill="#34A853" d="M24 46c5.94 0 10.92-1.97 14.56-5.33l-7.11-5.52c-1.97 1.32-4.49 2.1-7.45 2.1-5.73 0-10.58-3.87-12.31-9.07H4.34v5.7C7.96 41.07 15.4 46 24 46z"></path>
					<path fill="#FBBC05" d="M11.69 28.18C11.25 26.86 11 25.45 11 24s.25-2.86.69-4.18v-5.7H4.34C2.85 17.09 2 20.45 2 24c0 3.55.85 6.91 2.34 9.88l7.35-5.7z"></path>
					<path fill="#EA4335" d="M24 10.75c3.23 0 6.13 1.11 8.41 3.29l6.31-6.31C34.91 4.18 29.93 2 24 2 15.4 2 7.96 6.93 4.34 14.12l7.35 5.7c1.73-5.2 6.58-9.07 12.31-9.07z"></path>
					<path fill="none" d="M2 2h44v44H2z"></path>
					</svg>
					</a>
				<a class="facebook" href="#">
				<div class="x6s0dn4 x9f619 x78zum5 x1iyjqo2 x1s65kcs x1d52u69 xixxii4 x17qophe x13vifvy xzkaem6">
					<div aria-hidden="false" aria-label="Facebook" class="x1i10hfl x1qjc9v5 xjbqb8w xjqpnuy xa49m3k xqeqjp1 x2hbi6w x13fuv20 xu3j5b3 x1q0q8m5 x26u7qi x972fbf xcfux6l x1qhh985 xm0m39n x9f619 x1ypdohk xdl72j9 x2lah0s xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r x2lwn1j xeuugli xexx8yu x4uap5 x18d9i69 xkhd6sd x1n2onr6 x16tdsg8 x1hl2dhg xggy1nq x1ja2u2z x1t137rt x1o1ewxj x3x9cwd x1e5q0jg x13rtm0m x1q0g3np x87ps6o x1lku1pv x1rg5ohu x1a2a7pz x1hc1fzr x1k90msu x6o7n8i xbxq160" href="#" role="link" tabindex="0">
					<svg viewBox="0 0 36 36" class="x1lliihq x1k90msu x2h7rmj x1qfuztq" fill="url(#:0R1kjakqbkq75b5klba:)" height="40" width="40">
                    <defs><linearGradient x1="50%" x2="50%" y1="97.0782153%" y2="0%" id=":0R1kjakqbkq75b5klba:"><stop offset="0%" stop-color="#0062E0"></stop><stop offset="100%" stop-color="#19AFFF"></stop></linearGradient></defs>
					<path d="M15 35.8C6.5 34.3 0 26.9 0 18 0 8.1 8.1 0 18 0s18 8.1 18 18c0 8.9-6.5 16.3-15 17.8l-1-.8h-4l-1 .8z"></path>
					<path class="facebook-path" d="M25 23l.8-5H21v-3.5c0-1.4.5-2.5 2.7-2.5H26V7.4c-1.3-.2-2.7-.4-4-.4-4.1 0-7 2.5-7 7v4h-4.5v5H15v12.7c1 .2 2 .3 3 .3s2-.1 3-.3V23h4z"></path></svg></div><div><div></div></div></div>
				</a>
				<a class="x" href="#">
				<svg viewBox="0 0 24 24" aria-hidden="true" class="r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-lrvibr r-m6rgpd r-k200y r-1nao33i r-5sfk15 r-kzbkwu"><g>
					<path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></g></svg>
				</a>
            </div>
		</div>
	</div>
		<footer>
                <a class="Support" href="https://vk.com/topic-217095388_49215306">Поддержка</a>
            </footer>
            <script src="/pages/page-registration/registration-page.js"></script>
			</div>
</body>

</html>