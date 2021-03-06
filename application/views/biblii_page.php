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
                  echo '<option value="',$new_test['kn'],'">';
                  echo $new_test['name'];
                  echo '</option>';
                }
               ?>
            </optgroup>
          </select>
        </div>
        <br><p align="right"><a class="btn btn-primary icon-btn" href="#" id="newTestament"><i class="fa fa-book"></i>Читать</a></p>
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
                  echo '<option value="',$old_test['kn'],'">';
                  echo $old_test['name'];
                  echo '</option>';
                }
               ?>
            </optgroup>
          </select>
        </div>
        <br><p align="right"><a class="btn btn-primary icon-btn" href="#" id="oldTestament"><i class="fa fa-book"></i>Читать</a></p>
      </div>
    </div>
		<div class="col-md-12">
            <div class="card" style="font-family: PT Sans Caption;">
              <h3 class="card-title" style="color: #007d71;">Как работать с разделом</h3>
              <p align="justify">&emsp;&emsp;Необходимо выбрать Левую часть страницы с Новым Заветом или Правую часть страницы с Ветхим Заветом. При желании слушать аудиоверсию Библии нажимайте кнопку на панеле соответствующего раздела.
              Для чтения Библии в текстовом формате - выберите название книги (можно пользоваться контекстным поиском, книги упорядочены так же, как и в бумажной версии Священного Писания), затем нажмите кнопку <span style="color: #007d71; font-weight: 800;">&laquo;Читать&raquo;</span>.
              <br><br>&emsp;&emsp;Внутри выбранной книги есть возможность переходить по главам, выбрать любой перевод Библии, посмотреть толкования на Книгу и на отдельные стихи, а так же воспользоваться одним из нескольких словарей.
            Можно переходить из одного раздела в другой, сохраняя при этом всю цепочку перемещений (доступно зарегистрированным пользователям), делать закладки, оставлять для себя подстрочные комментарии.
          Отдельных пояснений требует работа с параллельными местами. Кнопкой можно включить или выключить параллельные места, открыть параллельный стих в том же или в соседнем окне, прослушать параллельный стих в аудиоверсии не теряя
        при этом объекта чтений.
        <br><br>&emsp;&emsp;Если на какой-то странице Вы не будете знать, что вам дальше делать или как получить желаемое, вы всегда можете нажать знак вопроса сверху для получения интерактивной справки. Так же в разделе Библейских книги
        вы можете включить отображение справочной, исторической информации о книге, а так же получить ссылки для скачивания данной книги. При наличии богодухотворенных вопросов (касающихся ИМЕННО содержания книги) вы можете их задать
        нажав на кнопку <span style="color: #007d71; font-weight: 800;">&laquo;Задать вопрос священнику&raquo;</span>, однако, просим с пониманием отнестись к работе Духовных Отцов, которые не имеют возможности отвечать всем желающим в режиме реального времени.
        <br><br>&emsp;&emsp;И, наконец, рекомендуем обратить ваше внимание на раздел <span style="color: #990000; font-weight: 800;">платных подписок</span>, в котором есть возможность выбрать себе консультанта из числа сотрудничающих с нами
        священников, который сможет консультировать вас лично по любому духовному вопросу в режиме реального времени, а так же отслеживать вашу духовную жизнь и корректировать ее при необходимости. В этом же разделе есть возможность заглянуть в
        нашу библиотеку, в которой собрано более 2 миллионов книг, часть из которых вы можете увидеть лишь в Ватикане, Киево-Печерском Монастыре, Ленинской Библиотеке, Библиотеке Принстонского Университета, Славяно-греко-латинской академии и пр.
      </p>

            </div>
        </div>
<!------------------------------->
<!------></div><!---------------->
<!---------------------------------------------------------------->
<!-------------------------END MAIN BLOCK------------------------->
<!---------------------------------------------------------------->
