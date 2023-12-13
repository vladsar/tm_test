import TaskList from '@/pages/TaskList.vue';
import TaskCreate from '@/pages/TaskCreate.vue';
import TaskEdit from '@/pages/TaskEdit.vue';

const routes = [
    {
        path: '/',
        component: TaskList,
    },
    {
        path: '/tasks/create',
        component: TaskCreate,
    },
    {
        path: '/tasks/:id/edit',
        component: TaskEdit,
    },
];

export default routes;
