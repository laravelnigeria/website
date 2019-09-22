<template>
  <section
    parallax
    id="home-jumbo"
    :class="`jumbotron jumbo with-bg-img ${clss || 'home'}`"
    :style="{backgroundImage: `url(${bg})`}"
  >
    <template v-if="videoSrc !== ''">
      <video
        muted
        id="bgvid"
        loop="loop"
        class="video"
        preload="metadata"
        autoplay="autoplay"
        v-html="videoSrc"
      ></video>
    </template>

    <div class="green-overlay">&nbsp;</div>
    <div class="container">
      <template v-if="hasEvent">
        <span class="event">
          {{ event['name'] }} &mdash;
          <span
            class="date"
          >{{ event['starts_at']["date"] | moment("MMM Do, YYYY") }}</span>
          <span class="hidden md:inline">
            <span class="separator">@</span>
            <span class="location">
              {{ event["venue"]["city"] }},
              {{ event['venue']['localized_country_name'] }}
            </span>
          </span>
        </span>
      </template>
      <h1>{{ message ? message : appConfig.welcome_message }}</h1>
      <template v-if="hasEvent">
        <a
          title="RSVP"
          target="_blank"
          rel="noopener noreferrer"
          :href="event['link']"
          class="btn block cta mx-auto no-underline"
          :disabled="!!!event['rsvp_open_offset']"
        >{{ !!!event['rsvp_open_offset'] ? 'RSVP not yet opened' : 'RSVP for the next event' }}</a>
        <span class="guests-count font-normal text-xs md:text-sm">
          <span
            class="block"
          >{{ event['yes_rsvp_count'] ? event['yes_rsvp_count'] : 0 }} people are attending the meetup.</span>
          <template v-if="ticketsAvailable <= 50">
            <span
              :class="['label', ticketsSoldOut ? 'bg-red' : 'bg-orange']"
            >{{ ticketsSoldOut ? 'Tickets sold out, Join the waitlist' : `Hurry, ${ticketsAvailable} spots left` }}</span>
          </template>
        </span>
      </template>
      <h2 class="mt-2 text-base md:text-xl" v-if="subMessage && !hasEvent">{{ subMessage }}</h2>
    </div>
  </section>
</template>

<script>
import isMobileDevice from "../utilities/mobileCheck";

export default {
  props: {
    clss: { type: String, required: false },
    bg: { type: String, required: true },
    event: { type: Object, require: false },
    message: { type: String, require: false },
    subMessage: { type: String, require: false },
    videos: { type: Boolean, required: false }
  },

  data() {
    return {
      videoSrc: "",
      hasEvent: !!this.event,
      appConfig: { ...window.lnConfig.app },
      ticketsAvailable: this.event ? parseInt(this.event.seats_left) : 0,
      ticketsSoldOut: this.event ? parseInt(this.event.seats_left) <= 0 : true
    };
  },

  mounted() {
    this.loadBackgroundVideo();
  },

  methods: {
    loadBackgroundVideo() {
      if (isMobileDevice() || !this.videos) {
        return;
      }

      const videos = this.appConfig.jumbo_videos;

      Object.keys(videos).map(type => {
        this.videoSrc += `<source src="${videos[type]}" type="${type}">\n`;
      });
    }
  }
};
</script>
