// import './bootstrap';
// // VueのcreateApp関数をインポート
// import { createApp } from 'vue';

// // ルーターをインポート
// import router from './router'; 

// // コンポーネントをインポート
// import movieComponent from './components/movieComponent.vue';

// const app = createApp({});

// // コンポーネントをアプリケーションインスタンスに登録
// app.component('movie-component', movieComponent);

// // ルーターをアプリケーションインスタンスに適用
// app.use(router);

// // アプリケーションをDOM要素にマウント
// app.mount('#app');

import { createApp } from 'vue';
import App from './components/App.vue'; // App.vueをインポート
import router from './router'; // routerをインポート

// Vue アプリケーションを作成し、ルートコンポーネントとしてApp.vueを使用
const app = createApp(App);

// Vue Routerをアプリケーションに適用
app.use(router);

// アプリケーションをDOM要素にマウント
app.mount('#app');