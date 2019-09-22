<template>
  <section class="section speak with-bg-img" id="speak">
    <div class="green-overlay"></div>
    <div class="container">
      <div class="title-subtitle">
        <h2>Speaking at {{ appConfig.name }}</h2>
        <h4 class="subtitle">We always like to hear from first-time and seasoned speakers alike.</h4>
      </div>
      <a
        target="_blank"
        v-if="opened"
        rel="noopener noreferrer"
        :href="appConfig.cfp_link"
        class="standard-button white block w-64 mx-auto"
        :title="`Speak at the next ${appConfig.name} meetup`"
      >Apply to Speak</a>
      <a v-else disabled class="standard-button white block w-64 mx-auto">CFP is Currently Closed</a>
    </div>
  </section>
</template>

<style scoped>
section.speak {
  background-image: url(/img/speaker.jpg);
}

section.speak >>> h2,
section.speak >>> h4 {
  color: #fff;
}
</style>


<script>
export default {
  props: {
    opened: { type: Boolean, required: false }
  },
  data() {
    return {
      appConfig: { ...window.lnConfig.app }
    };
  }
};
</script>

