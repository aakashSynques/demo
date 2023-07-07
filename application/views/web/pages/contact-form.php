<?php
$site_key='6LcHrU4dAAAAADCkaAaA22j5Wea3Rs_tOkC3AXD6';// change_site Key
$secret_key='6LcHrU4dAAAAAILy63BYdFDjTAJlGTAqh4BF78f9'; //change secret_key
$to_new='ankur.saxena@synques.in, office@fitwellfasteners.com';//change Email-id 
$subject_def='Fitwell Fasteners';// Change subject name like "Feedback- <website name>"

if(isset($_POST['feedback']) && !empty($_POST['feedback']))
{
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
	{
        //your site secret key
        $secret = $secret_key;
        //get verify response data

        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
           {
		     //contact form submission code
            $name = !empty($_POST['name'])?$_POST['name']:'';
            $email = !empty($_POST['email'])?$_POST['email']:'';
			$company = !empty($_POST['company'])?$_POST['company']:'';
			$contact = !empty($_POST['contact'])?$_POST['contact']:'';
            $message_q = !empty($_POST['message'])?$_POST['message']:'';
		   		
          $to=$to_new; 
          $cc=trim($_POST['email']);
          $header="From:".$_POST['email']."\r\nContent-Type:text/html\r\n";
          $subject=$subject_def;
          $message="<table border=0 cellspacing=0 cellpadding=3>";
          $message=$message."<tr><td>Name</td><td>: ".$name."</td></tr>";
          $message=$message."<tr><td>E-mail</td><td>: ".$email."</td></tr>";
		  $message=$message."<tr><td>Company-Name</td><td>: ".$company."</td></tr>";
          $message=$message."<tr><td>Contact</td><td>: ".$contact."</td></tr>";
          $message=$message."<tr><td>Message</td><td>: ".$message_q."</td></tr>";
          $message = $message."<tr><td><BR><BR><BR><BR><BR><i>With best regards<br>[This is an auto-generated mail. Please do not reply back.]</i></td></tr>";
          $message=$message."</table>";
		// echo "mail($to,$subject,$message,$header)";
		  $message_rep="Thank you for your enquiry. Your message has been sent successfully.It has been forwarded to the relevant department and will be dealt with as soon as possible.";
		 $send_rp=$message_rep."<br><br>".$message;
		 
		  if(file_exists('lib/sendmail_phpmailer.php')){
                           require_once "lib/sendmail_phpmailer.php";
                           $email_arr = explode(',',$to);
                           if(!empty($email_arr) && count($email_arr)) {                             
                             foreach($email_arr as $to_email){                                
                            	send_mail($to_email, $_POST['email'], $subject, $message, '', $bcc);
                            	
                             }
                           }
                           
                           if (isset($_POST['copy123'])){send_mail($cc, $_POST['email'], $subject, $send_rp);}
                        }
                        else{
                         mail($to,$subject,$message,$header);
			 if (isset($_POST['copy123'])){ mail($cc,$subject,$send_rp,$header); }
                        }		
		
			echo "<script> alert('Your Message has been sent Successfully !');</script>";
          	echo "<script>window.location='".basename($_SERVER['PHP_SELF'])."';</script>";
	      }
      else{  echo "<script> alert('Robot verification failed, please try again.');</script>"; }
  }
  else{ echo "<script> alert('Please click on the reCAPTCHA box.');</script>";  }
 }
      ?>
<script type="text/javascript">
function validate_feedback(obj)
 {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
   
   var full_name= $("#full_name").val();
   var email_id= $("#email_id").val();
   var company= $("#company").val();
   var try_it = $("#try_it").val();
   var contact_no= $("#contact_no").val();
   var message_comm= $("#message_comm").val();
   var cctome= ($("#cctome:checked").length > 0)?1:0;
   
  if (document.form_feed.full_name.value=='')
   {
    document.getElementById('error').innerHTML='Please fill your name!';
    document.form_feed.full_name.style.borderColor ='red';
    document.form_feed.full_name.focus();
    
   }
  else if (document.form_feed.email_id.value=='')
   {
    document.getElementById('error').innerHTML='Please fill e-mail address!';
    document.form_feed.email_id.style.borderColor ='red';
    document.form_feed.email_id.focus();
    
   }
   else if (!emailReg.test(document.form_feed.email_id.value))
   {
      document.getElementById('error').innerHTML='Please input a valid e-mail address!';
      document.form_feed.email_id.focus();
      document.form_feed.email_id.style.borderColor ='red';
   }

  else if (document.form_feed.company.value=='')
   {
    document.getElementById('error').innerHTML='Please fill Company Name!';
    document.form_feed.company.focus();
    document.form_feed.company.style.borderColor ='red';
    
   }
   
   else if (document.form_feed.contact_no.value=='')
   {
    document.getElementById('error').innerHTML='Please fill your contact number!';
    document.form_feed.contact_no.focus();
    document.form_feed.contact_no.style.borderColor ='red';
    
   }

 else if (document.form_feed.contact_no.value.length < 10)
   {
    document.getElementById('error').innerHTML='Please fill valid contact number!';
    document.form_feed.contact_no.focus();
    document.form_feed.contact_no.style.borderColor ='red';
    
   }
   
   else if (document.form_feed.message_comm.value=='')
   {
    document.getElementById('error').innerHTML='Please input your message!';
    document.form_feed.message_comm.focus();
    document.form_feed.message_comm.style.borderColor ='red';
  
   }
   else if(document.getElementById('g-recaptcha-response').value.replace(/ /gi,'') == "")
    {
     document.getElementById('error').innerHTML='Check Google captcha if you are not robot.';
     document.getElementById('g-recaptcha-response').focus();
     
    }
   else 
    {
     $("#error").html("<font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Validating...</b></font>");
                
      $(obj).prop("disabled" , true);
      
      var form_data = new FormData();
          form_data.append("full_name" , full_name);
          form_data.append("email_id" , email_id);
          form_data.append("company" , company);
          form_data.append("contact_no" , contact_no);
          form_data.append("try_it" , try_it);
          form_data.append("message_comm" , message_comm);
	  form_data.append('google_captcha', $("#g-recaptcha-response").val());
          form_data.append("cctome" , cctome);
 $.ajax({
               url: "contact-form-submit.php", 
     		type: "POST" , 
     		dataType: "JSON",
     		data: form_data, 
     		cache: false , 
     		contentType: false , 
     		processData: false , 
     		success: function(data){
     			  
     			  if(data.response == true)
     			   {
     			    $("#error").html("<font color='green'><b>"+ data.message +"</b></font>");
     			    
     			    $("#full_name").val("");
     			    $("#email_id").val("");
     			    $("#company").val("");
     			    $("#contact_no").val("");
     			    $("#message_comm").val("");
     			    $("#cctome").prop("checked" , false);
     			   }
     			  else
     			   {
     			    $("#error").html("<font color='red'><b>"+ data.message +"</b></font>");
     			   }
     			  
     			  $(obj).prop("disabled" , false);
     			   setTimeout(
                                function() 
                                {
                                $("#error").html(" ");
                                }, 3000);
                               }
     		
     });
    }
 }

 function IsNumc_Phone(obj)
   {
      var strValidChars = "1234567890";
      var strString=obj.value;
      var expStrng=strString.split("");
      var strStringLength=expStrng.length;
      var NewString='';
      for(var a=0;a<strStringLength;a++)
       {
         if(strValidChars.indexOf(strString.charAt(a)) == -1){}
         else { NewString+=strString.charAt(a); document.getElementById('error').innerHTML='';  }
       }
     if(strString!=NewString) {  obj.value=NewString; document.getElementById('error').innerHTML='Please Fill Numbers Only..'; }
   }

</script>
<script src="https://www.google.com/recaptcha/api.js"></script>
 <form name='form_feed'  method='post'   enctype="multipart/form-data">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mrgtop20">
      <input type="hidden" id="try_it" name="try_it">   
        <input type="text" name="full_name"     id="full_name"  placeholder='Full Name' class='form-control' style="border-radius: 10px;
    height: 55px;
    background: #fff;
    border: none;"  value="<?php if(isset($_POST["full_name"])){echo $_POST["full_name"];}?>"/>
      </div>
	  
	   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mrgtop20">
        <input type="text" name="email_id"    id="email_id" placeholder='Email-id'  class='form-control' style="border-radius: 10px;
    height: 55px;
    background: #fff;
    border: none;" value="<?php if(isset($_POST["email_id"])){echo $_POST["email_id"];}?>" />
      </div>
	  
	  
	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mrgtop20">
        <input type="text" name="company"    id="company" placeholder='Company Name'  class='form-control' style="border-radius: 10px;
    height: 55px;
    background: #fff;
    border: none;" value="<?php if(isset($_POST["company"])){echo $_POST["company"];}?>" />
      </div>
	  
	  
	  
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mrgtop20">
        <input type="text" name="contact_no"  id="contact_no" placeholder='Contact No.' class='form-control' style="border-radius: 10px;height: 55px;background: #fff;border: none;" value="<?php if(isset($_POST["contact_no"])){echo $_POST["contact_no"];}?>" onkeypress='return IsNumc_Phone(this);' onkeydown='return IsNumc_Phone(this);' onkeyup='return IsNumc_Phone(this);'  maxlength=14  autocomplete="off" />
      </div>
     
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mrgtop20">
        <textarea name="message_comm" rows="3" cols="22" id="message_comm" class='form-control' style="border-radius: 10px;
    height: 55px;background: #fff;border: none;" placeholder='Your Message'></textarea>
      </div>
    </div>
	  <div class="row"><div class="col-lg-12">&nbsp;</div></div>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="g-recaptcha" data-sitekey="<?php echo $site_key;?>" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0; margin:5px;"> </div>
      </div>
     
	  
	        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<table border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="10px" align="left"><input id="cctome" type="checkbox" name="cctome"/></td>
            <td style="font-family: 'Mukta Vaani',sans-serif; font-size: 15px; color: #000;">&nbsp; copy to me</td>
          </tr>
        </table>
		<div class="col-md-12 " style="float: left;margin: 10px;">
		
	      <div align="center">
	        <input type="button" name="feedback" value="Submit"  id="feedback"  class="btn-ctrl1"  onclick='validate_feedback(this);' />
		      
	        <input type="reset" name="btnClr" value="Reset"  id="btnClr"   class="btn-ctrl1"/>
		      
		      
          </div>
		</div></div>
    
	  
	  
	   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id='error' style="color:#FF0000;"></div>
    </div>
   
  </form>
<div class="row"><div class="col-lg-12">&nbsp;</div></div>
