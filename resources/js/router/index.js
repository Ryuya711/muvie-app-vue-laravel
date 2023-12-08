import { createRouter, createWebHistory } from 'vue-router';
import movieComponent from '../components/movieComponent.vue';
import movieDetailComponent from '../components/movieDetailComponent.vue'; // 作成する詳細コンポーネント
import movieEditComponent from '../components/movieEditComponent.vue';


const routes = [
    {
        path: '/',
        name: 'Home',
        component: movieComponent
    },
    {
        path: '/movies/:movieId',
        name: 'movieDetail',
        component: movieDetailComponent,
        props: true
    },
    {
        path: '/movies/:movieId/edit',
        name: 'movieEdit',
        component: movieEditComponent,
        props: true
    }  
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router;