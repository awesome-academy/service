<template>
    <div>
        <b-dropdown class="m-md-2" right variant="primary" no-caret>
            <template v-if="message === null" slot="button-content">
                <i class="far fa-bell"></i> ({{ userInfo.confirmations.length }})
            </template>
            <template v-else slot="button-content">
                <i class="far fa-bell"></i> ({{ userInfo.confirmations.length + 1}})
            </template>
            <b-dropdown-item v-if="message !== null" :href="`${hostName}/admin/confirmation/${message.id}`">{{ message.order.name }}</b-dropdown-item>
            <b-dropdown-item v-for="confirmation in userInfo.confirmations" :key="confirmation.id" :href="`${hostName}/admin/confirmation/${confirmation.id}`">{{ confirmation.order.name }}</b-dropdown-item>
        </b-dropdown>

        <b-dropdown v-if="userInfo.data.name !== null" class="m-md-2" right :text="userInfo.data.name">
            <b-dropdown-item-button  @click="logout">
                {{ logoutTitle }}
            </b-dropdown-item-button>
        </b-dropdown>
    </div>
</template>

<script>

export default {
  data() {
    return {
        showMenu: false,
        list_messages: [],
        message: null,
        userInfo: {
            confirmations: [],
            data: {}
        },
        hostName: null,
        logoutTitle: 'Log out'
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
    },
    async logout() {
        await axios.post('/logout')
        window.location.reload()
    }

  }
};
</script>

<style lang="scss" scoped>
</style>
