// === ЛОГИКА ИГРЫ ===
const cups = document.querySelectorAll('.cup');
const ball = document.querySelector('.ball');
const restartButton = document.getElementById('restart');
const scoreElement = document.getElementById('score');

let positions = [0, 120, 240];
let ballPosition;
let mixCount = 3;
let animationDuration = 0.8;
let score = 0;

const game = {
	start: startGame
};
function startGame() {
	restartButton.style.display = "none";
	ballPosition = Math.floor(Math.random() * cups.length);
	ball.style.transform = `translateX(${positions[ballPosition]}px)`;

	cups[ballPosition].style.transform = "translateY(-50px)";

	setTimeout(() => {
		lowerCups();
	}, 2000);
}

function lowerCups() {
	cups.forEach(cup => cup.style.transform = "translateY(0)");

	setTimeout(() => {
		shuffleCups(mixCount);
	}, 2000);
}

function shuffleCups(count) {
	if (count === 0) {
		enableSelection();
		return;
	}

	let newPositions = [...positions];
	do {
		newPositions.sort(() => Math.random() - 0.5);
	} while (JSON.stringify(newPositions) === JSON.stringify(positions));

	cups.forEach((cup, index) => {
		let moveX = newPositions[index] - positions[index];
		cup.style.transition = `transform ${animationDuration}s ease-in-out`;
		cup.style.transform = `translateX(${moveX}px)`;
	});

	ball.style.transition = `transform ${animationDuration}s ease-in-out`;
	ball.style.transform = `translateX(${newPositions[ballPosition]}px)`;

	setTimeout(() => {
		cups.forEach((cup, index) => {
			cup.style.left = `${newPositions[index]}px`;
			cup.style.transition = "none";
			cup.style.transform = "translateX(0)";
		});

		ball.style.transform = `translateX(${newPositions[ballPosition]}px)`;
		positions = [...newPositions];

		setTimeout(() => shuffleCups(count - 1), animationDuration * 1000);
	}, animationDuration * 1000);
}

function enableSelection() {
	cups.forEach(cup => {
		cup.addEventListener("click", revealCup);
		cup.style.cursor = "pointer";
	});
}

function revealCup(event) {
	const selectedCup = event.currentTarget;
	const selectedIndex = Array.from(cups).indexOf(selectedCup);

	selectedCup.style.transform = "translateY(-50px)";

	setTimeout(() => {
		if (selectedIndex === ballPosition) {
			alert("Поздравляю! Ты нашёл шарик!");
			increaseDifficulty();
			updateScore();
			restartButton.style.display = "block";
		} else {
			// Показываем окно с результатами при проигрыше
			const resultData = {
				score: score,
				level: mixCount,
				reward: {
					money: 0,
					hints: 0,
					iq: 0,
					exp: 5
				},
				best: {
					score: score,
					level: mixCount
				}
			};

			showResults(resultData);
		}
	}, 500);

	cups.forEach(cup => cup.removeEventListener("click", revealCup));
}


function increaseDifficulty() {
	if (score % 10 === 0 && score !== 0) {
		animationDuration = Math.max(0.2, animationDuration * 0.9);
		mixCount += 1;
	}
}

function updateScore() {
	score += 1;
	if (scoreElement) {
		scoreElement.textContent = score;
	}
}

// Обработка кнопки рестарта
restartButton?.addEventListener("click", () => {
	cups.forEach(cup => {
		cup.style.transform = "translateY(0)";
	});
	startGame();
});