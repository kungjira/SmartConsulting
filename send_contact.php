<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// โหลด PHPMailer
require 'vendor/autoload.php'; // อย่าลืมติดตั้งผ่าน Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $company = htmlspecialchars($_POST['company']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // ตั้งค่า SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.yourdomain.com';       // แก้เป็น SMTP ของคุณ
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@yourdomain.com'; // อีเมลผู้ส่ง
        $mail->Password = 'your_password';             // รหัสผ่าน SMTP
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // ผู้ส่ง
        $mail->setFrom('your_email@yourdomain.com', 'Website Contact Form');

        // ผู้รับ
        $mail->addAddress('sales@smartconsulting.co.th');

        // เนื้อหา
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "
            <strong>ชื่อ:</strong> $first_name $last_name<br>
            <strong>บริษัท:</strong> $company<br>
            <strong>เบอร์โทร:</strong> $phone<br>
            <strong>อีเมล:</strong> $email<br>
            <strong>ข้อความ:</strong><br>$message
        ";

        $mail->send();
        http_response_code(200);
        echo 'ส่งข้อมูลสำเร็จ';
    } catch (Exception $e) {
        http_response_code(500);
        echo 'เกิดข้อผิดพลาด: ' . $mail->ErrorInfo;
    }
}

