<template>
  <section class="section learn" id="learning-track">
    <div class="container">
      <div class="title-subtitle">
        <h2>Learn Laravel</h2>
        <h4 class="subtitle">Enjoy plenty educational resources to start off with Laravel and PHP.</h4>
      </div>
      <div class="mt-10" v-if="!tracks">
        <img src="/img/under-construction.svg" class="h-32 md:h-64 block mx-auto">
        <p class="text-sm text-grey-dark md:w-1/2 mx-auto text-center leading-normal mt-10">
          We are currently working on this. Meanwhile, you can take amazing courses at
          <a
            target="_blank"
            rel="noopener noreferrer"
            href="https://laracasts.com"
            class="text-primary no-underline hover:underline"
          >Laracasts</a>.
        </p>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    tracks: { required: true }
  }
};
</script>
