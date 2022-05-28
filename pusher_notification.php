    function sendFCM($data) {
        // FCM API Url
        // var_dump();
        // die();
        $url = 'https://fcm.googleapis.com/fcm/send';
      
        // Put your Server Key here
        $apiKey = "AAAAtjIU31w:APA91bGmxSWBlMMkiSEL_MglD6no90sOoVD1_CYPSpxQ9bRcC-0ECZWotGuYcP9S26fS1td3-b7fFgpayiYqABWwIUXXBcefdX7GUk9RjRIPG1My7NFWl50B_CLBCmsOPANV0TDZDVFj";
      
        // Compile headers in one variable
        $headers = array (
          'Authorization:key=' . $apiKey,
          'Content-Type:application/json'
        );
      
        // Add notification content to a variable for easy reference
        $notifData = [
          'title' => $data['name'],
          'body' => $data['description'],
          //  "image": "url-to-image",//Optional
          'click_action' => "" //Action/Activity - Optional
        ];
      
        $dataPayload = ['to'=> 'My Name is kongchansila', 
        'points'=>80, 
        'other_data' => 'This is extra payload'
        ];
      
        // Create the api body
        $apiBody = [
          'notification' => $notifData,
          'data' => $dataPayload, //Optional
          'time_to_live' => 600, // optional - In Seconds
          //'to' => '/topics/mytargettopic'
          //'registration_ids' = ID ARRAY
          'to' => '/topics/tsdcustomer'
        ];
      
        // Initialize curl with the prepared headers and body
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_POST, true);
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));
      
        // Execute call and save result
        $result = curl_exec($ch);
        print($result);
        // Close curl after call
        curl_close($ch);
      
        return $result;
        sendFCM();

      }
