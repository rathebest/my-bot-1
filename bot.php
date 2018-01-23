<?php


	
$access_token = 'fiAMHL0DOTlugChoT/1bTrhvrYT0YYAzdQlfgrlGXSA9ikf22lSN8xbYz7cKOSUpHgcedlVG4X/q4ErlYb1aLhu4oNeyy5Pyj4JHK/uX63abpbebuQrLqKWX3IV+xUKlN0JU6IfTY2bx1q00y6lg6QdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		/*
		if($event['source']=='user'){
			$user_id = $event['source']['userId'];
			
			if(empty($user_id)){
				$user_id = 'None '
			}
		}
		*/
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			
			switch ($event['message']['text']) {
			    case 'Name' :
				$messages = [
					'type' => 'text',
					'text' =>' วีรชิต ศรีมุข'. $user_id
					];
				break;
			    
			    case 'ข้อมูลสินเชื่อ':
				$messages = [
					'type' => 'text',
					'text' =>' วีรชิต ศรีมุข'
					];
				break;
			    default:
				$messages = [
					'type' => 'text',
					'text' => $text
				];
			} 
			/*
			if($event['message']['text'] == 'Name' || $event['message']['text'] == 'ข้อมูลสินเชื่อ' ){
				$messages = [
					'type' => 'text',
					'text' =>' วีรชิต ศรีมุข'
					];
			}
			else{
				$messages = [
					'type' => 'text',
					'text' => $text
				];
			}
			*/
			

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			
			/*
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "http://www.myDomain.com/hello.php");
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true)
			$output = curl_exec($ch);
			curl_close($ch);
			echo "<pre>$output</pre>";
			*/
			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			
			echo $result . "\r\n";
		}
	}
}
echo "OK";
