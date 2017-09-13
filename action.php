<?php
        $email = $_POST['email'];
        $team_url = "academia-ng.slack.com";
		$real_url = 'https://' . $team_url .'/api/users.admin.invite';
		$send = 'email='.$email.'&token='.$token.'&set_active=true';
        #Todo pass in command line arguments and use that for your page
        #todo put php and html code on the same page.
