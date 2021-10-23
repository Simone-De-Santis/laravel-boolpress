<template>
    <section id="post-list">
        <h2>I miei post</h2>
        <Loader v-if="isLoading" />
        <div v-else>
            <PostCard v-for="post in posts" :key="post.id" :post="post" />
            <!-- link pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item " v-if="pagination.currentPage > 1">
                        <a class="page-link" tabindex="-1" aria-disabled="true"
                            >Previous</a
                        >
                    </li>
                    <li class="page-item">
                        <a class="page-link">1</a>
                    </li>

                    <li
                        class="page-item"
                        v-if="pagination.currentPage < pagination.lastPage"
                    >
                        <a class="page-link">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</template>

<script>
import PostCard from "./PostCard";
import Loader from "../Loader";

export default {
    name: "PostList",
    components: { PostCard, Loader },
    data() {
        return {
            baseUri: "http://localhost:8000",
            posts: [],
            // current page
            pagination: {},
            // impostiamo il loader
            isLoading: false
        };
    },
    methods: {
        // funzione per la chiamata api
        getPosts() {
            this.isLoading = true;
            axios
                .get(`${this.baseUri}/api/posts`)
                .then(res => {
                    // this.posts = res.data.data;
                    // destructuring:
                    const { data, current_page, last_page } = res.data;
                    this.posts = data;
                    this.pagination = {
                        currentPage: current_page,
                        lastPage: last_page
                    };

                    this.isLoading = false;
                })
                .catch(err => {
                    console.log(err);
                })
                .then(() => {
                    this.isLoading = false;
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
