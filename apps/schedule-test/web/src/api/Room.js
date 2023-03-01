import request from '@/utils/request';
class Room {

  static index() {
    return request({
      url: 'room',
      method: 'get',
    });
  }

  static create(params) {
    return request({
      url: 'room',
      method: 'post',
      data: params,
    });
  }

  static update(params) {
    return request({
      url: `room/${params.id}`,
      method: 'put',
      data: params,
    });
  }

  static delete(id) {
    return request({
      url: `room/${id}`,
      method: 'delete',
    });
  }
}

export default Room;
