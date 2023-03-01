import request from '@/utils/request';
class Group {

  static index() {
    return request({
      url: 'group',
      method: 'get',
    });
  }

  static create(params) {
    return request({
      url: 'group',
      method: 'post',
      data: params,
    });
  }

  static update(params) {
    return request({
      url: `group/${params.id}`,
      method: 'put',
      data: params,
    });
  }

  static delete(id) {
    return request({
      url: `group/${id}`,
      method: 'delete',
    });
  }
}

export default Group;
