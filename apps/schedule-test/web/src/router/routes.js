import group from '@/router/routes/group/group';
import room from '@/router/routes/room/room';
import teacher from '@/router/routes/teacher/teacher';
import schedule from '@/router/routes/schedule/schedule';
import error from '@/router/routes/error/error';

export default [
  {
    path: '/',
    name: 'main',
    redirect:{name:'group'},
    component: () => import('@/views/layouts/Layout'),
    children: [
      ...group,
      ...room,
      ...teacher,
      ...schedule,
    ],
  },
  {
    path: '*',
    redirect: '/404',
  },
  {
    path: '/404',
    name: '404',
    component: () => import('@/views/layouts/Layout'),
    children: [...error],
  },
];
