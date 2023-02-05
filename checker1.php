<?php
// BROK - @x_BRK - @i_BRK //
date_default_timezone_set("Asia/Baghdad");
  if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
  }
  define('MADELINE_BRANCH', 'deprecated');
  include 'madeline.php';
  $settings['app_info']['api_id'] = 579315;
  $settings['app_info']['api_hash'] = '4ace69ed2f78cec268dc7483fd3d3424';
  $MadelineProto = new \danog\MadelineProto\API('m1.madeline', $settings);
  $MadelineProto->start();
function bot($method, $datas = []) {
	$token = file_get_contents("token");
	$url = "https://api.telegram.org/bot$token/" . $method;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$res = curl_exec($ch);
	curl_close($ch);
	return json_decode($res, true);
}
    $brokch = file_get_contents("oldchannel1");
    $type = file_get_contents('type1');
    $x = 0;
while(1){
    $users = explode("\n",file_get_contents("users1"));
    foreach($users as $user){
        if($user != ""){
          if($type == 'OldChannel'){
            try{
            	$MadelineProto->messages->getPeerDialogs(['peers' => [$user]]);
                          $x++;
            } catch (\danog\MadelineProto\Exception | \danog\MadelineProto\RPCErrorException $e) {
                    try{
                        $MadelineProto->channels->updateUsername(['channel' => $brokch, 'username' => $user]);
                        $phone = file_get_contents('phone1');
                        $time = date("m/d h:i:s");
bot('sendMessage', ['chat_id' => file_get_contents("ID"), 'text' => "- Checker 1 .
- Request Done  .
- New ID => [ @$user ] .
- Clicks => [ $x ] .
- Time => [ $time ] .
- Phone => [ $phone ] .
- - - - -
- BY => @aaaZaa ."]);
file_put_contents("run1","Sleeping");
                        exit;
                    }catch(Exception $e){
                            bot('sendMessage', ['chat_id' => file_get_contents("ID"), 'text' =>  "- Checker 1 .\n- @$user => ".$e->getMessage()
]);
file_put_contents("run1","Sleeping");
exit;
                    }
                    }
	        }
        }
    }
if($type == 'Account'){
try{
            	$MadelineProto->messages->getPeerDialogs(['peers' => [$user]]);
                          $x++;
            } catch (\danog\MadelineProto\Exception | \danog\MadelineProto\RPCErrorException $e) {
                    try{
                        $MadelineProto->account->updateUsername(['username' => $user]);
                        $phone = file_get_contents('phone1');
                        $time = date("m/d h:i:s");
bot('sendMessage', ['chat_id' => file_get_contents("ID"), 'text' => "- Checker 1 .
- Request Done  .
- New ID => [ @$user ] .
- Clicks => [ $x ] .
- Time => [ $time ] .
- Phone => [ $phone ] .
- - - - -
- BY => @aaaZaa ."]);
file_put_contents("run1","Sleeping");
                        exit;
                    }catch(Exception $e){
                            bot('sendMessage', ['chat_id' => file_get_contents("ID"), 'text' =>  "- Checker 1 \n- @$user => ".$e->getMessage()
]);
file_put_contents("run1","Sleeping");
exit;
                    }
                    }
	        }
        }