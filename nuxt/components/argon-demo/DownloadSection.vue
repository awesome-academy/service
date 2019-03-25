<template>
  <section class="section section-lg">
    <div class="container">
      <div class="row row-grid justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="display-3">
            {{ $t('home.download_section.gift.text1') }}
            <span class="text-success">{{ $t('home.download_section.gift.text2') }} <span class="text-warning">{{ $t('home.download_section.gift.text3') }}</span>{{ $t('home.download_section.gift.text4') }}<span class="text-warning">{{ $t('home.download_section.gift.text5') }}</span></span>
          </h2>
          <p
            class="lead"
          >{{ $t('home.download_section.gift.text6') }}</p>
          <div class="btn-wrapper">
            <nuxt-link
              to="/abc"
              class="btn btn-primary mb-3 mb-sm-0"
            >
              <span class="btn-inner--icon">
                <i class="fa fa-mouse-pointer mr-2"></i>
              </span>
              <span class="nav-link-inner--text">{{ $t('navbar.order_now.type') }}</span>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {}
</script>
<style>
</style>
