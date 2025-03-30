<div class="topButton-gameWords">
   <a class="comeback-button" href="#">
      <div class="comeback-button-body"><img src="/img/Icons/arrow-back-outline.svg" class="img-icon" alt="иконка-назад" title="иконка-назад"></div>
   </a>
   <a href="#" class="linkToTheSettings"><img src="/img/icons/settings-outline.svg" class="imgSettings"
         alt="иконка настроек" title="иконка настроек"></a>
   <div class="linkToTheRestart"><img src="/img/Icons/refresh-outline.svg" class="img-icon" alt="иконка-назад" title="иконка-назад"></div>
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
      z-index: 2;
      transition: 0.1s;
   }

   .comeback-button-body:active {
      transform: scale(0.8);
   }

   .linkToTheSettings img {
      height: 40px;
      width: 40px;
      filter: invert(1);
      transition: 1.2s;
   }

    .linkToTheSettings:hover {
      transform: rotate(180deg);
   } 

   .linkToTheRestart {
      align-items: center;
      margin: 0px 5px 0 0;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      -webkit-tap-highlight-color: transparent;
      transition: 1.2s;
   }

   .linkToTheRestart:hover {
      transform: rotate(540deg);
   }

   .img-icon{
	width: 40px;
    height: 40px;
	filter: invert(1);
}
</style>