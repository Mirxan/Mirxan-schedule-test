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
      items: 'room/items',
    }),
  },
  methods: {
    ...mapActions({
      index: 'room/index',
      create: 'room/create',
      update: 'room/update',
      delete: 'room/delete',
    }),
  },
};