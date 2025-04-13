<div class="leaderboard-container">
		<div class="leaderboard__back-button"><img class="img-back-icon" src="/img/icons/arrow-back-outline.svg"
				alt="иконка-назад" title="иконка-назад"></div>
		<h2>Лидеры</h2>
		<div class="leaderboard-list-container">
			<h3>2048</h3>
			<span>(Топ 10)</span>
			<div class="leaderboard-items-container">
				<?php foreach ($results as $index => $row): ?>
					<div class="leaderboard-item">
						<div class="leaderboard-item__id"><?php echo $index + 1; ?></div>
						<div class="leaderboard-item__name"><?php echo htmlspecialchars($row['user_name']); ?></div>
						<div class="leaderboard-item__score"><?php echo htmlspecialchars($row['best_score']); ?></div>
						<div class="leaderboard-item__img"><img class="img-icon comeback-icon"
								src="/img/icons/ribbon-outline.svg" alt="иконка-заслуги" title="иконка-заслуги"></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

<style>
.leaderboard__back-button{
	position: absolute;
    top: 20px;
    left: 20px;
	filter: var(--icon-color);
    z-index: 2;
    transition: 0.1s;
}
.leaderboard__back-button:active {
    transform: scale(0.8);
}
.leaderboard-container{
	position: absolute;
	display: none;
	width: 100%;
	height: 100%;
	background-color: var(--bg-color);
	z-index: 4;
}
.leaderboard-container h2{
	text-align: center;
	margin: 70px 0 0 0;
	color: var(--main-color);
	letter-spacing: 8%;
	font-size: 32px;
}
.leaderboard-list-container {
    padding: 20px 0;
    margin: 50px auto 0 auto;
    border-radius: 20px;
    border: solid var(--main-color) 1px;
    height: auto;
    width: 90%;
    box-shadow: 0px 1px 4px 4px rgba(0, 0, 0, 0.25), -1px -2px 6px rgba(255, 255, 255, 0.25);
}
.leaderboard-list-container h3{
	font-size: 24px;
	color: #fff;
	text-align: center;
}
.leaderboard-list-container span {
	display:block;
	text-align: center;
	color: #05efd4;
	margin: 10px 0 0 0;
	font-size: 16px;
}
.leaderboard-items-container {
    display: flex;
    height: 60vh;
    overflow: auto;
    flex-direction: column;
    gap: 10px;
    margin: 20px 0 0 0;
}
.leaderboard-item{
	display: flex;
	justify-content: space-between;
	align-items: center;
	font-size: 22px;
	padding: 0 20px;
	height: 50px;
	background-color: #1D2228;
	border-radius: 10px;
	color: var(--text-color);
}
.leaderboard-item__id {
	display: flex;
	align-items: center;
	justify-content: center;
	box-shadow: 0px 1px 4px 3px rgba(0, 0, 0, 0.25), -2px -2px 4px rgba(255, 255, 255, 0.25);
	border-radius: 5px;
	height: 30px;
	width: 30px;
	color: var(--main-color);
	font-size: 20px;
}
.leaderboard-item__name {
    white-space: nowrap;
    width: 40%;
    overflow: auto;

}
.leaderboard-item__img {
	display: flex;
	align-items: center;
	justify-content: center;
}
.leaderboard-item:nth-child(1) {
	color: #FFC700;
}
.leaderboard-item:nth-child(2) {
	color: silver;
}
.leaderboard-item:nth-child(3) {
	color: #E29500;
}
</style>

<script>
//Таблица лидеров
let leaderboardBackdButton = document.querySelector(".leaderboard__back-button");
let leaderboardContainer = document.querySelector(".leaderboard-container");
leaderboardBackdButton.onclick = function () {
	leaderboardContainer.style = "display: none;"
}
</script>