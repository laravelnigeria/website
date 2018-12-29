<template>
  <section class="section subscribe">
    <div class="container">
      <div class="title-subtitle">
        <h2>Stay up to date</h2>
        <h4 class="subtitle">Want us to email you occassionally with some Laravel News?</h4>
        <div class="mt-10">
          <form
            method="post"
            novalidate="true"
            target="popupwindow"
            v-on:submit="popupConfirmation"
            :action="`https://tinyletter.com/${username}`"
          >
            <input type="hidden" value="1" name="embed">
            <div class="container flex justify-center">
              <input
                type="email"
                name="email"
                id="tlemail"
                v-model="email"
                placeholder="Enter email address"
                class="transition focus:outline-none focus:bg-grey-lighter bg-grey-lightest text-black py-3 px-5 text-base max-w-xs w-full rounded-l-lg"
              >
              <input
                type="submit"
                value="Subscribe"
                :disabled="email === ''"
                class="standard-button focus:outline-none"
                style="border-radius: 0px .5rem .5rem 0px;"
              >
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
section.section.subscribe {
  padding-top: 6rem;
  padding-bottom: 6rem;
}
section.section.subscribe .title-subtitle {
  margin-bottom: 0;
}
</style>

<script>
import validEmail from "../utilities/validEmail";

export default {
  props: {
    username: { type: String, required: true }
  },
  data() {
    return { email: "" };
  },
  methods: {
    popupConfirmation(e) {
      if (!validEmail(this.email)) {
        alert("The supplied email address is invalid.");
        e.preventDefault();
        return false;
      }

      window.open(
        "https://tinyletter.com/" + this.username,
        "popupwindow",
        "scrollbars=yes,width=800,height=600"
      );

      this.email = "";

      return true;
    }
  }
};
</script>

