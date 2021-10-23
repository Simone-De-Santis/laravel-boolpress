<template>
    <section id="post-list">
        <h2>I miei post</h2>
        <PostCard v-for="post in posts" :key="post.id" :post="post" />
    </section>
</template>

<script>
import PostCard from "./PostCard";
export default {
    name: "PostList",
    components: { PostCard },
    data() {
        return {
            baseUri: "http://localhost:8000",
            posts: []
        };
    },
    methods: {
        // funzione per la chiamata api
        getPosts() {
            axios
                .get(`${this.baseUri}/api/posts`)
                .then(res => {
                    this.posts = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    created() {
        // chiamiamo la funzione
        this.getPosts();
    }
};
</script>

<style></style>
