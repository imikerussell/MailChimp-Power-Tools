# MailChimp-Power-Tools

_Lead Magnet:_ A desireable digital download offered in exchange for contact information. Usually a lead magnet takes the form of audio (mp3), a document (pdf) or videos (mp4).

### The Problem

I started using MailChimp Automations to send a lead magnet when I subscriber joins a group from a signup form.

After I hit the maximum of 60 groups per MailChimp account I started looking for another way to allow new subscribers (and current subscribers) the opportunity to opt-in to my list without being restricted to creating a maximum of 60 lead magnets on the Music Radio Creative Blog.

### The Solution

I wanted a way to be able to give away an unlimited amount of lead magnets and now I can do just that using the MailChimp API 3.0. I can even create signup forms that track interests of new and current subscribers to my list.

## Installing MailChimp Power Tools on a Web Server

First, install the excellent MailChimp API v3 wrapper from @drewm:

`git clone https://github.com/drewm/mailchimp-api.git`

Next, clone this repository:

`git clone git@github.com:imikerussell/MailChimp-Power-Tools.git`

Create a `config.php` file inside the `/mc-end-point/` folder and enter your own details:

```
<?php
$mcapi = 'YOUR MAILCHIMP API KEY HERE';
$mclistid = 'YOUR MAILCHIMP LIST ID HERE';
$installurl = 'WEB URL HERE';
$thanksurl = 'WEB URL OF THANK YOU PAGE (AFTER USER SUBSCRIBES TO YOUR LIST THEY ARE SENT HERE)';
?>
```

## Creating a Lead Magnet in MailChimp

### Design a Template

1. Login to Mailchimp.
2. Go to Templates and select or create a cool template with a big button.

### Create Each Lead Magnet as an Automation

1. Go to Automation and select Add Automation.
2. Select Integration from the side menu then click Add Automation on the API 3.0 box.
3. Name your automation (the name of the lead magnet is a good idea here!).
4. Click the drop down menus on Second API Call and Third API Call and click Delete Email on both. We only need one email to be sent with the lead!
5. Now click Edit trigger on First API Call and change Delay to Immediately and Update Trigger.
6. Click Design Email, enter your Email information, choose a template (preferably one with a big button in it).
7. Select the button and then use MailChimp’s File Manager to upload your lead magnet.
8. Save & Close, Save and Continue, Next then Start Workflow.
9. Make it faster next time by clicking Automation then Replicate on the drop down menu by a previous lead magnet email you created. Now repeat steps 6-8 only!

### Generate MailChimp Form Code for Lead Magnets

1. Visit MailChimp Lead Magnet Power Tools. `http://installurl/mc-power-tools/`
2. Click Lead Magnet Automations Created Today or select a day from the calendar under Lead Magnet Automations Created Before if it’s an automation you created in the past.
3. Copy and paste the generated code into your website or blog.

## Creating an Interest in MailChimp

### Setup an Interest in your MailChimp Account

1. Login to Mailchimp.
2. Go to Lists and select your list.
3. Settings dropdown menu, followed by List fields and *|MERGE|* tags option.
4. Click Add A Field, type Text.
5. Label should be a descriptive interest name e.g. “Script Ideas”. Untick Required and Visible, tag should be all caps and related to interest e.g. “SCRIPTS”, default merge tag value should be blank.

### Generate MailChimp Form Code for an Interest

Want to track the interest of your blog readers? Create a custom interest for different types of posts and then generate embeddable form code as follows:

1. Visit MailChimp Lead Magnet Power Tools. `http://installurl/mc-power-tools/`
2. Select the correct interest from the drop down menu.
3. Click Create Code.
4. Copy and paste the generated code into your website or blog.

### See all Subscribers with an Interest

1. Go to Lists and select your list.
2. Click Segments drop down menu and select Create a new segment.
3. Select the interest from Merge Fields in drop down then is in the box and the final box should have True.
4. Click Preview Segment and voila!
