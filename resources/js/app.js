import './bootstrap';
// VueのcreateApp関数をインポート
import { createApp } from 'vue';

// ルーターをインポート
import router from './router'; 

// コンポーネントをインポート
import MuvieComponent from './components/MuvieComponent.vue';

const app = createApp({});

// コンポーネントをアプリケーションインスタンスに登録
app.component('muvie-component', MuvieComponent);

// ルーターをアプリケーションインスタンスに適用
app.use(router);

// アプリケーションをDOM要素にマウント
app.mount('#app');