<?php
        #todo: make php output index php then make it run from command line argument
        $email = $_POST["email"];
        $team_url = "academia-ng.slack.com"; #put in slack team url like myslackteam.slack.com
        $token = "40044223985-701b34872ac74e7cc7e2f358deec9238"; #put in your token code
		$real_url = 'https://' . $team_url .'/api/users.admin.invite';
		$send = 'email='.$email.'&token='.$token.'&set_active=true';
        #Todo pass in command line arguments and use that for your page
        #todo put php and html code on the same page.
        $command = "curl -X POST".$real_url. "\
        --data" .$send."\
        --compressed";
        echo $command;
        #$output = shell_exec( $command);#this sends the api call
        #echo $output;