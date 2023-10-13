<template>
  <div>Page for all indices</div>
</template>

<script>
export default {
  mounted() {
    this.$http.get("/elastic-insight/indicies").then((res) => {
      console.log(res.data);
    });
  },
};
</script>

<style lang="scss" scoped>
</style>
