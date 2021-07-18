<template>
  <section v-if="team" id="slack-invite" class="section slack with-bg-img bg-fixed">
    <div class="white-overlay"></div>
    <div class="container relative">
      <div id="CommunityInviter"></div>
      <span class="link block text-center mt-2">
        <a
          target="_blank"
          rel="noopener noreferrer"
          title="Join our community on Slack"
          :href="`https://${team}.slack.com`"
          class="text-grey-darker text-xs md:text-sm no-underline hover:text-grey-darkest transition"
        >Go to Slack Channel</a>
      </span>
    </div>
  </section>
</template>

<style scoped>
section.slack {
  background-image: url(/img/community.jpg);
}
</style>


<script>
import snackbar from "../utilities/snackbar";

export default {
  props: {
    team: {
      type: String,
      required: true
    }
  },
  mounted() {
    this.loadCommunityInviterScript();
  },
  methods: {
    loadCommunityInviterScript() {
      window.CommunityInviterAsyncInit = () => {
        CommunityInviter.init({ app_url: "join", team_id: this.team });
      };

      !(function(doc, tag, id) {
        let script;
        let parent = doc.getElementsByTagName(tag)[0];

        if (!doc.getElementById(id)) {
          script = doc.createElement(tag);
          script.id = id;
          script.src = "https://communityinviter.com/js/communityinviter.js";
          parent.parentNode.insertBefore(script, parent);
        }
      })(document, "script", "Community_Inviter");
    }
  }
};
</script>
