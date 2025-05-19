<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $company = $_POST['company'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $product_interest = $_POST['product_interest'];
    $contact_reason = $_POST['contact_reason'];

    $to = "your-email@example.com"; // <-- เปลี่ยนเป็นอีเมลจริงที่จะรับ
    $subject = "แบบฟอร์มติดต่อจากเว็บไซต์";
    $headers = "From: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "ชื่อ-นามสกุล: $fullname\n";
    $body .= "ชื่อบริษัท: $company\n";
    $body .= "เบอร์โทร: $phone\n";
    $body .= "อีเมล: $email\n";
    $body .= "สนใจผลิตภัณฑ์: $product_interest\n";
    $body .= "เหตุผลที่ติดต่อ: $contact_reason\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "ส่งอีเมลเรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาดในการส่งอีเมล";
    }
}
?>
