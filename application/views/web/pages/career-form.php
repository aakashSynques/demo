<?php
$site_key = '6LcHrU4dAAAAADCkaAaA22j5Wea3Rs_tOkC3AXD6'; // change_site Key
$secret_key = '6LcHrU4dAAAAAILy63BYdFDjTAJlGTAqh4BF78f9'; //change secret_key
/*$to_new='ankur.saxena@synques.in, office@fitwellfasteners.com';//change Email-id 
$target_path='resume/';
$domain_name='www.fitwellfasteners.com'.$target_path;	  //replace Domain Name http://www.xyz.in

if(isset($_POST['recruitment']) && !empty($_POST['recruitment']))
{
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
	{
        $subject_def="Fitwell Fasteners - Resume - Post Applied for ".$_POST['area'];
		// Change subject name like "<website name> - Resume"
		//your site secret key
        $secret =$secret_key;//Copy/Paste Your reCaptch server side Code Here 
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
           { 		
		   	
          $strname=substr($_FILES["file"]["name"],-4);
          if ($strname==".doc" || $strname==".DOC"){$exten=$strname;}
		  else if ($strname==".pdf" || $strname==".PDF"){$exten=$strname;}
          elseif($strname=="docx" || $strname=="DOCX" ){$exten=".".$strname;}
          $upd=date('YmdHis').$exten;
          if(!is_dir($target_path))  { mkdir($target_path,0777,true); chmod($target_path, 0777);  }
          move_uploaded_file($_FILES["file"]["tmp_name"],$target_path.$upd);
		  
          $to=$to_new; 
          $cc=$_POST['email'];
          $header="From:".$_POST['email']."\r\nContent-Type:text/html\r\n";
          $subject=$subject_def;
          $message="<table border=0 cellspacing=0 cellpadding=3>";
          $message=$message."<tr valign=top><th colspan=2><b>Details</b></th></tr>";
          $message=$message."<tr valign=top><td>Full Name</td><td>: ".$_POST['fname']." ".$_POST['lname']."</td></tr>";
          $message=$message."<tr valign=top><td>E-mail</td><td>: ".$_POST['email']."</td></tr>";
          $message=$message."<tr valign=top><td>Contact</td><td>: ".$_POST['contact']."</td></tr>";
          $message=$message."<tr valign=top><td>Date of birth</td><td>: ".$_POST['dob']."</td></tr>";
          $message=$message."<tr valign=top><td>Years Of Experience</td><td>: ".$_POST['experience']."</td></tr>";
          $message=$message."<tr valign=top><td>Post Applied for</td><td>: ".$_POST['area']."</td></tr>";
          $message=$message."<tr valign=top><td>Curriculum Vitae</td><td>: <a href=".$domain_name.$upd." target=_blank>Click To See Attachment</a></td></tr>";//
          $message = $message."<tr valign=top><td><BR><BR><BR><BR><BR><i>With best regards<br>[This is an auto-generated mail. Please do not reply back.]</i></td></tr>";
          $message=$message."</table>";
         // echo " mail($to,$subject,$message,$header);";
		 $message_rep="Thank you for your interest. Your profile has been submitted successfully.It has been forwarded to the HR department.";
		 $send_rp=$message_rep."<br><br>".$message;
      	    $to_emails=explode(",",$to_new);
				
		         if(file_exists('lib/sendmail_phpmailer.php')){
                           require_once "lib/sendmail_phpmailer.php";
                           $email_arr = explode(',',$to);
                           if(!empty($email_arr) && count($email_arr)) {                             
                             foreach($email_arr as $to_email){                                
                            	send_mail($to_email, $_POST['email'], $subject, $message, '', '');
                            	
                             }
                           }
                           
                 // send_mail($cc, $_POST['email'], $subject, $send_rp);
                        }
                        else{
                         mail($to,$subject,$message,$header);
			 // mail($cc,$subject,$send_rp,$header); 
                        }		
		
  				
		
			echo "<script> alert('Your Message has been sent Successfully !');</script>";
          	echo "<script>window.location='".basename($_SERVER['PHP_SELF'])."';</script>";
	      }
      else{  echo "<script> alert('Robot verification failed, please try again.');</script>"; }
  }
  else{ echo "<script> alert('Please click on the reCAPTCHA box.');</script>";  }
 } */?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script type="text/javascript">
	function validate_recruit(obj) {
		var numberReg = /^[0-9]+$/;
		var pdfReg = /[\/.](pdf)$/i;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var try_it = $("#try_it").val();
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var email_id = $("#email_id").val();
		var contact_no = $("#contact_no").val();
		var birth_date = $("#birth_date").val();
		var experience = $("#experience").val();
		var app_area = $("#app_area").val();
		var cv_file_val = $("#cv_file").val();
		var cv_file = $('#cv_file').prop('files')[0];
		var cctome = ($("#cctome:checked").length > 0) ? 1 : 0;

		if (fname.replace(/ /gi, "") == "") {
			$("#fname").focus();
			$("#err_msg").html("<font color='red'><b>Please Enter Your First Name.</b></font>");

		}
		else if (lname.replace(/ /gi, "") == "") {
			$("#lname").focus();
			$("#err_msg").html("<font color='red'><b>Please Enter Your Last Name.</b></font>");

		}
		else if (email_id.replace(/ /gi, "") == "" || !emailReg.test(email_id)) {
			$("#email_id").focus();
			$("#err_msg").html("<font color='red'><b>Please input a valid E-mail address.</b></font>");

		}
		else if (contact_no == "" || contact_no.length < 10) {
			$("#contact_no").focus();
			$("#err_msg").html("<font color='red'><b>Please Enter Your Valid 10 Digit Contact Number.</b></font>");

		}
		else if (birth_date.replace(/ /gi, "") == "") {
			$("#birth_date").focus();
			$("#err_msg").html("<font color='red'><b>Please Enter Your Valid 10 Digit Contact Number.</b></font>");

		}
		else if (experience.replace(/ /gi, "") == "") {
			$("#experience").focus();
			$("#err_msg").html("<font color='red'><b>Enter our work experience.</b></font>");

		}
		else if (app_area.replace(/ /gi, "") == "") {
			$("#app_area").focus();
			$("#err_msg").html("<font color='red'><b>Enter the post you want to apply.</b></font>");

		}
		else if (cv_file_val.replace(/ /gi, "") == "" || !pdfReg.test(cv_file_val)) {
			$("#cv_file").focus();
			$("#err_msg").html("<font color='red'><b>Please Upload Your CV in PDF .</b></font>");

		}
		else if ($("#g-recaptcha-response").val() == "") {
			$("#err_msg").html("Check Google captcha if you are not robot.");
			$("#g-recaptcha-response").focus();
		}
		else {
			$("#err_msg").html("<font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Validating...</b></font>");

			$(obj).prop("disabled", true);

			var form_data = new FormData();
			form_data.append("fname", fname);
			form_data.append("lname", lname);
			form_data.append("email_id", email_id);
			form_data.append("contact_no", contact_no);
			form_data.append("birth_date", birth_date);
			form_data.append("experience", experience);
			form_data.append("app_area", app_area);
			form_data.append("cv_file", cv_file);
			form_data.append("try_it", try_it);
			// form_data.append('google_captcha', $("#g-recaptcha-response").val());
			form_data.append("cctome", cctome);

			var base_url = '<?php echo base_url(); ?>';
			$.ajax({
				// url: "career-form-submit.php ",
				url: base_url + "web/career/career_form_submit",
				type: "POST",
				dataType: "JSON",
				data: form_data,
				cache: false,
				contentType: false,
				processData: false,
				success: function (data) {

					if (data.response == true) {
						$("#err_msg").html("<font color='green'><b>" + data.message + "</b></font>");
						$("#fname").val("");
						$("#lname").val("");
						$("#email_id").val("");
						$("#contact_no").val("");
						$("#birth_date").val("");
						$("#experience").val("");
						$("#app_area").val("");
						$("#cv_file").val("");

						//location.reload();
					}
					else {
						$("#err_msg").html("<font color='red'><b>" + data.message + "</b></font>");
					}

					$(obj).prop("disabled", false);
					setTimeout(
						function () {
							$("#err_msg").html(" ");
						}, 3000);
				}
			});
		}
	}

	function IsNumc_Phone(obj) {
		var strValidChars = "1234567890";
		var strString = obj.value;
		var expStrng = strString.split("");
		var strStringLength = expStrng.length;
		var NewString = '';
		for (var a = 0; a < strStringLength; a++) {
			if (strValidChars.indexOf(strString.charAt(a)) == -1) { }
			else { NewString += strString.charAt(a); document.getElementById('err_msg').innerHTML = ''; }
		}
		if (strString != NewString) { obj.value = NewString; document.getElementById('err_msg').innerHTML = 'Please Fill Numbers Only..'; }
	}
</script>

<div class="form-column col-md-12 col-sm-12 col-xs-12">

	<!-- contact Form -->
	<div class="contact-form">

		<form name='form_recruit' method='post' enctype="multipart/form-data">

			<div class="row clearfix">
				<div class="col-md-6 col-sm-12 col-xs-12 form-group mrgtop20">
					<input type="hidden" id="try_it" name="try_it">
					<input type="text" name="fname" id="fname" class="form-control" style="border-radius: 10px;
height: 55px;
background: #fff;
border: none;" placeholder='First Name' value="<?php if (isset($_POST["fname"])) {
	echo $_POST["fname"];
} ?>" />
				</div>

				<div class="col-md-6 col-sm-12 col-xs-12 form-group mrgtop20">
					<input name="lname" value="<?php if (isset($_POST["lname"])) {
						echo $_POST["lname"];
					} ?>" type="text" id="lname" border="1" class="form-control" style="border-radius: 10px;
height: 55px;
background: #fff;
border: none;" placeholder="Last Name " />
				</div>

				<div class="col-md-6 col-sm-12 col-xs-12 form-group mrgtop20">
					<input type="email" name="email_id" id="email_id" class="form-control" style="border-radius: 10px;
height: 55px;
background: #fff;
border: none;" placeholder='Email-id' value="<?php if (isset($_POST["email_id"])) {
	echo $_POST["email_id"];
} ?>" />
				</div>

				<div class="col-md-6 col-sm-12 col-xs-12 form-group mrgtop20">
					<input type="text" name="contact_no" id="contact_no" class="form-control" style="border-radius: 10px;
height: 55px;
background: #fff;
border: none;" placeholder='Contact No.' value="<?php if (isset($_POST["contact_no"])) {
	echo $_POST["contact_no"];
} ?>" onkeypress='return IsNumc_Phone(this);' onkeydown='return IsNumc_Phone(this);'
						onkeyup='return IsNumc_Phone(this);' maxlength=14 autocomplete="off" />

				</div>

				<div class="col-md-6 col-sm-12 col-xs-12 form-group mrgtop20">
					<input type="text" size="12" id="birth_date" name="birth_date" class="form-control" style="border-radius: 10px;
height: 55px;
background: #fff;
border: none;" placeholder="Date Of Birth" />
				</div>

				<div class="col-md-6 col-sm-12 col-xs-12 form-group mrgtop20">
					<input type="text" name="experience" id="experience" value="<?php if (isset($_POST["experience"])) {
						echo $_POST["experience"];
					} ?>" maxlength='2' class="form-control" style="border-radius: 10px;
height: 55px;
background: #fff;
border: none;" placeholder="Years Of Experience" onkeypress='return IsNumc_Phone(this);'
						onkeydown='return IsNumc_Phone(this);' onkeyup='return IsNumc_Phone(this);'
						autocomplete="off" />
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 form-group mrgtop20">
					<input type="text" name="app_area" id="app_area" class="form-control" style="border-radius: 10px;
height: 55px;
background: #fff;
border: none;" placeholder="Applied for the post of" value="<?php if (isset($_POST["app_area"])) {
	echo $_POST["app_area"];
} ?>" />
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 form-group mrgtop20"> Resume /CV <input type="file"
						name="cv_file" id="cv_file">
				</div>


				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group text-right mrgtop20"><br />
					<input type="button" name="recruitment" value="Submit" id="recruitment"
						style=" cursor:pointer; border:0px  " class="btn-ctrl1" onclick='validate_recruit(this);' />
					<input type="reset" value="Reset" id="btnClr" style="cursor:pointer; border:0px "
						class="btn-ctrl1" />
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12" id='err_msg' style='color:#ff0000; font-size:16px;'> &nbsp;
				</div>
			</div>
		</form>
	</div>
</div>

<link rel="stylesheet" type="text/css" href="calender/jquery.datetimepicker.css" />
<script src="calender/jquery.js"></script>
<script src="calender/jquery.datetimepicker_onlydate.js"></script>
<script>
	var jnq = $.noConflict();
	jnq('#birth_date').datetimepicker({
		dayOfWeekStart: 1,
		lang: 'en',
		startDate: '16-08-1991',
		autoclose: true
	});
</script>
