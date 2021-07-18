<p align="center">
    <img src="https://user-images.githubusercontent.com/807318/27274054-b06652c6-54c9-11e7-83ab-f4a3fa6109b7.jpeg" alt="Laravel Nigeria meetup">
</p>
<p align="center">Source code of the Laravel Nigeria meetup website. Developed &amp; Designed at <a href="https://creativitykills.co/?utm=github-laravel-nigeria" target="_blank">CreativityKills</a></p>
<p align="center"><a href="LICENSE"><img alt="GitHub license" src="https://img.shields.io/github/license/laravelnigeria/website.svg"></a> <a href="https://www.codementor.io/neoighodaro?utm_source=github&utm_medium=button&utm_term=neoighodaro&utm_campaign=github"><img src="https://cdn.codementor.io/badges/get_help_github.svg"></a> <a href="https://github.com/laravelnigeria/website"><img src="https://d25lcipzij17d.cloudfront.net/badge.svg?id=gh&type=6&v=2.0.4&x2=0"></a> <a href="https://codeclimate.com/github/laravelnigeria/website"><img src="https://codeclimate.com/github/laravelnigeria/website.svg"></a></p>

<p>&nbsp;</p>
<p>&nbsp;</p>

## Requirements

-   Composer installed on your machine.
-   npm if you are modifying the style, JavaScript, or images.
-   Twitter application and credentials.
-   Mailgun, Sendgrid, or any other mail driver (To test the Contact form use Mailtrap.io).
-   Tinyletter account for newsletter subscription.
-   Community inviter account, for Slack community invitations.
-   Meetup.com account for API integration.
-   Set up the required `.env` variables, the more you set up the better:
    -   `DB_*` ...
    -   `MEETUP_*` ...
    -   `TWITTER_*` ...
    -   `TINY_LETTER_USERNAME`
    -   `COMMUNITY_INVITER_SLACK_*` ...
    -   `MAIL_*`...
    -   `CONTACT_MSG_SEND_*` ...

<p>&nbsp;</p>

## Installation and Configuration

-   Fork the repository & clone it to your host machine

    ```shell
    $ git clone git@github.com:laravelnigeria/website.git my-directory
    ```

-   Change to the root of your application's directory and install dependencies

    ```shell
    $ cd my-directory
    $ composer install
    ```

-   Make a copy of the `.env.example` file and name it `.env`

    ```shell
    $ cp .env.example .env
    ```

-   Generate a new application key using `artisan`

    ```shell
    $ php artisan key:generate
    ```

-   Set up your database and enter the credentials in the `.env` file

    ```
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    ```

-   Run the database migrations and seed the database

    ```shell
    $ php artisan migrate --seed
    ```

-   [Get a Meetup API key](https://secure.meetup.com/meetup_api/key/) and set the following environment following environment variables

    ```
    MEETUP_URL_NAME="Laravel-Nigeria"
    MEETUP_KEY=
    ```

-   [Create a Twitter application](https://apps.twitter.com/) and set the following environment variables:

    ```
    TWITTER_CONSUMER_KEY=
    TWITTER_CONSUMER_SECRET=
    TWITTER_ACCESS_TOKEN=
    TWITTER_ACCESS_TOKEN_SECRET=
    TWITTER_SEARCH_QUERY="#LaravelNigeria OR @laravelnigeria -filter:retweets -filter:replies"
    ```

    -   Use the [community inviter](https://communityinviter.com) app to get the details for your Slack community if you have one for example:

    ```
    COMMUNITY_INVITER_SLACK_TEAM_READABLE="Laravel Nigeria"
    COMMUNITY_INVITER_SLACK_TEAM="laravelnigeria"
    ```

    Now you can run the `npm` commands to make your changes:

    ```shell
    $ npm install
    $ npm run watch
    ```

-   You're done!

<p>&nbsp;</p>

## Contributing

**Working on your first Pull Request?** You can learn how from this _free_ series [How to Contribute to an Open Source Project on GitHub](https://egghead.io/series/how-to-contribute-to-an-open-source-project-on-github)
