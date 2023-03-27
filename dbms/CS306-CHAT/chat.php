
<?php
$URL = "https://deneme-6a3d6-default-rtdb.firebaseio.com/Chats.json";

//1.
function get_messages(){
    global $URL;
    $ch = curl_init();
    curl_setopt_array($ch, [CURLOPT_URL => $URL, 
                            CURLOPT_POST => FALSE, // it will be a get request
                            CURLOPT_RETURNTRANSFER =>true, ]);
    $response = curl_exec($ch); 
    curl_close($ch); 
    return json_decode($response, true);
}

function send_msg($msg, $name, $time){
    global $URL;
    $ch = curl_init();//connection for the curl
    $msg_json = new stdClass(); //creates a stdClass bunu sonra encode ile json a dönüştürücez
    $msg_json->msg = $msg; //json's msg field will be parameter $msg
    $msg_json->name = $name;
    $msg_json->time = date('H:i');
    $encoded_json_obj = json_encode($msg_json); // burada stdClass'ı Json a dönüştürüyoruz.
    curl_setopt_array($ch,array(CURLOPT_URL => $URL,
                                CURLOPT_POST => TRUE, //post false olsaydı bu get request olurdu.
                                CURLOPT_RETURNTRANSFER => TRUE,
                                CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
                                CURLOPT_POSTFIELDS=>$encoded_json_obj));
    $response = curl_exec($ch); //execute
    return $response;
}

$msg_res_json = get_messages();
$keys = array_keys($msg_res_json);
// for($i=0; $i < count($keys); $i++){
//     $chat_msg = $msg_res_json[$keys[$i]];
//     echo $chat_msg['name']."<br>";
//     $msg = isset($chat_msg['msg']) ? $chat_msg['msg'] : 'EMPTY FIELD';
//     echo $msg. "<br>";
// }

//2.


//send_msg("HELLO olmmmmm", "zortingen500",date("H:i")); //böyle echo dersen ekrana o mesajın key ini bastırır ama echo yazmadanda sadece sen_msg ile gönderebilirdin.



//4. Şimdi formu da oluşturduk aşağıda bu sefer mesajı gönderebilmek istiyoruz

if (isset($_POST['usermsg'])){
    $user_msg = $_POST['usermsg'];
    send_msg($user_msg, "User", date("H:i"));
    echo $user_msg;
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  </head>
  <div class="menu"></div>
  <div class="back"><i class="fa fa-chevron-left"></i> <img src="https://i.imgur.com/5eMAuXg.jpeg" draggable="false" /></div>
<div class="name"> Support</div>
<div class="left"> 18:09</div>
</div>
<ol class="chat">

<?php

if (isset($_POST['name'])) {
	$name2 = $_POST['name'];
	echo $name2;
	
}

$keys = array_keys($msg_res_json);
for($i=0; $i < count($keys); $i++){
    $chat_msg = $msg_res_json[$keys[$i]];
    $name = $chat_msg['name'];
    $msg = $chat_msg['msg'];
    $time = $chat_msg['time'];
    //bunu sağda mı solda mı olduğunu anlayabilmek için yapıyoruz chat ekranında 
    if ($name == "admin"){
        $from = "other";
    }else{
        $from = "self";
    }
    echo '   
    <li class="'.$from.'">
     <div class="avatar"> 
    <img src="https://i.imgur.com/5eMAuXg.jpeg" draggable="false"/>
</div>

<div class="msg">
<p><b>'.$name.'</b></p>
<p>'.$msg.'</p>
<time>'.$time.'</time>

</div>
</li>';
}
?>


</ol>
    

</html>

<!-- 3. -->
<form name="form" action="chat.php" method="POST">
<input name="usermsg" class="textarea" type="text" placeholder="Type Here">
<input type="submit" style="display: none" />
</form>
 