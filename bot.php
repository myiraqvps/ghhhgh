<?php
// BY BRoK - @x_BRK - @i_BRK //
require('conf.php');
if (!file_exists("token")) {
$token =  readline("- Enter Token : ");
file_put_contents("token", $token);
if (!file_exists("ID")) {
$id = readline("- Enter iD : ");
file_put_contents("ID", $id);
}
}
$TT = file_get_contents("token");
$II = file_get_contents("ID");
$tg = new Telegram($TT);
$lastupdid = 1;
while(true){
 $upd = $tg->vtcor("getUpdates", ["offset" => $lastupdid]);
 if(isset($upd['result'][0])){
  $text = $upd['result'][0]['message']['text'];
  $chat_id = $upd['result'][0]['message']['chat']['id'];
$from_id = $upd['result'][0]['message']['from']['id'];
$username = $upd['result'][0]['message']['from']['username'];
$sudo = $II;
if($from_id == $sudo){
 if($text == "/start" or $text == "- رجوع ."){
    $tg->vtcor('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"- اهلا عزيزي .
- اختر التشيكر الذي تريد التحكم به .
- يمكنك ايضا اسخدام الاوامر المشتركه بين جميع التشيكرات .
- - - - -
- BY => @i_BRK .",
    'inline_keyboard'=>true,
 'reply_markup'=>json_encode([
      'keyboard'=>[
             [['text'=>'- التشيكر 1 .'],['text'=>'- التشيكر 2 .']],
             [['text'=>'- عرض معلومات التشيكرات .'],['text'=>'- عرض معرفات التشيكرات .']],
             [['text'=>'- تثبيت بجميع التشيكرات .']],
             [['text'=>'- اضافة لستة لجميع التشيكرات .'],['text'=>'- حذف لستات التشيكرات .']],
             [['text'=>'- ايقاف جميع التشيكرات .'],['text'=>'- تشغيل جميع التشيكرات .']],
             [['text'=>'- تسجيل الخروج من كل التشيكرات .']],
      ]	
		]),'resize_keyboard'=>true
	]);
}
if($text == '- التشيكر 1 .'){ 
$tg->vtcor('sendmessage',[ 
'chat_id'=>$chat_id,  
'text'=>"- اهلا بك مجددا عزيزي .
- يمكنك استخدام الاوامر ادناه للتحكم بلتشيكر 1 .
- ملاحظة : - رقم 1 يعني رقم التشيكر .", 
    'inline_keyboard'=>true,
 'reply_markup'=>json_encode([
      'keyboard'=>[
             [['text'=>'- تثبيت 1 .'],['text'=>'- حذف معرف 1 .']],
             [['text'=>'- معلومات التشيكر 1 .'],['text'=>'- عرض لستة المعرفات 1 .']],
             [['text'=>'- تثبيت بقناة قديمة 1 .'],['text'=>'- 1 تثبيت بحساب .']],
             [['text'=>'- 1 اضافة لستة .'],['text'=>'- 1 حذف كل المعرفات .']],
             [['text'=>'- تشغيل التشيكر 1 .'],['text'=>'- ايقاف التشيكر 1 .']],
             [['text'=>'- تسجيل 1 .']],
             [['text'=>'- رجوع .']],
      ]
		])
]); 
} 
if($text == '- التشيكر 2 .'){ 
$tg->vtcor('sendmessage',[ 
'chat_id'=>$chat_id,  
'text'=>"- اهلا بك مجددا عزيزي .
- يمكنك استخدام الاوامر ادناه للتحكم بلتشيكر 2 .
- ملاحظة : - رقم 2 يعني رقم التشيكر .", 
    'inline_keyboard'=>true,
 'reply_markup'=>json_encode([
      'keyboard'=>[
             [['text'=>'- تثبيت 2 .'],['text'=>'- حذف معرف 2 .']],
             [['text'=>'- معلومات التشيكر 2 .'],['text'=>'- عرض لستة المعرفات 2 .']],
             [['text'=>'- تثبيت بقناة قديمة 2 .'],['text'=>'- 2 تثبيت بحساب .']],
             [['text'=>'- 2 اضافة لستة .'],['text'=>'- 2 حذف كل المعرفات .']],
             [['text'=>'- تشغيل التشيكر 2 .'],['text'=>'- ايقاف التشيكر 2 .']],
             [['text'=>'- تسجيل 2 .']],
             [['text'=>'- رجوع .']],
      ]	
		]),'resize_keyboard'=>true
]); 
}
if($text == '- تثبيت بقناة قديمة 1 .'){ 
  file_put_contents('type1','OldChannel');
$tg->vtcor('sendmessage',[ 
'chat_id'=>$chat_id,  
'text'=>"- تم وضع التثبيت في التشيكر 1 بقناة قديمة .
-  ارسل معرف القناة القديمه مثل الاسفل .
/old1 @i_BRK", 
]); 
}  
if($text == '- 1 تثبيت بحساب .'){ 
  file_put_contents('type1','Account');
$tg->vtcor('sendmessage',[ 
'chat_id'=>$chat_id,  
'text'=>"- تم وضع التثبيت في التشيكر 1 بحساب .", 
]); 
} 
if($text == '- تثبيت 1 .'){ 
  $tg->vtcor('sendmessage',[ 
  'chat_id'=>$chat_id,  
  'text'=>"- حسنا ارسل المعرف الان مثل الاسفل .
/Pin1 @x_BRK", 
  ]); 
  } 
  if ($text == "- 1 اضافة لستة .") {
    $tg->vtcor('sendMessage', ['chat_id' => $chat_id, 'text' => "- حسنا ارسل اللستة الان مثل الاسفل .
/add1 @i_BRK\nx_BRK"]);
  }
if(preg_match('/\/add1 .*/', $text)){
$users = explode ("\n",file_get_contents("users1"));
$text = str_replace('/add1 @', '', $text);
if(!in_array($text,$users)){
          $tg->vtcor('sendMessage', ['chat_id' => $chat_id, 'text' => "- تم الاضافة الى اللستة في التشيكر 1 ."]);
          file_put_contents("users1", trim("\n$text",""),FILE_APPEND);
      }
}
if(preg_match('/\/addall .*/', $text)){
$users1 = explode ("\n",file_get_contents("users1"));
$users2 = explode ("\n",file_get_contents("users2"));
$text = str_replace('/addall @', '', $text);
          $tg->vtcor('sendMessage', ['chat_id' => $chat_id, 'text' => "- تم اضافة اللسة الى جميع التشيكرات ."]);
          file_put_contents("users1", trim("\n$text",""),FILE_APPEND);
          file_put_contents("users2", trim("\n$text",""),FILE_APPEND);
      }
if($text == '- حذف معرف 1 .'){ 
$tg->vtcor('sendmessage',[ 
'chat_id'=>$chat_id,  
'text'=>"- حسنا ارسل المعرف الان مثل الاسفل .
/UnPin1 @i_BRK", 
]); 
} 
if (preg_match("/\/UnPin1 @(.*)/", $text)) {
  $user = explode("@", $text) [1];
  $data = str_replace("\n" . $user, "", file_get_contents("users1"));
    file_put_contents("users1", $data);
    $tg->vtcor('sendMessage', ['chat_id' => $chat_id, 'text' => "- تم حذف المعرف من لستة التشيكر 1 => @$user ."]);
  }
  $se = explode("\n", file_get_contents('users1'));
$u = "";
if ($text == "- عرض لستة المعرفات 1 .") {
  for($i=0; $i<count($se); $i++){
$n1 = $i + 1;
$u .= $n1." => @".$se[$i]."\n";
}
  $tg->vtcor('sendMessage', ['chat_id' => $chat_id, 'text' => "- 1 معرفات اللستة . \n$u" ]);
}
if ($text == "- 1 حذف كل المعرفات .") {
  file_put_contents("users1", "");
  $tg->vtcor('sendMessage', ['chat_id' => $chat_id, 'text' => "- تم حذف كل معرفات اللستة 1 ."]);
}
$BRoKyes = file_get_contents("run1");
$brokold = file_get_contents("oldchannel1");
$type = file_get_contents('type1');
$phone = file_get_contents('phone1');
if($text  == "- معلومات التشيكر 1 ."){ 
$tg->vtcor('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"- معلومات التشيكر .
- حالة التشيكر => $BRoKyes .
- القناة القديمة => @$brokold .
- التثبيت في => $type .
- الرقم => $phone .
- - - - - -
- BY => @i_BRK .
", 
]); 
}
if(preg_match('/Pin1 @/', $text )) { 
$ex = explode('/Pin1 @',$text)[1]; 
file_put_contents("users1",$ex); 
$tg->vtcor('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"- تم التثبيت على => @$ex .", 
]); 
} 
if(preg_match('/Pinall @/', $text )) { 
$ex = explode('/Pinall @',$text)[1]; 
file_put_contents("users1",$ex); 
file_put_contents("users2",$ex); 
$tg->vtcor('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"- تم التثبيت على => @$ex .", 
]); 
} 
if(preg_match('/old1 @/', $text )) { 
  $brok = explode('/old1 @',$text)[1]; 
  file_put_contents("oldchannel1",$brok); 
  $tg->vtcor('sendMessage',[ 
  'chat_id'=>$chat_id, 
  'text'=>"- تم وضع القناة القديمة => @$brok .", 
  ]); 
  } 
$type = file_get_contents('type1');
if($text == '- تشغيل التشيكر 1 .'){
file_put_contents("run1","Running");
shell_exec('screen -S ac -X kill'); 
shell_exec('screen -dmS ac php checker1.php'); 
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم تشغيل التشيكر 1 .",
]);
}
if($text == '- ايقاف التشيكر 1 .'){
  file_put_contents('run1','Sleeping');
      shell_exec('screen -S ac -X kill'); 
    $tg->vtcor('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"- 1 تم ايقاف التشيكر .",
    ]);
    }
if($text == '- تسجيل 1 .'){
	system('rm -rf m1.madeline');
	system('rm -rf m1.madeline.lock');
file_put_contents("step1","");
if(file_get_contents("step1") == ""){
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- حسنا ارسل رقم الهاتف الان .
- مثل => +964**********",
]);
file_put_contents("step1","2");
  system('php g1.php');
}
}
// Checker 2 Commands //
if($text == '- تثبيت بقناة قديمة 2 .'){ 
file_put_contents('type2','OldChannel');
$tg->vtcor('sendmessage',[ 
'chat_id'=>$chat_id,  
'text'=>"- تم وضع التثبيت في التشيكر 2 بقناة قديمة .
-  ارسل معرف القناة القديمه مثل الاسفل .
/old2 @i_BRK", 
]); 
} 
if($text == '- 2 تثبيت بحساب .'){ 
  file_put_contents('type2','Account');
$tg->vtcor('sendmessage',[ 
'chat_id'=>$chat_id,  
'text'=>"- تم وضع التثبيت في التشيكر 2 بحساب .", 
]); 
} 
if($text == '- تثبيت 2 .'){ 
  $tg->vtcor('sendmessage',[ 
  'chat_id'=>$chat_id,  
  'text'=>"- حسنا ارسل المعرف الان مثل الاسفل .
/Pin2 @x_BRK", 
  ]); 
  } 
  if ($text == "- 2 اضافة لستة .") {
    $tg->vtcor('sendMessage', ['chat_id' => $chat_id, 'text' => "- حسنا ارسل اللستة الان مثل الاسفل .
/add2 @i_BRK\nx_BRK"]);
  }
if(preg_match('/\/add2 .*/', $text)){
$users = explode ("\n",file_get_contents("users2"));
$text = str_replace('/add2 @', '', $text);
if(!in_array($text,$users)){
          $tg->vtcor('sendMessage', ['chat_id' => $chat_id, 'text' => "- تم الاضافة الى اللستة في التشيكر 2 ."]);
          file_put_contents("users2", trim("\n$text",""),FILE_APPEND);
      }
}
if($text == '- حذف معرف 2 .'){ 
$tg->vtcor('sendmessage',[ 
'chat_id'=>$chat_id,  
'text'=>"- حسنا ارسل المعرف الان مثل الاسفل .
/UnPin2 @i_BRK", 
]); 
} 
if (preg_match("/\/UnPin2 @(.*)/", $text)) {
  $user = explode("@", $text) [1];
  $data = str_replace("\n" . $user, "", file_get_contents("users2"));
    file_put_contents("users2", $data);
    $tg->vtcor('sendMessage', ['chat_id' => $chat_id, 'text' => "- تم حذف المعرف من لستة التشيكر 2 => @$user ."]);
  }
  $se = explode("\n", file_get_contents('users2'));
$u = "";
if ($text == "- عرض لستة المعرفات 2 .") {
  for($i=0; $i<count($se); $i++){
$n1 = $i + 1;
$u .= $n1." => @".$se[$i]."\n";
}
  $tg->vtcor('sendMessage', ['chat_id' => $chat_id, 'text' => "- 2 معرفات اللستة . \n$u" ]);
}
if ($text == "- 2 حذف كل المعرفات .") {
  file_put_contents("users2", "");
  $tg->vtcor('sendMessage', ['chat_id' => $chat_id, 'text' => "- تم حذف كل معرفات اللستة 2 ."]);
}
$BRoKyes = file_get_contents("run2");
$brokold = file_get_contents("oldchannel2");
$type = file_get_contents('type2');
$phone = file_get_contents('phone2');
if($text  == "- معلومات التشيكر 2 ."){ 
$tg->vtcor('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"- معلومات التشيكر .
- حالة التشيكر => $BRoKyes .
- القناة القديمة => @$brokold .
- التثبيت في => $type .
- الرقم => $phone .
- - - - - -
- BY => @i_BRK .
", 
]); 
}
if(preg_match('/Pin2 @/', $text )) { 
$ex = explode('/Pin2 @',$text)[1]; 
file_put_contents("users2",$ex); 
$tg->vtcor('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"- تم التثبيت على => @$ex .", 
]); 
} 
if(preg_match('/old2 @/', $text )) { 
  $brok = explode('/old2 @',$text)[1]; 
  file_put_contents("oldchannel2",$brok); 
  $tg->vtcor('sendMessage',[ 
  'chat_id'=>$chat_id, 
  'text'=>"- تم وضع القناة القديمة => @$brok .", 
  ]); 
  } 
$type = file_get_contents('type2');
if($text == '- تشغيل التشيكر 2 .'){
file_put_contents("run2","Running");
  shell_exec('screen -S cumali -X kill'); 
shell_exec('screen -dmS ac cumali checker2.php'); 
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم تشغيل التشيكر 2 .",
]);
}
if($text == '- ايقاف التشيكر 2 .'){
  file_put_contents('run2','no');
      shell_exec('screen -S cumali -X kill'); 
    $tg->vtcor('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"- 2 تم ايقاف التشيكر .",
    ]);
    }
if($text == '- تسجيل 2 .'){
	system('rm -rf m2.madeline');
	system('rm -rf m2.madeline.lock');
file_put_contents("step2","");
if(file_get_contents("step2") == ""){
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- حسنا ارسل رقم الهاتف الان .
- مثل => +964**********",
]);
file_put_contents("step2","2");
  system('php g2.php');
}
}
// All Checkers Commands //
$bro1k = file_get_contents('run1');
$bro2k = file_get_contents('run2');
$pho1 = file_get_contents('phone1');
$pho2 = file_get_contents('phone2');
$ol1d = file_get_contents('oldchannel1');
$ol2d = file_get_contents('oldchannel2');
$type1 = file_get_contents('type1');
$type2 = file_get_contents('type2');
if($text == '- عرض معلومات التشيكرات .'){
  $tg->vtcor('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"- معلومات جميع التشيكرات .
- التشيكر 1 => $bro1k .
- التشيكر 2 => $bro2k .
- - - - - -
- رقم التشيكر 1 => $pho1 .
- رقم التشيكر 2 => $pho2 .
- - - - - -
- القناة القديمة 1 => @$ol1d .
- القناة القديمة 2 => @$ol2d .
- - - - - -
- التثبيت في التشيكر 1 => $type1 .
- التثبيت في التشيكر 2 => $type2 .
- - - - - -
- BY => @i_BRK ."
  ]);
}
  $se1 = explode("\n", file_get_contents('users1'));
$u1 = "";
  $se2 = explode("\n", file_get_contents('users2'));
$u2 = "";
if ($text == "- عرض معرفات التشيكرات .") {
  for($i=0; $i<count($se1); $i++){
$n1 = $i + 1;
$u1 .= $n1." => @".$se1[$i]."\n";
}
  for($i=0; $i<count($se2); $i++){
$n1 = $i + 1;
$u2 .= $n1." => @".$se2[$i]."\n";
}
$tg->vtcor('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"- معرفات التشيكر 1 .
$u1 
- - - - - -
- معرفات التشيكر 2 .
$u2 
- - - - - -
- BY => @i_BRK ."
]);
}
if($text == '- تثبيت بجميع التشيكرات .'){
  $tg->vtcor('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"- حسنا عزيزي ارسل المعرف الان مثل الاسفل .
/Pinall @x_BRK"
  ]);
}
if($text == '- اضافة لستة لجميع التشيكرات .'){
  $tg->vtcor('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"- حسنا عزيزي ارسل المعرف الان مثل الاسفل .
/addall @x_BRK
i_BRK"
  ]);
}
if($text == '- حذف لستات التشيكرات .'){
  $tg->vtcor('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"- تم مسح جميع اللستات ."
  ]);
  file_put_contents('users1','');
  file_put_contents('users2','');
}
if($text == '- تسجيل الخروج من كل التشيكرات .'){
  $tg->vtcor('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"- تم تسجيل الخروج من كل التشيكرات ."
  ]);
  system('rm -rf m1.madeline');
	system('rm -rf m1.madeline.lock');
	system('rm -rf m2.madeline');
	system('rm -rf m2.madeline.lock');
	file_put_contents('phone1', '');
	file_put_contents('phone2', '');
}
if($text == '- ايقاف جميع التشيكرات .'){
  $tg->vtcor('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"- تم ايقاف جميع التشيكرات ."
  ]);
  file_put_contents('run1','Sleeping');
  file_put_contents('run2','Sleeping');
  shell_exec('screen -S ac -X kill'); 
  shell_exec('screen -S cumali -X kill'); 
}
if($text == '- تشغيل جميع التشيكرات .'){
  $tg->vtcor('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"- تم تشغيل جميع التشيكرات ."
  ]);
  file_put_contents('run1','Running');
  file_put_contents('run2','Running');
  shell_exec('screen -S ac -X kill'); 
  shell_exec('screen -dmS ac php checker1.php');
  shell_exec('screen -S cumali -X kill'); 
  shell_exec('screen -dmS cumali php checker2.php');
}
$lastupdid = $upd['result'][0]['update_id'] + 1; 
}
}
}