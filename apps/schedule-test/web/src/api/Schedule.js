import request from '@/utils/request';
class Schedule {

  static index(params) {
    return request({
      url: 'schedule',
      method: 'get',
      data: params,
    });
  }

  static list() {
    return request({
      url: 'schedule/list',
      method: 'get',
    });
  }

  static create(params) {
    return request({
      url: 'schedule',
      method: 'post',
      data: params,
    });
  }

  static update(params) {
    return request({
      url: `schedule/${params.id}`,
      method: 'put',
      data: params,
    });
  }

  static delete(id) {
    return request({
      url: `schedule/${id}`,
      method: 'delete',
    });
  }
}

export default Schedule;
