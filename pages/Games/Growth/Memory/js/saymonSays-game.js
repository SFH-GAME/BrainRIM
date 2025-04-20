const game = {
	sequence: [],
	playerSequence: [],
	round: 0,
	colors: ["green", "red", "blue", "yellow"],
	canClick: false,
	buttons: document.querySelectorAll(".btn"),
	statusElement: document.getElementById("status"),
 
	start() {
	   this.sequence = [];
	   this.playerSequence = [];
	   this.round = 0;
	   document.getElementById("round").textContent = this.round;
	   this.nextRound();
	},
 
	nextRound() {
	   this.round++;
	   document.getElementById("round").textContent = this.round;
	   this.statusElement.textContent = "Запомни";
	   this.statusElement.style.color = "#c67e29ed";
	   this.playerSequence = [];
	   this.sequence.push(this.colors[Math.floor(Math.random() * 4)]);
	   this.playSequence();
	},
 
	playSequence() {
	   this.canClick = false;
	   let i = 0;
	   let interval = setInterval(() => {
		  this.flashButton(this.sequence[i]);
		  i++;
		  if (i >= this.sequence.length) {
			 clearInterval(interval);
			 setTimeout(() => {
				this.statusElement.textContent = "Повторяй";
				this.statusElement.style.color = "#0aa60ae6";
				this.canClick = true;
			 }, 500);
		  }
	   }, 800);
	},
 
	flashButton(color) {
	   let button = document.querySelector(`.btn.${color}`);
	   button.classList.add("active");
	   setTimeout(() => button.classList.remove("active"), 500);
	},
 
	handleButtonClick(color) {
	   if (!this.canClick) return;
	   this.playerSequence.push(color);
	   this.flashButton(color);
	   this.checkSequence();
	},
 
	checkSequence() {
		let index = this.playerSequence.length - 1;
		if (this.playerSequence[index] !== this.sequence[index]) {
		   // Предположим, ты получаешь данные с сервера, пока можно захардкодить:
		   const mockResultData = {
			  score: this.sequence.length - 1,
			  level: this.round,
			  reward: {
				 money: 120,
				 hints: 3,
				 iq: 5,
				 exp: 37
			  },
			  best: {
				 score: 15,
				 level: 8
			  }
		   };
	 
		   // Показываем результаты
		   showResults(mockResultData);
		   return;
		}
	 
		if (this.playerSequence.length === this.sequence.length) {
		   setTimeout(() => this.nextRound(), 1000);
		}
	}
}
 // Навешиваем обработчики на кнопки
 game.buttons.forEach(button => {
	button.addEventListener("click", () => {
	   const color = button.dataset.color;
	   game.handleButtonClick(color);
	});
 });