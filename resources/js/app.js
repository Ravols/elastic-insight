import Vue from "vue";
import "flowbite";

//Pages
Vue.component(
  "page-all-indices",
  require("./components/pages/allIndices.vue").default
);

Vue.component(
  "page-all-aliases",
  require("./components/pages/allAliases.vue").default
);

const app = new Vue({
  el: "#app",
});
