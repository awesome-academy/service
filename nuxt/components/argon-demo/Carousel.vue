<template>
  <div>
    <b-carousel id="carousel1" controls indicators>
      <!-- Text slides with image -->
      <b-carousel-slide :img-src="process.env.NUXT_CAROUSEL_FIST">
        <h1 class="text-carousel">{{ $t('home.carousel.slide1') }}</h1>
      </b-carousel-slide>
      <b-carousel-slide :img-src="process.env.NUXT_CAROUSEL_SECOND">
        <h1 class="text-carousel">{{ $t('home.carousel.slide2') }}</h1>
      </b-carousel-slide>
      <b-carousel-slide :img-src="process.env.NUXT_CAROUSEL_THIRD">
        <h1 class="text-carousel">{{ $t('home.carousel.slide3') }}</h1>
      </b-carousel-slide>
      <b-carousel-slide :img-src="process.env.NUXT_CAROUSEL_FOURTH">
        <h1 class="text-carousel">{{ $t('home.carousel.slide4') }}</h1>
      </b-carousel-slide>
    </b-carousel>
  </div>
</template>
<script>
export default {}
</script>
<style lang="scss" scoped>
@import '~/assets/scss/carousel.scss';
</style>
