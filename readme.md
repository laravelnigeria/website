<p align="center">
    <img src="https://user-images.githubusercontent.com/807318/27274054-b06652c6-54c9-11e7-83ab-f4a3fa6109b7.jpeg" alt="Laravel Nigeria meetup">
</p>
<p align="center">Source code of the Laravel Nigeria meetup website. Developed &amp; Designed by <a href="https://creativitykills.co" target="_blank">CreativityKills Co.</a></p>
<p align="center"><a href="LICENSE"><img alt="GitHub license" src="https://img.shields.io/github/license/laravelnigeria/website.svg"></a></p>


<p>&nbsp;</p>
<p>&nbsp;</p>

## Requirements
* Composer installed on the your machine
* NPM if you are modifying SCSS, JS or Images
* Twitter application and credentials, also set the env variables
* Mailgun or any other mail driver (if you want to test the Contact form use Mailtrap.io)
* Set up the required ENV variables, the more you set up the better though
  - `DB_CONNECTION`
  - `DB_HOST`
  - `DB_PORT`
  - `DB_USERNAME`
  - `DB_PASSWORD`
  - `MEETUP_URL_NAME`
  - `MEETUP_KEY`
  - `TWITTER_CONSUMER_KEY`
  - `TWITTER_CONSUMER_SECRET`
  - `TWITTER_ACCESS_TOKEN`
  - `TWITTER_ACCESS_TOKEN_SECRET`
  - `TWITTER_SEARCH_QUERY`

<p>&nbsp;</p>

## Installation and Configuration
* Fork the repository & clone it to your host machine

    ```shell
    $ git clone git@github.com:laravelnigeria/website.git my-directory
    ```

* Change to the root of your application's directory and install dependencies

    ```shell
    $ cd my-directory
    $ composer install
    ```

* Make a copy of the `.env.example` file  and name it `.env`

    ```shell
    $ cp .env.example .env
    ```

* Generate a new application key using `artisan`

    ```shell
    $ php artisan key:generate
    ```

* Set up your database and enter the credentials in the `.env` file

    ```
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    ```

* Run the database migrations and seed the database

    ```shell
    $ php artisan migrate --seed
    ````

* [Get a Meetup API key](https://secure.meetup.com/meetup_api/key/) and set the following environment following environment variables

    ```
    MEETUP_URL_NAME="Laravel-Nigeria"    # Or whatever your Meetup URL name is...
    MEETUP_KEY=
    ```

* [Create a Twitter application](https://apps.twitter.com/) and set the following environment variables:

    ```
    TWITTER_CONSUMER_KEY=
    TWITTER_CONSUMER_SECRET=
    TWITTER_ACCESS_TOKEN=
    TWITTER_ACCESS_TOKEN_SECRET=
    TWITTER_SEARCH_QUERY="#LaravelNigeria OR @laravelnigeria -filter:retweets -filter:replies"
    ```

* If you want to modify the template and css you will need `npm` installed on your machine. Verify that you have the correct setting in your `webpack.mix.js` file, especially the BrowserSync section.

    ```javascript
    mix.js('resources/assets/js/app.js', 'public/js')
       .sass('resources/assets/sass/app.scss', 'public/css')
       .options({
          processCssUrls: false
       })
       .browserSync({
           // Use Laravel Valet to make sure this matches. From the root of your app, run: $ valet link laravelnigeria
          proxy: 'laravelnigeria.dev'
       });
    ```

    Now you can run the `npm` commands to make your changes:

    ```shell
    $ npm install
    $ npm run watch
    ```

* You're done!

<p>&nbsp;</p>

## Todos
- [x] Contact us popup
- [x] All talks page
- [x] Bug in the slider getting big momentarily
- [x] Create custom error pages
- [x] Create error pages for the custom exceptions e.g `ApiCommunicationException`.
- [ ] Contribute page
- [ ] Administrative panel
- [ ] Use web intents to add retweet, reply and like buttons to the tweet section
- [ ] Create a new Twitter application for the Laravel Nigeria application
- [ ] Meetup feedback popup with link to leave reviews
- [ ] Learning track
- [ ] Learning track availability alert form
- [ ] Installation check Middleware
- [ ] ~~Jobs page~~

<p>&nbsp;</p>

## Contributing
Contribution instructions goes here