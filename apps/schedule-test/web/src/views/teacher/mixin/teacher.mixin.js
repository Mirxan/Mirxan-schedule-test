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
      items: 'teacher/items',
    }),
  },
  methods: {
    ...mapActions({
      index: 'teacher/index',
      create: 'teacher/create',
      update: 'teacher/update',
      delete: 'teacher/delete',
    }),
  },
};