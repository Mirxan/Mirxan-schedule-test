import Group from '@/api/Group';

const state = {
  items: [],
  item: null,
  message: null,
};

const getters = {
  items(state) {
    return state.items;
  },
  item(state) {
    return state.item;
  },
  message(state) {
    return state.message;
  },
};

const actions = {
  async index({ commit }) {
    try {
      const data = await Group.index();
      await commit('SET_ITEMS', data.data);
      return true;
    } catch (e) {
      throw new Error(e);
    }
  },
  async create({ commit }, payload) {
    try {
      const data = await Group.create(payload);
      await commit('SET_MESSAGE', data);
      return true;
    } catch (e) {
      throw new Error(e);
    }
  },
  async update({ commit }, payload) {
    try {
      const data = await Group.update(payload);
      await commit('SET_MESSAGE', data);
      return true;
    } catch (e) {
      throw new Error(e);
    }
  },
  async delete({ commit }, id) {
    try {
      const data = await Group.delete(id);
      await commit('SET_MESSAGE', data);
      return true;
    } catch (e) {}
  },
};

const mutations = {
  SET_ITEMS(state, payload) {
    state.items = payload;
  },
  SET_ITEM(state, payload) {
    state.item = payload;
  },
  SET_MESSAGE(state, message) {
    state.message = message;
  },
};

export default {
  state,
  actions,
  mutations,
  getters,
};
