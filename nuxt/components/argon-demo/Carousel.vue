<template>
  <div>
    <b-carousel id="carousel1" controls indicators>
      <!-- Text slides with image -->
      <b-carousel-slide :img-src="first">
        <h1 class="text-carousel">{{ $t('home.carousel.slide1') }}</h1>
      </b-carousel-slide>
      <b-carousel-slide :img-src="second">
        <h1 class="text-carousel">{{ $t('home.carousel.slide2') }}</h1>
      </b-carousel-slide>
      <b-carousel-slide :img-src="third">
        <h1 class="text-carousel">{{ $t('home.carousel.slide3') }}</h1>
      </b-carousel-slide>
      <b-carousel-slide :img-src="fourth">
        <h1 class="text-carousel">{{ $t('home.carousel.slide4') }}</h1>
      </b-carousel-slide>
    </b-carousel>
  </div>
</template>
<script>
export default {
  data() {
    return {
      first: process.env.NUXT_CAROUSEL_FIST,
      second: process.env.NUXT_CAROUSEL_SECOND,
      third: process.env.NUXT_CAROUSEL_THIRD,
      fourth: process.env.NUXT_CAROUSEL_FOURTH
    }
  }
}
</script>
<style lang="scss" scoped>
@import '~/assets/scss/carousel.scss';
</style>
