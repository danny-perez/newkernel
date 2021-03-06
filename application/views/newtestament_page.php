<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!---------------------------------------------------------------->
<!---------------------------MAIN BLOCK--------------------------->
<!---------------------------------------------------------------->
<!------><div class="row"><!------------------>
<!-------------------------------------------->
    <div class="col-md-9">
        <div class="card">
            <div class="card-title-w-btn">
                <h3 class="title"><?=$title_kn;?>, Глава <?=$chapter;?>, <?=$translate_select;?></h3>
            </div>
            <div class="card-body">
                <?php
                foreach($text_book as $tb)
                {
                    session_start();
                    $_SESSION['allocation_verse']>0?$bold=$_SESSION['allocation_verse']:$bold=0;
                    session_write_close();
                    if(strlen($tb[$real_translate])<10){echo 'Нет текста с этим переводом'; break;}
                    if($real_translate=='grek'){if($bold==$tb['st_no'])echo '<b>';echo "<div style='font-family: Greek Old Face C;'>",'<sup>',$tb['st_no'],'</sup>',$tb[$real_translate],"</div>";if($bold==$tb['st_no'])echo '</b>';}
                    else if($real_translate=='csya_old'){if($bold==$tb['st_no'])echo '<b>';echo "<div style='font-family: Irmologion ieUcs; font-size: 18px;'>",'<sup>',$tb['st_no'],'</sup>',$tb[$real_translate],"</div>";if($bold==$tb['st_no'])echo '</b>';}
                    else {if($bold==$tb['st_no'])echo '<b>'; echo "<span style='font-family: Roboto Condensed;'>",'<sup>',$tb['st_no'],'</sup>',$tb[$real_translate],"</span>";if($bold==$tb['st_no'])echo '</b>';}
                    if(strlen($tb['parallel'])>5){
                        $par = preg_replace('/[ ]+/',' ',$tb['parallel']);
                        preg_match_all('/[0-9]?[ ]?[А-Яа-я]+[\.]?[ ]?[0-9]+[:]?[0-9]+/u',$par,$par1);
                        $final_parallel_link = '';
                        foreach($par1[0] as $p) $final_parallel_link=$final_parallel_link."&ensp;<a href='/golink?val1=$p'>$p</a>";
                        echo "<p style='font-family: Lobster; font-size: 12px;' class='parallel_link'>",$final_parallel_link,"</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <!-------------------- Right menu ---------------------->
    <!------------------------------------------------------------------>
    <div class="col-md-3">
        <div class="card">
            <div class="card-title-w-btn">
                <h4 class="title">Параллельные ссылки</h4>
            </div>
            <div class="card-body">
                <div class="btn-group btn-group-justified">
                    <a class="btn btn-default" href="#" onclick="left_fu('/newtestament?book=<?=$kn;?>&translate=<?=$real_translate;?>&chapter=<?=$chapter;?>',<?=$num_chap;?>);false;"><<<<</a>
                    <a class="btn btn-default" id="parallel_verses" href="#">Изм</a>
                    <a class="btn btn-default" href="#" onclick="right_fu('/newtestament?book=<?=$kn;?>&translate=<?=$real_translate;?>&chapter=<?=$chapter;?>',<?=$num_chap;?>);false;">>>>></a>
                </div>
                </div>

            </div>
        </div>
	<div class="col-md-3">
        <div class="card">
            <div class="card-title-w-btn">
                <h4 class="title">Выбор главы</h4>
            </div>
            <div class="card-body">
                <select name='chapt' class="form-control" id="selection" onchange="load_chapter('/newtestament?book=<?=$kn;?>&translate=<?=$real_translate;?>&chapter=');">
                    <option selected disabled>Выберите главу</option>
                    <?php
                        for($i=1;$i<=$num_chap;$i++) echo "<option value='$i'>$i</option>";
                    ?>
                </select>
            </div>
        </div>
  </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-title-w-btn">
                <h4 class="title">Выбор перевода</h4>
            </div>
            <div class="card-body">
                <select name='transl' class="form-control" id="sel_translate" onchange="change_translate('/newtestament?book=<?=$kn;?>&chapter=<?=$chapter;?>&translate=');">
                    <option selected disabled>Выберите перевод</option>
                    <?php
                    foreach($translate as $trans) echo "<option value='",$trans['perevod'],"'>",$trans['select'],"</option>";
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-title-w-btn">
                <h4 class="title">Выбор толкователя</h4>
            </div>
            <div class="card-body">
                <select name='lexegesis' class="form-control" id="sel_exegesis" onchange="go_exegesis('/exegesis?book=<?=$kn;?>&chapter=<?=$chapter;?>&exegesis=');">
                    <option selected disabled>Выберите толкователя</option>
                    <?php
                    foreach($exegesis as $ex) echo "<option value='",$ex,"'>",$ex,"</option>";
                    ?>
                </select>
            </div>
        </div>
    </div>
<!------------------------------->
<!------></div><!---------------->
<!---------------------------------------------------------------->
<!-------------------------END MAIN BLOCK------------------------->
<!---------------------------------------------------------------->
