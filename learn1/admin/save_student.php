<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\composer\vendor\autoload.php';
include('dbcon.php');
        
               $un = $_POST['username'];
               $fn = $_POST['firstname'];
               $ln = $_POST['lastname'];
               $class_id = $_POST['class_id'];
			   $password = $_POST['password'];
			   $eemail = $_POST['email'];
			   $location = $_POST['location'];
			   

               mysqli_query($conn,"insert into student (firstname,lastname,class_id,password,username,location,status,email)
		values ('$fn','$ln','$class_id','$password','$un','uploads/NO-IMAGE-AVAILABLE.jpg','Unregistered','$eemail')                                    
		") or die(mysqli_error());




             $mail = new  PHPMailer();

						try {
							$mail->SMTPDebug = 2;									
							$mail->isSMTP();											
							$mail->Host	 = 'smtp.gmail.com;';					
							$mail->SMTPAuth = true;							
							$mail->Username = 'l.h.20.pagoma@gmail.com';				
							$mail->Password = 'Pagoma@2000';						
							$mail->SMTPSecure = 'tls';							
							$mail->Port	 = 587;

							$mail->setFrom('l.h.20.pagoma@gmail.com', 'Investhood E-Learning');		
							$mail->addAddress($eemail,$fn);
							
							
							$mail->isHTML(true);								
							$mail->Subject = 'Investhood E-Learning - Registration';
							$mail->Body = '<html>
							           <head>
							             <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
										 <title></title>
							           </headd>
									   <body>
									      <div id="email-wrap" style="color:black">
										  <p>Dear '.$fn.' , </p>
										  
										  <p>I hope you are well. </p>
										  <p>Thank you for opening an account with us </p>	
										  										  
							               <p><strong>Your Login Details:</strong></p>
										   <p><strong> Username: '.$un .'  </strong></p>
										   <p><strong> Password: '. $password .'    </strong></p>
										   <p><strong> To login click on the following link: http://localhost/Learn/admin/index.php </strong></p>
										   
										  
										  <p>Regards, </p>
										  <p>Investhood E-Learning</p>';
							$mail->AltBody = 'Body in plain text for non-HTML mail clients';
							$mail->send();
							echo "<script>window.open('students.php','_self')</script>";
                                                                							
							
						} catch (Exception $e) {
							echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
						}
	



		?>
<?php    ?>