<div class="pop-up__container">
   <div class="pop-up">
      <div class="pop-up__title">
         Внимание
      </div>
      <div class="pop-up__description">
         Если вы перейдёте-результат не сохраниться
      </div>
      <div class="wrap__button">
         <form class="pop-up__form" action="#">
            <a href=" /pages/settings-page/settings-page.php" class="pop-up__ok">Ok</a>
            <a class="pop-up__cancel">Отмена</a>
         </form>
      </div>
   </div>
</div>
<div class="pop-up__container2">
   <div class="pop-up2">
      <div class="pop-up__title">
         Внимание
      </div>
      <div class="pop-up__description2">
         Если вы перейдёте,результат не сохраниться
      </div>
      <div class="wrap__button2">
         <form class="pop-up__form2" action="#">
            <a href=" /index.php" class="pop-up__ok pop-up__ok2">Ok</a>
            <a class="pop-up__cancel pop-up__cancel2">Отмена</a>
         </form>
      </div>
   </div>
</div>

<div class="pop-up__container3">
   <div class="pop-up3">
      <div class="pop-up__title">
         Внимание
      </div>
      <div class="pop-up__description3">
         Начать заново?
      </div>

      <div class="wrap__button3">
         <form class="pop-up__form3" action="#">
            <a onClick="window.location.reload();" class="pop-up__ok pop-up__ok3">Ok</a>
            <a class="pop-up__cancel pop-up__cancel3">Отмена</a>
         </form>
      </div>
   </div>
</div>

<style>
   .pop-up__container {
      visibility: hidden;
      position: absolute;
      background-color: #02000099;
      height: 100%;
      width: 100%;
      z-index: 20;
      display: flex;
      justify-content: center;
      align-items: center;
   }

   .pop-up {
      min-height: 30%;
      border-radius: 20px;
      width: 85%;
      background-color: var(--bg-color);
      display: flex;
      justify-content: space-around;
      flex-direction: column;
   }

   .pop-up__title {
      font-size: 30px;
      font-family: 'Balsamiq Sans', cursive;
      font-weight: 600;
      text-align: center;
	  color: var(--main-color);
   }

   .pop-up__description {
      font-size: 20px;
      font-weight: 600;
      line-height: 30px;
      font-family: 'Balsamiq Sans', cursive;
      text-align: center;
      padding: 0 20px;
	  color: var(--text-color);
   }

   .wrap__button {

      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 40px;
   }

   .pop-up__form {
      display: flex;
      justify-content: space-around;
      align-items: center;
      gap: 60px;
   }

   .pop-up__ok {

      font-size: 20px;
      display: block;
      color: black;
      font-weight: 600;
      text-align: center;
      text-decoration: none;
      padding: 10px 0;
      width: 100px;
      font-family: 'Balsamiq Sans', cursive;
      border-radius: 10px;
      background-color: rgb(17, 190, 75);
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      -webkit-tap-highlight-color: transparent;

   }

   .pop-up__ok:active {
      transform: scale(0.7);
   }

   .pop-up__cancel {
      font-family: 'Balsamiq Sans', cursive;
      font-size: 20px;
      display: block;
      color: black;
      padding: 10px 0;
      font-weight: 600;
      text-decoration: none;
      text-align: center;
      border-radius: 10px;
      width: 100px;
      background-color: rgb(194, 45, 45);
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      -webkit-tap-highlight-color: transparent;
   }

   .pop-up__cancel:active {
      transform: scale(0.7);
   }

   .pop-up__container2 {
      visibility: hidden;
      position: absolute;
      background-color: #02000099;
      height: 100%;
      width: 100%;
      z-index: 20;
      display: flex;
      justify-content: center;
      align-items: center;
   }

   .pop-up2 {
      min-height: 30%;
      border-radius: 20px;
      width: 85%;
      background-color: var(--bg-color);
      display: flex;
      justify-content: space-around;
      flex-direction: column;
   }

   .pop-up__description2 {
      font-size: 20px;
      font-weight: 600;
      font-family: 'Balsamiq Sans', cursive;
      text-align: center;
      padding: 0 20px;
	  color: var(--text-color);
   }

   .wrap__button2 {

      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 40px;
   }

   .pop-up__form2 {
      display: flex;
      justify-content: space-around;
      align-items: center;
      gap: 60px;
   }


   .pop-up__container3 {
      visibility: hidden;
      position: absolute;
      background-color: #02000099;
      height: 100%;
      width: 100%;
      z-index: 20;
      display: flex;
      justify-content: center;
      align-items: center;
   }

   .pop-up3 {
      min-height: 30%;
      border-radius: 20px;
      width: 85%;
      background-color: var(--bg-color);
      display: flex;
      justify-content: space-around;
      flex-direction: column;
   }

   .pop-up__description3 {
      font-size: 20px;
      font-weight: 600;
      font-family: 'Balsamiq Sans', cursive;
      text-align: center;
      padding: 0 20px;
	  color: var(--text-color);
   }

   .wrap__button3 {

      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 40px;
   }

   .pop-up__form3 {
      display: flex;
      justify-content: space-around;
      align-items: center;
      gap: 60px;
   }
</style>