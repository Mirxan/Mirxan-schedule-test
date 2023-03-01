export default [
  {
    path: '',
    component: () => import('@/views/error/Error'),
    meta: { title: 'OOPS! Something went wrong here' },
    name: 'error',
  },
];
