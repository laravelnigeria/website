<template>
  <form class="font-sans" novalidate="true" method="post" action="/api/contact" @submit="sendMsg">
    <h2 class="text-4xl md:text-5xl font-normal text-grey-darker mb-2">Contact us</h2>
    <h4 class="text-xl md:text-2xl font-light text-grey-dark leading-normal">
      Need to contact us about something, you can use the contact
      form below.
    </h4>
    <div class="flex flex-col md:flex-row mt-10 md:mt-20 md:mr-5">
      <div class="flex flex-1 flex-col mb-8">
        <input
          required
          type="text"
          v-model="name"
          placeholder="Full Name"
          class="flex-1 bg-grey-lightest p-5 mb-2 border-b focus:outline-none text-base"
        >
        <span class="text-sm text-red-dark px-1">{{ errors.name || ' ' }}</span>
      </div>

      <div class="flex flex-1 flex-col mb-8 md:ml-5">
        <input
          required
          type="email"
          v-model="email"
          placeholder="Email Address"
          class="flex-1 bg-grey-lightest p-5 border-b mb-2 focus:outline-none text-base"
        >
        <span class="text-sm text-red-dark px-1">{{ errors.email || ' ' }}</span>
      </div>
    </div>

    <div class="flex flex-1 flex-col mb-10">
      <textarea
        required
        rows="10"
        cols="30"
        v-model="message"
        placeholder="Enter message"
        class="bg-grey-lightest p-5 border-b mb-2 focus:outline-none text-base"
      ></textarea>
      <span class="text-sm text-red-dark px-1">{{ errors.message || ' ' }}</span>
    </div>
    <input
      type="submit"
      value="Submit"
      :disabled="!(email && name && message)"
      class="standard-button w-1/4 block focus:outline-none"
    >
  </form>
</template>

<script>
import axios from "axios";
import validEmail from "../utilities/validEmail";

export default {
  name: "contact-form",
  data() {
    return {
      errors: {},
      name: null,
      email: null,
      message: null
    };
  },
  methods: {
    sendMsg(e) {
      e.preventDefault();

      const name = this.name ? this.name.trim() : "";
      if (!name || name.length <= 5 || name.length > 100) {
        Vue.set(this.errors, "name", "Name must be between 5 and 100 characters long");
      }

      const email = this.email ? this.email.trim() : "";
      if (!email || !validEmail(email)) {
        Vue.set(this.errors, "email", "The supplied email address is invalid");
      }

      const message = this.message ? this.message.trim() : "";
      if (!message || message.length < 100 || message.length > 2000) {
        Vue.set(this.errors, "message", "Message must be between 100 and 2000 characters");
      }

      // If error exists show error message else send the message
      Object.keys(this.errors).length
        ? this.errorMsg()
        : this.actuallySendMessage(name, email, message);
    },

    actuallySendMessage(name, email, message) {
      axios
        .post("/api/contact", { name, email, message })
        .then(res => {
          if (res.status !== 200 || res.data.success !== true) {
            return this.errorMsg();
          }

          alert("Your message has been sent successfully.", "success");
          setTimeout(() => toggleContactModal(), 2000);
        })
        .catch(e => this.errorMsg());
    },

    errorMsg() {
      alert("An error occurred while trying to send message.");
    }
  }
};
</script>
