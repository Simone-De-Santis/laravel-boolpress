<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li
                class="page-item "
                v-if="currentPage > 1"
                @click="$emit('onPageChange', currentPage - 1)"
            >
                <a class="page-link" tabindex="-1" aria-disabled="true"
                    >Previous</a
                >
            </li>
            <li
                v-for="i in lastPage"
                :key="i"
                class="page-item"
                :class="{ active: currentPage == i }"
                @click="$emit('onPageChange', i)"
            >
                <a class="page-link">{{ i }}</a>
            </li>

            <li
                class="page-item"
                v-if="currentPage < lastPage"
                @click="$emit('onPageChange', currentPage + 1)"
            >
                <a class="page-link">Next</a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Pagination",
    props: ["lastPage", "currentPage"]
};
</script>

<style lang="scss" scoped>
.page-item {
    cursor: pointer;
}
</style>
