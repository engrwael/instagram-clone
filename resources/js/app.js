import { createApp } from "vue";

require("./bootstrap");

const app = createApp({});

app.component(
    "follow-button",
    require("./components/FollowButton.vue").default
);

app.mount("#app");
