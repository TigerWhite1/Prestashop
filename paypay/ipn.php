<?php 
//permet de traiter le retour ipn de paypal
include_once(dirname(__FILE__).'/../../config/config.inc.php');
// $email_account = "thomas.dugue-facilitator@epitech.eu";
// $req = 'cmd=_notify-validate';
// foreach ($_POST as $key => $value) {
//     $value = urlencode(stripslashes($value));
//     $req .= "&$key=$value";
// }
// $header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
// $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
// $header .= "Host: www.sandbox.paypal.com\r\n";  // www.paypal.com for a live site
// $header .= "Content-Length: " . strlen($req) . "\r\n";
// $header .= "Connection: close\r\n\r\n";
// $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
// $item_name = $_POST['item_name'];
// $item_number = $_POST['item_number'];
// $payment_status = $_POST['payment_status'];
// $payment_amount = $_POST['mc_gross'];
// $payment_currency = $_POST['mc_currency'];
// $txn_id = $_POST['txn_id'];
// $receiver_email = $_POST['receiver_email'];
// $payer_email = $_POST['payer_email'];
// parse_str($_POST['custom'],$custom);
// if (!$fp) {
// } else {
//     fputs ($fp, $header . $req);
//     while (!feof($fp)) {
//         $res = fgets ($fp, 1024);
//         if (count(preg_match('/VERIFIED/', $res)) > 0) {
//         // vérifier que payment_status a la valeur Completed
//             if ( $payment_status == "Completed") {
//                if ( $email_account == $receiver_email) {

                // file_put_contents('/var/www/html/prestashop/modules/paypay/log.txt', 'tottotoo', FILE_APPEND);
                // $db = Db::getInstance();
$toto = Db::getInstance()->insert('orders', array(
    `id_order` => "1234",
    `reference` => "1234",
    `id_shop_group` => "1234",
    `id_shop` => "1234",
    `id_carrier` => "1234",
    `id_lang` => "1234",
    `id_customer` => "1234",
    `id_cart` => "1234",
    `id_currency` => "1234",
    `id_address_delivery` => "1234",
    `id_address_invoice` => "1234",
    `current_state` => "1234",
    `secure_key` => "1234",
    `payment` => "1234",
    `conversion_rate` => "1234",
    `module` => "1234",
    `recyclable` => "1234",
    `gift` => "1234",
    `gift_message` => "1234",
    `mobile_theme` => "1234",
    `shipping_number` => "1234",
    `total_discounts` => "1234",
    `total_discounts_tax_incl` => "1234",
    `total_discounts_tax_excl` => "1234",
    `total_paid` => "1234",
    `total_paid_tax_incl` => "1234",
    `total_paid_tax_excl` => "1234",
    `total_paid_real` => "1234",
    `total_products` => "1234",
    `total_products_wt` => "1234",
    `total_shipping` => "1234",
    `total_shipping_tax_incl` => "1234",
    `total_shipping_tax_excl` => "1234",
    `carrier_tax_rate` => "1234",
    `total_wrapping` => "1234",
    `total_wrapping_tax_incl` => "1234",
    `total_wrapping_tax_excl` => "1234",
    `round_mode` => "1234",
    `round_type` => "1234",
    `invoice_number` => "1234",
    `delivery_number` => "1234",
    `invoice_date` => "1234",
    `delivery_date` => "1234",
    `valid` => "1234",
    `date_add` => "1234",
    `date_upd` => "1234"
    ));


var_dump($toto);
                /**
                 * C'EST LA QUE TOUT SE PASSE
                 * PS : tjrs penser à vérifier la somme !!
                 */
                
                /**
                 * FIN CODE
                 */
//             }
//         }
//         else {
//                 // Statut de paiement: Echec
//         }
//         exit();
//     }
//     else if (strcmp ($res,"INVALID") == 0) {
//         // Transaction invalide
//     }
// }
// fclose ($fp);
// }
                ?>
                <?php
//
// // Adresse e-mail du vendeur
// $email_vendeur = "thomas.dugue-facilitator@epitech.eu";

// // Envoi des infos a Paypal
// $req = "cmd=_notify-validate";
// foreach ($_POST as $key => $value) {
//     $value = urlencode(stripslashes($value));
//     $req.= "&$key=$value";
// }
// $fp = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
// curl_setopt($fp, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
// curl_setopt($fp, CURLOPT_POST, 1);
// curl_setopt($fp, CURLOPT_RETURNTRANSFER,1);
// curl_setopt($fp, CURLOPT_POSTFIELDS, $req);
// curl_setopt($fp, CURLOPT_SSL_VERIFYPEER, 1);
// curl_setopt($fp, CURLOPT_SSL_VERIFYHOST, 2);
// curl_setopt($fp, CURLOPT_FORBID_REUSE, 1);
// curl_setopt($fp, CURLOPT_HTTPHEADER, array('Connection: Close'));
// if( !($res = curl_exec($fp)) ) {
//     curl_close($fp);
//     exit;
// }
// curl_close($fp);
// var_dump($fp);
// // Le paiement est validé
// if (strcmp(trim($res), "VERIFIED") == 0) {
//     // Vérifier que le statut du paiement est complet
//     if ($_POST['payment_status'] == "Completed") {
//         // Vérification de l'e-mail du vendeur
//         if ($email_vendeur == $_POST['receiver_email']) {
//             // Récupération du montant de la commande dans la BDD
//             $req = "SELECT montant_ttc FROM commandes WHERE id=".$_POST['custom'];
//             $rep = mysqli_query($db, $req);
//             $row = mysqli_fetch_array($rep);
//             // Vérification de la concordance du montant
//             if ($_POST['mc_gross'] == $row['montant_ttc']) {
//                 // Requête pour la mise à jour du statut de la commande => Statut à 1
//                 // Envoi du mail de récapitulatif de la commande à l'acheteur et au vendeur
//             } else {
//                 // Envoi d'une alerte par mail (voir modèle en bas de cette section)
//                 // Envoi d'un mail au client pour lui dire qu'on l'a gaulé ? ^^
//             }
//         } else {
//             // Envoi d'une alerte par mail (voir modèle en bas de cette section)
//             // Envoi d'un mail au client pour lui dire qu'on l'a gaulé ? ^^
//         }    
//     } else {
//         // Envoi d'une alerte par mail (voir modèle en bas de cette section)
//     }
// } else {
//     // Le paiement est invalide, envoi d'un mail au vendeur
//     $from = "From: test-vendeur@monsite.com";
//     $to = "test-vendeur@monsite.com";
//     $sujet = "Paiement invalide";
//     $body = $req;
//     foreach ($_POST as $key => $value) {
//         $text.= $key . " = " .$value ."nn";
//     }
//     mail($to, $sujet, $text . "nn" . $body, $from);
// }
//
                ?>