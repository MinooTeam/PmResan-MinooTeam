<?php
ob_start();
include 'administrative/access/Class.php';
// Variable Source
$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$chat_id = $update->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$from_id = $update->message->from->id;
$forward_id = $update->message->forward_from->id;
$first = $update->message->from->first_name;
$username = $update->message->from->username;
$text = $update->message->text;
$message_id = $update->message->message_id;
$block = file_get_contents("administrative/block-list.txt");
$feed = 260864889;
$command = file_get_contents('administrative/user/'.$from_id."/command.txt");
$create = file_get_contents('administrative/user/'.$from_id."/create.txt");
$cre = file_get_contents('administrative/user/'.$from_id."/cre.txt");
$gold = file_get_contents('administrative/user/'.$from_id."/gold.txt");
$goldacc = file_get_contents('administrative/user/'.$from_id."/goldacc.txt");
$wait = file_get_contents('administrative/user/'.$from_id."/wait.txt");
$codefree = file_get_contents('administrative/user/'.$from_id."/codefree.txt");
$Member = file_get_contents('administrative/access/Member.txt');
$url_s2a = file_get_contents("administrative/user/".$from_id."/url_s2a.txt");
$text_s2a = file_get_contents("administrative/user/".$from_id."/text_s2a.txt");
$from_chat_msg_id = $update->message->forward_from_message_id;
$from_chat_username = $update->message->forward_from_chat->username;
$bot = file_get_contents('administrative/user/'.$from_id."/bot.txt");
$datetime = json_decode(file_get_contents("http://api.norbert-team.ir/date-time/"));
$time = $datetime->time_fa;
$date = $datetime->date_fa;
$stickerid = $update->message->sticker->file_id;
$videoid = $update->message->video->file_id;
$voiceid = $update->message->voice->file_id;
$fileid = $update->message->document->file_id;
$photoid = $update->message->photo->file_id;
$musicid = $update->message->audio->file_id;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/botتوکن ربات اصلی که باید ادمین چنل باشه/getChatMember?chat_id=@Norbert_Team&user_id=".$from_id));
$tch = $truechannel->result->status;
$message_id = $update->message->message_id;
$message_id_call = $update->callback_query->message->message_id;
$ban_all = file_get_contents("آدرس فایل txt بن ال");
//=========
    if (strpos($ban_all , "$from_id") !== false) {
	return false;
	}
	elseif (strpos($block , "$from_id") !== false) {
	return false;
	}
	elseif ($from_id != $chat_id and $chat_id != $feed) {
	LeaveChat($chat_id);
	}
	//===============
	elseif(preg_match('/^\/([Ss]tart)(.*)/',$text)){
	preg_match('/^\/([Ss]tart)(.*)/',$text,$match);
	$match[2] = str_replace(" ","",$match[2]);
	$match[2] = str_replace("\n","",$match[2]);
	if($match[2] != null){
	if (strpos($Member , "$from_id") == false){
	if($match[2] != $from_id){
	if (strpos($gold , "$from_id") == false){
	$txxt = file_get_contents('administrative/user/'.$match[2]."/gold.txt");
    $pmembersid= explode("\n",$txxt);
    if (!in_array($from_id,$pmembersid)){
      $aaddd = file_get_contents('administrative/user/'.$match[2]."/gold.txt");
      $aaddd .= $from_id."\n";
		file_put_contents('administrative/user/'.$match[2]."/gold.txt",$aaddd);
    }
	SendMessage($match[2],"🆕 یک نفر با لینک اختصاصی شما وارد ربات شد","html","true",$button_official);
	}
	}
	}
	}
	mkdir('administrative/user/'.$from_id);
	if($from_id == $admin){
	SendMessage($chat_id,"ســلام👋😉

✴️ به ربات پیام رسان ساز تلگرام خوش اومدی

🅾 با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه یا وبسایت خود ایجاد کنید.

⚛ برای ساخت ربات دکمه (☢ساخت ربات) رو بزنید

🆔 @PvNorbertBot","html","true",$button_official_admin);
	}else{
	SendMessage($chat_id,"ســلام👋😉

✴️ به ربات پیام رسان ساز تلگرام خوش اومدی

🅾 با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه یا وبسایت خود ایجاد کنید.

⚛ برای ساخت ربات دکمه (☢ساخت ربات) رو بزنید

🆔 @PvNorbertBot","html","true",$button_official);
	}
	}
	//===============
	elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	SendMessage($chat_id,"📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال زیر بشید 👇

🆔 @Norbert_Team

✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇

🔸 /start

✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌","html","true",$button_remove);
	}
	//===============
  elseif($text == '↩️منوی اصلی'){
  save('administrative/user/'.$from_id."/command.txt","none");
  if($from_id == $admin){
  SendMessage($chat_id,"↩️ شما به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_admin);
  }else{
  SendMessage($chat_id,"↩️ شما به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official);
  }
  }
  //===============
	elseif(preg_match('/^\/([Cc][Oo][Dd][Ee]) (.*)/',$text)){
	preg_match('/^\/([Cc][Oo][Dd][Ee]) (.*)/',$text,$match);
	if($codefree == 'true' and $from_id != $admin){
	SendMessage($chat_id,"⛔️ شما قبلا یک بار از این امکان استفاده کردید.","html","true");
	}else{
	if(file_exists("administrative/code/$match[2].txt")){
	$code = file_get_contents("administrative/code/$match[2].txt");
	if($code == 'true'){
	SendMessage($chat_id,"✴️ کد استفاده شده.","html","true");
	}else{
	save('administrative/user/'.$from_id."/command.txt","code free");
	save('administrative/user/'.$from_id."/wait.txt",$match[2]);
	SendMessage($chat_id,"🤖 آیدی ربات رو وارد کنید:
	✳️ به حروف کوچیک و بزرگ آیدی دقت کنید.","html","true",$button_back);
	}
	}else{
	SendMessage($chat_id,"🅾 کد مورد نظر وجود ندارد.","html","true");
	}
	}
	}
	//===============
	elseif($command == 'code free'){
	$code = file_get_contents("administrative/code/$wait.txt");
	if($code == 'true'){
	save('administrative/user/'.$from_id."/command.txt","none");
	SendMessage($chat_id,"⛔️ آخ آخ یکی زودتر از شما کد رو استفاده کرد.","html","true",$button_official);
	}else{
	$text = str_replace("@",'',$text);
	if(file_exists("Bot/$text")){
	$vip = file_get_contents("Bot/$text/other/setting/bot_type.txt");
	if($vip == 'gold'){
	save('administrative/user/'.$from_id."/command.txt","none");
	SendMessage($chat_id,"⛔️ ربات مورد نظر ویژه میباشد.","html","true",$button_official);
	}else{
	save("administrative/code/$wait.txt","true");
	save('administrative/user/'.$from_id."/command.txt","none");
	save('administrative/user/'.$from_id."/codefree.txt","true");
	save("Bot/$text/other/setting/bot_type.txt","gold");
	SendMessage($chat_id,"✅ ربات مورد نظر ویژه شد.","html","true",$button_official);
	SendMessage($admin,"$first $from_id $wait","html","true");
	}
	}else{
	save('administrative/user/'.$from_id."/command.txt","code free");
	SendMessage($chat_id,"⭕️ ربات وجود ندارد.
	✳️ به حروف کوچیک و بزرگ آیدی دقت کنید.","html","true",$button_back);
	}
	}
	}
  //===============
  elseif($text == '⚠️راهنما'){
  SendMessage($chat_id,"1⃣ ابتدا به ربات ( @BotFather ) مراجعه کنید
2⃣ دستور /newbot رو ارسال کنید
3⃣ یک نام برای ربات ارسال کنید
4⃣ پس از ارسال نام،یک یوزرنیم ارسال کنید
❌ توجه کنین حتما باید در آخر یوزرنیم ارسالی کلمه bot با حروف کوچیک یا بزرگ (فرقی نداره) وجود داشته باشه
5⃣ اگر با پیغام زیر برخورد کردید
Sorry, this username is already taken. Please try something different.
یعنی قبلا یکی این یوزرنیم رو ثبت کرده یوزرنیم دیگری وارد کنید. اگر این پیغام رو دریافت نکردید یعنی کار حل است
6⃣ حالا به این ربات مراجعه کنید و دکمه (☢ساخت ربات) رو بزنید
7⃣ سپس پیام آخری که از ربات ( @BotFather ) دریافت کردید رو فوروارد کنید
8⃣ ربات شما با موفقیت ثبت شد

🆔 @Norbert_Team","html","true");
  }
  //===============
  elseif($text == '⚜حساب ویژه'){
 ForwardMessage($chat_id,"@Norbert_Team","175");
  }
  //================
  elseif($command == 'gold acc 20'){
	if(file_exists("Bot/$text")){
	save("Bot/$text/other/setting/bot_type.txt","gold");
	save('administrative/user/'.$from_id."/command.txt","none");
	save('administrative/user/'.$from_id."/goldacc.txt","true");
	SendMessage($chat_id,"✅ حساب ربات ویژه شد","html","true",$button_official);
	}else{
  SendMessage($chat_id,"🤖 آیدی بات رو بدون @ وارد کنید.آیدی وارد شده اشتباه است
⭕️ به کوچیک و بزرگی حروف دقت کنید","html","true");
  }
  }
  //===============
  elseif($text == '👥پشتیبانی'){
  SendMessage($chat_id,"🔸 دوست عزیز تمام نظراتتون رو میتونید به ربات زیر بفرستید ما 24 ساعته پاسخگوی شما هستیم و برای حل مشکل شما آماده ایم👇
🆔 @MosiDevBot","html","true");
  }
  //===============
  elseif($text == '⛔️قوانین'){
  SendMessage($chat_id,"ℹ قوانین استفاده از ربات:

☢ همه مطالب باید تابع قوانین جمهوری اسلامی ایران باشد.
☢ رعایت ادب و احترام به کاربران.
☢ ساخت هرگونه ربات در ضمیمه +18 خلاف قوانین ربات میباشد و در صورت مشاهده ربات مورد نظر مسدود و همچنین مدیر ربات از تمامی ربات ها بلاک میشود.
☢ مسئولیت پیام های رد و بدل شده در هر ربات با مدیر آن میباشد و ما هیچگونه مسئولیتی نداریم.
☢ در صورت مشاهده استفاده از قابلیت های ربات در جهات منفی به شدت برخورد میشود.
☢ اگر به هر دلیلی درخواست های ربات شما به سرور ما بیش از حد معمول باشد (و حساب ربات ویژه نباشد) چند باری به شما اخطار داده میشود اگر این اخطار ها نادیده گرفته شوند ربات شما مسدود و به هیچ عنوان از محدودیت خارج نمیشود.

🆔 @Norbert_Team","html","true");
  }
  //===============
  elseif($text == '❇️امکانات'){
  ForwardMessage($chat_id,"@Norbert_Team","175");
  }
  //===============
  elseif($text == '⭕️گزارش تخلف'){
  save('administrative/user/'.$from_id."/command.txt","takhlof");
  SendMessage($chat_id,"⭕️ لطفا یوزر آیدی ربات مورد نظر را ارسال کنید","html","true",$button_back);
  }
  //===============
  elseif($command == 'takhlof'){
	if(preg_match('/^(@)(.*)([Bb][Oo][Tt])/s',$text)){
	save('administrative/user/'.$from_id."/command.txt","none");
	SendMessage($feed,"گزارش تخلف ⬇","html","true");
	ForwardMessage($feed,$chat_id,$message_id);
	SendMessage($chat_id,"✅ ثبت شد.
	✅ به زودی به درخواست شما رسیدگی میشود","html","true",$button_official);
  }else{
	save('administrative/user/'.$from_id."/command.txt","takhlof");
	SendMessage($chat_id,"⭕️ خطا !!!
	⭕️ دقت کنین یوزرنیم ربات با @ شروع شده و با کلمه (bot) پایان میابد","html","true",$button_back);
  }
  }
  //===============
  elseif($text == '☢ساخت ربات'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید یا میتونین پیام حاوی توکن رو از ( @BotFather ) فوروارد کنید","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create bot");
  }
  //==============
  elseif($command == 'create bot'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the HTTP API:");
  $rep = str_replace("Use this token to access the HTTP API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"‼️دوست عزیز توکن مورد نظر نامعتبر است.

⭕️لطفا با دقت بیشتر یک توکن صحیح بفرستید:","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن ربات اصلی/sendMessage?parse_mode=HTML&chat_id=-1001084442481&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  ForwardMessage($chat_id,"-1001084442481",$msg_id);
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/admin-and-token/token/$username_bot.txt",$token);
  save("administrative/admin-and-token/admin/$username_bot.txt",$from_id);
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=Https://آدرس وب هوک و پوشه/$username_bot/");
  
  SendMessage($chat_id,"✅ ربات شما با موفقیت آپدیت شد.

✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=PvNorbertBot

🤖 برای ورود به ربات خود کلیک کنید😀👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"⭕️ دوست عزیز شما قبلا یک ربات ساخته اید برای ربات دوم باید مبلغ 3,000 تومن پرداخت کنید.برای اطلاعات بیشتر به @MosiDevBot مراجعه کنید","html","true",$button_official);
  }else{
	  
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن ربات اصلی/sendMessage?parse_mode=HTML&chat_id=-1001084442481&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  ForwardMessage($chat_id,"-1001084442481",$msg_id);
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","true");
  mkdir("Bot/$username_bot");
  mkdir("Bot/$username_bot/other");
  mkdir("Bot/$username_bot/other/$from_id");
  mkdir("Bot/$username_bot/other/access");
  mkdir("Bot/$username_bot/other/button");
  mkdir("Bot/$username_bot/other/profile");
  mkdir("Bot/$username_bot/other/setting");
  mkdir("Bot/$username_bot/other/wordlist");
  mkdir("Bot/$username_bot/other/button/caption");
  mkdir("Bot/$username_bot/other/button/file");
  mkdir("Bot/$username_bot/other/button/forward");
  mkdir("Bot/$username_bot/other/button/music");
  mkdir("Bot/$username_bot/other/button/photo");
  mkdir("Bot/$username_bot/other/button/feed");
  mkdir("Bot/$username_bot/other/button/sticker");
  mkdir("Bot/$username_bot/other/button/text");
  mkdir("Bot/$username_bot/other/button/video");
  mkdir("Bot/$username_bot/other/button/voice");
  save("Bot/$username_bot/other/setting/start.txt","Hi!✋ 
  <b>Welcome To My Bot</b>");
  save("Bot/$username_bot/other/setting/send.txt","<b>Sent To My Admin!</b>");
  save("Bot/$username_bot/other/setting/sticker.txt","✅");
  save("Bot/$username_bot/other/setting/file.txt","✅");
  save("Bot/$username_bot/other/setting/aks.txt","✅");
  save("Bot/$username_bot/other/setting/music.txt","✅");
  save("Bot/$username_bot/other/setting/film.txt","✅");
  save("Bot/$username_bot/other/setting/voice.txt","✅");
  save("Bot/$username_bot/other/setting/join.txt","✅");
  save("Bot/$username_bot/other/setting/link.txt","✅");
  save("Bot/$username_bot/other/setting/forward.txt","✅");
  save("Bot/$username_bot/other/setting/pm_forward.txt","⛔️");
  save("Bot/$username_bot/other/setting/pm_resani.txt","✅");
  save("Bot/$username_bot/other/setting/on-off.txt","true");
  save("Bot/$username_bot/other/setting/profile.txt","✅");
  save("Bot/$username_bot/other/setting/contact.txt","⛔️");
  save("Bot/$username_bot/other/setting/location.txt","⛔️");
  save("administrative/admin-and-token/token/$username_bot.txt",$token);
  save("administrative/admin-and-token/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class);
  $index = file_get_contents("administrative/source/index.php");
  save("Bot/$username_bot/index.php",$index);	
  $butt = file_get_contents("administrative/source/Button.php");
  save("Bot/$username_bot/other/Button.php",$butt);	
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=Https://آدرس وب هوک و پوشه/$username_bot/");
  SendMessage($chat_id,"✅ ربات شما با موفقیت ساخته شد.
  
✴️ به ربات ما امتیاز بدین👇
🌐 https://telegram.me/storebot?start=PvNorbertBot

🤖 برای ورود به ربات خود کلیک کنید😀👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🔯 @$username_bot",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official);
  
  $txxt = file_get_contents('administrative/access/Bots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/Bots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/Bots.txt',$aaddd);
  }
  }
  }
  }
  }
  //==========
  // Manage
  elseif($text == '🈸مدیریت' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🈸 به بخش ادمین خوش اومدین","html","true",$button_manage);
  }
  //============
  elseif($text == '☢کد رایگان' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","cod free");
  SendMessage($chat_id,"☢ کد مورد نظر رو وارد کنید","html","true",$button_back);
  }
  elseif($command == 'cod free' and $from_id == $admin){
  save("administrative/code/$text.txt","false");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"☢ کد ثبت شد.","html","true",$button_manage);
  }
  //============
  elseif($text == '⭕️لغو حساب ویژه' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","laghv hesab");
  SendMessage($chat_id,"⭕️ یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back);
  }
  elseif($command == 'laghv hesab' and $from_id == $admin){
  unlink("Bot/$text/other/setting/bot_type.txt");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"⭕️ حساب غیر ویژه شد.","html","true",$button_manage);
  }
  //============
  elseif($text == '🔱حساب ویژه' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab gold");
  SendMessage($chat_id,"🔱 یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back);
  }
  elseif($command == 'hesab gold' and $from_id == $admin){
  save("Bot/$text/other/setting/bot_type.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
  }
  //============
  elseif($text == '🤖ربات دوم' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","Bot 2");
  SendMessage($chat_id,"🤖 پیامی از شخص مورد نظر فوروارد کنید","html","true",$button_back);
  }
  elseif($command == 'Bot 2' and $from_id == $admin){
  unlink("administrative/user/".$forward_id."/create.txt");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🤖 شخص مورد نظر ربات دیگری میتواند بسازد.","html","true",$button_manage);
  }
  //============
  elseif($text == '📊آمار' and $from_id == $admin){  
	  $txtt = file_get_contents('administrative/access/Member.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
	$mmemcount_member = numberformat("$mmemcount",',');
	$txttt = file_get_contents('administrative/access/Bots.txt');
    $member_id1 = explode("\n",$txttt);
    $mmemcount1 = count($member_id1) -1;
	$mmemcount_bots = numberformat("$mmemcount1",',');
	$txtttt = file_get_contents('administrative/access/Member-All-Bot.txt');
    $member_id111 = explode("\n",$txtttt);
    $mmemcount111 = count($member_id111) -1;
	$mmemcount_member_all_bot = numberformat("$mmemcount111",',');
	$adminHA = getFileList('administrative/admin-and-token/admin','.txt');
	$tokenHA = getFileList('administrative/admin-and-token/token','.txt');
	$bots = file_get_contents("administrative/access/UserName.txt");
	$exbot = explode("@",$bots);
	$c = count($exbot)-2;
	$botsss = '';
	if($exbot[$c-(-1)] != null){
	$botsss = $botsss."@".$exbot[$c-(-1)];
	}if($exbot[$c] != null){
	$botsss = $botsss."@".$exbot[$c];
	}if($exbot[$c-1] != null){
	$botsss = $botsss."@".$exbot[$c-1];
	}if($exbot[$c-2] != null){
	$botsss = $botsss."@".$exbot[$c-2];
	}if($exbot[$c-3] != null){
	$botsss = $botsss."@".$exbot[$c-3];
	}if($exbot[$c-4] != null){
	$botsss = $botsss."@".$exbot[$c-4];
	}if($exbot[$c-5] != null){
	$botsss = $botsss."@".$exbot[$c-5];
	}if($exbot[$c-6] != null){
	$botsss = $botsss."@".$exbot[$c-6];
	}if($exbot[$c-7] != null){
	$botsss = $botsss."@".$exbot[$c-7];
	}if($exbot[$c-8] != null){
	$botsss = $botsss."@".$exbot[$c-8];
	}
	$botsss = str_replace("\n",' | ',$botsss);
  SendMessage($chat_id,"🤖 ربات ها: $mmemcount_bots
  ❇️ اعضا کل ربات ها: $mmemcount_member_all_bot
  👥 اعضا ربات اصلی: $mmemcount_member
  
  🅾 اعضا جدید:
  $botsss","html","true");
  }
  //============
  elseif($text == '📮فوروارد همگانی' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","s2a fwd");
	SendMessage($chat_id,"📮 پیام مورد نظر را فوروارد کنید","html","true",$button_back);
	}
	elseif($command == 's2a fwd' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","none");
	SendMessage($chat_id,"📮 پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
	$all_member = fopen( "administrative/access/Member.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			ForwardMessage($user,$admin,$message_id);
		}
	}
	//===========
	elseif($text == '📭پیام همگانی' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","s2a");
	SendMessage($chat_id,"📭 پیامتون رو وارد کنید","html","true",$button_back);
	}
	elseif($command == 's2a' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","none");
	SendMessage($chat_id,"📭 پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
	$all_member = fopen( "administrative/access/Member.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			if($sticker_id != null){
			SendSticker($user,$sticker_id);
			}
			elseif($video_id != null){
			SendVideo($user,$video_id,$caption);
			}
			elseif($voice_id != null){
			SendVoice($user,$voice_id,'',$caption);
			}
			elseif($file_id != null){
			SendDocument($user,$file_id,'',$caption);
			}
			elseif($music_id != null){
			SendAudio($user,$music_id,'',$caption);
			}
			elseif($photo2_id != null){
			SendPhoto($user,$photo2_id,'',$caption);
			}
			elseif($photo1_id != null){
			SendPhoto($user,$photo1_id,'',$caption);
			}
			elseif($photo0_id != null){
			SendPhoto($user,$photo0_id,'',$caption);
			}
			elseif($text != null){
			SendMessage($user,$text,"html","true");
			}
		}
	}
//============
elseif($text == '📟تبلیغات' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","ads");
	SendMessage($chat_id,"📟 تبلیغ مورد نظر رو فوروارد کنید","html","true",$button_back);
	}
	elseif($command == 'ads' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","none");
	save("administrative/access/forward-msg-id.txt",$from_chat_msg_id);
	save("administrative/access/forward-id.txt","@$from_chat_username");
	SendMessage($chat_id,"📟 تبلیغ مورد نظر ثبت شد.","html","true",$button_manage);
	}
//============
else{
  SendMessage($chat_id,"⛔️ دستور نامشخص...","html","true");
}
mkdir('administrative/user/'.$from_id);
$txxt = file_get_contents('administrative/access/Member.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('administrative/access/Member.txt');
      $aaddd .= $chat_id."\n";
		file_put_contents('administrative/access/Member.txt',$aaddd);
    }
	$txxt = file_get_contents('administrative/access/UserName.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array("@".$username,$pmembersid)){
      $aaddd = file_get_contents('administrative/access/UserName.txt');
      $aaddd .= "@".$username."\n";
	  if($username != null){
		file_put_contents('administrative/access/UserName.txt',$aaddd);
	  }
    }
unlink('error_log');
?>