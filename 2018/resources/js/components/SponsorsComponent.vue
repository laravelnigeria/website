<template>
  <section class="section sponsors">
    <div class="container">
      <div class="title-subtitle">
        <h2>Meet the Sponsors</h2>
        <h4 class="subtitle">The companies that help make our community a success.</h4>
      </div>
      <carousel
        :items="4"
        :nav="false"
        :loop="true"
        class="mb-32"
        :dots="false"
        :autoplay="true"
        :responsive="{ 0: { items: 1 }, 600: { items: 3 }, 768: { items: 4 } }"
      >
        <div class="text-center" v-for="sponsor in sponsors">
          <a
            target="_blank"
            class="inline-block"
            :href="sponsor.link"
            :title="sponsor.name"
            rel="noopener noreferrer"
          >
            <img :src="sponsor.logo" class="sponsor-img" :alt="sponsor.name">
          </a>
        </div>
      </carousel>
      <a
        v-on:click="toggleContactModal"
        class="standard-button block w-64 mx-auto cursor-pointer"
      >Sponsor us</a>
    </div>
  </section>
</template>

<style scoped>
.owl-carousel .owl-item .sponsor-img {
  width: auto;
}
</style>


<script>
import carousel from "vue-owl-carousel";

export default {
  props: {
    sponsors: { type: Array, required: true }
  },
  data() {
    return { toggleContactModal };
  },
  components: { carousel }
};
</script>

