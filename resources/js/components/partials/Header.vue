<template>
  <div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <ul class="list-inline">
              <li>
                  <router-link :to="{name:'home'}">HOME</router-link>
              </li>
              <li>
                  <router-link :to="{name:'about'}">ABOUT</router-link>
              </li>
              <li>
                  <router-link :to="{name:'blog'}">BLOG</router-link>
              </li>

          </ul>
      </nav>
  </div>
</template>

<script>

export default {
    name:'Header'
}
</script>

<style>

</style>