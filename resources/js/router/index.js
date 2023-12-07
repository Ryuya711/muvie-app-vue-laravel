import { createRouter, createWebHistory } from 'vue-router';
import MuvieComponent from '../components/MuvieComponent.vue';
import MuvieDetailComponent from '../components/MuvieDetailComponent.vue'; // 作成する詳細コンポーネント

const routes = [
    {
        path: '/',
        name: 'Home',
        component: MuvieComponent
    },
    {
        path: '/muvie/:id',
        name: 'MuvieDetail',
        component: MuvieDetailComponent,
        props: true
    } 
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router;