<template>
  <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead
        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
      >
        <tr>
          <th scope="col" class="px-6 py-3">Index Name</th>
          <th scope="col" class="px-6 py-3">Health</th>
          <th scope="col" class="px-6 py-3">Status</th>
          <th scope="col" class="px-6 py-3">UUID</th>
          <th scope="col" class="px-6 py-3">Document Count</th>
          <!-- <th scope="col" class="px-6 py-3">Sizes</th> -->
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="index in indices"
          :key="index.uuid"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
        >
          <th
            scope="row"
            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
          >
            {{ index.index }}
          </th>
          <td class="px-6 py-4">{{ index.health }}</td>
          <td class="px-6 py-4">{{ index.status }}</td>
          <td class="px-6 py-4">{{ index.uuid }}</td>
          <td class="px-6 py-4">{{ index["docs.count"] }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      indices: [],
    };
  },
  mounted() {
    this.$http.get("indices").then((res) => {
      this.indices = res.data.data;
    });
  },
};
</script>

<style lang="scss" scoped>
</style>
