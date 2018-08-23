# Notification-Bell

This project was a quick experiment to show use case of webhooks using a LAMP stack (though we don't need MongoDb).

### Technology used

- Silex (You can use symphony or any other library)
- Webhook
- Ultrahook

It rings a bell sound whenever someone makes a payment on your site given you use stripe payment gateway or whenever someone makes a new commit to your project on github.

    Note: Even if you're not using stripe or github, it should be fairly simple to use the this method to play bell with any platform having support for webhooks.
    In such case, you have to find an alternative to Ultrahook by creating your own HTTP server that forwards the webhook requests. Beacuse Ultrahook only supports github and stripe domains only.

## Requirements

- Download Bell sound file (I used the following [bell-ding-sound-effect](http://www.orangefreesounds.com/bell-ding-sound-effect)) and change name of the file in play.sh (Currently it is bell.mp3)
- Ultrahook (To forward the webhook requests to local environment)
- Stripe or Github account

## Preparation

- Install a package to play sound files from shell (we will use <b>play</b>. Alternatives: [how-to-play-a-sound-from-terminal](https://askubuntu.com/questions/920539/how-to-play-a-sound-from-terminal))
  <br/><code> sudo apt install sox</code>
  <br/>And for playing special formats like mp3 you must install its libraries:
  <br/><code>sudo apt install libsox-fmt-mp3</code>
  <br/>

        If you want to use it with full libraries, you must install libsox-fmt-all package:
        sudo apt install libsox-fmt-all

- Clone the repository in the root of your apache server (or any http server with php)

- Give permission to your apache server user to use Audio
  <br/><code> sudo usermod -aG audio www-data</code>
  <br/>www-data is the name of the apache user. To know this name in your case, you can use "whoami" in exec in Php.

- Set the webhook URL in stripe or github to the ultrahook url (or other if its your own server)

- Start apache server

- Start Ultrahook (No need to do anything if you're using custom server to forward webhook requests)
  <br /><code>ultrahook stripe http://localhost/Notification-Bell/webhook</code>
