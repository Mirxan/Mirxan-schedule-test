import { mapGetters, mapActions } from 'vuex';
export default {
    components:{},
    data() {
      return{}
    },
    async mounted() {
      await this.index()
    },
    computed: {
      ...mapGetters({
        items: 'schedule/items',
      }),
    },
    methods: {
      ...mapActions({
        index: 'schedule/index',
        create: 'schedule/create',
        update: 'schedule/update',
        delete: 'schedule/delete',
      }),
    },
}