<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    if (!$email) {
        echo "Email tidak valid!";
        exit;
    }

    $to = "robbiansah363@gmail.com"; // Email tujuan
    $subject = "Pesan dari $fullname";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    $body = "Nama: $fullname\nEmail: $email\n\nPesan:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "Pesan berhasil dikirim ke email!";
    } else {
        echo "Gagal mengirim pesan!";
    }
} else {
    echo "Akses ditolak!";
}
?>
