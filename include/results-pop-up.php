<div class="results-gameover results-container">
  <h1 class="results-head-text">Результаты</h1>
  <div class="results">
    <video autoplay muted playsinline class="target">
      <source src="/img/target.webm" type="video/webm">
      Ваш браузер не поддерживает воспроизведение видео.
    </video>

    <div class="difficult block-item head-span" style="display:none;">Сложность:
      <div class="difficult-mode"></div>
    </div>

    <div class="activity block-item-column">
      <div class="activity-block">
        <span class="head-span">Активность:</span>
        <div class="activity-item"></div>
      </div>
      <div class="exp-wrapper">
        <div class="loading-bar">
          <div id="progress" class="player-exp__line-blue"></div>
        </div>
        <div id="exp-value" class="exp-value"></div>
      </div>
    </div>

    <div class="reward block-item-column">
      <span class="head-span">Награда:</span>
      <div class="reward-block pending-reward ">
        <div class="reward-item">
          <img src="/img/Menu/Memoney.png" alt="игровая валюта" title="игровая валюта">
          <span class="money"></span>
        </div>
        <div class="reward-item">
          <img src="/img/Menu/icon-hints.png" alt="подсказки" title="подсказки">
          <span class="hints"></span>
        </div>
        <div class="reward-item">
          <img src="/img/Menu/IQ.svg" alt="IQ" title="IQ">
          <span class="iq"></span>
        </div>
        <div class="reward-item">
          <img src="/img/Menu/exp-icon.svg" alt="опыт" title="опыт">
          <span class="exp"></span>
        </div>
      </div>
    </div>

    <div class="results-count-container block-item-column">
      <span class="head-span">Результаты</span>
      <div class="enemies" style="display:none;">✅ Врагов пройдено:<div class="enemies-count"></div>
      </div>
      <div class="time" style="display:none;">⏳ Время:<div class="time-count">
          <div class="sec"></div>
          <div class="min"></div>
        </div>
      </div>
      <div class="score" style="display:none;">✅ Счёт:<div class="score-count"></div>
        <div class="level" style="display:none;">📶 Уровень:<div class="level-count"></div>
        </div>
        <div class="moves" style="display:none;">🏆 Счёт:<div class="moves-count"></div>
        </div>
      </div>

      <div class="best-results block-item-column">
        <span class="head-span">Ваш лучший результат:</span>
        <div class="best-enemies" style="display:none;">✅ Врагов пройдено:<div class="best-enemies-count"></div>
        </div>
        <div class="best-time" style="display:none;">⏳ Время:<div class="best-time-count">
            <div class="best-sec"></div>
            <div class="best-min"></div>
          </div>
        </div>
        <div class="best-score" style="display:none;">✅ Счёт:<div class="best-score-count"></div>
          <div class="best-level" style="display:none;">📶 Уровень:<div class="best-level-count"></div>
          </div>
          <div class="best-moves" style="display:none;">🏆 Счёт:<div class="best-moves-count"></div>
          </div>
        </div>
      </div>
      <div class="results-menu__buttons-container">
        <div onclick="window.location.reload();" class="results-menu__button results-menu__button-restart"><img
            src="/img/icons/refresh-outline.svg" class="img-icon" alt="иконка-обновить" title="иконка-обновить">
        </div>
        <a href="/index.php" class=" results-menu__button result-menu__button-home"><img
            src="/img/icons/home-outline.svg" class="img-icon" alt="иконка-дома" title="иконка-дома"></a>
      </div>
    </div>
  </div>
</div>
<style>
  .results-container {
    position: absolute;
    display: none;
    height: 100%;
    width: 100%;
    background-color: #161618;
    z-index: 99;
    font-size: 24px;
    color: var(--bg-color);
    overflow: auto;
  }

  .results-head-text {
    text-align: center;
    font-size: 38px;
  }

  .results {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    border-radius: 26px;
    gap: 20px;
    margin: 0 auto;
  }

  .head-span {
    color: #D3D2D4;
    font-size: 22px;
  }

  .enemies {
    display: flex;
    gap: 10px;
  }

  .moves {
    display: flex;
    gap: 10px;
  }

  .time {
    display: flex;
    gap: 10px;
  }

  .level {
    display: flex;
    gap: 10px;
  }

  .best-results {
    margin: 20px auto;
  }

  .enemies-count {
    color: #7655F5;
  }

  .moves-count {
    color: #7655F5;
  }

  .time-count {
    color: #7655F5;
    display: flex;
    gap: 10px;
  }

  .level-count {
    color: #7655F5;
  }

  .best-enemies-count {
    color: rgb(0, 255, 0);
  }

  .best-moves-count {
    color: rgb(0, 255, 0);
  }

  .best-time-count {
    color: rgb(0, 255, 0);
    display: flex;
    gap: 10px;
  }

  .best-level-count {
    color: rgb(0, 255, 0);
  }

  .results-menu__buttons-container {
    display: flex;
    justify-content: space-around;
    width: 360px;
    margin: auto;
  }

  .results-menu__button {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
    font-size: 42px;
    width: 140px;
    height: 60px;
    color: #05EFD4;
    transition: 0.2s;
    background: #2B2A31;
    margin: 50px 0;
  }

  .img-icon {
    width: 40px;
    height: 40px;
    filter: invert(1);
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
  }

  .target {
    width: 400px;
  }

  .difficult {
    display: flex;
  }

  .block-item {
    display: flex;
    justify-content: flex-start;
    background: #212027;
    border-radius: 10px;
    width: 280px;
    padding: 20px;
    gap: 15px;
    text-align: left;
    font-size: 20px;
  }

  .block-item-column {
    display: flex;
    justify-content: flex-start;
    background: #212027;
    border-radius: 10px;
    width: 280px;
    padding: 20px;
    gap: 15px;
    flex-direction: column;
    text-align: left;
    font-size: 20px;
  }

  .loading-bar {
    box-sizing: border-box;
    width: 250px;
    height: 25px;
    background-color: #474747;
    border-radius: 7px;
    margin: 10px auto;
    overflow: hidden;
  }

  .player-exp__line-blue {
    background-color: var(--main-color);
    height: 100%;
    width: 0;
    transition: width 1.8s ease-out;
  }

  .upgrade-block {
    display: flex;
    gap: 10px;
    align-items: center;
  }

  .upgrade-item {
    color: #7655F5;
  }

  .element.style {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .reward-block {
    display: flex;
    border-radius: 15px;
    width: 300px;
    justify-content: flex-start;
    margin-bottom: 20px;
    gap: 13%;
  }

  .reward-item img {
    height: 25px;
  }

  .reward-item {
    display: flex;
    align-items: center;
    font-size: 18px;
    color: #ffffffa6;
    gap: 2px;
  }



  @media (max-width: 768px) {

    .results {
      width: 85%;
    }

    .target {
      width: 100%;
      max-width: 100%;
      height: auto;
    }

    .block-item,
    .block-item-column,
    .loading-bar,
    .reward-block {
      width: 100%;
      max-width: 100%;
      box-sizing: border-box;
    }

    .results-menu__buttons-container {
      align-items: center;
      width: 100%;
      gap: 20px;
      margin-bottom: 20px;
    }

    .results-menu__button {
      width: 120px;
      height: 50px;
      font-size: 24px;
      margin: 10px 0;
    }

    .img-icon {
      width: 30px;
      height: 30px;
    }

    .results-head-text {
      font-size: 28px;
    }

    .head-span,
    .block-item,
    .block-item-column {
      font-size: 18px;
    }

    .reward-item {
      font-size: 16px;
      gap: 6px;
    }

    .reward-item img {
      height: 20px;
    }

    .loading-bar {
      height: 20px;
    }
  }

  .exp-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .exp-value {
    font-size: 18px;
    color: #05EFD4;
    font-weight: bold;
    animation: floatIn 0.8s ease-out forwards;
    opacity: 0;
  }

  @keyframes floatIn {
    0% {
      transform: translateY(10px);
      opacity: 0;
    }

    100% {
      transform: translateY(0);
      opacity: 1;
    }
  }
</style>

<script>
  window.addEventListener('load', () => {
    const progressBar = document.getElementById('progress');
    const expValue = document.getElementById('exp-value');
    const targetPercentage = 72; // Процент ширины полоски
    const targetXP = 120;        // Реальное значение XP (можешь подставлять)

    let currentXP = 0;
    const duration = 1200; // общая длительность (мс)
    const stepTime = 20;
    const steps = duration / stepTime;
    const increment = targetXP / steps;

    // Запуск прогресс-бара
    setTimeout(() => {
      progressBar.style.width = targetPercentage + '%';
    }, 400);

    // Анимация XP чисел
    const counter = setInterval(() => {
      currentXP += increment;
      if (currentXP >= targetXP) {
        currentXP = targetXP;
        clearInterval(counter);
      }
      expValue.textContent = `+${Math.floor(currentXP)}`;
    }, stepTime);
  });

</script>