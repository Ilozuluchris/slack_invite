# Automate Your Slack Invites

This automate your slack invite with curl using php.

This has only been tested on a linux server.

Visit [Legacy tokens](https://api.slack.com/custom-integrations/legacy-tokens)to generate a token for the team(slack workspace) you to invite people to.

## OAuth tokens

  1. Visit [Slack Apps](https://api.slack.com/apps) to Create a new slack App.

  1. Click **"Permissions".**

  1. In **"OAuth & Permissions"** page, select admin scope under "Permission Scopes" menu and save changes.


  1. Click **"Install App to Team"**

  1. Visit [Authorize my token](https://slack.com/oauth/authorize?&client_id=CLIENT_ID&team=TEAM_ID&install_redirect=install-on-team&scope=admin+client) in your browser and authorize it.

  1. It authorizes the client permission.If it does not work you would see the  `{"ok":false,"error":"missing_scope","needed":"client","provided":"admin"}`  error.

Your CLIENT_ID could be found in *"Basic Information"* menu of the app page that you just installed.

Your TEAM_ID could be found in [TEAM IDS](https://api.slack.com/methods/team.info/test)

## Next edit [settings.json](https://github.com/Ilozuluchris/slack_invite/blob/master/settings.json) with the right values

  * ### To get your team url 
    * If you are using the application click on the arrow beside your team name,that should bring up a drop down list.
    * If you are using the website just look at the adress bar of your browser.
    Note team urls end with **.slack.com**

  * ### The token is the api token you just received,you cannot use a token gotten for a team(team X) for a different team(team Y)

  * ### The team name is the name you want that appears on the index page.This lets users know the name of the team they want to get an invite for.
