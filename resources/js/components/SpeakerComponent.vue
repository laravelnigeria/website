<template>
  <div class="mb-10 md:mb-12 flex flex-col md:flex-row">
    <div class="clearfix md:mr-3 w-full md:w-1/3 mb-2 md:mb-0 flex md:flex-row-reverse">
      <div class="photo" :style="{ backgroundImage: `url(${this.talk.user.profile.avatar})` }"></div>
      <ul class="list-reset md:pr-2 pl-3 md:pl-0 md:text-right">
        <li class="name">
          <span
            class="text-grey-darker font-semibold text-base uppercase leading-none"
          >{{ this.talk.user.profile.fullName }}</span>
        </li>
        <li class="mb-2 md:mb-3">
          <span
            class="text-grey-dark font-normal text-xs uppercase"
          >{{ this.talk.user.profile.job }}</span>
        </li>
        <li class="social" v-if="Object.keys(this.talk.user.profile.social_links).length > 0">
          <a
            :href="link"
            target="_blank"
            :title="network"
            rel="noopener noreferrer"
            class="mr-1 no-underline inline-block"
            v-for="(link, network) in this.talk.user.profile.social_links"
          >
            <svg class="bg-white">
              <use v-bind:xlink:href="'/img/sprite.svg#icon-' + network"></use>
            </svg>
          </a>
        </li>
      </ul>
    </div>
    <div class="w-full md:ml-3 md:w-2/3 topic-wrapper">
      <div class="md:w-3/4">
        <h3 class="text-grey-darker font-semibold mb-1">{{ talk.topic }}</h3>
        <div v-html="talk.overviewHtml" class="leading-normal text-sm md:text-base text-grey-dark"></div>
        <div class="links mt-4">
          <ul class="list-reset">
            <li v-if="talk.video_url" class="inline-block mr-2 text-sm transition">
              <a
                target="_blank"
                rel="noopener noreferrer"
                :href="talk.video_url"
                :title="`Video of ${talk.topic}`"
                class="text-grey-dark hover:text-grey-darker no-underline"
              >
                <i class="fa fa-video-camera"></i>
                <span class="ml-1 uppercase font-semibold">Watch Video</span>
              </a>
            </li>
            <li v-if="talk.slides_url" class="inline-block text-sm transition">
              <a
                target="_blank"
                rel="noopener noreferrer"
                :href="talk.slides_url"
                :title="`Slides of ${talk.topic}`"
                class="text-grey-dark hover:text-grey-darker no-underline"
              >
                <i class="fa fa-picture-o"></i>
                <span class="ml-1 uppercase font-semibold">See Slides</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.photo {
  height: 80px;
  width: 80px;
  border-radius: 10px;
  background-size: cover;
  background-position: center;
}
.social svg {
  width: 24px;
  height: 24px;
}
.topic-wrapper > h3 {
  line-height: 1.2;
}
.topic-wrapper > div >>> p {
  margin-bottom: 10px;
}
.topic-wrapper > div >>> p:last-child {
  margin-bottom: 0;
}
</style>


<script>
export default {
  props: {
    talk: {
      type: Object,
      required: true
    }
  }
};
</script>
