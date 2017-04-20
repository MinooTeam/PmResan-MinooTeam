<?php
echo "<center><h1>✅ تمام ربات ها در حال آپدیت هستن
نتیجه از تلگرام خبر داده میشه</h1></center>";
$all_Bots = fopen( "administrative/access/Bots.txt", 'r');
		while( !feof( $all_Bots)) {
 			$Bot = fgets( $all_Bots);
			$Bot = str_replace(" ",'',$Bot);
			$Bot = str_replace("\n",'',$Bot);
			$token = file_get_contents("administrative/admin-and-token/token/$Bot.txt");
			$admin = file_get_contents("administrative/admin-and-token/admin/$Bot.txt");
			$class = file_get_contents("administrative/source/Class.php");
			$class = str_replace("[*[TOKEN]*]",$token,$class);
			$class = str_replace("[*[ADMIN]*]",$admin,$class);
			file_put_contents("Bot/$Bot/Class.php",$class);
			$index = file_get_contents("administrative/source/index.php");
			file_put_contents("Bot/$Bot/index.php",$index);	
			}
			$text='✅ همه ربات ها آپدیت شد.';
			file_get_contents("https://api.telegram.org/botتوکن ربات اصلی/sendMessage?parse_mode=HTML&chat_id=260864889&text=".urlencode($text));
?>