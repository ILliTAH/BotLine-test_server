 <?php
  
function send_LINE($msg,$groupIdlog){
 $access_token = 'DGuuVccwqxYn+uroRdkiLBkYddWELZNxA03jZ36rKVwFpjutP9c56kLU8J9+Mf1/aS9Q4PoGYUEj7RKhjaIIoel4wRL35bQgbijVJBRe2LtiCZg3WX2VStSqATXMYVtSbowItcUApiUvxqKt1jqSTQdB04t89/1O/w1cDnyilFU='; 
 $id = (string)$groupIdlog;
  $messages = [
        'type' => 'text',
        'text' => $msg
        //'text' => $text
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => $id,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

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

?>
