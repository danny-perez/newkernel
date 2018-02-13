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
      $('#f_min').click(function (){
        var f1=$('#f1').text(); if(f1>1)f1--; $('#f1').text(f1);
        var f2=$('#f2').text(); if(f2>2)f2--; $('#f2').text(f2);
        var f3=$('#f3').text(); if(f3>3)f3--; $('#f3').text(f3);
        var f4=$('#f4').text(); if(f4>4)f4--; $('#f4').text(f4);
        var f5=$('#f5').text(); if(f5>5)f5--; $('#f5').text(f5);
      });
      $('#f_max').click(function (){
        var get_uri = window.location.search.split('=');
        var uri_param = '/api/api_bible/'+get_uri[1];
        $.ajax({
                url: uri_param,
                success: function(data) {
                                          var max_n = data*1;
                                          var f1=$('#f1').text(); if(f1<max_n-5)f1++; $('#f1').text(f1);
                                          var f2=$('#f2').text(); if(f2<max_n-4)f2++; $('#f2').text(f2);
                                          var f3=$('#f3').text(); if(f3<max_n-3)f3++; $('#f3').text(f3);
                                          var f4=$('#f4').text(); if(f4<max_n-2)f4++; $('#f4').text(f4);
                                          var f5=$('#f5').text(); if(f5<max_n-1)f5++; $('#f5').text(f5);
                                        }
                });
      });

      $('#pagination_ul').click(function(e){
        var val_target=e.target.id;
        if(val_target=='f1') if($(this).hasClass('active')) console.log('HELLO');
      })
    </script>
  </body>
</html>
