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
      items: 'group/items',
    }),
  },
  methods: {
    ...mapActions({
      index: 'group/index',
      create: 'group/create',
      update: 'group/update',
      delete: 'group/delete',
    }),
  },
};