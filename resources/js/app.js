import Vue from "vue";
import "flowbite";
import axios from "axios";

axios.defaults.baseURL = "/elastic-insight/api/";
Vue.prototype.$http = axios;
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
