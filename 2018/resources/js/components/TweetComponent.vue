<template>
  <section class="section tweets bg-blue-twitter text-center" id="ln-twitter">
    <div class="container">
      <template v-if="Object.keys(tweet).length > 0">
        <div class="mb-3">
          <img :src="tweet.user_avatar" class="border-2 border-white rounded-full w-16 h-16">
        </div>
        <a
          target="_blank"
          rel="noopener noreferrer"
          :href="tweet.user_profile_link"
          class="inline-block text-white text-base mb-3 no-underline"
        >{{ `${tweet.user_name} (@${tweet.user_screen_name})` }}</a>
        <div class="tweet mb-12 md:mx-auto md:w-3/4">
          <span
            v-html="tweet.text"
            class="text-xl md:text-2xl text-white font-light block leading-normal"
          ></span>
        </div>
        <template v-if="twitterConfig.share_text">
          <a
            target="_blank"
            rel="noopener noreferrer"
            class="btn btn-block btn-lg"
            :title="`Tweet about your ${appConfig.name} experience.`"
            :href="`https://twitter.com/intent/tweet?url=${appConfig.url}&amp;text=${twitterConfig.share_text}&amp;hashtags=${twitterConfig.share_hashtags}&amp;related=${twitterConfig.handle}`"
          >
            <svg class="icon">
              <use xlink:href="/img/sprite.svg#icon-twitter-nude"></use>
            </svg>
            <span>Share your Experience</span>
          </a>
        </template>
      </template>
      <template v-else>
        <img src="/img/file-search.svg" class="h-32 md:h-64 block mx-auto">
        <p class="text-sm text-white md:w-1/2 mx-auto text-center leading-normal mt-10">
          Unable to find tweets at the moment.
          <span
            v-if="twitterConfig.handle"
          >You can still follow us on Twitter by using the button below.</span>
        </p>
      </template>
      <template v-if="twitterConfig.handle">
        <a
          data-show-count="false"
          class="twitter-follow-button"
          :href="`https://twitter.com/${twitterConfig.handle}`"
        >{{ `Follow @${twitterConfig.handle}` }}</a>
      </template>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    tweet: { required: true }
  },
  data() {
    const { name, url, twitter: twitterConfig } = window.lnConfig.app;

    return {
      twitterConfig,
      appConfig: { name, url }
    };
  }
};
</script>
