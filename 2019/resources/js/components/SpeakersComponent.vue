<template>
  <section class="speakers">
    <div class="speakers-wrap">
      <div class="container">
        <div class="title">
          <h2 class="title-text mt-2">Speakers</h2>
          <div class="title-div"></div>
        </div>

        <div
          class="row no-row"
          v-if="speakers !== null"
        >
          <div class="col-12 col-lg-8">
            <div class="row no-row">
              <div
                class="col-6 col-lg-4 pic-col wow fadeInUp"
                v-for="speaker in speakers"
                :key="speaker.id"
                @click.prevent="setSelectedSpeaker(speaker, true)"
              >
                <div
                  class="speaker-img"
                  :class="{active: selectedSpeaker.id === speaker.id}"
                  :style="{ backgroundImage: `url('${speaker.image || '/img/no-photo.png'}')` }"
                ></div>
              </div>
            </div>
          </div>

          <div
            :class="{active: infoModalActivated}"
            class="col-12 col-lg-4 no-col info-background"
          >
            <div class="row row-two no-row">
              <div class="col-two col-12">
                <div
                  class="information wow fadeIn"
                  data-wow-delay="0.5s"
                >
                  <div class="meta">
                    <span
                      class="number"
                      id="number"
                    >{{selectedSpeakerIndex}} / {{totalSpeakers}}</span>
                    <div
                      class="close-btn"
                      @click.prevent="toggleInformationModal()"
                    >
                      <i class="fas fa-times"></i>
                      <span>Close</span>
                    </div>
                  </div>
                  <div class="speaker-info">
                    <span class="name">{{ this.selectedSpeaker.name }}</span>
                    <span class="description">
                      {{ this.selectedSpeaker.job }}
                    </span>
                    <hr style="border-color: rgba(255,255,255,.5)">
                    <h3 class="talk-title">{{ this.selectedSpeaker.title }}</h3>
                    <p class="abstract">{{ this.selectedSpeaker.abstract }}</p>
                  </div>
                  <div class="social-media">
                    <div class="social-wraps">
                      <a
                        class="speaker-link wow fadeIn"
                        data-wow-delay="0.8s"
                        id="speaker-github"
                        v-if="selectedSpeaker.social.github"
                        :href="`https://github.com/${selectedSpeaker.social.github}`"
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        <div
                          class="socials git-hub"
                          style="background-image: url(img/github.png);"
                        ></div>
                      </a>
                      <a
                        class="speaker-link wow fadeIn"
                        data-wow-delay="1s"
                        id="speaker-twitter"
                        v-if="selectedSpeaker.social.twitter"
                        :href="`https://github.com/${selectedSpeaker.social.twitter}`"
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        <div
                          class="socials twitter"
                          style="background-image: url(img/twitter.png);"
                        ></div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-5">
          <a
            class="btn btn-lg btn-primary"
            href="https://laravelnigeria.typeform.com/to/rosG3K"
          >Submit Talk</a>
          <a class="typeform-share button" href="https://laravelnigeria.typeform.com/to/rosG3K" data-mode="popup" style="display:inline-block;text-decoration:none;background-color:#00BABA;color:white;cursor:pointer;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:50px;text-align:center;margin:0;height:50px;padding:0px 33px;border-radius:25px;max-width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:bold;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;" data-hide-footer=true data-submit-close-delay="1" target="_blank">Submit Talk </a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "speakers",
  data() {
    return {
      speakers: null,
      totalSpeakers: 0,
      selectedSpeaker: null,
      selectedSpeakerIndex: 0,
      infoModalActivated: false
    };
  },
  mounted() {
    window.axios.get("api/speakers").then(res => {
      this.speakers = res.data;
      this.totalSpeakers = this.addZeroOrNah(this.speakers.length);

      this.setSelectedSpeaker(this.speakers[0]);
    });
  },
  methods: {
    addZeroOrNah: num => (num <= 9 ? `0${num}` : num),
    setSelectedSpeaker(speaker, toggleInformationModal = false) {
      if (!speaker || !speaker.id) {
        return;
      }

      this.selectedSpeaker = speaker;
      this.selectedSpeakerIndex = this.addZeroOrNah(
        _.findIndex(this.speakers, { id: speaker.id }) + 1
      );

      if (toggleInformationModal) {
        this.toggleInformationModal(speaker);
      }
    },
    toggleInformationModal(speaker) {
      return (this.infoModalActivated = !!speaker);
    }
  }
};
</script>
