<template>
    <b-dropdown class="m-md-2" right no-caret>
        <template v-if="message === null" slot="button-content">
            <i class="far fa-bell"></i> ({{ userInfo.confirmations.length }})
        </template>
        <template v-else slot="button-content">
            <i class="far fa-bell"></i> ({{ userInfo.confirmations.length + 1}})
        </template>
        <b-dropdown-item v-if="message !== null" :href="`${hostName}/admin/confirmation/${message.id}`">{{ message.order.name }}</b-dropdown-item>
        <b-dropdown-item v-for="confirmation in userInfo.confirmations" :key="confirmation.id" :href="`${hostName}/admin/confirmation/${confirmation.id}`">{{ confirmation.order.name }}</b-dropdown-item>
    </b-dropdown>
</template>

<script>

export default {
  data() {
    return {
        showMenu: false,
        list_messages: [],
        message: null,
        userInfo: {
            confirmations: []
        },
        hostName: null
    };
  },
  async created() {
        this.hostName = `https://${window.location.hostname}`
        await this.getUserInfo()
        window.Echo.private(`notification-${this.userInfo.data.id}`)
            .listen('NotificationOrder', (e) => {
                this.message = e.confirmation
            })
  },
  methods: {
    toggleShow: function() {
	    this.showMenu = !this.showMenu;
    },
    async getUserInfo() {
        await axios.get('/user')
            .then(response => {
                this.userInfo = response.data
            })
            .catch(error => {
                console.log(error)
            })
    }

  }
};
</script>

<style lang="scss" scoped>
</style>
