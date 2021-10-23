<template>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="" alt="..." />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">
                        {{ post.content }}
                    </p>
                    <p class="card-text d-flex justify-content-end ">
                        <small class="text-muted"
                            >Published on:
                            {{ getFormattedDate(post.created_at) }}</small
                        >
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostCard",
    props: ["post"],
    methods: {
        getFormattedDate(date) {
            // utilizziamo il day di js per formattare la data
            const postDate = new Date(date);
            let day = postDate.getDay();
            let month = postDate.getMonth() + 1;
            const year = postDate.getFullYear();

            // add 0 davanti alla data se inferiore di 10
            if (day < 10) day = "0" + day;
            if (month < 10) month = "0" + month;

            return day + "/" + month + "/" + year;
        }
    }
};
</script>

<style></style>
