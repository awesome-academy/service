<template>
  <div>
    <hero>{{ $t('home.slot') }}</hero>
    <carousel></carousel>
    <download-section></download-section>

  </div>
</template>
<script>
import Hero from '~/components/argon-demo/Hero'
import Carousel from '~/components/argon-demo/Carousel'
import DownloadSection from '~/components/argon-demo/DownloadSection'
import { mapState } from 'vuex'

export default {
  layout: 'other',
  components: {
    Hero,
    Carousel,
    DownloadSection
  },
  data() {
    return {}
  },
  head () {
    return {
      title: 'Home Argon',
      meta: [
        { name: 'Home Argon', content: 'Best place to order party' }
      ]
    }
  },
  computed: {
    ...mapState('order', {
      message: state => state.message
    })
  },
  watch: {},
  mounted() {
  },
  created() {},
  methods: {
  }
}
</script>
<style lang="scss">
</style>
