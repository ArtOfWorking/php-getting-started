<!DOCTYOE html>
<html>
<head><meta name="viewport" content="width=device-width">
<title>script with encrypt</title>

<style type='text/css'>body{height: auto;width: auto;color: #00FF00;font-family:Bree Serif;text-align:center;padding:10px;margin-top:2%;background-color:#262626;color:#1aefca;letter-spacing:1.5px;}hr{border:0;height:2px;text-align: center;background-image:linear-gradient(to right,rgba(0,0,0,0),rgba(0,255,0,1),rgba(0,0,0,0));}h1{color:#1aefca;}form{margin:2% auto;padding:5px;max-width:580px;text-align:center;}.text{font-size:16px;color:#00FF00;outline:0;border-radius:5px;background-color: #262626;position:relative;font-family:Bree Serif;text-align:center;padding:8px 15px;height:30px;border:solid 1px #00FF00;margin-bottom:15px;box-shadow:10px 10px 20px rgba(0,0,0,0.1);width:90%;}.text:hover{border:solid 1px #FF0000;}.submit{font-size:16px;color:#00FF00;position:relative;background:#262626;outline:0;border-radius:5px;font-family:Bree Serif;text-align:center;padding:8px 15px;height:45px;border:solid 1px #00FF00;margin-bottom:10%;box-shadow:10px 10px 20px rgba(0,0,0,0.1);width:50%;}.submit:hover{background:#262626;color:#FF0000;border:solid 1px #FF0000;}h3{color:#00FF00;padding:5px 0;}strong{color:orange;}marquee{color:#00FF00;font-size: 20px;text-align: center;font-weight:bold;}balance{color:#00FF00;font-size: 20px;text-align: center;font-weight:bold;}gzp{color:#00FF00;font-size: 20px;text-align: center;font-weight:bold;margin-top:10%;}#loader { border: 12px solid #00FF00; border-radius: 50%; border-top: 12px solid #595959; width: 100px; height: 100px;text-align: center;animation: spin 1s linear infinite; } @keyframes spin { 100% { transform: rotate(360deg); } } .center { position: absolute; top: 0; bottom: 0; left: 0; right: 0; margin: auto; }a{text-decoration:none;color:#00FF00;}a:hover{color:#FF0000;}::placeholder { color: #80FF80; font-size:16px;}audio{ display:none;}</style>

</head>
<body>
     <?php
error_reporting(0);
echo "<font color='red' size='5'><bold><hr class='hr-19'>By ✨PRATEEK SIR✨<hr class='hr-19'><bold>";

if(isset($_GET['submit'])){
	$uidx=$_GET['uid'];
    $uid=$_GET['oid'];




  function RandomNumber($length){
    $str="";
    for($i=0;$i<$length;$i++){
    $str.=mt_rand(0,9);
    }
    return $str;
    }
    
    
    function rando($length) {
        $characters = '1234567890abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



  $x16=rando(16);
$x40=rando(40);

$ts=time();
$f = array("sameer","suresh","chettiar","jatin","chauhan","agarwal","rahul","tanmay","tiwari","kunal","rasania","sunil","kumar","gaurav","arihant","jain","falguni","yashashree","arpi","arshish","gupta","tanmay","samtgr","kiyera","atul","abhay","chandra","shoibaakriti","aanchal","talreja","aatholiy","abhijeet","akkalwar","abhijeet","bajpai","abhijeetsh","abhirup","roy","abhishek","sumit","kapil","suman","rani","ramu","souvik","yogesh","umesh","sahadat","ankit","prasant","pravakar","sunil","sibaram");
$fname = $f[mt_rand(0,50)];
$l = array("sameer","suresh","chettiar","jatin","chauhan","agarwal","rahul","tanmay","tiwari","kunal","rasania","sunil","kumar","gaurav","arihant","jain","falguni","yashashree","arpi","arshish","gupta","tanmay","samtgr","kiyera","atul","abhay","chandra","shoibaakriti","aanchal","talreja","aatholiy","abhijeet","akkalwar","abhijeet","bajpai","abhijeetsh","abhirup","roy","abhishek","sumit","kapil","rani","ramu","souvik","yogesh","umesh","sahadat","ankit","prasant","pravakar","sunil","sibaram");
$lname = $l[mt_rand(0,50)];
$no = rand(1,999);
$name=''.$fname.''.$lname.''.$no.'';


$url1='https://instaup.marsapi.com/get_likes/user/coins';



$data0='market:PlayStore&user_id='.$uid.'&iad=de7d6788fcf061b1341cf0661af36fe35ec72647&user_name='.$name;

$a1 = RandomNumber(2);
$a2 = RandomNumber(2);
$a3 = RandomNumber(2);
$a4 = RandomNumber(2);
$ipz = $a1.'.'.$a2.'.'.$a3.'.'.$a4;


$access=md5('45:8D:2E:5C:3A:B4:02:2D:B5:DD:3B:E0:98:4F:14:90:CB:5F:B5:45'.$uid);


$headers1=['Xiaomi:29:M2007J20CI',
'access: '.$access,
'lng: en',
'cnt:in',
'versionName:17.0.1',
'version:90',
'pkg:f2c6d7a5b030a1542f7eb589d5013340',
'enMarket:EnglishWebPayment',
'market:PlayStore',
'uid:'.$uid,
'api_key: ABCXYZ123TEST',
'crc:4653145854/23927768',
"Nagent:0/02:00:00:00:00:00/48/de2b83032671b409/0/de7d6788fcf061b1341cf0661af36fe35ec72647",
'dsl:36f9a8e7',
'aid:de7d6788fcf061b1341cf0661af36fe35ec72647',
'special-user:1',
'Host:instaup.marsapi.com',
'Connection:Keep-Alive',
'Accept-Encoding:gzip',
'cookie:  token=47727362511%3AodJFdDrQjISxvB%3A19%3AAYfl_FpgBdtm3Ls1habCNVWgPK2E6loYzNzwxlZotw',];


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url1);
	curl_setopt($ch, CURLOPT_PROXY, '199.229.254.129:4145');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data0);
	   curl_setopt($ch, CURLOPT_HTTPHEADER,$headers1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
	$output1= curl_exec ($ch);
	
	curl_close ($ch);

    $json1=json_decode($output1,true);
  $c1=$json1['coins'];
  $d1 = $c1 / 4;
  $d2 = explode(".",$d1)['0'];
      $url0="https://instaup.marsapi.com/get_likes/order/follow";




$idx=$uid+3423;

$d=$idx.'ig';

$i='3rFz>|)VHl-w+5I0';

if($d2 > 1000){
$d2 = '1000';
} else {
$d2 = $d2;
}


$k='#p0yJmVK/@($nX?#';
$enc_data = base64_encode(openssl_encrypt($d,"AES-128-CBC",$k,OPENSSL_RAW_DATA,$i));
$tkv=md5($enc_data.':M3JGej58KVZIbC13KzVJMA==');






 
$ll='https%3A%5C%2F%5C%2Finstagram.fccu3-1.fna.fbcdn.net%5C%2Fv%5C%2Ft51.2885-15%5C%2Fe35%5C%2Fs150x150%5C%2F264420143_435496831548995_8076441957316773167_n.jpg%3F_nc_ht%3Dinstagram.fccu3-1.fna.fbcdn.net%26_nc_cat%3D111%26_nc_ohc%3DvWrY6qsKOOAAX9ZgJLH%26edm%3DAPU89FABAAAA%26ccb%3D7-4%26oh%3D00_AT_GHVnpr10j1bCs8Dx5unohvTyp_1DgOtu8It7P_Nmpfw%26oe%3D61B616B1%26_nc_sid%3D86f79a';


$data0='gift=0&order_count='.$d2.'&user_id='.$uid.'&tokenV2='.$tkv.'&start_value=1700&media_url=%7B%22media_url%22%3A%22'.$ll.'%22%2C%22user_name%22%3A%22'.$fname.'%22%7D&order_id='.$uidx;

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,$url0);
 curl_setopt($ch, CURLOPT_PROXY, '199.229.254.129:4145');
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS,$data0);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  $cc= curl_exec ($ch);
 curl_close ($ch);
    $jsonn=json_decode($cc,true);
    $c=$jsonn['status'];
    if($c == 'Successful'){
echo "<div class='success'><center>
<font color='green'><hr>$output1<hr>
<font color='red'><hr>DONE : $d2<hr></font></center></div>";
} else {

echo "<div class='success'><center>
<font color='green'><hr>$output1<hr></font></center></div>
<font color='red'><hr>$cc<hr></font></center></div>";
}


	    }
	
	if(!isset($_GET['submit'])){
echo"<form action='' method='get'>
<input type='text' name='oid'  class='text' placeholder='COIN ID' required><br><br>
<input type='text' name='uid'  class='text' placeholder='YOUR NUMERIC ID' required><br><br>";
echo "<input type='submit' class='submit' name='submit' value='FUCK INSTAUP'>";
	}

?>
      <script type="text/javascript"> var arrgetbtn=[]; arrgetbtn.push({"title":"Instagram","icon":"fwidgethelp-telegram_v2","link":"https://t.me/KRO","target":"_blank","color":"#FFFFFF","background":"#27A5E7"}); arrgetbtn.push({"title":"","icon":"fwidgethelp-telegram_v2","link":"https://t.me/mm88x","target":"_blank","color":"#FFFFFF","background":"#cc0000"}); arrgetbtn.push({"title":"","icon":"fwidgethelp-envelope","link":"","target":"_blank","color":"#FFFFFF","background":"#ff9900"}); var WidGetButtonOptions = { id:"99d94b6d33562f7f07911780e8c72119", iconopen:"fwidgethelp-telegram_v2", maintitle:"Telegram", mainbackground:"#ff0000", maincolor:"hsv(0, 0%, 100%)", pulse:"widgethelp_pulse", fasize:"1.75", direction:"top", position:"rightbottom", arrbtn: arrgetbtn }; (function() { var script = document.createElement("script"); script.type = "text/javascript"; script.async = true; script.src = "https://getbtn.com/widget/index.php?id="+WidGetButtonOptions.id; document.getElementsByTagName("head")[0].appendChild(script); })();</script>


