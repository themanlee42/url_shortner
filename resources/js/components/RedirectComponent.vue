<template>
    <div>
        <h1>You are being redirected to {{ url.url }}</h1>
    </div>
</template>

<script>
export default {
    data() {
        return {
            url: null
        };
    },
    created() {
        axios.get(`/api/urls/${this.$route.params.id}`)
        .then(response =>
            {
                this.url = response.data;
                setTimeout(() => window.location.href = this.url.url, 2000);
            }
        );
    }
}

</script>
