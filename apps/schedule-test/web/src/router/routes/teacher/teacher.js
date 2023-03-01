export default [
  {
    path: '/teacher',
    component: () => import('@/views/teacher/index'),
    meta: { title: 'Teacher' },
    name: 'teacher',
  },
];
