<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!---------------------------------------------------------------->
<!---------------------------MAIN BLOCK--------------------------->
<!---------------------------------------------------------------->
<!------><div class="row"><!------------------>
<!-------------------------------------------->
		<div class="col-md-6">
      <div class="card">
        <div class="card-title-w-btn">
          <h3 class="title">Новый Завет</h3>
          <p><a class="btn btn-primary icon-btn" href="#"><i class="fa fa-volume-off"></i>Audio</a></p>
        </div>
        <div class="card-body">
          <p align='justify'>Но́вый Заве́т (др.-греч. Καινὴ Διαθήκη) — собрание книг, представляющее собой одну из двух, наряду с Ветхим Заветом, частей Библии. С христианской точки зрения Новый Завет является Божиим откровением и представляет собой центральное открытие Богом Самого Себя и Своей воли людям.</p>
          <h4>Книги Нового Завета</h4>
          <select class="form-control" id="demoSelect">
            <optgroup label="Выбрать книгу">
              <?php
                foreach($new_t as $new_test)
                {
                  echo '<option>';
                  echo $new_test['name'];
                  echo '</option>';
                }
               ?>
            </optgroup>
          </select>
        </div>
        <br><p align="right"><a class="btn btn-primary icon-btn" href="#"><i class="fa fa-book"></i>Читать</a></p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-title-w-btn">
          <h3 class="title">Ветхий Завет</h3>
          <p><a class="btn btn-primary icon-btn" href="#"><i class="fa fa-volume-off"></i>Audio</a></p>
        </div>
        <div class="card-body">
          <p align='justify'>Древнейшая из двух частей христианской Библии, заимствованная в христианстве из Танаха. В Ветхий Завет входит 39 книг Танаха, являющегося общим священным текстом иудаизма и христианства. Кроме того Ветхий Завет включаются дополнительные книги, в православии называемые неканоническими.</p>
          <h4>Книги Ветхого Завета</h4>
          <select class="form-control" id="demoSelect2">
            <optgroup label="Выбрать книгу">
              <?php
                foreach($old_t as $old_test)
                {
                  echo '<option>';
                  echo $old_test['name'];
                  echo '</option>';
                }
               ?>
            </optgroup>
          </select>
        </div>
        <br><p align="right"><a class="btn btn-primary icon-btn" href="#"><i class="fa fa-book"></i>Читать</a></p>
      </div>
    </div>
		<div class="col-md-12">
            <div class="card" style="font-family: PT Sans Caption;">
              <h3 class="card-title" style="color: #007d71;">Призывы к помощи</h3>
              <p align="justify">Этот проект существуют на зарплату, которую получают его авторы в отрасли <span style="color: #007d71; font-weight: 800;">не связанной</span> с данным проектом. Этих денег вполне хватает на поддержание, однако, мы знаем, что у вас добрая душа и вы хотите долгие лета нашему общему детищу, поэтому мы просим выделить нам некоторую сумму на дальнейшее развитие сайта, и <span style="color: #007d71; font-weight: 800; font-family: Pacifico;">ДА НЕ ОСКУДЕЕТ РУКА ДАЮЩЕГО</span>.</p>
            </div>
        </div>
<!------------------------------->
<!------></div><!---------------->
<!---------------------------------------------------------------->
<!-------------------------END MAIN BLOCK------------------------->
<!---------------------------------------------------------------->
