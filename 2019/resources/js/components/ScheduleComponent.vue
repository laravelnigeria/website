<template>
  <div
    :data-wow-delay="delay || '0.1s'"
    class="schedule wow fadeInUp"
  >
    <div class="schedule-wrap">
      <div class="time">
        <span>{{ (duration ? duration.start : 'Not Set') }}</span>
        <div
          class="duration"
          v-if="duration"
        ></div>
        <span
          class="to"
          v-if="duration"
        >{{ duration.end }}</span>
      </div>
      <div
        class="activity"
        :class="grey ? 'grey' : ''"
      >
        <div class="random-activity">
          <div class="speaker-session">
            <span class="activity-title">
              {{ details ? details.title : 'Not yet set' }}
            </span>
            <span
              class="overview"
              v-if="details && details.overview"
            >
              {{ details.overview }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "schedule",
  props: ["grey", "delay", "duration", "details"]
};
</script>
