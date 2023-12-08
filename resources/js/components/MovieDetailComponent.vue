<template>
    <div class="movie-detail">
        <h1 class="title">詳細画面</h1>
        <div class="movie-info">
            <h2>タイトル: {{ title }}</h2>
            <h2>監督: {{ director }}</h2>
            <h2>スコア: {{ score }}</h2>
            <h2>レビュー: {{ review }}</h2>
            <button class="btn"><router-link :to="`/movies/${this.$route.params.movieId}/edit`" >編集</router-link></button>
            <button class="btn"><router-link :to="`/`" >一覧画面</router-link></button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            title: "",
            director: "",
            score: 0,
            review: ""
        };
    },
    mounted() {
        this.fetchMovieData(this.$route.params.movieId);
    },
    methods: {
        fetchMovieData(movieId) {
            axios.get(`/api/movies/${movieId}`).then(response => {
                const movieData = response.data;
                this.director = movieData.director;
                this.title = movieData.title;
                this.score = movieData.score ? movieData.score.score : '未評価';
                this.review = movieData.movieReview ? movieData.movieReview.review : '未記入';
            }).catch(error => {
                console.error(error);
            });
        } 
    }
};
</script>

<style scoped>
.movie-detail {
    max-width: 800px;
    margin: 40px auto;
    padding: 30px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.title {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
    font-size: 2em;
}

.movie-info h2 {
    font-size: 1.5em;
    color: #555;
    margin-bottom: 15px;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
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
</style>