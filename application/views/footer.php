<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--===================================================================->
<!--===================================================================->
      </div>
	  <!----------------------------------------------------------->
	  <!----------------------------------------------------------->
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>

	<script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
      $('#sl').click(function(){
      	$('#tl').loadingBtn();
      	$('#tb').loadingBtn({ text : "Signing In"});
      });

      $('#el').click(function(){
      	$('#tl').loadingBtnComplete();
      	$('#tb').loadingBtnComplete({ html : "Sign In"});
      });

      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });

      $('#demoSelect').select2();
      $('#demoSelect2').select2();
      //-----------------------------User script-----------------------------
      $('#newTestament').click(function () {
          var option_value = $("#demoSelect").val();
          var mylink = "/newtestament?book="+option_value;
          location.href=mylink;
      })
      $('#oldTestament').click(function () {
          var option_value = $("#demoSelect2").val();
          var mylink = "/oldtestament?book="+option_value;
          location.href=mylink;
      })

      //=======================pagination====================================
      function load_chapter(link_bi)
      {
          var zn = $('#selection').val();
          var resu=link_bi+zn;
          location.href=resu;
      }
      function change_translate(trans_link)
      {
          var res = $('#sel_translate').val();
          var res_link = trans_link+res;
          location.href=res_link;
      }
      function load_chapter_old(link_bi)
      {
          var zn = $('#selection_old').val();
          var resu=link_bi+zn;
          location.href=resu;
      }
      function change_translate_old(trans_link)
      {
          var res = $('#sel_translate_old').val();
          var res_link = trans_link+res;
          location.href=res_link;
      }
      $('#parallel_verses').click(function(){
          $('.parallel_link').toggle('slow');
      })
      $('#parallel_verses_old').click(function(){
          $('.parallel_link').toggle('slow');
      })
      function left_fu(link_left,max_chapter){
          var find_str = link_left.indexOf('chapter');
          var r_find_str = link_left.substr(find_str);
          var clean_chapter = r_find_str.split('=');
          var num_chapter = clean_chapter[1];
          var old_str = clean_chapter[1];
          var string1 = 'chapter='+old_str;
          num_chapter--;
          if(num_chapter<1)num_chapter=1;
          var string2 = 'chapter='+num_chapter;
          var new_link = link_left.replace(string1,string2);
          location.href=new_link;
        }
      function right_fu(link_left,max_chapter){
          var find_str = link_left.indexOf('chapter');
          var r_find_str = link_left.substr(find_str);
          var clean_chapter = r_find_str.split('=');
          var num_chapter = clean_chapter[1];
          var old_str = clean_chapter[1];
          var string1 = 'chapter='+old_str;
          num_chapter++;
          if(num_chapter>max_chapter)num_chapter=max_chapter;
          var string2 = 'chapter='+num_chapter;
          var new_link = link_left.replace(string1,string2);
          location.href=new_link;
      }
      $('#parallel_verses_old').click(function(){
          $('.parallel_link_old').toggle('slow');
      })
      function left_fu_old(link_left,max_chapter){
          var find_str = link_left.indexOf('chapter');
          var r_find_str = link_left.substr(find_str);
          var clean_chapter = r_find_str.split('=');
          var num_chapter = clean_chapter[1];
          var old_str = clean_chapter[1];
          var string1 = 'chapter='+old_str;
          num_chapter--;
          if(num_chapter<1)num_chapter=1;
          var string2 = 'chapter='+num_chapter;
          var new_link = link_left.replace(string1,string2);
          location.href=new_link;
      }
      function right_fu_old(link_left,max_chapter){
          var find_str = link_left.indexOf('chapter');
          var r_find_str = link_left.substr(find_str);
          var clean_chapter = r_find_str.split('=');
          var num_chapter = clean_chapter[1];
          var old_str = clean_chapter[1];
          var string1 = 'chapter='+old_str;
          num_chapter++;
          if(num_chapter>max_chapter)num_chapter=max_chapter;
          var string2 = 'chapter='+num_chapter;
          var new_link = link_left.replace(string1,string2);
          location.href=new_link;
      }
    </script>
  </body>
</html>
