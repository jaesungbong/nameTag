  <script type="text/javascript">
  $(document).ready(function(){
    $("#submit").click(function(){
      //var email = $("email").attr("value");
      return true;
    });
    $("#email").blur( function(){
      $('#chk_email').html('');
      $.ajax({
        url: "http://192.168.1.8/member/chk_form",
        dataType:'json',
        type:'POST',
        data:{'email':$('#email').val()},
        success: function(result){
          if(result['result']==true){
            $('#chk_email').html(result['chk_email']);
          }
        }
      });
    });
  });
  /*function chk_frm(){
    if()
      return false;
    else if(document.getElementById("chk_email").value || document.getElementById("chk_pw1").value || document.getElementById("email").value)
      return false;
    else{
      alert("success");
      return false;
    }
  }*/
/*
  $(document).ready(function(){   
    $("#email").blur(function(){       
       $.ajax({
          type: "POST",
          url: "http://192.168.1.8/member/chk_form", 
          data: {'email': $("#email").val()},
          dataType: "json",  
          cache:false,
          success:function(result){
            if(result['result']==true){
              $('#chk_email').html(result['chk_email']);
            }
          },
          error: function(){
            $('#chk_email').html('');
          }
        });
     });
    $("#pw1").blur(function(){       
       $.ajax({
          type: "POST",
          url: "http://192.168.1.8/member/chk_form", 
          data: {'pw1': $("#pw1").val()},
          dataType: "json",  
          cache:false,
          success:function(result){
            if(result['result']==true){
              $('#chk_pw1').html(result['chk_pw1']);
            }
          },
          error: function(){
            $('#chk_pw1').html('');
          }
        });
     });
    $("#pw2").blur(function(){       
       $.ajax({
          type: "POST",
          url: "http://192.168.1.8/member/chk_form", 
          data: {'pw2': $("#pw2").val()},
          dataType: "json",  
          cache:false,
          success:function(result){
            if(result['result']==true){
              $('#chk_pw2').html(result['pw2']);
            }
          },
          error: function(){
            $('#chk_pw2').html('');
          }
        });
     });
   });*/
  </script>
  <style type="text/css">
  body{
    background-color: #1f1f1f;
  }
  #contents{
    background-color: #1f1f1f;
  }
  </style>
          <div style="height:70px"></div>
				<form action="/member/signup_post" onSubmit="return;" method="post" name="join">
  <table width="780" align="center" border='0' cellspacing='0' cellspadding'0' bordercolor='#fff'>
    <tr><td><font size="30" color="#fff">NAMEONIT</font></td></tr>
    <tr>
      <td><input type=text name=firstname size=10 maxlength=20 placeholder="First Name" autocomplete=off style="width:432px; height:40px;" class="signup_form"></td>
    </tr>
    <tr>
      <td><input type=text name=lastname size=10 maxlength=20 placeholder="Last Name" autocomplete=off style="width:432px; height:40px; margin-bottom:15px" class="signup_form"></td>
    </tr>
    <tr>
      <td><input type=text name="email" id="email" size=10 maxlength=20 placeholder="Email" autocomplete=off style="width:432px; height:40px;" class="signup_form"><span id="chk_email"></span></td>
    </tr>
    <tr>
      <td><input type=password name="pw1" id="pw1" size=10 maxlength=20 placeholder="Password" autocomplete=off style="width:432px; height:40px;" class="signup_form"><span id="chk_pw1"></span><br><font size=2>Your password must be at least 8 characters long, no spaces, and contain at least 1 number characters.</font></td>
    </tr>
    <tr>
      <td><input type=password name="pw2" id="pw2" size=10 maxlength=20 placeholder="Confirm password" autocomplete=off style="width:432px; height:40px;" class="signup_form"><span id="chk_pw2"></span></td>
    </tr>
    <tr>
      <td><input type="submit" id="submit" class="btn btn-4 hidemodal" style="width:432px; height:40px; font-weight:600;" value="Create Account">
        <br>By cliking this button you agree to the Nameonit? Terms of Use</td>
    </tr>
    <tr>
    	<td><hr width="100%">Already have an account? <a href="/main">Sign in</a></td>
    </tr>
</table>
</form>