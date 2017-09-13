<?php
        $email = $_POST['email'];
        $token =  "xoxp-150107414595-150872153463-240627841767-6cbf2ec522dc9842531642cb979b8b1b";
        $team_url = "academia-ng.slack.com";
		$real_url = 'https://' . $team_url .'/api/users.admin.invite';
		$send = 'email='.$email.'&token='.$token.'&set_active=true';
        #Todo pass in command line arguments and use that for your page
        #todo put php and html code on the same page.
