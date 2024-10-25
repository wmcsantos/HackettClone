<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer"s autoloader
require "vendor/autoload.php";

function sendOrderConfirmation($customerEmail, $customerName, $cartItems, $cartTotalPrice)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    echo ENV["MAIL_USERNAME"];
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = "smtp.gmail.com";                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = ENV["MAIL_USERNAME"];                   //SMTP username
        $mail->Password   = ENV["MAIL_PASSWORD"];                   //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(ENV["MAIL_USERNAME"], "Hackett London");
        $mail->addAddress($customerEmail, $customerName);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Hackett London | Order Confirmation";
        // Build the HTML body dynamically with PHP
        $body = "
            <h2>Order Confirmation</h2>
            <p>Hello $customerName,</p>
            <p>Thank you for your order! Below are the details:</p>
            <table style='width: 100%; text-align: left; border-collapse: collapse;'>
                <thead>
                    <tr style='background-color: #1e2134; color: white; text-align: left;'>
                        <th style='padding: 10px;'>Item</th>
                        <th style='padding: 10px;'>Quantity</th>
                        <th style='padding: 10px;'>Price</th>
                        <th style='padding: 10px;'>Total</th>
                    </tr>
                </thead>
                <tbody>";
        
        // Loop through cart items
        foreach ($cartItems as $item) {
            $itemTotal = number_format($item['price'] * $item['quantity'], 2);
            $formattedPrice = number_format($item['price'], 2);
            $body .= "
                <tr style='border-bottom: 1px solid #ddd;'>
                    <td style='padding: 10px;'>
                        <img src='http://localhost:8888{$item['image_url']}' alt='' style='width: 100px; height: 160px;'>
                        <div>
                            <p style='margin: 0;'>{$item['product_name']}</p>
                            <p style='margin: 0;'>Size: {$item['size']}</p>
                            <p style='margin: 0;'>Color: {$item['color']}</p>
                        </div>
                    </td>
                    <td style='padding: 10px;'>{$item['quantity']}</td>
                    <td style='padding: 10px;'>&euro;{$formattedPrice}</td>
                    <td style='padding: 10px;'>&euro;{$itemTotal}</td>
                </tr>";
        }

        // Add the total price
        $formattedTotalPrice = number_format($cartTotalPrice['total_price'], 2);
        $body .= "
                <tr>
                    <td colspan='2'></td>
                    <td style='padding: 10px;'><strong>Total</strong></td>
                    <td style='padding: 10px;'><strong>&euro;{$formattedTotalPrice}</strong></td>
                </tr>
            </tbody>
            </table>
            <p>If you have any questions, feel free to contact us at support@example.com.</p>
            <p>Thank you for shopping with Hackett London!</p>";

        // Assign the generated body content to $mail->Body
        $mail->Body = $body;

        $mail->AltBody = "Thank you for your order. Please contact us if you have any questions.";

        $mail->send();
        echo "Message has been sent";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}