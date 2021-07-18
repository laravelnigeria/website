<template>
  <section class="community">
    <div class="community-wrap">
      <div class="community-img">
        <div class="wrap">
          <div class="community-invite">
            <span class="join wow fadeInUp">
              Join the Slack community
            </span>
            <span
              data-wow-delay="0.1s"
              class="text wow fadeInUp"
            >
              Join the Laravel Nigeria’s Slack channel and stay updated on new releases and
              features, guides, and case studies.
            </span>
            <form
              @submit.prevent="sendInvite"
              class="wow fadeInUp"
              data-wow-delay="0.2s"
            >
              <div class="input-group mb-3">
                <input
                  type="email"
                  v-model="email"
                  class="form-control"
                  placeholder="Email address"
                  aria-describedby="button-addon2"
                >
                <div class="input-group-append">
                  <button
                    type="submit"
                    class="btn btn-secondary rounded-pill text-uppercase"
                  >
                    Get my invite
                  </button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
.community-wrap {
  .wrap {
    z-index: 2;
    height: 100%;
    display: flex;
    overflow: hidden;
    background: rgba(1, 138, 138, 0.9);
    padding: 5rem 0;
    @media only screen and (min-width: 750px) {
      padding: 150px 0;
    }
    .community-invite {
      margin: auto;
      display: block;
      .join,
      .text {
        color: #ffffff;
        display: block;
        text-align: center;
      }
      .join {
        font-size: 27px;
        font-weight: 600;
        margin-bottom: 10px;
      }
      .text {
        font-size: 14px;
        margin: 0 auto 2rem;
        width: 70%;
        line-height: 1.7;
        @media only screen and (min-width: 768px) {
          width: 65%;
        }
      }
      .input-group {
        width: 90%;
        margin: 3rem auto 0;
        border-radius: 100px;
        border: 1px solid transparent;
        padding: 2px;
        background-color: rgba(255, 255, 255, 0.3);
        @media only screen and (min-width: 768px) {
          width: 65%;
        }
        & > .form-control {
          font-size: 14px;
          color: #fff;
          padding: 1.5rem;
          border-radius: 100px;
          border: none;
          background-color: transparent;
          &:focus {
            outline: none;
            border: none;
            box-shadow: none;
          }
          &::placeholder {
            color: #ffffff;
          }
        }
        .input-group-append button {
          padding: 0.375rem 1.75rem;
          background-color: #ffffff;
          color: #01baba;
          font-size: 13px;
          font-weight: 600;
          border: 0px;
          transition: background-color 0.3s ease-in-out;
          &:hover {
            background-color: rgba(255, 255, 255, 0.9);
          }
          @media only screen and (min-width: 750px) {
            padding: 0.375rem 2.75rem;
          }
        }
      }
    }
  }
  .community-img {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-image: url("/img/community.jpg");
  }
}
</style>

<script>
import swal from "sweetalert";

export default {
  name: "slack-invite",
  data() {
    return { email: "" };
  },
  methods: {
    sendInvite() {
      axios.post("api/slack/invite", { email: this.email }).then(res => {
        let message;
        const successful = !!res.data.ok || false;
        const error = res.data.error || false;

        if (successful) {
          this.email = "";
        }

        const type = successful ? "success" : "error";
        const title = successful
          ? "Invitation sent"
          : "Oops! Something went wrong";

        if (error === "already_in_team" || error === "already_invited") {
          this.email = "";
          message = "You have already been invited to the team.";
        } else {
          message = successful
            ? "Check your email for the invitation email"
            : "Something went wrong while attempting to send the email. Try again.";
        }

        swal(title, message, type);
      });
    }
  }
};
</script>
