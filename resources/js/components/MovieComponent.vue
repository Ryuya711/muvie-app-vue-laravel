<template>
    <div class="app-title">
        <h1>映画記録アプリ</h1>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>題名</th>
                <th>監督名</th>
                <th>スコア</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <tr v-if="updateForm">
                <td><input type="text" v-model="updateTitle" placeholder="題名" class="form-control"></td>
                <td><input type="text" v-model="updateDirector" placeholder="監督名" class="form-control"></td>
                <td><input type="number" v-model="updateScore" placeholder="スコア" min="0.1" max="5.0" step="0.1" class="form-control"></td>
                <td>
                    <button @click="updateMovie()" class="btn">変更</button>
                    <button @click="updateCancel" class="btn">キャンセル</button>
                </td>
            </tr>

            <tr v-else>
                <td><input type="text" v-model="title" placeholder="タイトル" class="form-control"></td>
                <td><input type="text" v-model="director" placeholder="監督名" class="form-control"></td>
                <td><input type="number" v-model="score" placeholder="スコア" min="0.1" max="5.0" step="0.1" class="form-control"></td>
                <td><button @click="addMovie" class="btn">追加</button></td>
            </tr>
            <tr v-for="movie in movies" :key="movie.id">
                <td>{{ movie.title }}</td>
                <td>{{ movie.director }}</td>
                <td>{{ movie.score ? movie.score.score : 0 }}</td>
                <td>
                    <button :disabled="isPush" @click="displayUpdate(movie)" class="btn">編集</button>
                    <button :disabled="isPush" @click="deleteMovie(movie.id)" class="btn">削除</button>
                    <button class="btn"><router-link :to="`/movies/${movie.id}`" >詳細</router-link></button>
                </td>
            </tr>
        </tbody>
    </table>

</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            movies: [],  // moviesを配列に変更
            title: '',
            director: '',
            isPush: false,
            updateForm: false,
            updateId: '',
            updateTitle: '',
            updateAuthor: '',
            score: 0,
            movie: ''
        };
    },

    methods: {
        // 一覧表示処理_index
        getMovies() {
            axios.get('/api/movies').then(res => {
                this.movies = res.data;
            });
        },

        // 登録処理_new_create
        addMovie() {
            axios.post('/api/movies', {
                title: this.title,
                director: this.director,
                score: this.score,
                review: this.review
            }).then(() => {
                // リクエストが成功した後の処理
                this.title = '';
                this.director = '';
                this.score = 0;
                this.review = '';
                this.getMovies();
            });
        },

        // 更新処理
        displayUpdate(movie) {
            this.isPush = true;
            this.updateForm = true;
            this.updateId = movie.id;
            this.updateTitle = movie.title;
            this.updateDirector = movie.director;
            this.updateScore = movie.score.score;
            this.updateRevuew = movie.movieReview.review;
        },
        updateMovie() {
            axios.put('/api/movies/' + this.updateId, {
                title: this.updateTitle,
                director: this.updateDirector,
                score: this.updateScore
            }).then(() => {
                this.isPush = false;
                this.updateForm = false;
                this.getMovies();
            });     
        },
        updateCancel() {
            this.isPush = false;
            this.updateForm = false;
        },

        deleteMovie(id) {
            axios.delete('/api/movies/' + id).then(() => {
                this.getMovies();
            });
        },
    },

    mounted() {
        this.getMovies();  // コンポーネントがマウントされた時に一覧を読み込む
    }
};
</script>


<style scoped>
    .app-title {
        text-align: center;
        margin: 20px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse; /* セルの境界線を重ねる */
    }

    th, td {
        border: 1px solid #ddd; /* セルの境界線を設定 */
        padding: 8px; /* セル内の余白 */
    }

    th {
        background-color: #f2f2f2; /* ヘッダーの背景色 */
        text-align: left; /* ヘッダーのテキストを左揃えに */
    }

    .app-title {
    text-align: center;
    margin: 20px 0;
}

    .form-container {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        background-color: #f8f9fa; /* 一覧画面の背景色に合わせる */
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: white; /* 入力フィールドの背景色 */
        color: #495057; /* テキストの色 */
    }

    .btn {
        padding: 10px;
        border: none;
        color:  #6c757d;
        border-radius: 4px;
        cursor: pointer;
        display: inline-block; /* インラインブロック要素として表示 */
        width: auto; /* 幅を自動に設定 */
        margin-right: 5px; /* ボタン間の余白 */
    }

    .btn:hover {
        background-color: #5a6268;
    }

    table {
        width: 80%; /* 表の横幅を80%に設定 */
        margin: 0 auto; /* 左右のマージンを自動で設定し、中央に配置 */
        border-collapse: collapse;
    }

</style>