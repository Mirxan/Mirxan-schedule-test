import request from '@/utils/request';
class Teacher {

  static index() {
    return request({
      url: 'teacher',
      method: 'get',
    });
  }

  static create(params) {
    return request({
      url: 'teacher',
      method: 'post',
      data: params,
    });
  }

  static update(params) {
    return request({
      url: `teacher/${params.id}`,
      method: 'put',
      data: params,
    });
  }

  static delete(id) {
    return request({
      url: `teacher/${id}`,
      method: 'delete',
    });
  }
}

export default Teacher;
