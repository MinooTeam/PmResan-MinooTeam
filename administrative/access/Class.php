<?php /* Start Class Telegram Bot */
/* ############################################################################
Written by amir
The MinooTeam
Observe Copyright
############################################################################ */
/* ob Start */
ob_start();
/* Token Bot */
define('API_KEY','توکن ربات اصلی');
/* Admin List */
$admin = "368624818";
/* Tabee Save */
function save($filename,$TXTdata){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
/* Tabee getFileList */
function getFileList($folderName, $fileType = "")
{
    if (substr($folderName, strlen($folderName) - 1) != "/") {
        $folderName .= '/';
    }

	$c=0;
    foreach (glob($folderName . '*' . $fileType) as $filename) {
        if (is_dir($filename)) {
            $type = 'folder';
        } else {
            $type = 'file';
        }
        $c++;
    }
	return $c;

}
/* Tabee numberformat */
function numberformat($str, $sep = ',')
{
    $result = '';
    $c = 0;
    $num = strlen("$str");
    for ($i = $num - 1; $i >= 0; $i--) {
        if ($c == 3) {
            $result = $sep . $result;
            $result = $str[$i] . $result;
            $c = 0;
        } else {
            $result = $str[$i] . $result;
        }
        $c++;
    }
    return $result;
}
	/* Zip Aechive */
function create_zip($files = array(),$destination = '') {
    if(file_exists($destination)) { return false; }
    $valid_files = array();
    if(is_array($files)) {
        foreach($files as $file) {
            if(file_exists($file)) {
                $valid_files[] = $file;
            }
        }
    }
    if(count($valid_files)) {
        $zip = new ZipArchive();
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
            return false;
        }
        foreach($valid_files as $file) {
            $zip->addFile($file,$file);
        }
        $zip->close();
        return file_exists($destination);
    }
    else
    {
        return false;
    }
} 
/* Button */
$button_manage = json_encode(['keyboard'=>[
[['text'=>'↩️منوی اصلی']],
[['text'=>'⭕️لغو حساب ویژه'],['text'=>'🔱حساب ویژه']],
[['text'=>'🤖ربات دوم'],['text'=>'📊آمار']],
[['text'=>'📭پیام همگانی'],['text'=>'📮فوروارد همگانی']],
[['text'=>'📟تبلیغات'],['text'=>'☢کد رایگان']],
],'resize_keyboard'=>true]);
$button_official_admin = json_encode(['keyboard'=>[
[['text'=>'☢ساخت ربات']],
[['text'=>'⚜حساب ویژه'],['text'=>'⚠️راهنما']],
[['text'=>'⛔️قوانین'],['text'=>'👥پشتیبانی']],
[['text'=>'❇️امکانات'],['text'=>'⭕️گزارش تخلف']],
[['text'=>'🈸مدیریت']],
],'resize_keyboard'=>true]);
$button_official = json_encode(['keyboard'=>[
[['text'=>'☢ساخت ربات']],
[['text'=>'⚜حساب ویژه'],['text'=>'⚠️راهنما']],
[['text'=>'⛔️قوانین'],['text'=>'👥پشتیبانی']],
[['text'=>'❇️امکانات'],['text'=>'⭕️گزارش تخلف']],
],'resize_keyboard'=>true]);
$button_back = json_encode(['keyboard'=>[
[['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_remove = json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true]);
/* Tabee objectToArrays */
function objectToArrays( $object ) {
				if( !is_object( $object ) && !is_array( $object ) )
				{
				return $object;
				}
				if( is_object( $object ) )
				{
				$object = get_object_vars( $object );
				}
			return array_map( "objectToArrays", $object );
			}
/* Tabee Bot OFficial */
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
/* Tabee Bot XYZ */
function botXYZ($method,$datas=[]){
    $url = "https://api.pwrtelegram.xyz/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
/* Tabee Send Message */
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Forward Message */
function ForwardMessage($chatid,$from_chat,$message_id){
	bot('ForwardMessage',[
	'chat_id'=>$chatid,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
	}
	/* Tabee Send Photo */
function SendPhoto($chatid,$photo,$keyboard,$caption){
	bot('SendPhoto',[
	'chat_id'=>$chatid,
	'photo'=>$photo,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Audio */
function SendAudio($chatid,$audio,$keyboard,$caption,$sazande,$title){
	bot('SendAudio',[
	'chat_id'=>$chatid,
	'audio'=>$audio,
	'caption'=>$caption,
	'performer'=>$sazande,
	'title'=>$title,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Document */
function SendDocument($chatid,$document,$keyboard,$caption){
	bot('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Sticker */
function SendSticker($chatid,$sticker,$keyboard){
	bot('SendSticker',[
	'chat_id'=>$chatid,
	'sticker'=>$sticker,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Video */
function SendVideo($chatid,$video,$caption,$keyboard,$duration){
	bot('SendVideo',[
	'chat_id'=>$chatid,
	'video'=>$video,
        'caption'=>$caption,
	'duration'=>$duration,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Voice */
function SendVoice($chatid,$voice,$keyboard,$caption){
	bot('SendVoice',[
	'chat_id'=>$chatid,
	'voice'=>$voice,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Contact */
function SendContact($chatid,$first_name,$phone_number,$keyboard){
	bot('SendContact',[
	'chat_id'=>$chatid,
	'first_name'=>$first_name,
	'phone_number'=>$phone_number,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Chat Action */
function SendChatAction($chatid,$action){
	bot('sendChatAction',[
	'chat_id'=>$chatid,
	'action'=>$action
	]);
	}
	/* Tabee Kick Chat Member */
function KickChatMember($chatid,$user_id){
	bot('kickChatMember',[
	'chat_id'=>$chatid,
	'user_id'=>$user_id
	]);
	}
	/* Tabee Leave Chat */
function LeaveChat($chatid){
	bot('LeaveChat',[
	'chat_id'=>$chatid
	]);
	}
	/* Tabee Get Chat */
function getChat($idchat){
	$json=file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChat?chat_id=".$idchat);
	$data=json_decode($json,true);
	return $data["result"]["first_name"];
}
	/* Tabee Get Chat Members Count */
function GetChatMembersCount($chatid){
	bot('getChatMembersCount',[
	'chat_id'=>$chatid
	]);
	}
	/* Tabee Get Chat Member */
function GetChatMember($chatid,$userid){
	$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
	$tch = $truechannel->result->status;
	return $tch;
	}
	/* Tabee Answer Callback Query */
function AnswerCallbackQuery($callback_query_id,$text,$show_alert){
	bot('answerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$text,
		'show_alert'=>$show_alert
    ]);
	}
	/* Tabee Edit Message Text */
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
	 bot('editMessagetext',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'text'=>$text,
    'parse_mode'=>$parse_mode,
	'disable_web_page_preview'=>$disable_web_page_preview,
    'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Edit Message Caption */
function EditMessageCaption($chat_id,$message_id,$caption,$keyboard,$inline_message_id){
	 bot('editMessageCaption',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'caption'=>$caption,
    'reply_markup'=>$keyboard,
	'inline_message_id'=>$inline_message_id
	]);
	}
	?>
