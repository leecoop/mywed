<?
require_once 'PHPMailer/class.phpmailer.php';



function sendVerificationMail($to, $content,$name){
		 // מיקום קובץ המחלקה

		$mail = new PHPMailer (); // יצירת אובייקט המחלקה (קריאה למחלקה)
		
		// הגדרות כלליות 
		$mail->SMTPAuth   = true; // התחברות לשרת המיילים דורשת הזדהות
		$mail->SMTPSecure = "ssl"; // מתחברים בהתחברות מאובטחת
		$mail->Host = "ssl://smtp.gmail.com:465"; // כתובת השרת של גוגל
		//$mail->Port  = 465; // פורט השרת של גוגל
		//$mail->Mailer= "smtp"; // מגדירים למחלקה לשלוח אימייל דרך השרת החיצוני ולא באמצעות פונקציות mail
		
		
		// שם משתמש וסיסמה לחשבון
		// CHANGE THIS !!!!!!!!!!!!!!!!!!!!!!!!!!
		$mail->Username   = "agudasce21@gmail.com";
		$mail->Password   = "kVwWQE84";
		
		
		// מוען
		$mail->FromName = "SCE Aguda"; // שם - השם שלך
		$mail->AddReplyTo ("Aguda@sceaguda.co.il", "SCE Aguda"); // אם המקבל ילחץ "השב" התשובה שלו תשלח ל
		
		// תוכן ההודעה
		$mail->Subject = "Email Verification"; // כותרת המכתב
		$mail->Body = "<div style=\"direction:rtl; text-align:right;\">הרישום הסתיים בהצלחה <br> על מנת לאמת את כתובת הדואר שלך יש ללחוץ על הלינק הבא  <br> \r<a href='http://www.sceaguda.co.il/mailVerification.php?code=".$content."'>אימות</a>\r\r</div>"; // תוכן המכתב
		$mail->IsHTML (true); // שולחים היפרטקסט ולא טקסט רגיל
		$mail->CharSet = 'UTF-8'; // קידוד המכתב
		
		// מען
		$mail->AddAddress ($to, $name); //כתובת אימייל אליה יישלח האימייל ושם הנמען
		$mail->Send (); //ביצוע השליחה
	}
	
	//function sendVerificationMail($to, $content){
//		include('utils/email_from_verification_array.php');
//		$i=rand(0,$fromVerificationSize);
//		$headers = "From: SCE Aguda <".$fromVerificationArr[$i].">\r\n"."MIME-Version: 1.0\n"."Content-type: text/html; charset=\"UTF-8\"\r\n";
//		$success = mail($to, "Email Verification",  "
//		<div style=\"direction:rtl; text-align:right;\">הרישום הסתיים בהצלחה <br> על מנת לאמת את כתובת הדואר שלך יש ללחוץ על הלינק הבא  <br> \rhttp://www.sceaguda.co.il/mailVerification.php?code=".$content."\r\r</div>" 
//		, $headers);
//		return $success;
//	}
	
	?>