import Schedule from '@/api/Schedule';

const state = {
  items: [],
  item: null,
  list: [],
  message: null,
};

const getters = {
  items(state) {
    return state.items;
  },
  list(state) {
    return state.list;
  },
  item(state) {
    return state.item;
  },
  message(state) {
    return state.message;
  },
};

const actions = {
  async index({ commit },payload) {
    try {
      const data = await Schedule.index(payload);
      await commit('SET_ITEMS', data.data);
      return true;
    } catch (e) {
      throw new Error(e);
    }
  },
  async list({ commit }) {
    try {
      const data = await Schedule.list();
      await commit('SET_LIST', data.data);
      return true;
    } catch (e) {
      throw new Error(e);
    }
  },
  async create({ commit }, payload) {
    try {
      const data = await Schedule.create(payload);
      await commit('SET_MESSAGE', data);
      return true;
    } catch (e) {
      throw new Error(e);
    }
  },
  async update({ commit }, payload) {
    try {
      const data = await Schedule.update(payload);
      await commit('SET_MESSAGE', data);
      return true;
    } catch (e) {
      throw new Error(e);
    }
  },
  async delete({ commit }, id) {
    try {
      const data = await Schedule.delete(id);
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
  SET_LIST(state, payload) {
    state.list = payload;
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
