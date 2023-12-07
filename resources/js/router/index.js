import { createRouter, createWebHistory } from 'vue-router';
import movieComponent from '../components/movieComponent.vue';
import movieDetailComponent from '../components/movieDetailComponent.vue'; // 作成する詳細コンポーネント

const routes = [
    {
        path: '/',
        name: 'Home',
        component: movieComponent
    },
    {
        path: '/movie/:movieId',
        name: 'movieDetail',
        component: movieDetailComponent,
        props: true
    } 
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router;