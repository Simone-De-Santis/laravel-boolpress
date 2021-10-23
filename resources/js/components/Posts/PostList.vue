<template>
    <section id="post-list">
        <h2>I miei post</h2>
        <Loader v-if="isLoading" />
        <div>
            <Pagination
                :lastPage="pagination.lastPage"
                :currentPage="pagination.currentPage"
                @onPageChange="changePage"
            />
            <PostCard v-for="post in posts" :key="post.id" :post="post" />
            <!-- link pagination -->
            <Pagination
                :lastPage="pagination.lastPage"
                :currentPage="pagination.currentPage"
                @onPageChange="changePage"
            />
        </div>
    </section>
</template>

<script>
import PostCard from "./PostCard";
import Loader from "../Loader";
import Pagination from "../Pagination";

export default {
    name: "PostList",
    components: { PostCard, Loader, Pagination },
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
        getPosts(page) {
            this.isLoading = true;
            axios
                .get(`${this.baseUri}/api/posts?page=${page}`)
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
        },
        changePage(page) {
            this.getPosts(page);
        }
    },
    created() {
        // chiamiamo la funzione
        this.getPosts();
    }
};
</script>

<style lang="scss" scoped></style>
