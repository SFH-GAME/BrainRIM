<div class="topButton-gameWords">
   <a class="comeback-button" href="#">
      <div class="comeback-button-body"><ion-icon name="arrow-back-outline"></ion-icon></div>
   </a>
   <a href="#" class="linkToTheSettings"><ion-icon class="imgSettings" name="settings-outline"></ion-icon></a>
   <div class="linkToTheRestart"><ion-icon name="refresh-outline"></ion-icon></div>
</div>

<style>
   .topButton-gameWords {
      position: absolute;
      top: 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      padding: 14px 10px 0 10px;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      -webkit-tap-highlight-color: transparent;
   }

   .comeback-button-body {
      position: relative;
      width: 40px;
      height: 40px;
      font-size: 44px;
      color: #fff;
      z-index: 2;
      transition: 0.1s;
   }

   .comeback-button-body:active {
      transform: scale(0.8);
   }

   .linkToTheSettings {
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 34px;
      color: #fff;
      transition: 1.2s;
   }

   .linkToTheSettings:hover {
      transform: rotate(180deg);
   }

   .linkToTheRestart {
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 34px;
      font-weight: 900;
      color: #fff;
      margin: 0px 5px 0 0;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      -webkit-tap-highlight-color: transparent;
      transition: 1.2s;
   }

   .linkToTheRestart:hover {
      transform: rotate(540deg);
   }
</style>