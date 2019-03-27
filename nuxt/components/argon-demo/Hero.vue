<template>
  <section class="section-hero section-shaped my-0">
    <div class="shape shape-style-1 shape-primary">
      <span class="span-150"></span>
      <span class="span-50"></span>
      <span class="span-50"></span>
      <span class="span-75"></span>
      <span class="span-100"></span>
      <span class="span-75"></span>
      <span class="span-50"></span>
      <span class="span-100"></span>
      <span class="span-50"></span>
      <span class="span-100"></span>
    </div>
    <div class="container shape-container d-flex align-items-center">
      <div class="col px-0">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-7 text-center pt-lg">
            <img :src="banner" class="img-fluid">
            <p class="lead text-white mt-4 mb-5">
              <slot></slot>
            </p>
          </div>
        </div>
        <tabs-section></tabs-section>
        <div class="row align-items-center justify-content-around stars-and-coded">
          <div class="col-sm-4">
            <span class="text-white alpha-7 ml-3">{{ $t('home.hero.rate') }}</span>
            <a
              href="#"
              target="_blank"
              title="Support us on Facebook"
            >
              <img
                :src="facebook"
                class="facebook-svg"
              >
            </a>
          </div>
          <div class="col-sm-4 mt-4 mt-sm-0 text-right">
            <span class="text-white alpha-7">{{ $t('home.hero.call') }}</span>
            <a href="#" target="_blank">
              <img :src="phone" class="ml-3 phone-image">
            </a>
            <span class="text-white alpha-7">{{ phoneNumber }}</span>
          </div>
        </div>
      </div>

    </div>
  </section>
</template>
<script>
import TabsSection from './JavascriptComponents/TabsSection'

export default {
  components: {
    TabsSection
  },
  data() {
    return {
      banner: process.env.NUXT_BANNER_IMG,
      facebook: process.env.NUXT_FACEBOOK_SVG,
      phone: process.env.NUXT_PHONE_IMG,
      phoneNumber: process.env.NUXT_PHONE_NUMBER
    }
  }
}
</script>
<style lang="scss" scoped>
@import '~/assets/scss/hero.scss';
</style>
