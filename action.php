<?php
#Todo find out why token is been revoked and how to use normal token(not legacy token)
#Todo Get good background images
#Todo figure out how to read setting from settings.json file so uses do not need to change anything in the code
        $email = "yomi@dispostable.com";#$_GET["email"];

        $team_url = "academia-ng.slack.com"; #put in slack team url like myslackteam.slack.com
        $token =  #put in your token code
		$real_url = "'".'https://' . $team_url .'/api/users.admin.invite'."'";
		$send = "'".'email='.$email.'&token='.$token.'&set_active=true'."'";

        $command = "curl -X POST ".$real_url." \
        --data " .$send ." \
        --compressed";


        $output = exec( $command);#this sends the api call
        echo $output;

        if (strpos($output, 'true') !== false) {
            echo "An invite link has been sent to you";
        }

        elseif (strpos($output, 'already_invited') !== false) {
            echo "You have already been invited.";
        }

        elseif (strpos($output, "token_revoked") !== false) {
            echo "The token used for authentication has been revoked,Contact the admin of the slack team";
        }
        else{
            echo "Some thing went wrong";
        }

